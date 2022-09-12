@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>@sortablelink('member_code', 'N° Adhérent')</th>
                            <th>@sortablelink('indicative', 'Indicatif')</th>
                            <th>@sortablelink('last_name', 'Nom - Prénom')</th>
                            <th>E-Mail</th>
                            <th>Radio-Club</th>
                            <th>Actions</th>
                        </tr>

                        @foreach($users as $user)
                            <tr>
                                <td><a href="{{ route('users.show', $user->member_code) }}">{{ $user->member_code }}</a></td>
                                <td>{{ $user->indicative != null ? $user->indicative : "SWL" }}</td>
                                <td>{{ (($user->last_name != null) || ($user->first_name != null)) ? $user->last_name . ' ' . $user->first_name : 'Non défini' }}</td>
                                <td>{{ $user->email != null ? $user->email : "Non défini" }}</td>
                                <td>
                                    @if($user->club != null)
                                        <a href="{{ route('clubs.show', $user->club->indicative) }}">{{ $user->club->indicative }}</a>
                                    @else
                                        {{ "Isolé" }}
                                    @endif
                                </td>

                                <td>
                                    <a class="btn btn-primary" href="{{ route('users.form.edit', $user->member_code) }}">Edit</a>

                                    @if($user->member_code != Auth::user()->member_code)
                                        <a class="btn btn-danger" href="{{ route('users.delete.form', $user->id) }}">Remove</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="card-footer">
                    Il y a <span style="color: green">{{ $users->count() }}</span> membres.
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
