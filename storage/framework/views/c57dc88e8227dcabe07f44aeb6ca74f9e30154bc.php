<?php $__env->startSection('htmlheader_title'); ?>
    Log in
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body class="hold-transition login-page">
    <div id="app">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo e(url('/')); ?>"><img src="img/mapol-logo-lg.png" alt="" style="width:160px;height:60px"></a>
            </div><!-- /.login-logo -->

        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> <?php echo e(trans('message.someproblems')); ?><br><br>
                
            </div>
        <?php endif; ?>

        <div class="login-box-body">
        <p class="login-box-msg"> <?php echo e(trans('message.siginsession')); ?> </p>
        <form action="<?php echo e(url('/login')); ?>" method="post">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="<?php echo e(trans('message.email')); ?>" name="email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="<?php echo e(trans('message.password')); ?>" name="password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> <?php echo e(trans('message.remember')); ?>

                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo e(trans('message.buttonsign')); ?></button>
                </div><!-- /.col -->
            </div>
        </form>

        <?php echo $__env->make('auth.partials.social_login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <a href="<?php echo e(url('/password/reset')); ?>"><?php echo e(trans('message.forgotpassword')); ?></a><br>
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