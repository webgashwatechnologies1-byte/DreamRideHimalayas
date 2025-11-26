@extends('layouts.main')
@section('meta_title', $page->title ?? $page->title )

@section('meta')
    <meta name="description" content="{{ $page->meta_description ?? '' }}">
    <meta name="keywords" content="{{ is_array($page->keywords) ? implode(', ', $page->keywords) : $page->keywords }}">


    <!-- Open Graph -->
    <meta property="og:title" content="{{ $page->title ?? $page->title ?? ""}}">
    <meta property="og:description" content="{{ $page->  $page->meta_description ?? "" }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $page->og_image ? asset('storage/' . $page->og_image) : asset('assets/images/dreamridelogo.webp') }}">
@endsection

@section('content')

    
@foreach($sections as $section)
    <div>
        @includeIf("widgets.$section->section_type.render", [
        'content' => $section->content,
        'section' => $section
    ])
    </div>
@endforeach
@endsection
