@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Helper::translation(2142,$translate) }} - {{ $allsettings->site_title }}</title>
@include('style')
</head>
<body>
@include('header')
    <section class="headerbg" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_header_background }}');">
      <div class="container text-left">
        <h2 class="mb-0">{{ Helper::translation(2142,$translate) }}</h2>
        <p class="mb-0"><a href="{{ URL::to('/') }}">{{ Helper::translation(1913,$translate) }}</a> <span class="split">&gt;</span> <span>{{ Helper::translation(2142,$translate) }}</span></p>
      </div>
    </section>
  <main role="main">
      <div class="container page-white-box mt-3">
         <div class="row">
           <div class="col-md-12 mt-1 mb-1 pt-1 pb-1" align="center">
         	   <div class="form-row mt-4 mb-4">
                <div class="col fs20">
                @if($registration_type == 'paid')
                @php $reg_amount = $register_amount; @endphp
                <label class="mt-2 mb-2">{{ Helper::translation(2915,$translate) }} <span>:</span> {{ $allsettings->site_currency_symbol }}{{ $reg_amount }}</label><br/>
                @else
                @php $reg_amount = 0; @endphp
                @endif
                @if($package_type != "")
                <label class="mt-2 mb-2" style="text-transform:capitalize;">{{ str_replace("_"," ",$package_type) }} <span>:</span> {{ $allsettings->site_currency_symbol }}{{ $package_amount }}</label><br/>
                @endif
                @php $total_amount = $reg_amount + $package_amount; @endphp
                @if($registration_type == 'paid' && $package_amount != 0)
                <label class="mt-2 mb-2">{{ Helper::translation(2109,$translate) }} <span>:</span> {{ $allsettings->site_currency_symbol }}{{ $total_amount }}</label><br/>
                @endif
                @if($payment_method=="paypal")
                <form action="{{ route('confirm-vendor-register') }}" class="setting_form" id="contact_form" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="paypal_url" value="{{ $paypal_url }}">
                <input type="hidden" name="paypal_email" value="{{ $paypal_email }}">
                <input type="hidden" name="product_names" value="{{ $form_type }}">
                <input type="hidden" name="purchase_token" value="{{ $purchase_token }}">
                <input type="hidden" name="total_price" value="{{ $encrypter->encrypt($total_amount) }}">
                <input type="hidden" name="site_currency" value="{{ $site_currency }}">
                <input type='hidden' name='cancel' value='{{ $website_url }}/cancel'>
		        <input type='hidden' name='return' value='{{ $website_url }}/event-success/{{ $encrypter->encrypt($purchase_token) }}'>
		        <input type="submit" name="submit" value="{{ Helper::translation(2866,$translate) }}" class="btn button-color">
                </form>
	            @endif
                @if($payment_method=="stripe")
		        @php $totalprice = $total_amount * 100; @endphp
		        <form action="{{ route('stripe-vendor-register') }}" method="POST">
	            {{ csrf_field() }}
	            <input type="hidden" name="ord_token" value="{{ $encrypter->encrypt($purchase_token) }}">
	            <input type="hidden" name="amount" value="{{ $encrypter->encrypt($totalprice) }}">
	            <input type="hidden" name="currency_code" value="{{ $site_currency }}">
	            <input type="hidden" name="item_name" value="{{ $form_type }}">
                <script src="https://checkout.stripe.com/checkout.js" 
                class="stripe-button" 
                @if($stripe_mode == 0)
                data-key="{{ $allsettings->test_publish_key }}" 
                @else
                data-key="{{ $allsettings->live_publish_key }}" 
                @endif 
                data-image="{{ url('/') }}/public/storage/settings/{{ $allsettings->site_logo }}" 
                data-name="{{ str_replace('_',' ',$form_type) }}" 
                data-description="{{ $allsettings->site_title }}"
                data-amount="{{ $encrypter->encrypt($totalprice) }}"
                data-currency="{{ $site_currency }}"
                />
                </script>
	            </form>
	            @endif
                </div>
              </div>
           </div>
         </div>
      </div>
    </main>
@include('footer')
@include('javascript')
</body>
</html>
@else
@include('503')
@endif