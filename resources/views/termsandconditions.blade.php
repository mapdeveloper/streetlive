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
                <h1>Terms &amp; Conditions</h1>
                <div class="bread-crumb-outer">
                    <ul class="bread-crumb clearfix">
                        <li><a href="#">Home</a></li>
                        <li class="active">Terms &amp; Conditions</li>
                    </ul>
                </div>
            </div>
        </section>
    <!--Who We Are-->
    <div class="main-container">
        <section class="what-we-think">
            <div class="auto-container">
                <div class="row clearfix content-column">
                   <!--Section Title-->
                <!--Section Title-->
                <div class="sec-title centered">
                    <h2>Terms of Use</h2>
                    <div class="separator"></div>
                </div>
                <div class="inner-box">
<div class="text-content">
    <p>Use of this site is provided by Namma Streetlights Foundation (henceforth referred to as Streetlights) subject to the following of the Terms and Conditions/ Terms of Use as given below.</p>
    <div class="terms-condition">
    <p>1.	Use of this site is provided by Streetlights Foundation subject to the following Terms and Conditions.</p>
    <p>2.	Your use and access of the website constitutes acceptance of these Terms and Conditions as at the date of your first use of the website.</p>
    <p>3.	You agree to use the website only for lawful purposes, and in a matter which does not infringe the rights, or restrict, or inhabit the use and enjoyment of the website by any third party.</p>
    <p>4.	Streetlights reserves the rights to change these Terms and Conditions at any time by posting changes online. Your continued use of the website after changes are posted constitutes your acceptance of the new Terms and Conditions as modified automatically. You should therefore review these Terms and Conditions regularly.</p>
    <p>5.	Streetlights takes no responsibility for the content of external internet websites. Following links to any other websites or pages shall be at your own risk and Streetlights shall not be responsible or liable, directly or indirectly, for any damages resulting from the use of such other websites.</p>
    <p>6.	All intellectual property in the website and the material or information it contains (including without limitation copyright, designs, database rights and trade marks (registered or unregistered) are and shall remain the property of Streetlights or its third party licensors.
        <br>Commercial use or publication of all or any item displayed on the site without authorization from Streetlights is strictly prohibited. Nothing contained in these Terms and Conditions shall be construed as conferring any licence by Streetlights to use any item displayed.<br>Materials in the website may be copied for personal use only on the condition that all copyright notices and source indications are also reproduced, no modifications are made and each relevant item is copied in its entirety. Some materials that have been outsourced have been published on the website with all the necessary permissions from the relevant copyright owners (who are not part of Streetlights). All rights are reserved on these materials and permission to copy them must be requested from the individual copyright owners (as indicated within these materials).
    </p>
    <p>7.	Any communication or material that you transmit to, or post on, any public area of the website including any data, questions, comments, suggestions, or the like, is, and will be treated as, non-confidential and non-proprietary information. Streetlights reserves the right to remove any such communication or material from the website at its own discretion.</p>
    <p>8.	If there is any conflict between these Terms and Conditions and rules and/or specific terms of use appearing on the Website relating to specific material then the latter shall prevail.</p>
    <p>9.	These Terms and Conditions shall be governed and construed in accordance with the laws of India. Any disputes shall be subject to the non-exclusive jurisdiction of the Indian Courts.</p>
    <p>10.	If these Terms and Conditions are not accepted in full, the use of the website must be terminated immediately.</p>
    <p>11.	Visitors acknowledge that visiting this site is an implicit acceptance of these 'Terms and Conditions' on their part. Also, accepting 'Terms and Conditions' means an implicit acceptance of our Disclaimer and Privacy Policy.
</p>
    <p>12.	<b>PLEASE READ THIS AGREEMENT CAREFULLY.</b> By submitting your application and by your use of the Service, you agree to comply with all of the terms and conditions set out in this Agreement. Streetlights may terminate your account at any time, with or without notice, for conduct that is in breach of this Agreement, for conduct that Streetlights believes is harmful to its business, or for conduct where the use of the Service is harmful to any other party.</p>
    <p>13.	Streetlights may, in its sole discretion, change or modify this Agreement at any time, with or without notice. Such changes or modifications shall be made effective for all Subscribers upon posting of the modified Agreement to this web address (URL): <a href="http://www.streetlights/terms-and-conditions/">http://www.streetlights/terms-and-conditions/</a>. You are responsible to read this document from time to time to ensure that your use of the Service remains in compliance with this Agreement.</p>
    <p>14.	The Streetlights Privacy Policy sets out our obligations with respect to the safeguarding, collection and use of Subscribers' personal information. The Streetlights Privacy Policy is subject to modification from time to time, and such changes are effective upon posting of the modified policy to this URL: <a href="http://www.streetlights/privacy-policy/">http://www.streetlights/privacy-policy/</a></p>
    <p>15.	Email newsletters will only be sent directly by Streetlights. Subscriber information will not be disclosed or sold to any third parties.</p>
    <p>16.	Streetlights reserves the right and sole discretion to:</p>
    <ul>
        <li>i.	Terminate any account for providing fraudulent account information or fraudulent payment information.</li>
        <li>ii.	Suspend the Service at any time for any duration of time when necessary, without penalty or liability to ourselves.</li>
        </ul>
    <p>17.	You agree that it may be necessary for us to temporarily suspend the Service for technical reasons or to maintain network equipment or facilities.</p>
    <p>18.	You agree to indemnify and hold Streetlights, its affiliates, sponsors, partners, directors, officers and employees harmless from and against, and to reimburse Streetlights with respect to, any and all losses, damages, liabilities, claims, judgments, settlements, fines, costs and expenses (including reasonable related expenses, legal fees, costs of investigation) arising out of or relating to your breach of this Agreement or use by you or any third party of the Services.</p>
    <p>19.	Streetlights will not be liable for any delay, interruption or failure in the provisioning of services if caused by acts of God, declared or undeclared war, fire, flood, storm, slide, earthquake, power failure, the inability to obtain equipment, supplies or other facilities that are not caused by a failure to pay, labor disputes, or other similar events beyond our control that may prevent or delay service provisioning.</p>
    <p>20.	If any part of this Agreement is found to be invalid or unenforceable under applicable law, such part will be ineffective to the extent of such invalid or unenforceable part only, without affecting the remaining parts of this Agreement in any way.</p>
    <p>21.	The rights and obligations of the parties pursuant to this Agreement are governed by, and shall be construed in accordance with, the laws of Government of India.</p>
    <p>22.	Streetlights does not accept agreements and payments from persons under the legal age of 18 years. By submitting your account application, you confirm that you are over 18 years of age or your parent or legal guardian has agreed to accept this Agreement on your behalf.</p>
    <p>23.	This Agreement, as may be updated from time to time and posted at <a href="http://www.streetlightsindia /terms-and-conditions/">http://www.streetlightsindia /terms-and-conditions/</a>, represents the complete agreement and understanding between us with respect to the Service and supersedes any other written or oral agreement.</p>
    </div>
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