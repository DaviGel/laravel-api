@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.types.index') }}">Torna alla lista dei type</a>
                <div class="card mt-3">
                    <div class="card-header">{{ __('Crea nuovo type') }}</div>
                    <div class="card-body">
                        <form class="mt-3" action="{{ route('admin.types.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Invia</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
