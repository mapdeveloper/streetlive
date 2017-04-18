<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Street Lights | Home</title>
<!-- Stylesheets -->
<link href="css\frontend\bootstrap.css" rel="stylesheet">
<link href="css\frontend\revolution-slider.css" rel="stylesheet">
<link href="css\frontend\style.css" rel="stylesheet">
<link rel="shortcut icon" href="images\favicon.ico" type="image/x-icon">
<link rel="icon" href="images\favicon.ico" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css\frontend\responsive.css" rel="stylesheet">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    
 	
    <!-- Main Header-->
    <header class="main-header">
    	
        
        
        <!-- Main Box -->
    	<div class="main-box">
        	<div class="auto-container">
            	<div class="outer-container clearfix">
                    <!--Logo Box-->
                    <div class="logo-box">
                        <div class="logo"><a href="index-1.htm"><img src="images\logoo.png" alt=""></a></div>
                    </div>
                    
                    <!--Nav Outer-->
                    <div class="nav-outer clearfix">
                        <!-- Main Menu -->
                        <nav class="  main-menu role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>    
  </div>
  <div class="navbar-collapse collapse clearfix">
    <ul class="nav navbar-nav navigation clearfix">
         <li><a href="{{ url('/index-1') }}">home</a></li>
                                     <li><a href="{{ url('/login') }}">Donate</a></li>
                                     <li class="dropdown">
                                    <a href="{{ url('/aboutus') }}">About Us</a>
                                     <ul>
                                            <li><a href="terms&condition">Terms & Conditions</a></li>
                                            
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#">Pay Roll Giving</a>
                                        <ul>
                                            <li><a href="What-Is-Payroll-Giving.html">What Is Payroll Giving</a></li>
                                            <li><a href="Our-Corporate-Partners.html">Our Corporate Partners</a></li>
                                            <li><a href="Help-Center.html">Help Center</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li><a href="contact.htm">Contact us</a></li>
    </ul>

   
        <ul class="nav navbar-nav navbarright">
        <li>
          <div class="btn-group navbar-btn" role="group" aria-label="...">
           <button onclick="location.href='{{ url('/login') }}';" type="button" class="btn btn-warning">DONATE</button>
           <a href="{{ url('/auth/facebook') }}"><img class="igm" src="images/facebook.png" alt="Smiley face" height="30" width="30"></a>
           <a href="{{ url('/auth/twitter') }}"><img class="igm" src="images/twitter.png" alt="Smiley face" height="30" width="30"></a>
           <a href="#"><img class="igm" src="images/youtube.png" alt="Smiley face" height="30" width="30"></span></a>
        
          </div>
          <div class="iph">
            @if (count($errors) > 0)
            <span class="dropdown open">
            @else
            <span class="dropdown">
            @endif

            
          <a href="{{ url('/login') }}" class="dropdown-toggle" data-toggle="dropdown"><b>LOGIN</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu dropdown-menu-right">
            @if (count($errors) > 0)
            
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {{ trans('message.someproblems') }}<br><br>
                {{-- <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul> --}}
            </div>
        @endif

            <p class="login-box-msg"> {{ trans('message.siginsession') }} </p>
				<div class="row">
							<div class="col-md-12">
								 <form class="form" role="form" method="post" action="{{ url('/login') }}" accept-charset="UTF-8" id="login-nav">
										 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group dp">
											 <label class="col-lg-4" for="exampleInputEmail2">Email</label>
                                             <div class="col-lg-8">
											 <input type="email" name="email" class="form-control " id="exampleInputEmail2" placeholder="" required>
										</div>
                                        </div>
                                        
										<div class="form-group dp">
											 <label class="col-lg-4" for="exampleInputPassword2">Password</label>
                                             <div class="col-lg-8">
											 <input type="password" name="password" class="form-control " id="exampleInputPassword2" placeholder="" required>
                                            </div>
										</div>
                                        
										<div class="form-group clearfix">
                                       <a href="{{url('/password/reset')}}"> <h6 class="col-lg-8 clr">Forget Password?</h6></a>
                                        <div class="col-lg-4">
											 <button type="submit" class="bnt btn-default btn-block">LOGIN</button>
                                             </div>
										</div>
										
								 </form>
							</div>
					 </div>
			</ul>
        </span>
        <span>
              <a class="iph2" href="{{ url('/register') }}">REGISTER</a>
              </span>
              </div>
        </li>
          
    </ul>
  </div>
