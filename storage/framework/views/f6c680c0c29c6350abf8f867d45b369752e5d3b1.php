<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <?php if(! Auth::guest()): ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="img/admin@dev.com.png" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?php echo e(Auth::user()->name); ?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(trans('message.online')); ?></a>
                </div>
            </div>
        <?php endif; ?>

        <!-- search form (Optional) -->
        
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"><?php echo e(trans('message.header')); ?></li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="<?php echo e(url('home')); ?>" style="text-decoration:none"><i class='fa fa-dashboard'></i> <span><?php echo e(trans('message.dashboard')); ?></span></a></li>
            <li class="treeview">
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
            </li>
            <li><a href="#" style="text-decoration:none"><i class='fa fa-cart-plus'></i> <span>Order Booking</span></a></li>
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
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
