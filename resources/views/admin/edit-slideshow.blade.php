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
    @if(in_array('slideshow',$avilable))
    <div id="right-panel" class="right-panel">
       @include('admin.header')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Image</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    
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
        @if (session('error'))
            <div class="col-sm-12">
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="col-sm-12">
             <div class="alert  alert-danger alert-dismissible fade show" role="alert">
             @foreach ($errors->all() as $error)
             {{$error}}
             @endforeach
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
                       @if($demo_mode == 'on')
                           @include('admin.demo-mode')
                           @else
                       <form action="{{ route('admin.edit-slideshow') }}" method="post" id="setting_form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @endif
                        <div class="card">
                         <div class="col-md-8">
                           <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       <div class="form-group">
                                                <label for="site_logo" class="control-label mb-1">Slideshow Image (size 1920 x 400) <span class="require">*</span></label>
                                            <input type="file" id="slide_image" name="slide_image" class="form-control-file"  @if($edit['slide']->slide_image == '') data-bvalidator="required,extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @else data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg" @endif>@if($edit['slide']->slide_image != '') <img  src="{{ url('/') }}/public/storage/slideshow/{{ $edit['slide']->slide_image }}" alt="{{ $edit['slide']->slide_image }}" class="image-size" />@else <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $edit['slide']->slide_image }}"  class="image-size"/>  @endif
                                            </div>                                  
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Text Position</label>
                                                <select name="slide_text_position" class="form-control">
                                                <option value="left" @if($edit['slide']->slide_text_position == 'left') selected @endif>Left</option>
                                                <option value="right" @if($edit['slide']->slide_text_position == 'right') selected @endif>Right</option>
                                                <option value="center" @if($edit['slide']->slide_text_position == 'center') selected @endif>Center</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Heading</label>
                                                <input id="slide_title" name="slide_title" type="text" class="form-control" value="{{ $edit['slide']->slide_title }}">
                                            </div>     
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Sub Heading</label>
                                                <input id="slide_desc" name="slide_desc" type="text" class="form-control" value="{{ $edit['slide']->slide_desc }}">
                                            </div>  
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Button Text</label>
                                                <input id="slide_btn_text" name="slide_btn_text" type="text" class="form-control" value="{{ $edit['slide']->slide_btn_text }}">
                                            </div> 
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Button Link</label>
                                                <input id="slide_btn_link" name="slide_btn_link" type="text" class="form-control" data-bvalidator="url" value="{{ $edit['slide']->slide_btn_link }}">
                                            </div>                                     
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Display Order</label>
                                                <input id="slide_order" name="slide_order" type="text" class="form-control" data-bvalidator="digit,min[0]" value="{{ $edit['slide']->slide_order }}">
                                            </div> 
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Status <span class="require">*</span></label>
                                                <select name="slide_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($edit['slide']->slide_status == 1) selected @endif>Active</option>
                                                <option value="0" @if($edit['slide']->slide_status == 0) selected @endif>InActive</option>
                                                </select>
                                             </div>   
                                            <input type="hidden" name="save_slide_image" value="{{ $edit['slide']->slide_image }}">                                             
                                            <input type="hidden" name="image_size" value="{{ $allsettings->site_max_image_size }}">    
                                            <input type="hidden" name="slide_id" value="{{ $edit['slide']->slide_id }}">   
                                    </div>
                                </div>
                               </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="card-footer">
                                  <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                      <i class="fa fa-dot-circle-o"></i> Submit
                                  </button>
                                  <button type="reset" class="btn btn-danger btn-sm">
                                       <i class="fa fa-ban"></i> Reset
                                  </button>
                            </div>
                          </div> 
                       </form> 
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
    @else
    @include('admin.denied')
    @endif
    <!-- Right Panel -->
   @include('admin.javascript')
</body>
</html>