<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="img/admin@dev.com.png" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }} </p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('message.online') }}</a>
                </div>
            </div>
        @endif
        <!-- search form (Optional) -->
        {{-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> --}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}" style="text-decoration:none"><i class='fa fa-dashboard'></i> <span>{{ trans('message.dashboard') }}</span></a></li>
            
            <li class="treeview">
            @if (Auth::user()->role_id=='2')
				   <li><a href="{{ url('ngolist') }}" style="text-decoration:none"><i class='fa fa-cart-plus'></i> <span>NGO</span></a></li>
                   <li class="active"><a href="{{ url('donate') }}" style="text-decoration:none"><i class='fa fa-dashboard'></i> <span>{{ trans('donate.donate') }}</span></a></li>
				   <li><a href="{{url('/changepassword/'.Auth::user()->id)}}" style="text-decoration:none"><i class='fa fa-cart-plus'></i> <span>Change Password</span></a></li>
                   
				   {{-- <li><i class='fa fa-cart-plus'></i>{!! HTML::link(url('/changepassword/'.Auth::user()->id), Lang::get('Change Password')) !!}</li> --}}
				   
            @endif
            @if (Auth::user()->role_id=='3')
				   <li><a href="{{url('volunteerlist')}}" style="text-decoration:none"><i class='fa fa-cart-plus'></i> <span>Volunteer</span></a></li>
                   <li class="active"><a href="{{ url('donate') }}" style="text-decoration:none"><i class='fa fa-dashboard'></i> <span>{{ trans('donate.donate') }}</span></a></li>
				   <li><a href="{{url('/changepassword/'.Auth::user()->id)}}" style="text-decoration:none"><i class='fa fa-cart-plus'></i> <span>Change Password</span></a></li>
				   
            @endif
            @if (Auth::user()->role_id=='4')
				   <li><a href="{{ url('donorlist') }}" style="text-decoration:none"><i class='fa fa-cart-plus'></i> <span>Donor</span></a></li>
                   <li class="active"><a href="{{ url('donate') }}" style="text-decoration:none"><i class='fa fa-dashboard'></i> <span>{{ trans('donate.donate') }}</span></a></li>
				   <li><a href="{{url('/changepassword/'.Auth::user()->id)}}" style="text-decoration:none"><i class='fa fa-cart-plus'></i> <span>Change Password</span></a></li>
				   
            @endif
			 @if (Auth::user()->role_id=='1')
            <li><a href="{{ url('donors') }}" style="text-decoration:none"><i class='fa fa-cart-plus'></i> <span>Donor</span></a></li>
            <li><a href="{{ url('ngos') }}" style="text-decoration:none"><i class='fa fa-cart-plus'></i> <span>NGO</span></a></li>
            <li><a href="{{url('volunteers')}}" style="text-decoration:none"><i class='fa fa-cart-plus'></i> <span>Volunteer</span></a></li>            
            <li><a href="{{url('sliders')}}" style="text-decoration:none"><i class='fa fa-cart-plus'></i> <span>Sliders</span></a></li> 
            <li><a href="{{url('transactions')}}" style="text-decoration:none"><i class='fa fa-cart-plus'></i> <span>Transactions</span></a></li>            
			
            <!--<li class="treeview">
                <a href="#" style="text-decoration:none"><i class='fa fa-edit'></i> <span>Masters</span> <i class="fa fa-angle-left pull-right"></i></a>
                 <ul class="treeview-menu">
                    <li><a href="#" style="text-decoration:none">Customers</a></li>
                    <li><a href="#" style="text-decoration:none">Items</a></li>
                    <li><a href="#" style="text-decoration:none">Item Categories</a></li>
                    <li><a href="#" style="text-decoration:none">Routes</a></li>
                    <li><a href="#" style="text-decoration:none">Areas</a></li>
                    <li><a href="#" style="text-decoration:none">Cities</a></li>
                    <li><a href="#" style="text-decoration:none">States</a></li>
                    <li><a href="#" style="text-decoration:none">Countries</a></li>
                </ul>
            </li>-->
            <!--<li><a href="#" style="text-decoration:none"><i class='fa fa-cart-plus'></i> <span>Order Booking</span></a></li>
            <li><a href="#" style="text-decoration:none"><i class='fa fa-shopping-cart'></i> <span>Order Delivered</span></a></li>
            <li><a href="#" style="text-decoration:none"><i class='fa fa-arrows-alt'></i> <span>Rooute Planner</span></a></li>
            <li><a href="#" style="text-decoration:none"><i class='fa fa-money'></i> <span>Receipt</span></a></li>
            <li><a href="#" style="text-decoration:none"><i class='fa fa-print'></i> <span>Invoice Generate</span></a></li>
            <li class="treeview">
                <a href="#" style="text-decoration:none"><i class='fa fa-book'></i> <span>Reports</span> <i class="fa fa-angle-left pull-right"></i></a>
                 <ul class="treeview-menu">
                    <li class="treeview"><a href="#" style="text-decoration:none"><i class='fa fa-opencart'></i> <span>Order Details</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#" style="text-decoration:none">Customer Wise</a></li>
                            <li><a href="#" style="text-decoration:none">Area Wise</a></li>
                            <li><a href="#" style="text-decoration:none">Item Wise</a></li>
                            <li><a href="#" style="text-decoration:none">Item Category Wise</a></li>
                        </ul>
                    </li>    
                    <li class="treeview"><a href="#" style="text-decoration:none"><i class='fa fa-money'></i> <span>Outstanding</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#" style="text-decoration:none">Customer Wise</a></li>
                            <li><a href="#" style="text-decoration:none">Area Wise</a></li>
                            <li><a href="#" style="text-decoration:none">Item Wise</a></li>
                            <li><a href="#" style="text-decoration:none">Item Category Wise</a></li>
                        </ul>
                    </li>                    
                </ul>                
            </li>-->
			@endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
