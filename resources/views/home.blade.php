@extends('layouts.principal')

@section('contenido')
{{ $user->rol->nombre }}
@endsection
