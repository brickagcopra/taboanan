<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
@include('admin.stylesheet')
</head>
<body>
@include('admin.navigation')
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
@include('admin.header')
      <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>More Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/vendor-registration') }}" class="btn btn-success btn-sm"><i class="fa fa-chevron-left"></i> Back</a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @if (session('success'))
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            </div>
        @endif
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div @if($event->registration_type == 'paid') class="col-md-6" @else class="col-md-12" @endif>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title" v-if="headerText">More Details</strong>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-striped table-align-middle mb-0">
                                
                                <tbody>
                                    <tr>
                                        <td>
                                            Name of Company/Vendor
                                        </td>
                                        
                                        <td>
                                           {{ $event->company_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Nature of Business
                                        </td>
                                        
                                        <td>
                                           {{ $event->nature_business }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Company Goals
                                        </td>
                                        
                                        <td>
                                           {{ $event->company_goals }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Email
                                        </td>
                                        
                                        <td>
                                           {{ $event->email_address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Address
                                        </td>
                                        
                                        <td>
                                           {{ $event->address_details }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Phone Number
                                        </td>
                                        
                                        <td>
                                           {{ $event->phone_number }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Image File
                                        </td>
                                        
                                        <td>
                                           @if($event->image_file != '')
                                                <img src="{{ url('/') }}/public/storage/events/{{ $event->image_file }}"  class="image-size" alt="{{ $event->image_file }}"/>@else <img src="{{ url('/') }}/public/img/no-image.jpg"  class="image-size" alt="{{ $event->image_file }}"/>  @endif
                                         </td>
                                    </tr>
                                  </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                    @if($event->registration_type == 'paid')
                    <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title" v-if="headerText">Payment Details</strong>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-striped table-align-middle mb-0">
                                
                                <tbody>
                                    <tr>
                                        <td>
                                            Registration Fee
                                        </td>
                                        
                                        <td>
                                            {{ $allsettings->site_currency_symbol }}{{ $event->register_amount }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Payment Type
                                        </td>
                                        
                                        <td>
                                            {{ $event->payment_type }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Payment Transaction ID
                                        </td>
                                        
                                        <td>
                                            {{ $event->payment_id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Payment Date
                                        </td>
                                        
                                        <td>
                                            {{ $event->payment_date }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Payment Status
                                        </td>
                                        
                                        <td>
                                            {{ $event->payment_status }}
                                        </td>
                                    </tr>
                                  </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
                
                </div>
            </div>
        </div>
      </div>
@include('admin.javascript')
</body>
</html>