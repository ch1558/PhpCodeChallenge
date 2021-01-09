<div class="main__content__response">
    <hr>
    <input class="main__content__response__checkbox" type="checkbox" id="checkbox">
    <div class="main__content__response__container">
        <form class="main__content__response__container--form" method="{{$method}}" action="{{$url}}">
            <input name="option" value="{{$option}}" hidden>
            <input name="name" value="{{$name ?? ''}}" hidden>
            <input name="email" class="main__content__response__container--form__input" placeholder="Insert your email" type="email" required>
            <button class="main__content__response__container--form__button" type="submit">Send</button>
            <label class="main__content__response__container--form__toggle" for="checkbox" data-title="Click here"></label>
        </form>
    </div>
</div>