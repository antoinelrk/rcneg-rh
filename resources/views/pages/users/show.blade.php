@extends('layouts.app')
@section('title', "Fiche de " . $user->indicative != null ? $user->indicative : $user->member_code)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-4">
                <div class="card">
                    <div class="card-header">Fiche de membre: {{ $user->member_code }}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><b>Indicatif:</b> {{ $user->indicative == null ? 'SWL' : $user->indicative }}</li>
                            <li class="list-group-item"><b>Nom:</b> {{ $user->last_name }}</li>
                            <li class="list-group-item"><b>Prénom:</b> {{ $user->first_name }}</li>
                            <li class="list-group-item"><b>Date de naissance:</b> {{ $user->birth_at != null ? $user->birth_at->format('d/m/Y') : 'Non défini' }}</li>
                            <li class="list-group-item"><b>Adresse postale:</b><br> {{ $user->address }}<br>{{ $user->postal_code }}<br> {{ $user->city }}, {{ $user->region }}<br>{{ $user->country }}</li>
                            <li class="list-group-item"><b>Club:</b>
                                @if($user->club != null)
                                    <a href="{{ route('clubs.show', $user->club->indicative) }}">{{ $user->club->indicative }}</a>
                                @else
                                    {{ "Isolé" }}
                                @endif
                            </li>
                            <li class="list-group-item"><b>Téléphone (Fixe):</b> {{ $user->phone }}</li>
                            <li class="list-group-item"><b>Téléphone (Mobile):</b> {{ $user->self_phone }}</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <ul class="list-group">
                            <li class="list-group-item"><b>Dernière connexion:</b> {{ $user->updated_at->format('d/m/Y à H:i:s') }}</li>
                        </ul>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">Étiquette</div>
                    <div class="card-body">

                    </div>
                    <div class="card-footer"><i>{{ $user->tag != null ? 'Dernière étiquette générée le ' . $user->tag->generated_at->format('d/m/Y') : 'Aucune étiquette n\' a été générée' }}</i></div>
                </div>
            </div>

            <!-- Right Panel -->
            <div class="col-md-4 embed-responsive-item">
                <div class="card">
                    <div class="card-header text-center">{{ $user->last_name }} {{ $user->first_name }} <i>({{ $user->indicative == null ? 'SWL' : $user->indicative }})</i></div>

                    <div class="card-body justify-content-center">
                        <img class="img-fluid rounded" src="{{ $user->portrait }}" alt="member_portrait">
                    </div>

                    <div class="card-footer"><i>Inscrit le {{ $user->created_at->format('d/m/Y') }}</i></div>
                </div>
            </div>
        </div>
    </div>
@endsection
