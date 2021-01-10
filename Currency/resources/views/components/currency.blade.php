<div class="main__content__response">
    <hr>
    <input class="main__content__response__checkbox" type="checkbox" id="checkbox">
    <div class="main__content__response__container">
        <form class="main__content__response__container--form" method="{{$method}}" action="{{$url}}">
            <input name="option" value="{{$option}}" hidden>
            <input name="amount" value="{{$amount ?? ''}}" hidden>
            @if($input=="newCurrency")
                <input name="currentCurrency" value="{{$currentCurrency ?? ''}}" hidden>
            @endif
            <input name="{{$input}}" class="main__content__response__container--form__input" placeholder="What is the current currency?" type="text" required>
            <button class="main__content__response__container--form__button" type="submit">Send</button>
            <label class="main__content__response__container--form__toggle" for="checkbox" data-title="Click here"></label>
        </form>
    </div>
</div>