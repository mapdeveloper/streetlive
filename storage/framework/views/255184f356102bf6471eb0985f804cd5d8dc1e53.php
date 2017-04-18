<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo $__env->yieldContent('contentheader_title', 'Page Header here'); ?>
        <small><?php echo $__env->yieldContent('contentheader_description'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> <?php echo e(trans('message.level')); ?></a></li>
        
    </ol>
</section>