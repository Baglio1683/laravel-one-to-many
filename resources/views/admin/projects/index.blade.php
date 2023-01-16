@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h3 class="text-center">La lista dei progetti</h3>
        <div class="text-end">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-success">Nuovo Progetto
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Titolo</th>
                            <th scope="col">Data di creazione</th>
                            <th scope="col">Immagine</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->title }}</th>
                                <td>{{ $project->created_at }}</td>
                                <td>
                                    @if ($project->cover_image)
                                        <img src="{{ asset('storage/' . $project->cover_image) }}" alt=""
                                            class="w-50">
                                    @else
                                        <div class="w-50 bg-secondary py-4 text-center">No image</div>
                                    @endif
                                </td>
                                <td>

                                    <a class="btn btn-success" href="{{ route('admin.projects.show', $project->slug) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <a class="btn btn-success" href="{{ route('admin.projects.edit', $project->slug) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form action="{{ route('admin.projects.destroy', $project->slug) }}"
                                        class="d-inline-block" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
