@extends('layouts.navbar')

@section('title')
    Chat
@endsection

@section('contenido')
    <chats :usuario-id="{{ Auth::user()->id_usuario }}"></chats>
@endsection

