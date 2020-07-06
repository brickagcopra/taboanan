<header id="header" class="header">
    <div class="header-menu">
       <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="javascript:void();" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php if($admin->user_photo != ''): ?>
                        <img src="<?php echo e(url('/')); ?>/public/storage/users/<?php echo e($admin->user_photo); ?>"  class="user-avatar rounded-circle" alt="<?php echo e($admin->name); ?>"/><?php else: ?> <img src="<?php echo e(url('/')); ?>/public/img/no-user.png"  class="user-avatar rounded-circle" alt="<?php echo e($admin->name); ?>"/>  <?php endif; ?>
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?php echo e(url('/admin/edit-profile')); ?>"><i class="fa fa-user"></i> My Profile</a>
                            <?php if(in_array('settings',$avilable)): ?> 
                            <a class="nav-link" href="<?php echo e(url('/admin/general-settings')); ?>"><i class="fa fa-cog"></i> Settings</a>
                            <?php endif; ?>
                            <a class="nav-link" href="<?php echo e(url('/logout')); ?>"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                  </div>
               </div>
         </div>
</header>           <?php /**PATH C:\xampp\htdocs\brick2\resources\views/admin/header.blade.php ENDPATH**/ ?>