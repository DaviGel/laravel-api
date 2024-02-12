@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.projects.index') }}">Torna alla lista dei progetti</a>
                <div class="card mt-3">
                    <div class="card-header">{{ __('Crea nuovo progetto') }}</div>
                    <div class="card-body">
                        <form class="mt-3" action="{{ route('admin.projects.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Titolo</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descrizione</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id=""
                                    cols="30" rows="10">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <select class="form-select mb-3" aria-label="Default select example" name="type_id">
                                <option selected>Scegli la categoria</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @if (old('type_id') == $type->id) selected @endif>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="technologies mb-3">
                                @foreach ($technologies as $technology)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="id-{{ $technology->id }}"
                                            value="{{ $technology->id }}"
                                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}
                                            name="technologies[]">
                                        <label class="form-check-label"
                                            for="id-{{ $technology->id }}">{{ $technology->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-success">Invia</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
