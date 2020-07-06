<?php if($allsettings->maintenance_mode == 0): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php if($allsettings->site_blog_display == 1): ?> <?php echo e($slug); ?> <?php else: ?> <?php echo e(Helper::translation(1912,$translate)); ?> <?php endif; ?> - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($allsettings->site_blog_display == 1): ?>
    <section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
      <div class="container text-left">
        <h2 class="mb-0"><?php echo e(Helper::translation(1978,$translate)); ?></h2>
        <p class="mb-0"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(1913,$translate)); ?></a> <span class="split">&gt;</span> <span><?php echo e(Helper::translation(1978,$translate)); ?></span><?php if($slug != 'Blog'): ?> <span class="split">&gt;</span> <span><?php echo e($slug); ?></span><?php endif; ?></p>
      </div>
    </section>
<main role="main">
      <div class="container mt-3">
         <div class="row mb-5 pb-5">
          <div class="col-md-9">
          <!-- Blog Post -->
          <?php $__currentLoopData = $blogData['post']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="card mb-5 shadow-sm white-box border-0 rounded-0 blog-post-loop li-item">
            <a href="<?php echo e(URL::to('/single')); ?>/<?php echo e($post->post_slug); ?>" title="<?php echo e($post->post_title); ?>">
            <?php if($post->post_image!=''): ?>
            <img src="<?php echo e(url('/')); ?>/public/storage/post/<?php echo e($post->post_image); ?>" alt="<?php echo e($post->post_title); ?>" class="card-img-top blog-img-lg rounded-0">
            <?php else: ?>
            <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($post->post_title); ?>" class="card-img-top rounded-0 blog-img-lg">
            <?php endif; ?>
            </a>
            <?php
            $date = date('d', strtotime($post->post_date));
            $month = date('M', strtotime($post->post_date));
            $year = date('Y', strtotime($post->post_date));
            ?>
            <div class="post-date"> <span class="post-date-day"><i class="fa fa-calendar"></i> <?php echo e($date); ?> <?php echo e($month); ?> <?php echo e($year); ?></span></div>
            <div class="card-body">
              <h3 class="card-title"><a href="<?php echo e(URL::to('/single')); ?>/<?php echo e($post->post_slug); ?>" class="link-color"><?php echo e($post->post_title); ?></a></h3>
              <div class="blog-meta">
                  <div class="blog-icon-view">
                        <p><a href="<?php echo e(URL::to('/blog')); ?>/category/<?php echo e($post->blog_cat_id); ?>/<?php echo e($post->blog_category_slug); ?>">
                        <i class="fa fa-list-alt"></i> <?php echo e($post->blog_category_name); ?>

                        </a></p>
                        <p class="comment"><i class="fa fa-comments"></i> <?php echo e($comments->has($post->post_id) ? count($comments[$post->post_id]) : 0); ?></p>
                        <p class="view"><i class="fa fa-eye"></i> <?php echo e($post->post_view); ?></p>
                  </div>
              </div>
              <p class="card-text"><?php echo e(substr($post->post_short_desc,0,300).'...'); ?></p>
              <a href="<?php echo e(URL::to('/single')); ?>/<?php echo e($post->post_slug); ?>" class="btn button-color"><?php echo e(Helper::translation(1979,$translate)); ?></a>
            </div>
          </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <div class="text-right">
            <div class="turn-page" id="post-pager"></div>
         </div>
       </div>
        <!-- Sidebar Widgets Column -->
      <div class="col-md-3">
        <!-- Search Widget -->
         <!-- Categories Widget -->
          <div class="card shadow-sm bg-white border-0 mb-5 rounded-0 categorylist">
            <h5 class="card-header bg-white link-color"><?php echo e(Helper::translation(1932,$translate)); ?></h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <ul class="list-unstyled mb-0">
                    <?php $__currentLoopData = $catData['post']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li>
                      <a href="<?php echo e(URL::to('/blog')); ?>/category/<?php echo e($post->blog_cat_id); ?>/<?php echo e($post->blog_category_slug); ?>" class="ash-color">
                       <span class="fa fa-angle-right"></span> <?php echo e($post->blog_category_name); ?>

                       <span class="post-count">[<?php echo e($category_count->has($post->blog_cat_id) ? count($category_count[$post->blog_cat_id]) : 0); ?>]</span>
                      </a>
                     </li>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                  </ul>
                </div>
                
              </div>
            </div>
          </div>
         <!-- Side Widget -->
         <div class="card shadow-sm bg-white border-0 mb-5 rounded-0">
          <h5 class="card-header bg-white link-color"><?php echo e(Helper::translation(1980,$translate)); ?></h5>
              <div class="items-bordered-wrap">
                  <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                    <?php $__currentLoopData = $blogPost['latest']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <ul class="media-list">
                      <li class="media mb-4 mt-2 no-gutters">
                            <div class="col-md-5 full-width-image mr-2">
                            <a href="<?php echo e(URL::to('/single')); ?>/<?php echo e($post->post_slug); ?>" title="<?php echo e($post->post_title); ?>">
                            <?php if($post->post_image!=''): ?>
                            <img src="<?php echo e(url('/')); ?>/public/storage/post/<?php echo e($post->post_image); ?>" alt="<?php echo e($post->post_title); ?>" class="mx-auto d-block img-sm"></div>
                            <?php else: ?>
                            <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($post->post_title); ?>" class="img-sm">
                            <?php endif; ?>
                            <div class="col-md-7">
                                <a href="<?php echo e(URL::to('/single')); ?>/<?php echo e($post->post_slug); ?>" class="link-color fs15"><?php echo e($post->post_title); ?></a>
                                <div class="ash-color">
                                <small>
                                    <i class="fa fa-clock"></i> <?php echo e(date('d M Y', strtotime($post->post_date))); ?>

                                </small>
                                </div> 
                            </div>
                        </li>
                   </ul>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                   </div>
                   </div>
                   </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    </main>
    <?php else: ?>
    <?php echo $__env->make('not-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html>
<?php else: ?>
<?php echo $__env->make('503', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\brick2\resources\views/blog.blade.php ENDPATH**/ ?>