</nav>
    
                    </div><!--Nav Outer End-->
                    
                    <!-- Hidden Nav Toggler -->
                    <div class="nav-toggler">
                    <button class="hidden-bar-opener"><span class="icon fa fa-bars"></span></button>
                    </div><!-- / Hidden Nav Toggler -->
                    
            	</div>    
            </div>
        </div>
        <div class="header-top">
            <div class="auto-container">
                <div class="clearfix">

                    <!--Top Left-->
                   

                    <!--Top Right-->
                    
                </div>

            </div>
        </div>
    
    </header>
    <!--End Main Header -->
    
    
    <!-- Hidden Navigation Bar -->
    <section class="hidden-bar right-align">
        
        <div class="hidden-bar-closer">
            <button class="btn"><i class="fa fa-close"></i></button>
        </div>
        
        <!-- Hidden Bar Wrapper -->
        <div class="hidden-bar-wrapper">
        
            <!-- .logo -->
            <div class="logo text-center">
                <a href="index-1.htm"><img src="images\logo-2.png" alt=""></a>			
            </div><!-- /.logo -->
            
            <!-- .Side-menu -->
            <div class="side-menu">
            <!-- .navigation -->
                <ul class="navigation">
                    <li class="current dropdown"><a href="#">Home</a>
                        <ul>
                            <li><a href="index-1.htm">Homepage One</a></li>
                            <li><a href="index-2.htm">Homepage Two</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#">About Us</a>
                        <ul>
                            <li><a href="about-us.htm">About Us</a></li>
                            <li><a href="our-team.htm">Our Team</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#">Causes</a>
                        <ul>
                            <li><a href="causes.htm">Our Causes</a></li>
                            <li><a href="single-cause.htm">Single Cause</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#">Events</a>
                        <ul>
                            <li><a href="events.htm">Our Events</a></li>
                            <li><a href="single-event.htm">Event Details</a></li>
                        </ul>
                    </li>
                    <li><a href="Donate.htm">Donate.htm</a></li>
                        
                    <li><a href="gallery.htm">Gallery</a></li>
                    <li class="dropdown"><a href="#">Shop</a>
                        <ul>
                            <li><a href="shop.htm">Our Shop</a></li>
                            <li><a href="shop-single.htm">Shop Single</a></li>
                            <li><a href="shopping-cart.htm">Shopping Cart</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#">Blog</a>
                        <ul>
                            <li><a href="blog.htm">Our Blog</a></li>
                            <li><a href="blog-single.htm">Blog Single</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.htm">Contact</a></li>
                </ul>
            </div><!-- /.Side-menu -->
        
            <div class="social-icons">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        
        </div><!-- / Hidden Bar Wrapper -->
    </section>
    <!-- / Hidden Bar -->

    <section class="page-title" style="background-image:url(images/background/bg-page-title-1.jpg);">
            <div class="auto-container">
                <h1>About Us</h1>
                <div class="bread-crumb-outer">
                    <ul class="bread-crumb clearfix">
                        <li><a href="#">Home</a></li>
                        <li class="active">About Us</li>
                    </ul>
                </div>
                <h2 class="text-white">“to the dawn - to end violence” </h2>
            </div>
        </section>
    <!--Who We Are-->
    <div class="main-container">
      <section class="what-we-think">
            <div class="auto-container">
                <div class="row clearfix">
                     <!--Section Title-->
                <div class="sec-title centered">
                    <h2>WHO WE ARE</h2>
                    <div class="separator"></div>
                    <div class="desc-text">Streetlights collaborates with Like-minded organizations and individuals to influence change, In order to combat the problem of violence, we involve ourselves with advocacy initiatives on this issue. We Support member NGO’s, who are champion fighters against violence through our funding Platform. Streetlights fights violence through partnership. We aim to be the catalyst for change by uniting organizations working towards addressing violence.</div>
                </div>
                </div>
                  <div class="row clearfix">
                    <!--Default Icon Column-->
                    <div class="default-icon-column col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="icon-box"><span class="flaticon-binoculars"></span></div>
                            <h3>Our Vision</h3>
                            <div class="separator"></div>
                            <div class="text">To brand violence as unacceptable and educate enough to make it stoppable </div>
                        </div>
                    </div>
                    <!--Default Icon Column-->
                    <div class="default-icon-column col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="icon-box"><span class="flaticon-target"></span></div>
                            <h3>Our Mission</h3>
                            <div class="separator"></div>
                            <div class="text">To be a thought leader in addressing the need to end violence by equipping and educating children and their influencers by influencing educational curriculum and awareness initiatives to the public that leads to a paradigm shift in one’s approach to violence. </div>
                        </div>
                    </div>
                    <!--Default Icon Column-->
                    <div class="default-icon-column col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="icon-box"><span class="flaticon-envelope"></span></div>
                            <h3>Our Message</h3>
                            <div class="separator"></div>
                            <div class="text">“to the dawn - to end violence” </div>
                        </div>
                    </div>
                </div>
        </div>
            </div>

        </section>


