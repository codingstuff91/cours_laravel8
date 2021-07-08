@extends('layouts.app')

@section('content')
    <h1>Création d'un nouvel utilisateur</h1>

    <form action="{{ route('user.store') }}">
        <label for="">Pseudo</label>
        <input type="text" name="name">
        
        <label>Email</label>
        <input type="text" name="name">
        
        <label>Mot de passe</label>
        <input type="text" name="password">

        <label>Role accordé</label>
        <select name="role">
            @foreach ($roles as $role)
                <option value="{{$role->name}}">{{$role->name}}</option>
            @endforeach
        </select>

        <input type="submit" value="Confirmer">
    </form>
@endsection