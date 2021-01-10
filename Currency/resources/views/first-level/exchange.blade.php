@extends('layouts.base')

@section('title', 'Currency bot')

@section('content')
    <div class="main__content__chat">
        <p class="main__content__chat__user">Currency bot</p>
        <p class="main__content__chat__message">Please give me the amount of money you want exchange.</p>
    </div>

    @if($amount == 0)
        @include('components.money')    
    @else
        <div class="main__content__chat">
            <p class="main__content__chat-sender__user">{{auth()->user()->name ?? 'guest'}}</p>
            <p class="main__content__chat-sender__message">I have an amount of ${{ $amount }}</p>
        </div>

        <div class="main__content__chat">
            <p class="main__content__chat__user">Currency bot</p>
                @if($error!="")
                    <p class="main__content__chat__message"><strong>{{$error}}</strong></p>
                @endif
            <p class="main__content__chat__message">Please give me the current currency.</p>

        <p class="main__content__chat__message"><strong>Only give me the acronym, for example if you want to use United States Dollar, you need type USD.</strong></p>
        </div>

        @if($input=="newCurrency")
            <div class="main__content__chat">
                <p class="main__content__chat-sender__user">{{auth()->user()->name ?? 'guest'}}</p>
                <p class="main__content__chat-sender__message">I have ${{ $amount }} {{$currentCurrency}}</p>
            </div>

            <div class="main__content__chat">
                <p class="main__content__chat__user">Currency bot</p>
                @if($error!="")
                    <p class="main__content__chat__message"><strong>{{$error}}</strong></p>
                @endif
                <p class="main__content__chat__message">Please give me the currency do you want.</p>

        <p class="main__content__chat__message"><strong>Only give me the acronym, for example if you want to use United States Dollar, you need type USD.</strong></p>
            </div>
        @endif

        @if($exchange == '')
            @include('components.currency')
        @else
            <div class="main__content__chat">
                <p class="main__content__chat-sender__user">{{auth()->user()->name ?? 'guest'}}</p>
                <p class="main__content__chat-sender__message">I have ${{ $amount }} {{$currentCurrency}} and want to exchange to {{$newCurrency}}</p>
            </div>

            <div class="main__content__chat">
                <p class="main__content__chat__user">Currency bot</p>
                <p class="main__content__chat__message">{{ $exchange }}</p>
                <p class="main__content__chat__message">How I can help you?</p>
                <ul class="main__content__chat__message">
                    <li>1. New money exchange</li>
                    <li>2. Back to main menu</li>
                </ul>
                <p class="main__content__chat__message"><strong>Please only response numbers</strong></p>
            </div>

            <div class="main__content__response">
                <hr>
                <input class="main__content__response__checkbox" type="checkbox" id="checkbox">
                <div class="main__content__response__container">
                    <form class="main__content__response__container--form" method="get" action="{{ route('redirectExchange') }}">
                        <input name="option" class="main__content__response__container--form__input" 
                            placeholder="Insert yout answer" type="number" min="1" max="2" required>
                        <button class="main__content__response__container--form__button" type="submit">Send</button>
                        <label class="main__content__response__container--form__toggle" for="checkbox" data-title="Click here"></label>
                    </form>
                </div>
            </div>
        @endif
    @endif
@endsection