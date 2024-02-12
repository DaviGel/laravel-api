@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.types.index') }}">Torna alla lista dei types</a>
                <div class="card mt-3">
                    <div class="card-header">{{ __('Modifica progetto') }}</div>
                    <div class="card-body">
                        <form class="mt-3" action="{{ route('admin.types.update', $type) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="name" value="{{ old('title', $type->name) }}">
                                @error('name')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Salva</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
