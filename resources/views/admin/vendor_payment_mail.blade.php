<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ __('New Payment Approved') }}</title>
</head>
<body class="preload dashboard-upload">
<div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="pull-left">
                                <div class="dashboard__title">
                                    <h2>{{ __('New Payment Approved') }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <p><strong>New payment approved to released by admin. Please check your earning balance on your account</strong></p>   
                        <p><strong> payment is : </strong> {{ $currency }}{{ $vendor_amount }} </p>   
                    </div>
                 </div>
             </div>
         </div>
     </section>
</body>
</html>