<section class="about-us-section">
            <div class="auto-container">
 <!--Content Column-->
 
                    <div class="content-column">
                        <div class="inner-box">
                            <h3>WHAT WE THINK ABOUT OUR CHARITY</h3>
                           <div class="clearfix sidebar">
                               <ul class="list">
                                <li><a href="#">When the oppressed is afraid of the oppressor.</a></li>
                                <li><a href="#">Where One’s dignity has been stripped away by the actions, words or deeds of another.</a></li>
                                <li><a href="#">When you fear that your oppressor is more powerful than the public justice system.</a></li>
                            </ul>
                            </div>
                        </div>
                    </div>
                

            </div>
        </section>
        <section class="what-we-think">
            <div class="auto-container">
                <div class="row clearfix content-column">
                   <!--Section Title-->
                <div class="sec-title centered ">
                    <h2>What do we mean when we say Violence?</h2>
                    <div class="separator"></div>
                    
                </div>
                <div class="inner-box">
                            <div class="clearfix">
                                <!--Box-->
                                <div class="col-lg-4">
                                <div class="feature-box"><div class="count">Step 1</div>Identifying NGO’s that fights against violence </div>
                                </div>
                                <!--Box-->
                                 <div class="col-lg-4">
                                <div class="feature-box"><div class="count">Step 2</div>The credentials of the NGO’s are duly/ personally verified by the     
                                        Streetlights Team.
                                        </div>
</div>
                                <!--Box-->
                                 <div class="col-lg-4">
                                <div class="feature-box"><div class="count">Step 3</div>Partnering withthe  profiled and vetted non-profits through  the website so you can know what cause you will be supporting and who your beneficiaries are. </div>
                            </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>
        <section class="about-us-section">
            <div class="auto-container">

                <!--Section Title-->
                <div class="sec-title centered">
                    <h2>EDUCATION MODEL</h2>
                    <div class="separator"></div>
                    <div class="desc-text">It is important to influence children at a very young age when they are most impressionable, against violent behaviour- from / towards the. Streetlights understand that all efforts have to be focused on educating children by creating a curriculum that speaks directly on this issue. </div>
                </div>
                <!--Content Box-->
                <div class="content-box">
                    <div class="row clearfix">
                        <!--Content Column-->
                        <div class="content-column">
                            <div class="inner-box">
                                <div class="text-content">
                                    <h4>OUR TWO-FOLD GOAL: </h4>
                                    <p class="strong-text">1. In partnership with legal professionals, develop an informative curriculum for children about the protections afforded to them by our public justice system and educate them about their legal rights, preparing them to raise their voices against violence.</p>
                                    <p class="strong-text">2. To partner with psychologists, educationalists, etc. to reach young minds at the age of transductive reasoning, to encourage them to choose love and friendship over violent confrontations. With storytelling, theatre and arts, we can initiate a conversation against violence with transformative results.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="what-we-think">
            <div class="auto-container">
                <div class="row clearfix content-column">
                   <!--Section Title-->
                <!--Section Title-->
                <div class="sec-title centered">
                    <h2>How Can You Help?</h2>
                    <div class="separator"></div>
                </div>
                <div class="inner-box">
