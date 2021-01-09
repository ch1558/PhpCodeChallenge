@extends('layouts.base')

@section('title', 'Currency bot')

@section('content')
    <div class="main__content__chat">
        <p class="main__content__chat__user">Currency bot</p>
        @if(isset($error) && $error!="")
            <p class="main__content__chat__message"><strong>{{$error}}</strong></p>
        @endif
        <p class="main__content__chat__message">Please, give me your email.</p>
    </div>

    @if($email=="")
        @include('components.email')
    @else
        <div class="main__content__chat">
            <p class="main__content__chat-sender__user">Guest</p>
            <p class="main__content__chat-sender__message">{{ $_GET['email'] }}</p>
        </div>

        <div class="main__content__chat">
            <p class="main__content__chat__user">Currency bot</p>
            <p class="main__content__chat__message">Please, type your password.</p>
        </div>

        @include('components.password')
    @endif

@endsection