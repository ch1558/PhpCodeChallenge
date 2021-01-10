@extends('layouts.base')

@section('title', 'Currency bot')

@section('content')

    <div class="main__content__chat">
        <p class="main__content__chat__user">Currency bot</p>
        <p class="main__content__chat__message">Hi {{ auth()->user()->name }}, the current balance of your account is <strong>{{ $balance }}</strong> in <strong>{{ $currency }}</strong>.</p>
        <p class="main__content__chat__message">How I can help you?</p>
        <ul class="main__content__chat__message">
            <li>1. View a list of your account transaction.</li>
            <li>2. I wanna back to main menu.</li>
        </ul>
        <p class="main__content__chat__message"><strong>Please only response numbers</strong></p>
    </div>

    <div class="main__content__response">
        <hr>
        <input class="main__content__response__checkbox" type="checkbox" id="checkbox">
        <div class="main__content__response__container">
            <form class="main__content__response__container--form" method="get" action="{{ route('redirectBalance') }}">
                <input name="optionConfirm" class="main__content__response__container--form__input" 
                    placeholder="Insert yout answer" type="number" min="1" max="2" required>
                <button class="main__content__response__container--form__button" type="submit">Send</button>
                <label class="main__content__response__container--form__toggle" for="checkbox" data-title="Click here"></label>
            </form>
        </div>
    </div>
@endsection