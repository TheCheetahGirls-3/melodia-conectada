@extends('layouts.navbar')

@section('title')
    Chat
@endsection

@section('contenido')
    <chats :usuario-id="{{ Auth::user()->id_usuario }}" :tipo-usuario="{{ Auth::user()->id_tipo_usuario }}"></chats>
@endsection

