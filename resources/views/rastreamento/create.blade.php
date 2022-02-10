@extends('layouts.app')

@section('content')

    <div class="container py-5 mt-2">
        <div class="card" >
            <form action="{{ route('rastreamentos.store') }}" method="POST">
                @csrf
                <div class="px-5 py-5">
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" name="url" class="form-control" id="url" aria-describedby="url" placeholder="URL a ser cadastrada com http://">
                        <small id="url-help" class="form-text text-muted">URL para monitoramento.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>

            </form>
        </div>
    </div>
@endsection
