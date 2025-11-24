<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UiComponent;

class UiComponentController extends Controller
{
    // GET /api/ui-components
    public function index()
    {
        return UiComponent::orderBy('order_no')->get();
    }

    // POST /api/ui-components
    public function store(Request $request)
    {
        $component = UiComponent::create($request->all());
        return response()->json(['message' => 'Component created', 'data' => $component], 201);
    }
    // PUT /api/ui-components/{id}
    public function update(Request $request, $id)
    {
        $component = UiComponent::findOrFail($id);
        $component->update($request->all());

        return response()->json(['message' => 'Component updated', 'data' => $component]);
    }

    // DELETE /api/ui-components/{id}
    public function destroy($id)
    {
        UiComponent::findOrFail($id)->delete();
        return response()->json(['message' => 'Component deleted']);
    }

    // GET /api/ui (grouped topbar + header for frontend)
    public function grouped()
    {
        $components = UiComponent::where('visible_global', 1)
            ->orderBy('order_no')
            ->get();

        // Group by desktop and mobile positions
        $output = [
            'topbar' => [
                'desktop' => [
                    'left' => [],
                    'center' => [],
                    'right' => [],
                ],
                'mobile' => [
                    'top' => [],
                    'sidebar' => [],
                    'bottom' => [],
                ],
            ],

            'header' => [
                'desktop' => [
                    'left' => [],
                    'center' => [],
                    'right' => [],
                ],
                'mobile' => [
                    'top' => [],
                    'sidebar' => [],
                    'bottom' => [],
                ],
            ],
        ];

        foreach ($components as $c) {
            $group = $c->component_group;

            // Desktop positioning
            if (in_array($c->desktop_position, ['left','center','right'])) {
                $output[$group]['desktop'][$c->desktop_position][] = $c;
            }

            // Mobile positioning
            if (in_array($c->mobile_position, ['top','sidebar','bottom'])) {
                $output[$group]['mobile'][$c->mobile_position][] = $c;
            }
        }

        return $output;
    }

     public function uploadLogo(Request $request)
        {
            if (!$request->hasFile('file')) {
                return response()->json(['error' => 'No file uploaded'], 422);
            }

            $file = $request->file('file')->store('logo', 'public');
            $url = 'storage/' . $file;

            return response()->json([
                'message' => 'Uploaded successfully',
                'url' => $url
            ]);
        }



}
