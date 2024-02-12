@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.types.create') }}">Crea nuovo type</a>
                @if (session('message'))
                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <strong class="me-auto">Notifica</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                {{ session('message') }}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card mt-3">
                    <div class="card-header">{{ __('Dettaglio type') }}</div>
                    @foreach ($types as $type)
                        <div class="card-body">
                            <h3>Nome: {{ $type->name }}</h3>
                            <p>Slug: {{ $type->slug }}</p>
                            <p>Id: {{ $type->id }}</p>
                            <div class="buttons d-flex">
                                <a class="text-decoration-none mx-1 btn btn-sm btn-warning mb-4 text-white"
                                    href="{{ route('admin.types.edit', $type->id) }}" alt="Edit">Modifica</a>
                                <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modal-{{ $type->slug }}">
                                        Cancella
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-{{ $type->slug }}" tabindex="-1"
                                        aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cancellazione
                                                        type
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Sei sicuro di voler cancellare il type: {{ $type->name }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Annulla</button>
                                                    <button type="submit" class="btn btn-danger">Cancella</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
