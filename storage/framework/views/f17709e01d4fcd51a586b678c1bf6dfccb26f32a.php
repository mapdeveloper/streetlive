<?php $__env->startSection('htmlheader_title'); ?>
    Password recovery
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<body class="login-page">
    <div id="app">

        <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo e(url('/')); ?>"><img src="../img/mapol-logo-lg.png" alt="" style="width:160px;height:60px"></a>
        </div><!-- /.login-logo -->

        <?php if(session('status')): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> <?php echo e(trans('message.someproblems')); ?><br><br>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="login-box-body">
            <p class="login-box-msg">Reset Password</p>
            <form action="<?php echo e(url('/password/email')); ?>" method="post">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-2">
                    </div><!-- /.col -->
                    <div class="col-xs-8">
                        <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo e(trans('message.sendpassword')); ?></button>
                    </div><!-- /.col -->
                    <div class="col-xs-2">
                    </div><!-- /.col -->
                </div>
            </form>

            <a href="<?php echo e(url('/login')); ?>">Log in</a><br>
            <a href="<?php echo e(url('/register')); ?>" class="text-center"><?php echo e(trans('message.registermember')); ?></a>

        </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->
    </div>

    <?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>