@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('clubs.store') }}" method="POST">
                            @csrf
                            <!-- Indicative -->
                            <div class="form-group row">
                                <label for="indicative" class="col-md-4 col-form-label text-md-right">Indicatif: </label>

                                <div class="col-md-6">
                                    <input type="text" name="indicative" id="indicative" class="form-control @error('indicative') is-invalid @enderror">
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Adresse postale: </label>

                                <div class="col-md-6">
                                    <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror">
                                </div>
                            </div>

                            <!-- Postal Code -->
                            <div class="form-group row">
                                <label for="postal_code" class="col-md-4 col-form-label text-md-right">Code Postal: </label>

                                <div class="col-md-6">
                                    <input type="number" name="postal_code" id="postal_code" class="form-control @error('postal_code') is-invalid @enderror">
                                </div>
                            </div>

                            <!-- City -->
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">Ville: </label>

                                <div class="col-md-6">
                                    <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror">
                                </div>
                            </div>

                            <!-- Region -->
                            <div class="form-group row">
                                <label for="region" class="col-md-4 col-form-label text-md-right">Région: </label>

                                <div class="col-md-6">
                                    <input type="text" name="region" id="region" class="form-control @error('region') is-invalid @enderror">
                                </div>
                            </div>

                            <!-- Country -->
                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Pays: </label>

                                <div class="col-md-6">
                                    <input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Ajouter
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
