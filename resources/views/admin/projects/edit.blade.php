@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2 class="text-center">Modifica {{ $project->title }}</h2>
        <div class="row justify-content-center">
            <div class="col-8">

                @include('partials.errors')

                <form action="route('admin.projects.update', $project->slug)" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="{{ old('title', $project->title) }}">
                    </div>

                    <div class="form-group mt-3">
                        <label for="type">Tipo Progetto</label>
                        <select name="type_id" id="type" class="form-select">
                            <option value="">Nessun Tipo Selezionato</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected($project->type?->id == $type->id)>{{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="cover_image">Immagine</label>
                        <input type="file" name="cover_image" id="cover_image" class="form-control">
                    </div>

                    <div class="image-preview" class="mt-4">
                        @if ($project->cover_image)
                            <img src="{{ asset('/storage' . $project->cover_image) }}" alt="">
                        @else
                            <p>Nessun Immagine</p>
                        @endif

                    </div>

                    <div class="form-group">
                        <label for="content">Contenuto</label>
                        <textarea name="content" id="content" rows="10" class="form-control"> {{ old('content', $project->content) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-warning">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection
