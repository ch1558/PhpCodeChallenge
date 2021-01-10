<?php $__env->startSection('title', 'Currency bot'); ?>

<?php $__env->startSection('content'); ?>
    <div class="main__content__chat">
        <p class="main__content__chat__user">Currency bot</p>
        <p class="main__content__chat__message">Please give me the amount of money you want exchange.</p>
    </div>

    <?php if($amount == 0): ?>
        <?php echo $__env->make('components.money', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
    <?php else: ?>
        <div class="main__content__chat-sender">
            <p class="main__content__chat-sender__user"><?php echo e(auth()->user()->name ?? 'guest'); ?></p>
            <p class="main__content__chat-sender__message">I have an amount of $<?php echo e($amount); ?></p>
        </div>

        <div class="main__content__chat">
            <p class="main__content__chat__user">Currency bot</p>
                <?php if($error!=""): ?>
                    <p class="main__content__chat__message"><strong><?php echo e($error); ?></strong></p>
                <?php endif; ?>
            <p class="main__content__chat__message">Please give me the current currency.</p>

        <p class="main__content__chat__message"><strong>Only give me the acronym, for example if you want to use United States Dollar, you need type USD.</strong></p>
        </div>

        <?php if($input=="newCurrency"): ?>
            <div class="main__content__chat-sender">
                <p class="main__content__chat-sender__user"><?php echo e(auth()->user()->name ?? 'guest'); ?></p>
                <p class="main__content__chat-sender__message">I have $<?php echo e($amount); ?> <?php echo e($currentCurrency); ?></p>
            </div>

            <div class="main__content__chat">
                <p class="main__content__chat__user">Currency bot</p>
                <?php if($error!=""): ?>
                    <p class="main__content__chat__message"><strong><?php echo e($error); ?></strong></p>
                <?php endif; ?>
                <p class="main__content__chat__message">Please give me the currency do you want.</p>

        <p class="main__content__chat__message"><strong>Only give me the acronym, for example if you want to use United States Dollar, you need type USD.</strong></p>
            </div>
        <?php endif; ?>

        <?php if($exchange == ''): ?>
            <?php echo $__env->make('components.currency', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <div class="main__content__chat-sender">
                <p class="main__content__chat-sender__user"><?php echo e(auth()->user()->name ?? 'guest'); ?></p>
                <p class="main__content__chat-sender__message">I have $<?php echo e($amount); ?> <?php echo e($currentCurrency); ?> and want to exchange to <?php echo e($newCurrency); ?></p>
            </div>

            <div class="main__content__chat">
                <p class="main__content__chat__user">Currency bot</p>
                <p class="main__content__chat__message"><?php echo e($exchange); ?></p>
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
                    <form class="main__content__response__container--form" method="get" action="<?php echo e(route('redirectExchange')); ?>">
                        <input name="option" class="main__content__response__container--form__input" 
                            placeholder="Insert yout answer" type="number" min="1" max="2" required>
                        <button class="main__content__response__container--form__button" type="submit">Send</button>
                        <label class="main__content__response__container--form__toggle" for="checkbox" data-title="Click here"></label>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/first-level/exchange.blade.php ENDPATH**/ ?>