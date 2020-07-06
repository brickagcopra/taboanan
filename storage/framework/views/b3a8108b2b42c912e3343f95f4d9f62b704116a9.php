<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo e($single['event']->event_name); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
   <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
      <div class="container text-left">
        <h2 class="mb-0"><?php echo e($single['event']->event_name); ?></h2>
        <p class="mb-0"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a> <span class="split">&gt;</span> <a href="<?php echo e(URL::to('/events')); ?>"><?php echo e(Helper::translation(2905,$translate)); ?></a> <span class="split">&gt;</span> <span><?php echo e($single['event']->event_name); ?></span></p>
      </div>
    </section>
  <main role="main">
      <div class="container page-white-box mt-3 single-event">
      <div>
             <?php if($message = Session::get('success')): ?>
               <div class="alert alert-success" role="alert">
                  <span class="alert_icon lnr lnr-checkmark-circle"></span>
                   <?php echo e($message); ?>

                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span class="fa fa-close" aria-hidden="true"></span>
                   </button>
               </div>
            <?php endif; ?>
            <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger" role="alert">
                <span class="alert_icon lnr lnr-warning"></span>
                   <?php echo e($message); ?>

                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-close" aria-hidden="true"></span>
                   </button>
            </div>
            <?php endif; ?>
            <?php if(!$errors->isEmpty()): ?>
            <div class="alert alert-danger" role="alert">
            <span class="alert_icon lnr lnr-warning"></span>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($error); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-close" aria-hidden="true"></span>
            </button>
            </div>
            <?php endif; ?>
            </div>
         <div class="row">
                 <div class="col-md-9 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="card-title"><?php echo e($single['event']->event_name); ?></h2>
                 <div class="card mb-4">
           <?php if($single['event']->upload_image != ''): ?> <img src="<?php echo e(url('/')); ?>/public/storage/events/<?php echo e($single['event']->upload_image); ?>" alt="<?php echo e($single['event']->event_name); ?>" class="card-img-top event-bg" /><?php else: ?> <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($single['event']->event_name); ?>"  class="card-img-top event-bg"/>  <?php endif; ?>
           
            <div class="card-body">
                          <h4 class="h3"><?php echo e(Helper::translation(2907,$translate)); ?></h4>
             <div class="text-dark fs16 lh25">
             <?php echo html_entity_decode($single['event']->event_description); ?>

             </div>
                           
            </div>
           
            
            <div class="card-footer">
              <div class="bs-example">
                <h4 class="h3 event_title"><?php echo e(Helper::translation(2908,$translate)); ?></h4>
                <dl class="row lh0">
                    <dt class="col-sm-4"><?php echo e(Helper::translation(2909,$translate)); ?></dt>
                    <dd class="col-sm-8"><?php echo e($single['event']->event_theme); ?></dd>
                    <dt class="col-sm-4"><?php echo e(Helper::translation(2910,$translate)); ?></dt>
                    <dd class="col-sm-8"><?php echo e($single['event']->event_requirement); ?></dd>
                    <dt class="col-sm-4"><?php echo e(Helper::translation(2911,$translate)); ?></dt>
                    <dd class="col-sm-8"><?php echo e(date('D F Y', strtotime($single['event']->event_date))); ?></dd>
                    <dt class="col-sm-4"><?php echo e(Helper::translation(2912,$translate)); ?></dt>
                    <dd class="col-sm-8"><?php echo e($single['event']->event_location); ?></dd>
                </dl>
            </div>
            </div>
            
            <div class="card-footer bg-white">
              <div class="bs-example">
                <div align="left">
                <?php if(Auth::guest()): ?>
                <a href="javascript:void(0);" class="btn button-color" onClick="alert('Login user only');"> <?php echo e(Helper::translation(2913,$translate)); ?></a>
                <a href="javascript:void(0);" class="btn button-color" onClick="alert('Login user only');"> <?php echo e(Helper::translation(2914,$translate)); ?></a>
                <?php else: ?>
                <?php if(Auth::user()->user_type == 'vendor'): ?>
                <a href="javascript:void(0);" class="btn button-color" data-toggle="modal" data-target="#myModal-vendor"> <?php echo e(Helper::translation(2913,$translate)); ?></a>
                <?php else: ?>
                <a href="javascript:void(0);" class="btn button-color" onClick="alert('Vendor only allowed');"> <?php echo e(Helper::translation(2913,$translate)); ?></a>
                <?php endif; ?>
                <a href="javascript:void(0);" class="btn button-color" data-toggle="modal" data-target="#myModal-sponsor"> <?php echo e(Helper::translation(2914,$translate)); ?></a>
                <?php endif; ?>
                </div>
            </div>
            </div>
             
          </div>

           <div class="col-md-12 mb-4 mt-4">
           <h4 class="mb-4"><?php echo e(Helper::translation(2150,$translate)); ?></h4>
               <div class="social_icons mt-2">
                   <a class="share-button" data-share-url="<?php echo e(URL::to('/event')); ?>/<?php echo e($single['event']->event_slug); ?>" data-share-network="facebook" data-share-text="<?php echo e($single['event']->event_theme); ?>" data-share-title="<?php echo e($single['event']->event_name); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(url('/')); ?>/public/storage/events/<?php echo e($single['event']->upload_image); ?>" href="javascript:void(0)">
                                                       <img src="<?php echo e(url('/')); ?>/public/img/facebook.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="<?php echo e(URL::to('/event')); ?>/<?php echo e($single['event']->event_slug); ?>" data-share-network="twitter" data-share-text="<?php echo e($single['event']->event_theme); ?>" data-share-title="<?php echo e($single['event']->event_name); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(url('/')); ?>/public/storage/events/<?php echo e($single['event']->upload_image); ?>" href="javascript:void(0)">
                                                        <img src="<?php echo e(url('/')); ?>/public/img/twitter.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="<?php echo e(URL::to('/event')); ?>/<?php echo e($single['event']->event_slug); ?>" data-share-network="googleplus" data-share-text="<?php echo e($single['event']->event_theme); ?>" data-share-title="<?php echo e($single['event']->event_name); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(url('/')); ?>/public/storage/events/<?php echo e($single['event']->upload_image); ?>" href="javascript:void(0)">
                                                        <img src="<?php echo e(url('/')); ?>/public/img/gplus.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="<?php echo e(URL::to('/event')); ?>/<?php echo e($single['event']->event_slug); ?>" data-share-network="linkedin" data-share-text="<?php echo e($single['event']->event_theme); ?>" data-share-title="<?php echo e($single['event']->event_name); ?>" data-share-via="<?php echo e($allsettings->site_title); ?>" data-share-tags="" data-share-media="<?php echo e(url('/')); ?>/public/storage/events/<?php echo e($single['event']->upload_image); ?>" href="javascript:void(0)">
                                                        <img src="<?php echo e(url('/')); ?>/public/img/linked.png" width="40">
                                                    </a>
                 </div>       
          </div>
          

        </div>
        
        <?php if(Auth::check()): ?>
        <div class="modal fade" id="myModal-sponsor">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
            
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(Helper::translation(2914,$translate)); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">x</button>
                  </div>
            
                  <!-- Modal body -->
                  <div class="modal-body">
                    <form action="<?php echo e(route('sponsor-register')); ?>" id="sponsor_form" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                      <div class="form-group">
                        <label for="pwd"><?php echo e(Helper::translation(2916,$translate)); ?> <span>*</span></label>
                        <input type="text" class="form-control" id="company_name" name="company_name" data-bvalidator="required">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd"><?php echo e(Helper::translation(2917,$translate)); ?> <span>*</span></label>
                        <input type="text" class="form-control" id="nature_business" name="nature_business" data-bvalidator="required">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd"><?php echo e(Helper::translation(2918,$translate)); ?> <span>*</span></label>
                        <input type="text" class="form-control" id="company_goals" name="company_goals" data-bvalidator="required">
                      </div>
                      
                      
                      <div class="form-group">
                        <label for="pwd"><?php echo e(Helper::translation(2014,$translate)); ?> <span>*</span></label>
                        <input type="text" class="form-control" id="email_address" name="email_address" data-bvalidator="required,email">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd"><?php echo e(Helper::translation(2003,$translate)); ?> <span>*</span></label>
                        <textarea class="form-control" id="address_details" name="address_details" data-bvalidator="required"></textarea>
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd"><?php echo e(Helper::translation(2200,$translate)); ?> <span>*</span></label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" data-bvalidator="required">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd"><?php echo e(Helper::translation(2919,$translate)); ?></label>
                        <input type="file" class="form-control" id="image_file" name="image_file">
                      </div>
                      <?php if($single['event']->type_of_registration == 'paid' || $single['event']->sponsorship == 'yes'): ?>
                      <div class="form-group">
                        <label for="pwd"><?php echo e(Helper::translation(2920,$translate)); ?> <span>*</span></label>
                        <select class="form-control" id="payment_type" name="payment_type" data-bvalidator="required">
                        <option value=""></option>
                        <option value="paypal">Paypal</option>
                        <option value="stripe">Stripe</option>
                        </select>
                      </div>
                      <?php endif; ?>
                      <?php if($single['event']->sponsorship == 'yes'): ?>
                      <div class="form-group">
                        <label for="pwd"><?php echo e(Helper::translation(2921,$translate)); ?></label><br/>
                        <input type="radio"  id="package_amount" name="package_amount" value="<?php echo e($single['event']->package_amount_1.'-'.'package_A'); ?>" data-bvalidator="required"> Package A : <?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($single['event']->package_amount_1); ?> (<strong><?php echo e(Helper::translation(2922,$translate)); ?> :</strong> <?php echo e($single['event']->package_inclusion_1); ?>)<br/>
                        <input type="radio" id="package_amount" name="package_amount" value="<?php echo e($single['event']->package_amount_2.'-'.'package_B'); ?>" data-bvalidator="required"> Package B : <?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($single['event']->package_amount_2); ?> (<strong><?php echo e(Helper::translation(2922,$translate)); ?> :</strong> <?php echo e($single['event']->package_inclusion_2); ?>)<br/>
                        <input type="radio" id="package_amount" name="package_amount" value="<?php echo e($single['event']->package_amount_3.'-'.'package_C'); ?>" data-bvalidator="required"> Package C : <?php echo e($allsettings->site_currency_symbol); ?> <?php echo e($single['event']->package_amount_3); ?> (<strong><?php echo e(Helper::translation(2922,$translate)); ?> :</strong> <?php echo e($single['event']->package_inclusion_3); ?>)
                      </div>
                      <?php endif; ?>
                      <input type="hidden" name="event_id" value="<?php echo e($single['event']->event_id); ?>">
                      <input type="hidden" name="event_token" value="<?php echo e($single['event']->event_token); ?>">
                      <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>"> 
                      <input type="hidden" name="register_amount" value="<?php echo e($encrypter->encrypt($single['event']->registration_amount)); ?>">
                      <input type="hidden" name="registration_type" value="<?php echo e($single['event']->type_of_registration); ?>">
                      <input type="hidden" name="sponsor_type" value="<?php echo e($single['event']->sponsorship); ?>">
                      <input type="hidden" name="form_type" value="sponsor_registration">
                      <button type="submit" class="btn button-color"> <?php echo e(Helper::translation(2212,$translate)); ?></button>
                    </form>
                  </div>
            
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(Helper::translation(2923,$translate)); ?></button>
                  </div>
            
                </div>
              </div>
            </div>
        
        <div class="modal fade" id="myModal-vendor">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
            
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title"><?php echo e(Helper::translation(2913,$translate)); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">x</button>
                  </div>
            
                  <!-- Modal body -->
                  <div class="modal-body">
                    <form action="<?php echo e(route('vendor-register')); ?>" id="vendor_form" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                      <div class="form-group">
                        <label for="pwd"><?php echo e(Helper::translation(2916,$translate)); ?> <span>*</span></label>
                        <input type="text" class="form-control" id="company_name" name="company_name" data-bvalidator="required">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd"><?php echo e(Helper::translation(2917,$translate)); ?> <span>*</span></label>
                        <input type="text" class="form-control" id="nature_business" name="nature_business" data-bvalidator="required">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd"><?php echo e(Helper::translation(2918,$translate)); ?> <span>*</span></label>
                        <input type="text" class="form-control" id="company_goals" name="company_goals" data-bvalidator="required">
                      </div>
                      
                      
                      <div class="form-group">
                        <label for="pwd"><?php echo e(Helper::translation(2014,$translate)); ?> <span>*</span></label>
                        <input type="text" class="form-control" id="email_address" name="email_address" data-bvalidator="required,email">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd"><?php echo e(Helper::translation(2003,$translate)); ?> <span>*</span></label>
                        <textarea class="form-control" id="address_details" name="address_details" data-bvalidator="required"></textarea>
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd"><?php echo e(Helper::translation(2200,$translate)); ?> <span>*</span></label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" data-bvalidator="required">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd"><?php echo e(Helper::translation(2919,$translate)); ?></label>
                        <input type="file" class="form-control" id="image_file" name="image_file">
                      </div>
                      <?php if($single['event']->type_of_registration == 'paid'): ?> 
                      <div class="form-group">
                        <label for="pwd"><?php echo e(Helper::translation(2920,$translate)); ?> <span>*</span></label>
                        <select class="form-control" id="payment_type" name="payment_type" data-bvalidator="required">
                        <option value=""></option>
                        <option value="paypal">Paypal</option>
                        <option value="stripe">Stripe</option>
                        </select>
                      </div>
                      <?php else: ?>
                      <input type="hidden" name="payment_type" value="">
                      <?php endif; ?>
                      <input type="hidden" name="event_id" value="<?php echo e($single['event']->event_id); ?>">
                      <input type="hidden" name="event_token" value="<?php echo e($single['event']->event_token); ?>">
                      <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>"> 
                      <input type="hidden" name="register_amount" value="<?php echo e($encrypter->encrypt($single['event']->registration_amount)); ?>">
                      <input type="hidden" name="registration_type" value="<?php echo e($single['event']->type_of_registration); ?>">
                      <input type="hidden" name="sponsor_type" value="no">
                      <input type="hidden" name="form_type" value="vendor_registration">
                      <button type="submit" class="btn button-color"> <?php echo e(Helper::translation(2212,$translate)); ?></button>
                    </form>
                  </div>
            
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(Helper::translation(2923,$translate)); ?></button>
                  </div>
            
                </div>
              </div>
            </div>
            <?php endif; ?>
              
              <div class="col-lg-3 col-md-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                 <div class="mt-3 pt-3 pb-2 mb-2">
                   <div class="card w-100">
                <div class="card-header sidebar-header text-uppercase"><?php echo e(Helper::translation(2924,$translate)); ?></div>
                
                <ul class="media-list mt-3">
                       <?php $__currentLoopData = $recent['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="media mb-4 mt-2 no-gutters">
                            <div class="col-md-5 full-width-image">
                            <a href="<?php echo e(url('/event')); ?>/<?php echo e($recent->event_slug); ?>" class="captial" title="<?php echo e($recent->event_name); ?>">
                                <?php if($recent->upload_image != ''): ?> <img src="<?php echo e(url('/')); ?>/public/storage/events/<?php echo e($recent->upload_image); ?>" alt="<?php echo e($recent->event_name); ?>" class="img-circle mx-auto d-block recent-event"/><?php else: ?> <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($recent->event_name); ?>" class="img-circle mx-auto d-block recent-event"/>  <?php endif; ?></a>
                            </div>
                            <div class="col-md-7 mr-1">
                                <a href="<?php echo e(url('/event')); ?>/<?php echo e($recent->event_slug); ?>" class="link-color fs16"><?php echo e($recent->event_name); ?></a>
                                <div>
                                <small class="fs12">
                                    <?php echo e(date('d M Y', strtotime($recent->event_date))); ?>

                                </small>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </ul>
                </div>
                </div>
                 
              </div>
              </div>
      </div>
    </main>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 </body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\brick2\resources\views/event.blade.php ENDPATH**/ ?>