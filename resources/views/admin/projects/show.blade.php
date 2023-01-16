@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center mt-3">{{ $project->title }}</h1>
        <div class="d-flex justify-content-between mt-3">
            <h5>{{ $project->created_at }}</h5>
            <p>{{ $project->slug }}</p>
        </div>
        <div>
            <img src="{{ asset('storage/' . $project->cover_image) }}" alt="">
        </div>
        @if ($project->cover_image)
            <p class="mt-3">{{ $project->content }}</p>
        @else
            <div class="w-50 bg-secondary py-4 text-center">No image</div>
        @endif
    </div>
@endsection
