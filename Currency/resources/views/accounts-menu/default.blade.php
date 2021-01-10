@extends('layouts.base')

@section('title', 'Currency bot')

@section('content')

    <div class="main__content__chat">
        <p class="main__content__chat__user">Currency bot</p>
        <p class="main__content__chat__message">
            Hi {{ auth()->user()->name }}
            @if($warning!="")
                , <strong>{{ $warning }}</strong>
            @endif
        </p>
        @if($error!="")
            <p class="main__content__chat__message"><strong>{{$error}}</strong></p>
        @endif
        <p class="main__content__chat__message">Please give me the currency that you want to be your default.</p>
        <p class="main__content__chat__message"><strong>Only give me the acronym, for example if you want to use United States Dollar, you need type USD.</strong></p>
    </div>

    @if($defaultCurrency=="")
        @include('components.currency')
    @else
        <div class="main__content__chat-sender">
            <p class="main__content__chat-sender__user">{{ auth()->user()->name }}</p>
            <p class="main__content__chat-sender__message">I wanna set {{ $defaultCurrency }} like my default currency.</p>
        </div>

        <div class="main__content__chat">
            <p class="main__content__chat__user">Currency bot</p>
            <p class="main__content__chat__message">Are you sure to do this transaction?</p>
            <ul class="main__content__chat__message">
                <li>1. Yes, I'm sure.</li>
                <li>2. No, I wanna change my election.</li>
                <li>3. No, I wanna back to main menu.</li>
            </ul>
            <p class="main__content__chat__message"><strong>Please only response numbers</strong></p>
        </div>

        <div class="main__content__response">
            <hr>
            <input class="main__content__response__checkbox" type="checkbox" id="checkbox">
            <div class="main__content__response__container">
                <form class="main__content__response__container--form" method="get" action="{{ route('redirectDefaultCurrency') }}">
                    <input name="defaultCurrency" value="{{ $defaultCurrency }}" hidden>
                    <input name="optionConfirm" class="main__content__response__container--form__input" 
                        placeholder="Insert yout answer" type="number" min="1" max="3" required>
                    <button class="main__content__response__container--form__button" type="submit">Send</button>
                    <label class="main__content__response__container--form__toggle" for="checkbox" data-title="Click here"></label>
                </form>
            </div>
        </div>
    @endif

@endsection