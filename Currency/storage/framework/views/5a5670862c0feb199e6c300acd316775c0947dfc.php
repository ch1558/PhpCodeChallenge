<?php $__env->startSection('title', 'Currency bot'); ?>

<?php $__env->startSection('content'); ?>

    <div class="main__content__chat">
        <p class="main__content__chat__user">Currency bot</p>
        <p class="main__content__chat__message">
            Hi <?php echo e(auth()->user()->name); ?>

            <?php if($warning!=""): ?>
                , <strong><?php echo e($warning); ?></strong>
            <?php endif; ?>
        </p>
        <p class="main__content__chat__message">Please give me the amount of money you want to deposit.</p>
    </div>

    <?php if($amount == 0): ?>
        <?php echo $__env->make('components.money', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
    <?php else: ?>
        <div class="main__content__chat-sender">
            <p class="main__content__chat-sender__user"><?php echo e(auth()->user()->name); ?></p>
            <p class="main__content__chat-sender__message">I have an amount of $<?php echo e($amount); ?></p>
        </div>

        <div class="main__content__chat">
            <p class="main__content__chat__user">Currency bot</p>
                <?php if($error!=""): ?>
                    <p class="main__content__chat__message"><strong><?php echo e($error); ?></strong></p>
                <?php endif; ?>
            <p class="main__content__chat__message">Please give me the currency of your deposit, if you want to use your set default currency, you must type <strong>DEF</strong></p>
            <p class="main__content__chat__message"><strong>Otherwise remenber that you only give me the acronym, for example if you want to use United States Dollar, you need type USD.</strong></p>
        </div>
        <?php if($depositCurrency==""): ?>
            <?php echo $__env->make('components.currency', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <div class="main__content__chat-sender">
                <p class="main__content__chat-sender__user"><?php echo e(auth()->user()->name); ?></p>
                <p class="main__content__chat-sender__message">I want to deposit $<?php echo e($amount); ?> <?php echo e($depositCurrency); ?> into my account.</p>
            </div>

            <div class="main__content__chat">
                <p class="main__content__chat__user">Currency bot</p>
                <p class="main__content__chat__message">Are you sure to do this transaction?</p>
                <ul class="main__content__chat__message">
                    <li>1. Yes, I'm sure.</li>
                    <li>2. No, I wanna modify the deposit.</li>
                    <li>3. No, I wanna back to main menu.</li>
                </ul>
                <p class="main__content__chat__message"><strong>Please only response numbers</strong></p>
            </div>

            <div class="main__content__response">
                <hr>
                <input class="main__content__response__checkbox" type="checkbox" id="checkbox">
                <div class="main__content__response__container">
                    <form class="main__content__response__container--form" method="get" action="<?php echo e(route('redirectDeposit')); ?>">
                        <input name="amount" value="<?php echo e($amount); ?>" hidden>
                        <input name="depositCurrency" value="<?php echo e($depositCurrency); ?>" hidden>
                        <input name="optionConfirm" class="main__content__response__container--form__input" 
                            placeholder="Insert yout answer" type="number" min="1" max="3" required>
                        <button class="main__content__response__container--form__button" type="submit">Send</button>
                        <label class="main__content__response__container--form__toggle" for="checkbox" data-title="Click here"></label>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/accounts-menu/deposit.blade.php ENDPATH**/ ?>