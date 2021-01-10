<div class="main__content__response">
    <hr>
    <input class="main__content__response__checkbox" type="checkbox" id="checkbox">
    <div class="main__content__response__container">
        <form class="main__content__response__container--form" method="<?php echo e($method); ?>" action="<?php echo e($url); ?>">
            <input name="option" value="<?php echo e($option); ?>" hidden>
            <input name="name" class="main__content__response__container--form__input" placeholder="Insert your name" type="text" required>
            <button class="main__content__response__container--form__button" type="submit">Send</button>
            <label class="main__content__response__container--form__toggle" for="checkbox" data-title="Click here"></label>
        </form>
    </div>
</div><?php /**PATH /var/www/resources/views/components/name.blade.php ENDPATH**/ ?>