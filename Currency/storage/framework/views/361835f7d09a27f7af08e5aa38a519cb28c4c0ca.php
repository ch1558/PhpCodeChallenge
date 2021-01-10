<?php $__env->startSection('title', 'Currency bot'); ?>

<?php $__env->startSection('content'); ?>
    <div class="main__content__chat">
        <p class="main__content__chat__user">Currency bot</p>
        <?php if(isset($error) && $error!=""): ?>
            <p class="main__content__chat__message"><strong><?php echo e($error); ?></strong></p>
        <?php endif; ?>
        <p class="main__content__chat__message">Please give me your email.</p>
    </div>

    <?php if($email==""): ?>
        <?php echo $__env->make('components.email', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <div class="main__content__chat-sender">
            <p class="main__content__chat-sender__user">Guest</p>
            <p class="main__content__chat-sender__message"><?php echo e($email); ?></p>
        </div>

        <div class="main__content__chat">
            <p class="main__content__chat__user">Currency bot</p>
            <p class="main__content__chat__message">Please type your password.</p>
        </div>

        <?php echo $__env->make('components.password', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/first-level/login.blade.php ENDPATH**/ ?>