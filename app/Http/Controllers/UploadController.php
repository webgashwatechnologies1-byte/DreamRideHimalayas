<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class UploadController extends Controller
{
    /**
     * Handle chunked video upload
     */
    public function upload(Request $request)
    {
        try {
            $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));

            if (!$receiver->isUploaded()) {
                return response()->json(["error" => "No file uploaded"], 400);
            }

            $save = $receiver->receive();

            // ✅ When all chunks are uploaded
            if ($save->isFinished()) {
                $file = $save->getFile();

                // Ensure target folder exists
                $storageDir = storage_path('app/public/packages/videos');
                if (!is_dir($storageDir)) {
                    mkdir($storageDir, 0775, true);
                }

                // Generate safe unique filename
                $safeName = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
                $finalPath = $storageDir . DIRECTORY_SEPARATOR . $safeName;

                // Move file safely
                if (!copy($file->getPathname(), $finalPath)) {
                    throw new \Exception("Failed to move file to destination: {$finalPath}");
                }

                // Clean up temporary chunk file
                if (file_exists($file->getPathname())) {
                    @unlink($file->getPathname());
                }

                // Build clean path (no 'public/')
                $relativePath = 'packages/videos/' . $safeName;
                $url = Storage::url($relativePath); // gives /storage/packages/videos/...

                return response()->json([
                    'done' => true,
                    'path' => $relativePath, // ✅ clean path without 'public/'
                    'url'  => $url, // ✅ browser-accessible URL
                    'file' => $safeName
                ]);
            }

            // Upload still in progress
            $handler = $save->handler();

            return response()->json([
                'done' => false,
                'percentage' => $handler->getPercentageDone()
            ]);
        } catch (\Throwable $e) {
            \Log::error('Video upload failed', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'error' => 'Upload failed: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Handle video deletion
     */
    public function delete(Request $request)
    {
        $request->validate([
            'path' => 'required|string' // e.g. "packages/videos/abc123.mp4"
        ]);

        $path = $request->input('path');

        // Make sure it's a clean relative path
        $path = str_replace('public/', '', $path);

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            return response()->json([
                'status' => true,
                'message' => 'Video deleted successfully'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'File not found: ' . $path
        ], 404);
    }
}
