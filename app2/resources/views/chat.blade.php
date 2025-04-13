@extends('layouts.chat')

@section('chats')
    <chats :usuario-id = '{{Auth::user()->id_usuario}}' :usuario="{{ json_encode(Auth::user()) }}"></chats>
@endsection

@section('chat')
    <chat></chat>
@endsection
