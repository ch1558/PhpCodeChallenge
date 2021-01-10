<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <title><?php echo $__env->yieldContent('title'); ?></title>

        <link rel="preconnect" href="https://fonts.gstatic.com"> 
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <link rel="icon" href="<?php echo e(asset('img/favicon.ico')); ?>">
        <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    </head>

    <body>
        <header class="header">
            <h1 class="header__title">Currency Bot</h1>
            <div class="header__menu">
                <div class="header__menu--profile">
                    <img src=<?php echo e(asset('img/user-icon.png')); ?> alt="user_profile" />
                    <?php if(isset(auth()->user()->name)): ?>
                        <p><?php echo e(auth()->user()->name); ?></p>
                    <?php else: ?>
                        <p>Guest</p>
                    <?php endif; ?>
                </div>
                <?php if(isset(auth()->user()->name)): ?>
                    <ul>
                        <li><a href="<?php echo e(route('logout')); ?>">Sign off</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </header>

        <section class="main">
            <div class="main__content">
                <div class="main__content_initial-padding"></div>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </section>  
    </body>
    
</html><?php /**PATH /var/www/resources/views/layouts/base.blade.php ENDPATH**/ ?>