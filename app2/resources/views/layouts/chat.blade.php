@extends('layouts.navbar')

@section('title')
    Chat
@endsection

@section('contenido')
    <div class="row buscador">
        <div id="chats" class="col-12 col-md-4 row-sm-1 columna1 contenido bg-light">@yield('chats')</div>
        <div id="chat" class="col-12 col-md-8 row-sm-1 columna2 contenido activo bg-secondary">@yield('chat')</div>
    </div>
@endsection
