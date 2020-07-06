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
                        <h1>Order Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/orders') }}" class="btn btn-success btn-sm"><i class="fa fa-chevron-left"></i> Back</a>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Order Details</strong>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Purchase Id</th>
                                            <th>Order Id</th>
                                            <th>Product Name</th>
                                            <th>Vendor</th>
                                            <th>Vendor Amount</th>
                                            <th>Admin Amount</th>
                                            <th>Total Amount<br/><small class="red-color">(without shipping price)</small></th>
                                            <th>Payment Status</th>
                                            <th>Payment Approval?</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($itemData['item'] as $order)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $order->purchase_token }} </td>
                                            <td>{{ $order->ord_id }} </td>
                                            <td>{{ $order->product_name }} </td>
                                            <td><a href="{{ URL::to('/user') }}/{{ $order->username }}" target="_blank" class="blue-color">{{ $order->username }}</a></td>
                                            <td>{{ $allsettings->site_currency_symbol }}{{ $order->vendor_amount }} </td>
                                            <td>{{ $allsettings->site_currency_symbol }}{{ $order->admin_amount }} </td>
                                            <td>{{ $allsettings->site_currency_symbol }}{{ $order->subtotal }} </td>
                                            <td>@if($order->order_status == 'completed') <span class="badge badge-success">Completed</span> @else <span class="badge badge-danger">Pending</span> @endif</td>
                                            <td>
                                            @if($order->payment_status == '' && $order->order_status == 'completed')
                                            <a href="{{ URL::to('/admin/order-details') }}/{{ $order->ord_id }}/vendor" class="btn btn-success btn-sm" title="payment released to vendor" onClick="return confirm('Are you sure you will payment released to vendor?');"><i class="fa fa-money"></i>&nbsp; Waiting for approval</a> 
                                            <a href="{{ URL::to('/admin/order-details') }}/{{ $order->ord_id }}/buyer" class="btn btn-danger btn-sm" title="payment released to buyer" onClick="return confirm('Are you sure you will payment released to buyer?');"><i class="fa fa-close"></i>&nbsp;Cancel Approval</a>
                                            @else
                                            {{ $order->payment_status }}
                                            @endif
                                            </td>
                                         </tr>
                                        @php $no++; @endphp
                                   @endforeach     
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title" v-if="headerText">More Details</strong>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-striped table-align-middle mb-0">
                                
                                <tbody>
                                    <tr>
                                        <td>
                                            Purchase Id 
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->purchase_token }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Payment Id
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->payment_token }}
                                        </td>
                                    </tr>
                                   <tr>
                                        <td>
                                            Payment Type
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->payment_type }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Purchase Date
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->payment_date }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Shipping Price
                                        </td>
                                        
                                        <td>
                                            {{ $allsettings->site_currency_symbol }}{{ $single_data->shipping_price }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Processing Price
                                        </td>
                                        
                                        <td>
                                            {{ $allsettings->site_currency_symbol }}{{ $single_data->processing_fee }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Sub Total Price
                                        </td>
                                        
                                        <td>
                                            {{ $allsettings->site_currency_symbol }}{{ $single_data->subtotal }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Total Price
                                        </td>
                                        
                                        <td>
                                            {{ $allsettings->site_currency_symbol }}{{ $single_data->total }}
                                        </td>
                                    </tr>
                                  </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title" v-if="headerText">Billing Details</strong>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-striped table-align-middle mb-0">
                                
                                <tbody>
                                    <tr>
                                        <td>
                                            First Name 
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->bill_firstname }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Last Name
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->bill_lastname }}
                                        </td>
                                    </tr>
                                   <tr>
                                        <td>
                                            Company Name
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->bill_companyname }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Email
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->bill_email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Phone
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->bill_phone }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Country
                                        </td>
                                        
                                        <td>
                                            {{ $billcountry_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Address
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->bill_address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            City
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->bill_city }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            State
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->bill_state }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Postcode
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->bill_postcode }}
                                        </td>
                                    </tr>
                                  </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title" v-if="headerText">Shipping Details</strong>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-striped table-align-middle mb-0">
                                
                                <tbody>
                                    <tr>
                                        <td>
                                            First Name 
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->ship_firstname }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Last Name
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->ship_lastname }}
                                        </td>
                                    </tr>
                                   <tr>
                                        <td>
                                            Company Name
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->ship_companyname }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Email
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->ship_email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Phone
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->ship_phone }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Country
                                        </td>
                                        
                                        <td>
                                            {{ $shipcountry_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Address
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->ship_address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            City
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->ship_city }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            State
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->ship_state }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Postcode
                                        </td>
                                        
                                        <td>
                                            {{ $single_data->ship_postcode }}
                                        </td>
                                    </tr>
                                  </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title" v-if="headerText">Other Notes</strong>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-striped table-align-middle mb-0">
                                
                                <tbody>
                                    <tr>
                                        <td>
                                           	@php echo nl2br($single_data->other_notes); @endphp
                                        </td>
                                    </tr>
                                    
                                  </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
      </div>
@include('admin.javascript')
</body>
</html>