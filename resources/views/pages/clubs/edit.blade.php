@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('clubs.update', $club->id) }}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="indicative" class="col-md-4 col-form-label text-md-right">Indicatif: </label>
                                <div class="col-md-6">
                                    <input type="text" name="indicative" id="indicative" value="{{ $club->indicative }}" class="form-control @error('indicative') is-invalid @enderror">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Adresse: </label>
                                <div class="col-md-6">
                                    <input type="text" name="address" id="address" value="{{ $club->address }}" class="form-control @error('address') is-invalid @enderror">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="postal_code" class="col-md-4 col-form-label text-md-right">Code Postal: </label>
                                <div class="col-md-6">
                                    <input type="number" name="postal_code" id="postal_code" value="{{ $club->postal_code }}" class="form-control @error('address') is-invalid @enderror">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">Ville: </label>
                                <div class="col-md-6">
                                    <input type="text" name="city" id="city" value="{{ $club->city }}" class="form-control @error('city') is-invalid @enderror">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="region" class="col-md-4 col-form-label text-md-right">Région: </label>
                                <div class="col-md-6">
                                    <input type="text" name="region" id="region" value="{{ $club->region }}" class="form-control @error('region') is-invalid @enderror">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Pays: </label>
                                <div class="col-md-6">
                                    <input type="text" name="country" id="country" value="{{ $club->country }}" class="form-control @error('country') is-invalid @enderror">
                                </div>
                            </div>

                            <button class="btn btn-primary">
                                Éditer
                            </button>
                        </form>
                    </div>

                    <div class="card-footer">
                        Last update: {{ $club->updated_at->format('d/m/Y H:i:s') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
