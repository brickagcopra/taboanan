<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo e(Helper::translation(2905,$translate)); ?> - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
   <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
      <div class="container text-left">
        <h2 class="mb-0"><?php echo e(Helper::translation(2905,$translate)); ?></h2>
        <p class="mb-0"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a> <span class="split">&gt;</span> <span><?php echo e(Helper::translation(2905,$translate)); ?></span></p>
      </div>
    </section>
  <main role="main">
      <div class="container">
	<div class="row">
		<div class="col col-xs-12">
                        <div class="blog-grids">
                            <?php $__currentLoopData = $event['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="grid li-item">
                                <div class="entry-media">
                                    <a href="<?php echo e(url('/event')); ?>/<?php echo e($events->event_slug); ?>" title="<?php echo e($events->event_name); ?>">
                        <?php if($events->upload_image != ''): ?> <img src="<?php echo e(url('/')); ?>/public/storage/events/<?php echo e($events->upload_image); ?>" alt="<?php echo e($events->event_name); ?>" /><?php else: ?> <img src="<?php echo e(url('/')); ?>/public/img/no-image.jpg" alt="<?php echo e($events->event_name); ?>" />  <?php endif; ?>
                                    </a>
                                </div>
                                <div class="entry-body">
                                    <h3><a href="<?php echo e(url('/event')); ?>/<?php echo e($events->event_slug); ?>"><?php echo e($events->event_name); ?></a></h3>
                                    <p><?php echo e(Helper::translation(2906,$translate)); ?> : <?php echo e($events->event_location); ?></p>
                                    <div class="read-more-date">
                                        <a href="<?php echo e(url('/event')); ?>/<?php echo e($events->event_slug); ?>"><?php echo e(Helper::translation(2212,$translate)); ?></a>
                                        <span class="date"><?php echo e(date('d F Y', strtotime($events->event_date))); ?></span>
                                    </div>
                                </div>
                            </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                          </div>
                          <div class="row">
                              <div class="col-md-12" align="center">
                                  <div class="turn-page" id="post-pager"></div>
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
<?php /**PATH C:\xampp\htdocs\brick2\resources\views/events.blade.php ENDPATH**/ ?>