<div class="text-content">
    <p>Dear partner/ supporter/donor, </p>
                                 
                                    <p>We are happy to know that you share our passion in making this world a better place for especially those who are vulnerable to violence on a daily basis.</p>
                                    <p>You can help Streetlights in this fight against violence and influence change in the lives of the vulnerable set by</p>
                                    <ul>
                                        <li>•	lending a voice in our advocacy efforts from your position of privilege, which will give credibility to the fight against violence</li>
                                        <li>•	Giving your time to volunteer toward corporate events and initiatives</li>
                                        <li>•	Giving financial support to member organisations and us. </li>
                                        </ul>
                                        <p>Streetlights has taken its first steps in these operations and you can join with us in our journey, by contributing to our initiative</p>
                                        <p>- Introducing NGOs to the movement</p>
                                        <p>- Setting up the donation Platform.</p>
                                        <p>- Creating a team of professionals for building a curriculum for children.</p>
                                        <p>We hope for and thank you in advance for your support and joining us in this fight to End Violence.</p>
                                        <p class="text-right">Thank you for partnering with us in this fight against Injustice.</p>
                                        <p class="text-center strong-text">Violence is NOT OKAY and we can END it TOGETHER</p>
                                </div>
                        </div>
                </div>
            </div>
        </section>
    
    <!--Main Footer-->
    <footer class="main-footer">
    	<div class="auto-container">
        
            <!--Widgets Section-->
            <div class="widgets-section">
            	<div class="row clearfix">
                	<!--Big Column-->
                	<div class="big-column col-md-6 col-sm-12 col-xs-12">
                    	<div class="row clearfix">
                            
                            <!--Footer Column-->
                        	<div class="footer-column col-md-6 col-sm-6 col-xs-12">
                            	<div class="footer-widget about-widget">
                                	<div class="footer-logo"><figure><a href="index-1.htm"><img src="images\fu1.jpg" alt=""></a></figure></div>
                                    <div class="widget-content">
                                    	<div class="text">
                                        	<p>Capitalise on low hanging fruit to identify a ballpark value added activity to beta test. Override lickthroughs from DevOps.</p>
                                            <a href="#" class="more-link">Read More <span class="fa fa-angle-double-right"></span></a>
                                        </div>
                                        
                                        <div class="social-links">
                                        	<a href="#"><span class="fa fa-facebook-f"></span></a>
                                            <a href="auth/twitter"><span class="fa fa-twitter"></span></a>
                                            <a href="#"><span class="fa fa-linkedin"></span></a>
                                            <a href="#"><span class="fa fa-google-plus"></span></a>
                                            <a href="#"><span class="fa fa-skype"></span></a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <!--Footer Column-->
                        	<div class="footer-column col-md-6 col-sm-6 col-xs-12">
                            	<div class="footer-widget links-widget">
                                	<h2>Our Projects</h2>
                                    <div class="widget-content">
                                        <ul class="list">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Donate</a></li>
                                            <li><a href="#">About us</a></li>
                                            <li><a href="#">Payroll giving</a></li>
                                            <li><a href="#">Contact us</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    
                    <!--Big Column-->
                	<div class="big-column col-md-6 col-sm-12 col-xs-12">
                    	<div class="row clearfix">
                            
                            <!--Footer Column-->
                        	<div class="footer-column col-md-6 col-sm-6 col-xs-12">
                            	<div class="footer-widget posts-widget">
                                	<h2>Latest News</h2>
                                    <div class="widget-content">
                                    	<div class="posts">
                                            <div class="post">
                                                <figure class="post-thumb"><img src="images\resource\post-thumb-1.jpg" alt=""><a href="#" class="overlay-link"><span class="fa fa-link"></span></a></figure>
                                                <div class="desc-text"><a href="#">Education for all childrens</a></div>
                                                <div class="time">May 25, 2016</div>
                                            </div>
                                            <div class="post">
                                                <figure class="post-thumb"><img src="images\resource\post-thumb-2.jpg" alt=""><a href="#" class="overlay-link"><span class="fa fa-link"></span></a></figure>
                                                <div class="desc-text"><a href="#">Homes for homeless peoples</a></div>
                                                <div class="time">May 25, 2016</div>
                                            </div>
                                            <div class="post">
                                                <figure class="post-thumb"><img src="images\resource\post-thumb-3.jpg" alt=""><a href="#" class="overlay-link"><span class="fa fa-link"></span></a></figure>
                                                <div class="desc-text"><a href="#">Foods for childrens</a></div>
                                                <div class="time">May 25, 2016</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--Footer Column-->
                        	<div class="footer-column col-md-6 col-sm-6 col-xs-12">
                            	<div class="footer-widget contact-widget">
                                	<h2>Contact Us</h2>
                                    <div class="widget-content">
                                    	<ul class="contact-info">
                                            <li>272-A, Ground Floor, Dr.Selvi Jayakumar Street, Golden George Nagar, Nerkundram, Chennai-600 107.</li>
                                            <li> 8680 919 313</li>
                                        	<li>info@streetlightsindia.org </li>
                                        </ul>
                                        
                                    	
                                       
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    
                 </div>
             </div>
        
        </div>
        
        <!--Footer Bottom-->
         <div class="footer-bottom">
         	<div class="auto-container">
            	<div class="copyright-text">Copyright &copy; 2017. All Rights Reserved Street Light</div>
            </div>
        </div>
    </footer>
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-long-arrow-up"></span></div>

<script src="js\frontend\jquery.js"></script> 
<script src="js\frontend\bootstrap.min.js"></script>
<script src="js\frontend\jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js\frontend\revolution.min.js"></script>
<script src="js\frontend\jquery.fancybox.pack.js"></script>
<script src="js\frontend\jquery.fancybox-media.js"></script>
<script src="js\frontend\isotope.js"></script>
<script src="js\frontend\owl.js"></script>
<script src="js\frontend\wow.js"></script>
<script src="js\frontend\appear.js"></script>
<script src="js\frontend\script.js"></script>
</body>
</html>