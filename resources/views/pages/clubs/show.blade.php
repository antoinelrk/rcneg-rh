@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header">Fiche de club: {{ $club->indicative }}</div>

                        <div class="card-body">
                            @if($club->address)
                                <ul class="list-group">
                                    <li class="list-group-item"><b>Indicatif:</b> {{ $club->indicative }}</li>
                                    <li class="list-group-item"><b>Adresse postale:</b><br> {{ $club->address }}<br>{{ $club->postal_code }}<br> {{ $club->city }}, {{ $club->region }}<br>{{ $club->country }}</li>
                                </ul>
                            @else
                                <span>Aucune adresse enregistrée</span>
                            @endif
                        </div>


                    <div class="card-footer">
                        <a href="{{ route('clubs.form.edit', $club->indicative) }}" class="btn btn-primary">
                            Éditer
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
