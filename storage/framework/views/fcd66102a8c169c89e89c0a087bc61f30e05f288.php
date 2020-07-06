<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
          <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <?php if($allsettings->site_logo != ''): ?>
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_logo); ?>"  alt="<?php echo e($allsettings->site_title); ?>" width="180"/></a>
                <?php else: ?>
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><?php echo e(substr($allsettings->site_title,0,10)); ?></a>
                <?php endif; ?>
                <?php if($allsettings->site_favicon != ''): ?>
                <a class="navbar-brand hidden" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_favicon); ?>"  alt="<?php echo e($allsettings->site_title); ?>" width="24"/></a>
                <?php else: ?>
                <a class="navbar-brand hidden" href="<?php echo e(url('/')); ?>"><?php echo e(substr($allsettings->site_title,0,1)); ?></a>
                <?php endif; ?>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                   <?php if(in_array('dashboard',$avilable)): ?>
                   <li>
                        <a href="<?php echo e(url('/admin')); ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('settings',$avilable)): ?>                 
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gears"></i>Settings</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/general-settings')); ?>">General Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/color-settings')); ?>">Color Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/email-settings')); ?>">Email Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/media-settings')); ?>">Media Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/currency-settings')); ?>">Currency Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/payment-settings')); ?>">Payment Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/social-settings')); ?>">Social Settings</a></li>
                            <li><i class="fa fa-gear"></i><a href="<?php echo e(url('/admin/preferred-settings')); ?>">Preferred Settings</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('block-section',$avilable)): ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-text-o"></i>Block Section</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/home-section')); ?>">Homepage Section</a></li>
                            <li><i class="fa fa-file-text-o"></i><a href="<?php echo e(url('/admin/footer-section')); ?>">Footer Section</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->id == 1): ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-group"></i>User Roles</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user"></i><a href="<?php echo e(url('/admin/administrator')); ?>">Sub Administrator</a></li>
                            <li><i class="fa fa-user"></i><a href="<?php echo e(url('/admin/customer')); ?>">Customers</a></li>
                            <li><i class="fa fa-user"></i><a href="<?php echo e(url('/admin/vendor')); ?>">Vendors</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('country',$avilable)): ?>                    
                    <li>
                        <a href="<?php echo e(url('/admin/country-settings')); ?>"> <i class="menu-icon fa fa-flag"></i>Country</a>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('manage-categories',$avilable)): ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-location-arrow"></i>Manage Categories</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/category')); ?>">Category</a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/sub-category')); ?>">Sub Category</a></li>
                         </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('products',$avilable)): ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Products</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-shopping-cart"></i><a href="<?php echo e(url('/admin/products')); ?>">Manage Products</a></li>
                            <li><i class="menu-icon fa fa-shopping-cart"></i><a href="<?php echo e(url('/admin/attribute-type')); ?>">Attribute Type</a></li>
                            <li><i class="menu-icon fa fa-shopping-cart"></i><a href="<?php echo e(url('/admin/attribute-value')); ?>">Attribute Value</a></li>
                            <li><i class="menu-icon fa fa-shopping-cart"></i><a href="<?php echo e(url('/admin/brands')); ?>">Brands</a></li>
                            <li><i class="menu-icon fa fa-shopping-cart"></i><a href="<?php echo e(url('/admin/orders')); ?>">Order Details</a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/refund')); ?>">Refund Request</a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/rating')); ?>">Rating & Reviews</a></li>
                            <li><i class="menu-icon fa fa-location-arrow"></i><a href="<?php echo e(url('/admin/withdrawal')); ?>">Withdrawal Request</a></li>
                         </ul>
                    </li>
                    <?php endif; ?>
                    <?php if($allsettings->site_blog_display == 1): ?>
                    <?php if(in_array('blog',$avilable)): ?> 
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-comments-o"></i>Blog</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-comments-o"></i><a href="<?php echo e(url('/admin/blog-category')); ?>">Category</a></li>
                            <li><i class="menu-icon fa fa-comments-o"></i><a href="<?php echo e(url('/admin/post')); ?>">Post</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if(in_array('events',$avilable)): ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-calendar"></i>Tabo/Bazaar</a>
                        <ul class="sub-menu children dropdown-menu">
                           
                            <li><i class="fa fa-calendar"></i><a href="<?php echo e(url('/admin/events')); ?>">View Tabo/Bazaar Events</a></li>
                            <li><i class="fa fa-calendar"></i><a href="<?php echo e(url('/admin/vendor-registration')); ?>">Vendor Registration</a></li>
                            <li><i class="fa fa-calendar"></i><a href="<?php echo e(url('/admin/sponsor-registration')); ?>">Sponsor Registration</a></li>
                         </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('pages',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/pages')); ?>"> <i class="menu-icon fa fa-file-text-o"></i>Pages </a>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('slideshow',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/slideshow')); ?>"> <i class="menu-icon fa fa-image"></i>Slideshow </a>
                    </li>
                    <?php endif; ?>
                    <?php if(in_array('contact',$avilable)): ?>                                      
                    <li>
                        <a href="<?php echo e(url('/admin/contact')); ?>"> <i class="menu-icon fa fa-address-book-o"></i>Contact </a>
                    </li>
                    <?php endif; ?>
                    <?php if($allsettings->site_newsletter_display == 1): ?>
                    <?php if(in_array('newsletter',$avilable)): ?>
                    <li>
                        <a href="<?php echo e(url('/admin/newsletter')); ?>"> <i class="menu-icon fa fa-newspaper-o"></i>Newsletter </a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if(in_array('languages',$avilable)): ?> 
                    <li>
                        <a href="<?php echo e(url('/admin/languages')); ?>"> <i class="menu-icon fa fa-language"></i>Languages </a>
                    </li>
                    <?php endif; ?>
                    </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><?php /**PATH C:\xampp\htdocs\brick2\resources\views/admin/navigation.blade.php ENDPATH**/ ?>