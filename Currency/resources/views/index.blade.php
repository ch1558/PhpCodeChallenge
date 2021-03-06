@extends('layouts.base')

@section('title', 'Currency bot')

@section('content')
    <div class="main__content__chat">
        <p class="main__content__chat__user">Currency bot</p>
        <p class="main__content__chat__message">How I can help you?</p>
        <ul class="main__content__chat__message">
            <li>1. Money Exchange</li>
            <li>2. Log in</li>
            <li>3. Sing in</li>
        </ul>
        <p class="main__content__chat__message"><strong>Please only response numbers</strong></p>
    </div>

    <div class="main__content__response">
        <hr>
        <input class="main__content__response__checkbox" type="checkbox" id="checkbox">
        <div class="main__content__response__container">
            <form class="main__content__response__container--form" method="get" action="{{ route('firstLevel') }}">
                <input name="option" class="main__content__response__container--form__input" 
                    placeholder="Insert yout answer" type="number" min="1" max="3" required>
                <button class="main__content__response__container--form__button" type="submit">Send</button>
                <label class="main__content__response__container--form__toggle" for="checkbox" data-title="Click here"></label>
            </form>
        </div>
    </div>
    
@endsection