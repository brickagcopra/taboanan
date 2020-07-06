@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Helper::translation(2040,$translate) }} - {{ $allsettings->site_title }}</title>
@include('style')
</head>
<body>
    @include('header')
    <section class="headerbg" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_header_background }}');">
      <div class="container text-left">
        <h2 class="mb-0">{{ Helper::translation(2040,$translate) }}</h2>
        <p class="mb-0"><a href="{{ URL::to('/') }}">{{ Helper::translation(1913,$translate) }}</a> <span class="split">&gt;</span> <span>{{ Helper::translation(2040,$translate) }}</span></p>
      </div>
    </section>
   <main role="main">
      <div class="container mt-3" id="demo">
         <div class="row jplist-panel">
           <div class="col-md-3">
             <div class="mt-1 mb-1 pt-1 pb-1">
                 <div class="card shadow-sm bg-white border-0 mb-3 rounded-0 categorylist">
                    <h5 class="card-header bg-white link-color">{{ Helper::translation(1932,$translate) }}</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12 categorybox">
                        <div 
						   class="jplist-group"
						   data-control-type="checkbox-group-filter"
						   data-control-action="filter"
						   data-control-name="themes">
                            @foreach($categories['display'] as $menu)
                            <input type="checkbox" name="category[]" value="cat-{{ $menu->cat_id }}" data-path=".cat-{{ $menu->cat_id }}" id="cat-{{ $menu->cat_id }}"> {{ $menu->category_name }}<br/>
                               @if(count($menu->subcategory) != 0)
                                  @foreach($menu->subcategory as $sub_category)
                                   <span class="move_subcategory"><input type="checkbox" name="category[]" value="subcat-{{ $sub_category->subcat_id }}" data-path=".subcat-{{ $sub_category->subcat_id }}" id="subcat-{{ $sub_category->subcat_id }}"> {{ $sub_category->subcategory_name }}<br/></span>
                                  @endforeach
                               @endif
                            @endforeach
                            </div>
                           </div>
                       </div>
                    </div>
                  </div>
                  <div class="card shadow-sm bg-white border-0 mb-3 rounded-0 categorylist">
                    <h5 class="card-header bg-white link-color">{{ Helper::translation(1934,$translate) }}</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12">
                            <select data-control-type="sort-select" data-control-name="sort" data-control-action="sort" class="form-control">
                              <option data-path=".like" data-order="asc" data-type="number">{{ Helper::translation(2163,$translate) }}</option>
                              <option data-path=".like" data-order="desc" data-type="number">{{ Helper::translation(2164,$translate) }}</option>
                           </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card shadow-sm bg-white border-0 mb-3 rounded-0 categorylist">
                    <h5 class="card-header bg-white link-color">{{ Helper::translation(1950,$translate) }}</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <div 
						   class="jplist-group"
						   data-control-type="checkbox-group-filter"
						   data-control-action="filter"
						   data-control-name="themes">
                            <input type="checkbox" name="condition" data-path=".new" id="new"> {{ Helper::translation(1951,$translate) }}<br/>
                            <input type="checkbox" name="condition" data-path=".used" id="used"> {{ Helper::translation(1952,$translate) }}
                           </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card shadow-sm bg-white border-0 mb-3 rounded-0 categorylist">
                    <h5 class="card-header bg-white link-color">{{ Helper::translation(1946,$translate) }}</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <div 
						   class="jplist-group"
						   data-control-type="checkbox-group-filter"
						   data-control-action="filter"
						   data-control-name="themes">
                            <input type="checkbox" name="product_type" data-path=".physical" id="physical"> {{ Helper::translation(2165,$translate) }}<br/>
                            <input type="checkbox" name="product_type" data-path=".external" id="external"> {{ Helper::translation(2166,$translate) }}<br/>
                            <input type="checkbox" name="product_type" data-path=".digital" id="digital"> {{ Helper::translation(2167,$translate) }}<br/>
                           </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  @if(count($attributer['display']) != 0)
                  @foreach($attributer['display'] as $attribute)
                  <div class="card shadow-sm bg-white border-0 mb-3 rounded-0 categorylist">
                    <h5 class="card-header bg-white link-color">{{ $attribute->attribute_name }}</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12">
                        <div 
						   class="jplist-group"
						   data-control-type="checkbox-group-filter"
						   data-control-action="filter"
						   data-control-name="themes">
                        @foreach($attribute->attributevalue as $product_value)
                            <input type="checkbox" name="attribute[]" value="{{ $product_value->attribute_value_id }}" data-path=".{{ $product_value->attribute_value_id }}" id="{{ $product_value->attribute_value_id }}"> {{ $product_value->attribute_value }}<br/>
                        @endforeach 
                        </div>   
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                 @endif
                 </div>
         	</div>
            <div class="col-md-9">
              <div class="mt-1 mb-1 pt-1 pb-1">
                  <div class="row list" align="center">
                           @php $z = 1; @endphp
                              @foreach($shop['product'] as $product) 
                                   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-2 pb-2 list-item">
                                   <div class="product-grid2">
                                    <div class="product-image2">
                                    <div class="product-hider">
                               <a href="{{ url('/') }}/public/storage/product/{{ $product->product_image }}" data-fancybox="quick-view-{{ $product->product_token.$z }}" data-type="image" class="quickview">
                               <i class="fa fa-eye"></i>
                               <p>{{ Helper::translation(2060,$translate) }}<br/>{{ Helper::translation(2061,$translate) }}</p>
                               </a>
                               <div class="product-images">
                                    @php $imagecount = count($product->productimages); @endphp
                                    @if($imagecount != 0)
                                    @foreach($product->productimages as $images)
                                    <a href="{{ url('/') }}/public/storage/product/{{ $images->product_image }}" data-fancybox="quick-view-{{ $product->product_token.$z }}" data-type="image"></a>
                                    @endforeach
                                    @endif
                                    </div>
                                    <div class="product-former">
                                    <h3>{{ $product->product_name }}</h3>
                                    <div class="mt-3">{{ Helper::translation(2062,$translate) }} : @if($product->product_stock != 0)<span class="theme-color">{{ Helper::translation(2063,$translate) }} ({{ $product->product_stock }})</span>@else<span class="red-color">{{ Helper::translation(2064,$translate) }} ({{ $product->product_stock }})</span>@endif</div>
            @php if($product->product_condition == 'new'){ $badg = "badge badge-warning"; } else { $badg = "badge badge-secondary"; } @endphp
            @if($product->product_condition != "")<div class="mt-2">{{ Helper::translation(1950,$translate) }} : <span class="{{ $badg }}">{{ $product->product_condition }}</span></div>@endif
                                    <div class="mt-3">@if($product->product_price != 0)<span @if($product->product_offer_price != 0) class="fs16 offer-price red-color" @else class="fs32" @endif>{{ $allsettings->site_currency_symbol }}{{ $product->product_price }}</span>@endif @if($product->product_offer_price != 0)<span class="fs32">{{ $allsettings->site_currency_symbol }}{{ $product->product_offer_price }}</span>@endif</div>                                <p class="mt-3">
                                    {{ $product->product_short_desc }} 
                                    </p>
                                    <p><a href="{{ URL::to('/product') }}/{{ $product->product_slug }}" class="btn button-color">{{ Helper::translation(2065,$translate) }}</a></p>
                                    </div>
                                    </div>
                                    <a href="{{ URL::to('/product') }}/{{ $product->product_slug }}">
                                            @if($product->product_image != "")
                                            <img class="pic-1" src="{{ url('/') }}/public/storage/product/{{ $product->product_image }}">
                                            @else
                                            <img class="pic-1" src="{{ url('/') }}/public/img/no-image.jpg">
                                            @endif
                                            @php $imagecount = count($product->productimages); @endphp
                                            @if($imagecount != 0)
                                            @php $no = 1; @endphp
                                            @foreach($product->productimages as $images)
                                            @if($no == 1)
                                            <img class="pic-2" src="{{ url('/') }}/public/storage/product/{{ $images->product_image }}">
                                            @endif
                                            @php $no++; @endphp
                                            @endforeach
                                            @else
                                            <img class="pic-2" src="{{ url('/') }}/public/storage/product/{{ $product->product_image }}">
                                            @endif
                                            </a>
                                            @if($product->flash_deals == 1)
                                            <ul class="countdown-{{ $product->product_token }}" id="countdown-timer">
                                                <li>
                                                    <span class="days">00</span>
                                                    <p class="days_ref">{{ Helper::translation(2071,$translate) }}</p>
                                                </li>
                                                <li>
                                                    <span class="hours">00</span>
                                                    <p class="hours_ref">{{ Helper::translation(2072,$translate) }}</p>
                                                </li>
                                                <li>
                                                    <span class="minutes">00</span>
                                                    <p class="minutes_ref">{{ Helper::translation(2073,$translate) }}</p>
                                                </li>
                                                <li>
                                                    <span class="seconds last">00</span>
                                                    <p class="seconds_ref">{{ Helper::translation(2074,$translate) }}</p>
                                                </li>
                                            </ul>
                                            @endif
                                            <ul class="social">
                                                @if(Auth::guest())
                                                <li><a href="{{ url('/login') }}" data-tip="{{ Helper::translation(2066,$translate) }}"><i class="fa fa-shopping-bag"></i></a></li>
                                                @else
                                                @if(Auth::user()->id != $product->user_id)
                                                <li><a href="{{ url('/wishlist') }}/{{ Auth::user()->id }}/{{ $product->product_token }}" data-tip="{{ Helper::translation(2066,$translate) }}"><i class="fa fa-shopping-bag"></i></a></li>
                                                @endif
                                                @endif
                                                <li><a href="{{ URL::to('/product') }}/{{ $product->product_slug }}" data-tip="{{ Helper::translation(2067,$translate) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                            <a class="add-to-cart" href="{{ URL::to('/product') }}/{{ $product->product_slug }}">{{ Helper::translation(2067,$translate) }}</a>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title"><a href="{{ URL::to('/product') }}/{{ $product->product_slug }}">{{ $product->product_name }}</a></h3>
                                            <span class="price like">{{ $allsettings->site_currency_symbol }}{{ $product->product_price }}</span>
                                        </div>
                                        <p class="d-none">
                                        @php 
                                        $var=explode(',',$product->product_category);
                                        @endphp
                                        @foreach($var as $row)
                                        <span class="{{ $row }}">{{ $row }}</span>,
                                        @endforeach
                                        @php
                                        $var_two = explode(',',$product->product_attribute);
                                        @endphp
                                        @foreach($var_two as $row_two)
                                        <span class="{{ $row_two }}">{{ $row_two }}</span>,
                                        @endforeach
                                        <span class="{{ $product->product_condition }}">{{ $product->product_condition }}</span>,
                                        <span class="{{ $product->product_type }}">{{ $product->product_type }}</span>,
                                        </p>
                                        </div>
                                    </div>
                                   @php $z++; @endphp      
                            @endforeach
                          </div>
                        <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 text-right">  
                                    <div 
                                       class="jplist-label customlable" 
                                       data-type="Page {current} of {pages}" 
                                       data-control-type="pagination-info" 
                                       data-control-name="paging" 
                                       data-control-action="paging">
                                    </div>	
                                    <div 
                                       class="jplist-pagination" 
                                       data-control-type="pagination" 
                                       data-control-name="paging" 
                                       data-control-action="paging"
                                       data-items-per-page="{{ $allsettings->product_per_page }}">
                                    </div>	
                              </div>
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