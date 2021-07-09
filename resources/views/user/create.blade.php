@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Création d'un nouvel utilisateur</h1>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <label for="">Pseudo</label>
        <input type="text" name="name">
        
        <label>Email</label>
        <input type="text" name="email">
        
        <label>Mot de passe</label>
        <input type="text" name="password">

        <label>Role accordé</label>
        <select name="role[]" multiple>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>

        <input type="submit" value="Confirmer">
    </form>
@endsection