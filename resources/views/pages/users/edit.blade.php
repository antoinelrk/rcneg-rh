@extends('layouts.app')
@section('title', "Editer un membre")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->member_code) }}" method="POST">
                            @csrf
                            <!-- Member Code -->
                            <div class="form-group row">
                                <label for="member_code" class="col-md-4 col-form-label text-md-right">Code membre: </label>

                                <div class="col-md-6">
                                    <input type="number" disabled name="member_code" id="member_code" value="{{ $user->member_code }}" class="form-control @error('member_code') is-invalid @enderror">
                                </div>
                            </div>


                                <!-- Indicative -->
                                <div class="form-group row">
                                    <label for="indicative" class="col-md-4 col-form-label text-md-right">Indicatif: </label>

                                    <div class="col-md-6">
                                        <input type="text" name="indicative" id="indicative" value="{{ $user->indicative }}" class="form-control @error('indicative') is-invalid @enderror">
                                    </div>
                                </div>

                                <!-- E-Mail -->
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail: </label>

                                    <div class="col-md-6">
                                        <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror">
                                    </div>
                                </div>

                                <!-- First Name -->
                                <div class="form-group row">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-right">Prénom: </label>

                                    <div class="col-md-6">
                                        <input type="text" name="first_name" id="first_name" value="{{ $user->first_name }}" class="form-control @error('first_name') is-invalid @enderror">
                                    </div>
                                </div>

                                <!-- Last Name -->
                                <div class="form-group row">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">Nom: </label>

                                    <div class="col-md-6">
                                        <input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" class="form-control @error('last_name') is-invalid @enderror">
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">Adresse postale: </label>

                                    <div class="col-md-6">
                                        <input type="text" name="address" id="address" value="{{ $user->address }}" class="form-control @error('address') is-invalid @enderror">
                                    </div>
                                </div>

                                <!-- Postal Code -->
                                <div class="form-group row">
                                    <label for="postal_code" class="col-md-4 col-form-label text-md-right">Code Postal: </label>

                                    <div class="col-md-6">
                                        <input type="number" name="postal_code" id="postal_code" value="{{ $user->postal_code }}" class="form-control @error('postal_code') is-invalid @enderror">
                                    </div>
                                </div>

                                <!-- City -->
                                <div class="form-group row">
                                    <label for="city" class="col-md-4 col-form-label text-md-right">Ville: </label>

                                    <div class="col-md-6">
                                        <input type="text" name="city" id="city" value="{{ $user->city }}" class="form-control @error('city') is-invalid @enderror">
                                    </div>
                                </div>

                                <!-- Region -->
                                <div class="form-group row">
                                    <label for="region" class="col-md-4 col-form-label text-md-right">Région: </label>

                                    <div class="col-md-6">
                                        <input type="text" name="region" id="region" value="{{ $user->region }}" class="form-control @error('region') is-invalid @enderror">
                                    </div>
                                </div>

                                <!-- Country -->
                                <div class="form-group row">
                                    <label for="country" class="col-md-4 col-form-label text-md-right">Pays: </label>

                                    <div class="col-md-6">
                                        <input type="text" name="country" id="country" value="{{ $user->country }}" class="form-control @error('country') is-invalid @enderror">
                                    </div>
                                </div>

                                <!-- Club -->
                                <div class="form-group row">
                                    <label for="club_id" class="col-md-4 col-form-label text-md-right">Radio-Club: </label>

                                    <div class="col-md-6">
                                        <select class="form-control @error('club') is-invalid @enderror" name="club_id" id="club_id">
                                            <option disabled value="">Sélectionner une option</option>
                                            <option value="">Isolé</option>

                                            @foreach($clubs as $club)
                                                @if($user->club_id == $club->id)
                                                    <option selected value="{{ $club->id }}">{{ $club->indicative }}</option>
                                                @else
                                                    <option value="{{ $club->id }}">{{ $club->indicative }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">Tél. Fixe: </label>

                                    <div class="col-md-6">
                                        <input type="text" name="phone" id="phone" value="{{ $user->phone }}" class="form-control @error('phone') is-invalid @enderror">
                                    </div>
                                </div>

                                <!-- Self Phone -->
                                <div class="form-group row">
                                    <label for="self_phone" class="col-md-4 col-form-label text-md-right">Tél. Portable: </label>

                                    <div class="col-md-6">
                                        <input type="text" name="self_phone" id="self_phone" value="{{ $user->self_phone }}" class="form-control @error('self_phone') is-invalid @enderror">
                                    </div>
                                </div>

                                <!-- Birth Date -->
                                <div class="form-group row">
                                    <label for="birth_at" class="col-md-4 col-form-label text-md-right">Date de naissance: </label>

                                    <div class="col-md-6">
                                        <input type="date" name="birth_at" id="birth_at" value="{{ $user->birth_at != null ? $user->birth_at->format('Y-m-d') : "" }}" class="form-control @error('birth_at') is-invalid @enderror">
                                    </div>
                                </div>

                                <!-- OM -->
                                <div class="form-group row">
                                    <label for="om" class="col-md-4 col-form-label text-md-right">OM ?</label>
                                    <div class="col-md-6">
                                        <input type="checkbox" @if($user->om == 1) checked @endif value="true" name="om" id="om" class="form-control @error('om') is-invalid @enderror">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
