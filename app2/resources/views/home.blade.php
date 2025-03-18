@extends('layouts.principal')

@section('contenido')
{{ $user->tipo_usuario->nombre }}
@endsection
