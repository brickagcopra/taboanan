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
    <?php if(in_array('dashboard',$avilable)): ?>
    <div id="right-panel" class="right-panel">
       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <div class="col-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-user bg-flat-color-5 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Customers</div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_customers); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/customer')); ?>">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
   <div class="col-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-user bg-info p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Vendors</div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_vendors); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/vendor')); ?>">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-user bg-warning p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Sub Administrator</div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($sub_admin); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/administrator')); ?>">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-location-arrow bg-danger p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Products</div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_products); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/products')); ?>">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-location-arrow bg-flat-color-4 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Category</div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_category); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/category')); ?>">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="col-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-shopping-cart bg-flat-color-3 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Total Orders</div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($total_orders); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/orders')); ?>">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
   <div class="col-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-location-arrow bg-flat-color-2 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Waiting Refund Request</div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($refund_request); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/refund')); ?>">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <i class="fa fa-money bg-flat-color-1 p-3 font-2xl mr-3 float-left text-light"></i>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Pending Withdrawal</div>
                    <div class="h5 text-secondary mb-0 mt-1"><?php echo e($withdrawal_request); ?></div>
                </div>
                <div class="b-b-1 pt-3"></div>
                <hr>
                <div class="more-info pt-2" style="margin-bottom:-10px;">
                    <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo e(url('/admin/withdrawal')); ?>">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
            <div class="col-sm-8 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Order Sales </h4>
                                <canvas id="team-chart"></canvas>
                            </div>
                        </div>
                    </div>   
          <div class="col-sm-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Products </h4>
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div><!-- /# card -->
                    </div>
        </div>
       <!-- .content -->
    </div><!-- /#right-panel -->
    <?php else: ?>
    <?php echo $__env->make('admin.denied', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Right Panel -->
    <?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script type="text/javascript">
	$(document).ready(function () {
    "use strict";
     var ctx = document.getElementById( "team-chart" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "<?php echo e($sixth_day); ?>", "<?php echo e($fifth_day); ?>", "<?php echo e($fourth_day); ?>", "<?php echo e($third_day); ?>", "<?php echo e($second_day); ?>", "<?php echo e($first_day); ?>", "<?php echo e($today); ?>" ],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                data: [ <?php echo e($view7); ?> , <?php echo e($view6); ?>, <?php echo e($view5); ?>, <?php echo e($view4); ?> , <?php echo e($view3); ?> , <?php echo e($view2); ?> , <?php echo e($view1); ?> ],
                label: "sale",
                backgroundColor: 'rgba(0,103,255,.15)',
                borderColor: 'rgba(0,103,255,0.5)',
                borderWidth: 3.5,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(0,103,255,0.5)',
                    }, ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },


            },
            scales: {
                xAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                        } ],
                yAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Sales'
                    }
                        } ]
            },
            title: {
                display: false,
            }
        }
    } );
    var ctx = document.getElementById( "pieChart" );
    ctx.height = 300;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ <?php echo e($approved); ?>, <?php echo e($unapproved); ?> ],
                backgroundColor: [
                                    "rgba(6, 163, 61, 1)",
                                    "rgba(226, 27, 26, 1)"
                                    
                                    
                                ],
                hoverBackgroundColor: [
                                    "rgba(6, 163, 61, 0.7)",
                                    "rgba(226, 27, 26, 0.7)"
                                    
                                    
                                ]

                            } ],
            labels: [
                            "Approved",
                            "Unapproved"
                            
                        ]
        },
        options: {
            responsive: true
        }
    } );
    

});
</script>
</body>
</html><?php /**PATH C:\xampp\htdocs\brick2\resources\views/admin/index.blade.php ENDPATH**/ ?>