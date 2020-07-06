@if($allsettings->maintenance_mode == 0)
<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ Helper::translation(2905,$translate) }} - {{ $allsettings->site_title }}</title>
@include('style')
</head>
<body>
   @include('header')
    <section class="headerbg" style="background-image: url('{{ url('/') }}/public/storage/settings/{{ $allsettings->site_header_background }}');">
      <div class="container text-left">
        <h2 class="mb-0">{{ Helper::translation(2905,$translate) }}</h2>
        <p class="mb-0"><a href="{{ URL::to('/') }}">{{ Helper::translation(1913,$translate) }}</a> <span class="split">&gt;</span> <span>{{ Helper::translation(2905,$translate) }}</span></p>
      </div>
    </section>
  <main role="main">
      <div class="container">
	<div class="row">
		<div class="col col-xs-12">
                        <div class="blog-grids">
                            @foreach($event['view'] as $events)
                            <div class="grid li-item">
                                <div class="entry-media">
                                    <a href="{{ url('/event') }}/{{ $events->event_slug }}" title="{{ $events->event_name }}">
                        @if($events->upload_image != '') <img src="{{ url('/') }}/public/storage/events/{{ $events->upload_image }}" alt="{{ $events->event_name }}" />@else <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $events->event_name }}" />  @endif
                                    </a>
                                </div>
                                <div class="entry-body">
                                    <h3><a href="{{ url('/event') }}/{{ $events->event_slug }}">{{ $events->event_name }}</a></h3>
                                    <p>{{ Helper::translation(2906,$translate) }} : {{ $events->event_location }}</p>
                                    <div class="read-more-date">
                                        <a href="{{ url('/event') }}/{{ $events->event_slug }}">{{ Helper::translation(2212,$translate) }}</a>
                                        <span class="date">{{ date('d F Y', strtotime($events->event_date)) }}</span>
                                    </div>
                                </div>
                            </div>
                           @endforeach 
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
    @include('footer')
    @include('javascript')
 </body>
</html>
@else
@include('503')
@endif
