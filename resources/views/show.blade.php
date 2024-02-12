@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.projects.index') }}">Torna alla lista dei progetti</a>
                <div class="card mt-3">
                    <div class="card-header">{{ __('Dettaglio progetto') }}</div>
                    <div class="card-body">
                        <h4>{{ $project->title }}</h4>
                        <p>{{ $project->description }}</p>
                        <div class="category">
                            Categoria: {{ $project->type?->name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
