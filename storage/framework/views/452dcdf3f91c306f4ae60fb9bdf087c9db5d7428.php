<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    
    <?php echo $__env->make('admin.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    
    <?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Right Panel -->
    <?php if(in_array('events',$avilable)): ?>
    <div id="right-panel" class="right-panel">

        
                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Event</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
                </div>
            </div>
        </div>
        
        <?php if(session('success')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>


<?php if($errors->any()): ?>
    <div class="col-sm-12">
     <div class="alert  alert-danger alert-dismissible fade show" role="alert">
     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
         <?php echo e($error); ?>

      
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
     </div>
    </div>   
 <?php endif; ?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                       <?php if($demo_mode == 'on'): ?>
                           <?php echo $__env->make('admin.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                       <form action="<?php echo e(route('admin.edit-event')); ?>" method="post" id="setting_form" enctype="multipart/form-data">
                        
                        <?php echo e(csrf_field()); ?>

                        <?php endif; ?>
                        <div class="row bg-white">
                           
                           
                           
                           <div class="col-md-6">
                           
                            
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Name of the Meetup/Event <span class="require">*</span></label>
                                               <input id="event_name" name="event_name" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['view']->event_name); ?>">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Theme of the Meetup/Event <span class="require">*</span></label>
                                               <input id="event_theme" name="event_theme" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['view']->event_theme); ?>">
                                            </div>
                                            
                                             
                                                
                                            
                                                                                      
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Description <span class="require">*</span></label>
                                                <textarea name="event_description" id="summary-ckeditor" cols="30" rows="5" class="form-control" data-bvalidator="required"><?php echo e(html_entity_decode($edit['view']->event_description)); ?></textarea>
                                                
                                            </div>   
                                            
                                            
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Requirements/Things to bring <span class="require">*</span></label>
                                               <input id="event_requirement" name="event_requirement" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['view']->event_requirement); ?>">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Target Date for Meetup/Event <span class="require">*</span></label>
                                                
                                                <input id="event_date" name="event_date" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['view']->event_date); ?>">
                                            </div> 
                                                                                       
                                         
                                    
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6">
                             
                            
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                     <div class="form-group">
                                                <label for="name" class="control-label mb-1">Venue/Location of the Meetup/Event <span class="require">*</span></label>
                                               <input id="event_location" name="event_location" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['view']->event_location); ?>">
                                            </div>
                                            
                                           
                                     
                                            
                                     <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Type of Registration <span class="require">*</span></label>
                                                <select name="type_of_registration" id="type_of_registration" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="paid" <?php if($edit['view']->type_of_registration == 'paid'): ?> selected <?php endif; ?>>Paid</option>
                                                <option value="free" <?php if($edit['view']->type_of_registration == 'free'): ?> selected <?php endif; ?>>Free</option>
                                                </select>
                                                
                                            </div>
                                            
                                            <div id="reg_amount" <?php if($edit['view']->type_of_registration == 'paid'): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                                <label for="name" class="control-label mb-1">Registration Amount <span class="require">*</span></label>
                                               <input id="registration_amount" name="registration_amount" type="text" class="form-control" data-bvalidator="required,digit,min[1]" value="<?php echo e($edit['view']->registration_amount); ?>">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Sponsorship <span class="require">*</span></label>
                                                <select name="sponsorship" id="sponsorship" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="yes" <?php if($edit['view']->sponsorship == 'yes'): ?> selected <?php endif; ?>>Yes</option>
                                                <option value="no" <?php if($edit['view']->sponsorship == 'no'): ?> selected <?php endif; ?>>No</option>
                                                </select>
                                                
                                            </div>
                                            
                                            <div id="package_info" <?php if($edit['view']->sponsorship == 'yes'): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                            <h5>Package A</h5>
                                            <div class="form-group mt-2">
                                                <label for="name" class="control-label mb-1">Amount <span class="require">*</span></label>
                                               <input id="package_amount_1" name="package_amount_1" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['view']->package_amount_1); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Inclusions <span class="require">*</span></label>
                                               <input id="package_inclusion_1" name="package_inclusion_1" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['view']->package_inclusion_1); ?>">
                                            </div>
                                            <h5>Package B</h5>
                                            <div class="form-group mt-2">
                                                <label for="name" class="control-label mb-1">Amount <span class="require">*</span></label>
                                               <input id="package_amount_2" name="package_amount_2" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['view']->package_amount_2); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Inclusions <span class="require">*</span></label>
                                               <input id="package_inclusion_2" name="package_inclusion_2" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['view']->package_inclusion_2); ?>">
                                            </div>
                                            <h5>Package C</h5>
                                            <div class="form-group mt-2">
                                                <label for="name" class="control-label mb-1">Amount <span class="require">*</span></label>
                                               <input id="package_amount_3" name="package_amount_3" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['view']->package_amount_3); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Inclusions <span class="require">*</span></label>
                                               <input id="package_inclusion_3" name="package_inclusion_3" type="text" class="form-control" data-bvalidator="required" value="<?php echo e($edit['view']->package_inclusion_3); ?>">
                                            </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Upload Image File</label>
                                                <input type="file" id="upload_image" name="upload_image" class="form-control-file" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg">
                                                <?php if($edit['view']->upload_image !=''): ?>
                                                    <img src="<?php echo e(url('/')); ?>/public/storage/events/<?php echo e($edit['view']->upload_image); ?>" alt="<?php echo e($edit['view']->upload_image); ?>" class="image-size">
                                                    <?php else: ?>
                                                    <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($edit['view']->upload_image); ?>" class="image-size">
                                                    <?php endif; ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Status <span class="require">*</span></label>
                                                <select name="event_status" id="event_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($edit['view']->event_status == '1'): ?> selected <?php endif; ?>>Active</option>
                                                <option value="0" <?php if($edit['view']->event_status == '0'): ?> selected <?php endif; ?>>InActive</option>
                                                </select>
                                                
                                            </div> 
                                                    
                            <input type="hidden" name="image_size" value="<?php echo e($allsettings->site_max_image_size); ?>">
                            <input type="hidden" name="save_upload_image" value="<?php echo e($edit['view']->upload_image); ?>">
                            <input type="hidden" name="event_token" value="<?php echo e($edit['view']->event_token); ?>">
                             </div>
                             </div>
                             
                             </div>
                            
                            
                            <div class="card-footer col-md-12">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-ban"></i> Reset
                                                        </button>
                                                    </div>
                                                    
                                                    
                                                 
                            
                        </div> 

                    
                    </form> 
                    
                    </div>
                    

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
    <?php else: ?>
    <?php echo $__env->make('admin.denied', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Right Panel -->


   <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH C:\xampp\htdocs\brick2\resources\views/admin/edit-event.blade.php ENDPATH**/ ?>