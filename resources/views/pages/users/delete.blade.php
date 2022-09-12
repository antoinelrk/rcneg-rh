@extends('layouts.app')
@section('title', "Remove member")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Suppression de {{ $user->member_code }} &mdash; ({{ $user->indicative != null ? $user->indicative : "SWL" }})
                    </div>
                    <div class="card-body justify-content-center">
                        Vous êtes sur le point de supprimer le membre {{ $user->member_code }}

                        <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger">Oui</a>
                        <a href="{{ route('home') }}" class="btn btn-primary">Non</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
