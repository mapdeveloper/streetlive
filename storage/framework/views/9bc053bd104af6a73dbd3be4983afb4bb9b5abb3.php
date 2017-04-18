<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MAPOL - <?php echo e(trans('message.landingdescription')); ?> ">
    <meta name="author" content="Mapol Business Solutions Pvt. Ltd">

    <meta property="og:title" content="MAPOL" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="MAPOL - <?php echo e(trans('message.landingdescription')); ?>" />
    
    <title><?php echo e(trans('message.landingdescriptionpratt')); ?></title>

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('/css/all.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/main.css')); ?>" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<div id="app">
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>MAPOL</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    
                    <li class="active"><a href="#contact" class="smoothScroll"><?php echo e(trans('message.contact')); ?></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(url('/login')); ?>"><?php echo e(trans('message.login')); ?></a></li>
                        <li><a href="<?php echo e(url('/register')); ?>"><?php echo e(trans('message.register')); ?></a></li>
                    <?php else: ?>
                        <li><a href="/home"><?php echo e(Auth::user()->name); ?></a></li>
                    <?php endif; ?>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>



    <section id="contact" name="contact"></section>
    <div id="footerwrap">
        <div class="container">
            <div class="col-lg-5">
                <h3><?php echo e(trans('message.address')); ?></h3>
                <p>
                    No: 109 & 110, 1st Floor, Chamiers Road, <br/>
                    Teynampet, Chennai-600018, <br/>
                    Tamilnadu,<br/>
                    India
                </p>
            </div>

            <div class="col-lg-7">
                <h3><?php echo e(trans('message.dropus')); ?></h3>
                <br>
                <form role="form" action="#" method="post" enctype="plain">
                    <div class="form-group">
                        <label for="name1"><?php echo e(trans('message.yourname')); ?></label>
                        <input type="name" name="Name" class="form-control" id="name1" placeholder="<?php echo e(trans('message.yourname')); ?>">
                    </div>
                    <div class="form-group">
                        <label for="email1"><?php echo e(trans('message.emailaddress')); ?></label>
                        <input type="email" name="Mail" class="form-control" id="email1" placeholder="<?php echo e(trans('message.enteremail')); ?>">
                    </div>
                    <div class="form-group">
                        <label><?php echo e(trans('message.yourtext')); ?></label>
                        <textarea class="form-control" name="Message" rows="3"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-large btn-success"><?php echo e(trans('message.submit')); ?></button>
                </form>
            </div>
        </div>
    </div>
    <div id="c">
        <div class="container">
            <p>
                <a target="_blank" href="http://www.mapolbs.com"><b>MAPOL</b></a>. <?php echo e(trans('message.descriptionpackage')); ?>.<br/>
                <strong>Copyright &copy; 2016 <a href="http://www.mapolbs.com">mapolbs.org</a>.</strong> 
                <br/>
                
                <br/>
                
            </p>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo e(asset('/js/app.js')); ?>"></script>
<script src="<?php echo e(asset('/js/smoothscroll.js')); ?>"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
