@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ $single['event']->event_name }} - {{ $allsettings->site_title }}</title>
@include('style')
</head>
<body>
   @include('header')
    <section class="headerbg" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_header_background }}');">
      <div class="container text-left">
        <h2 class="mb-0">{{ $single['event']->event_name }}</h2>
        <p class="mb-0"><a href="{{ URL::to('/') }}">{{ Helper::translation(1913,$translate) }}</a> <span class="split">&gt;</span> <a href="{{ URL::to('/events') }}">{{ Helper::translation(2905,$translate) }}</a> <span class="split">&gt;</span> <span>{{ $single['event']->event_name }}</span></p>
      </div>
    </section>
  <main role="main">
      <div class="container page-white-box mt-3 single-event">
      <div>
             @if ($message = Session::get('success'))
               <div class="alert alert-success" role="alert">
                  <span class="alert_icon lnr lnr-checkmark-circle"></span>
                   {{ $message }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span class="fa fa-close" aria-hidden="true"></span>
                   </button>
               </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger" role="alert">
                <span class="alert_icon lnr lnr-warning"></span>
                   {{ $message }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span class="fa fa-close" aria-hidden="true"></span>
                   </button>
            </div>
            @endif
            @if (!$errors->isEmpty())
            <div class="alert alert-danger" role="alert">
            <span class="alert_icon lnr lnr-warning"></span>
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-close" aria-hidden="true"></span>
            </button>
            </div>
            @endif
            </div>
         <div class="row">
                 <div class="col-md-9 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="card-title">{{ $single['event']->event_name }}</h2>
                 <div class="card mb-4">
           @if($single['event']->upload_image != '') <img src="{{ url('/') }}/public/storage/events/{{ $single['event']->upload_image }}" alt="{{ $single['event']->event_name }}" class="card-img-top event-bg" />@else <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $single['event']->event_name }}"  class="card-img-top event-bg"/>  @endif
           
            <div class="card-body">
                          <h4 class="h3">{{ Helper::translation(2907,$translate) }}</h4>
             <div class="text-dark fs16 lh25">
             {!! html_entity_decode($single['event']->event_description) !!}
             </div>
                           
            </div>
           
            
            <div class="card-footer">
              <div class="bs-example">
                <h4 class="h3 event_title">{{ Helper::translation(2908,$translate) }}</h4>
                <dl class="row lh0">
                    <dt class="col-sm-4">{{ Helper::translation(2909,$translate) }}</dt>
                    <dd class="col-sm-8">{{ $single['event']->event_theme }}</dd>
                    <dt class="col-sm-4">{{ Helper::translation(2910,$translate) }}</dt>
                    <dd class="col-sm-8">{{ $single['event']->event_requirement }}</dd>
                    <dt class="col-sm-4">{{ Helper::translation(2911,$translate) }}</dt>
                    <dd class="col-sm-8">{{ date('D F Y', strtotime($single['event']->event_date)) }}</dd>
                    <dt class="col-sm-4">{{ Helper::translation(2912,$translate) }}</dt>
                    <dd class="col-sm-8">{{ $single['event']->event_location }}</dd>
                </dl>
            </div>
            </div>
            
            <div class="card-footer bg-white">
              <div class="bs-example">
                <div align="left">
                @if(Auth::guest())
                <a href="javascript:void(0);" class="btn button-color" onClick="alert('Login user only');"> {{ Helper::translation(2913,$translate) }}</a>
                <a href="javascript:void(0);" class="btn button-color" onClick="alert('Login user only');"> {{ Helper::translation(2914,$translate) }}</a>
                @else
                @if(Auth::user()->user_type == 'vendor')
                <a href="javascript:void(0);" class="btn button-color" data-toggle="modal" data-target="#myModal-vendor"> {{ Helper::translation(2913,$translate) }}</a>
                @else
                <a href="javascript:void(0);" class="btn button-color" onClick="alert('Vendor only allowed');"> {{ Helper::translation(2913,$translate) }}</a>
                @endif
                <a href="javascript:void(0);" class="btn button-color" data-toggle="modal" data-target="#myModal-sponsor"> {{ Helper::translation(2914,$translate) }}</a>
                @endif
                </div>
            </div>
            </div>
             
          </div>

           <div class="col-md-12 mb-4 mt-4">
           <h4 class="mb-4">{{ Helper::translation(2150,$translate) }}</h4>
               <div class="social_icons mt-2">
                   <a class="share-button" data-share-url="{{ URL::to('/event') }}/{{ $single['event']->event_slug }}" data-share-network="facebook" data-share-text="{{ $single['event']->event_theme }}" data-share-title="{{ $single['event']->event_name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/events/{{ $single['event']->upload_image }}" href="javascript:void(0)">
                                                       <img src="{{ url('/') }}/public/img/facebook.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="{{ URL::to('/event') }}/{{ $single['event']->event_slug }}" data-share-network="twitter" data-share-text="{{ $single['event']->event_theme }}" data-share-title="{{ $single['event']->event_name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/events/{{ $single['event']->upload_image }}" href="javascript:void(0)">
                                                        <img src="{{ url('/') }}/public/img/twitter.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="{{ URL::to('/event') }}/{{ $single['event']->event_slug }}" data-share-network="googleplus" data-share-text="{{ $single['event']->event_theme }}" data-share-title="{{ $single['event']->event_name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/events/{{ $single['event']->upload_image }}" href="javascript:void(0)">
                                                        <img src="{{ url('/') }}/public/img/gplus.png" width="40">
                                                    </a>
                       <a class="share-button" data-share-url="{{ URL::to('/event') }}/{{ $single['event']->event_slug }}" data-share-network="linkedin" data-share-text="{{ $single['event']->event_theme }}" data-share-title="{{ $single['event']->event_name }}" data-share-via="{{ $allsettings->site_title }}" data-share-tags="" data-share-media="{{ url('/') }}/public/storage/events/{{ $single['event']->upload_image }}" href="javascript:void(0)">
                                                        <img src="{{ url('/') }}/public/img/linked.png" width="40">
                                                    </a>
                 </div>       
          </div>
          

        </div>
        
        @if(Auth::check())
        <div class="modal fade" id="myModal-sponsor">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
            
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">{{ Helper::translation(2914,$translate) }}</h4>
                    <button type="button" class="close" data-dismiss="modal">x</button>
                  </div>
            
                  <!-- Modal body -->
                  <div class="modal-body">
                    <form action="{{ route('sponsor-register') }}" id="sponsor_form" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(2916,$translate) }} <span>*</span></label>
                        <input type="text" class="form-control" id="company_name" name="company_name" data-bvalidator="required">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(2917,$translate) }} <span>*</span></label>
                        <input type="text" class="form-control" id="nature_business" name="nature_business" data-bvalidator="required">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(2918,$translate) }} <span>*</span></label>
                        <input type="text" class="form-control" id="company_goals" name="company_goals" data-bvalidator="required">
                      </div>
                      
                      
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(2014,$translate) }} <span>*</span></label>
                        <input type="text" class="form-control" id="email_address" name="email_address" data-bvalidator="required,email">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(2003,$translate) }} <span>*</span></label>
                        <textarea class="form-control" id="address_details" name="address_details" data-bvalidator="required"></textarea>
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(2200,$translate) }} <span>*</span></label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" data-bvalidator="required">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(2919,$translate) }}</label>
                        <input type="file" class="form-control" id="image_file" name="image_file">
                      </div>
                      @if($single['event']->type_of_registration == 'paid' || $single['event']->sponsorship == 'yes')
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(2920,$translate) }} <span>*</span></label>
                        <select class="form-control" id="payment_type" name="payment_type" data-bvalidator="required">
                        <option value=""></option>
                        <option value="paypal">Paypal</option>
                        <option value="stripe">Stripe</option>
                        </select>
                      </div>
                      @endif
                      @if($single['event']->sponsorship == 'yes')
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(2921,$translate) }}</label><br/>
                        <input type="radio"  id="package_amount" name="package_amount" value="{{ $single['event']->package_amount_1.'-'.'package_A' }}" data-bvalidator="required"> Package A : {{ $allsettings->site_currency_symbol }} {{ $single['event']->package_amount_1 }} (<strong>{{ Helper::translation(2922,$translate) }} :</strong> {{ $single['event']->package_inclusion_1 }})<br/>
                        <input type="radio" id="package_amount" name="package_amount" value="{{ $single['event']->package_amount_2.'-'.'package_B' }}" data-bvalidator="required"> Package B : {{ $allsettings->site_currency_symbol }} {{ $single['event']->package_amount_2 }} (<strong>{{ Helper::translation(2922,$translate) }} :</strong> {{ $single['event']->package_inclusion_2 }})<br/>
                        <input type="radio" id="package_amount" name="package_amount" value="{{ $single['event']->package_amount_3.'-'.'package_C' }}" data-bvalidator="required"> Package C : {{ $allsettings->site_currency_symbol }} {{ $single['event']->package_amount_3 }} (<strong>{{ Helper::translation(2922,$translate) }} :</strong> {{ $single['event']->package_inclusion_3 }})
                      </div>
                      @endif
                      <input type="hidden" name="event_id" value="{{ $single['event']->event_id }}">
                      <input type="hidden" name="event_token" value="{{ $single['event']->event_token }}">
                      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> 
                      <input type="hidden" name="register_amount" value="{{ $encrypter->encrypt($single['event']->registration_amount) }}">
                      <input type="hidden" name="registration_type" value="{{ $single['event']->type_of_registration }}">
                      <input type="hidden" name="sponsor_type" value="{{ $single['event']->sponsorship }}">
                      <input type="hidden" name="form_type" value="sponsor_registration">
                      <button type="submit" class="btn button-color"> {{ Helper::translation(2212,$translate) }}</button>
                    </form>
                  </div>
            
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ Helper::translation(2923,$translate) }}</button>
                  </div>
            
                </div>
              </div>
            </div>
        
        <div class="modal fade" id="myModal-vendor">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
            
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">{{ Helper::translation(2913,$translate) }}</h4>
                    <button type="button" class="close" data-dismiss="modal">x</button>
                  </div>
            
                  <!-- Modal body -->
                  <div class="modal-body">
                    <form action="{{ route('vendor-register') }}" id="vendor_form" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(2916,$translate) }} <span>*</span></label>
                        <input type="text" class="form-control" id="company_name" name="company_name" data-bvalidator="required">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(2917,$translate) }} <span>*</span></label>
                        <input type="text" class="form-control" id="nature_business" name="nature_business" data-bvalidator="required">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(2918,$translate) }} <span>*</span></label>
                        <input type="text" class="form-control" id="company_goals" name="company_goals" data-bvalidator="required">
                      </div>
                      
                      
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(2014,$translate) }} <span>*</span></label>
                        <input type="text" class="form-control" id="email_address" name="email_address" data-bvalidator="required,email">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(2003,$translate) }} <span>*</span></label>
                        <textarea class="form-control" id="address_details" name="address_details" data-bvalidator="required"></textarea>
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(2200,$translate) }} <span>*</span></label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" data-bvalidator="required">
                      </div>
                      
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(2919,$translate) }}</label>
                        <input type="file" class="form-control" id="image_file" name="image_file">
                      </div>
                      @if($single['event']->type_of_registration == 'paid') 
                      <div class="form-group">
                        <label for="pwd">{{ Helper::translation(2920,$translate) }} <span>*</span></label>
                        <select class="form-control" id="payment_type" name="payment_type" data-bvalidator="required">
                        <option value=""></option>
                        <option value="paypal">Paypal</option>
                        <option value="stripe">Stripe</option>
                        </select>
                      </div>
                      @else
                      <input type="hidden" name="payment_type" value="">
                      @endif
                      <input type="hidden" name="event_id" value="{{ $single['event']->event_id }}">
                      <input type="hidden" name="event_token" value="{{ $single['event']->event_token }}">
                      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> 
                      <input type="hidden" name="register_amount" value="{{ $encrypter->encrypt($single['event']->registration_amount) }}">
                      <input type="hidden" name="registration_type" value="{{ $single['event']->type_of_registration }}">
                      <input type="hidden" name="sponsor_type" value="no">
                      <input type="hidden" name="form_type" value="vendor_registration">
                      <button type="submit" class="btn button-color"> {{ Helper::translation(2212,$translate) }}</button>
                    </form>
                  </div>
            
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ Helper::translation(2923,$translate) }}</button>
                  </div>
            
                </div>
              </div>
            </div>
            @endif
              
              <div class="col-lg-3 col-md-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                 <div class="mt-3 pt-3 pb-2 mb-2">
                   <div class="card w-100">
                <div class="card-header sidebar-header text-uppercase">{{ Helper::translation(2924,$translate) }}</div>
                
                <ul class="media-list mt-3">
                       @foreach($recent['view'] as $recent)
                        <li class="media mb-4 mt-2 no-gutters">
                            <div class="col-md-5 full-width-image">
                            <a href="{{ url('/event') }}/{{ $recent->event_slug }}" class="captial" title="{{ $recent->event_name }}">
                                @if($recent->upload_image != '') <img src="{{ url('/') }}/public/storage/events/{{ $recent->upload_image }}" alt="{{ $recent->event_name }}" class="img-circle mx-auto d-block recent-event"/>@else <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $recent->event_name }}" class="img-circle mx-auto d-block recent-event"/>  @endif</a>
                            </div>
                            <div class="col-md-7 mr-1">
                                <a href="{{ url('/event') }}/{{ $recent->event_slug }}" class="link-color fs16">{{ $recent->event_name }}</a>
                                <div>
                                <small class="fs12">
                                    {{ date('d M Y', strtotime($recent->event_date)) }}
                                </small>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        
                    </ul>
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
