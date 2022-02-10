@extends('layouts.app')

@section('content')

    <div class="container py-5 mt-2">
        <div class="card" style="width: 100%;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">URL: {{ $rastreamento->url }}</li>
                <li class="list-group-item">Status: {{ $rastreamento->status_code }}</li>
                <li class="list-group-item">Última consulta: {{ $rastreamento->updated_at->format('d/m/y H:i') ?? '' }}</li>
                <li class="list-group-item">
                    <pre>
                        <code>
                            {{ $rastreamento->body }}
                        </code>
                    </pre>
                </li>
            </ul>
        </div>
    </div>

@endsection
