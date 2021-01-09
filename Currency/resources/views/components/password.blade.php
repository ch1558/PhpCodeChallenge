<div class="main__content__response">
    <hr>
    <input class="main__content__response__checkbox" type="checkbox" id="checkbox">
    <div class="main__content__response__container">
        <form class="main__content__response__container--form" method="{{$method}}" action="{{$url}}">
            @csrf
            <input name="option" value="{{$option}}" hidden>
            <input name="email" value="{{$email}}" hidden>
            <input name="name" value="{{$name ?? ''}}" hidden>
            <input name="password" class="main__content__response__container--form__input" placeholder="Type your password" type="password" required>
            <button class="main__content__response__container--form__button" type="submit">Send</button>
            <label class="main__content__response__container--form__toggle" for="checkbox" data-title="Click here"></label>
        </form>
    </div>
</div>