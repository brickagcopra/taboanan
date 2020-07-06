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
    @if(in_array('events',$avilable))
    <div id="right-panel" class="right-panel">

        
                       @include('admin.header')
                       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Event</h1>
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
                       <form action="{{ route('admin.edit-event') }}" method="post" id="setting_form" enctype="multipart/form-data">
                        
                        {{ csrf_field() }}
                        @endif
                        <div class="row bg-white">
                           
                           
                           
                           <div class="col-md-6">
                           
                            
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Name of the Meetup/Event <span class="require">*</span></label>
                                               <input id="event_name" name="event_name" type="text" class="form-control" data-bvalidator="required" value="{{ $edit['view']->event_name }}">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Theme of the Meetup/Event <span class="require">*</span></label>
                                               <input id="event_theme" name="event_theme" type="text" class="form-control" data-bvalidator="required" value="{{ $edit['view']->event_theme }}">
                                            </div>
                                            
                                             
                                                
                                            
                                                                                      
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Description <span class="require">*</span></label>
                                                <textarea name="event_description" id="summary-ckeditor" cols="30" rows="5" class="form-control" data-bvalidator="required">{{ html_entity_decode($edit['view']->event_description) }}</textarea>
                                                
                                            </div>   
                                            
                                            
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Requirements/Things to bring <span class="require">*</span></label>
                                               <input id="event_requirement" name="event_requirement" type="text" class="form-control" data-bvalidator="required" value="{{ $edit['view']->event_requirement }}">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Target Date for the Tabo Event <span class="require">*</span></label>
                                                
                                                <input id="event_date" name="event_date" type="text" class="form-control" data-bvalidator="required" value="{{ $edit['view']->event_date }}">
                                            </div> 
                                                                                       
                                         
                                    
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6">
                             
                            
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                     <div class="form-group">
                                                <label for="name" class="control-label mb-1">Venue/Location of the Tabo Event <span class="require">*</span></label>
                                               <input id="event_location" name="event_location" type="text" class="form-control" data-bvalidator="required" value="{{ $edit['view']->event_location }}">
                                            </div>
                                            
                                           
                                     
                                            
                                     <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Type of Registration <span class="require">*</span></label>
                                                <select name="type_of_registration" id="type_of_registration" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="paid" @if($edit['view']->type_of_registration == 'paid') selected @endif>Paid</option>
                                                <option value="free" @if($edit['view']->type_of_registration == 'free') selected @endif>Free</option>
                                                </select>
                                                
                                            </div>
                                            
                                            <div id="reg_amount" @if($edit['view']->type_of_registration == 'paid') class="form-group force-block" @else class="form-group force-none" @endif>
                                                <label for="name" class="control-label mb-1">Registration Amount <span class="require">*</span></label>
                                               <input id="registration_amount" name="registration_amount" type="text" class="form-control" data-bvalidator="required,digit,min[1]" value="{{ $edit['view']->registration_amount }}">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Sponsorship <span class="require">*</span></label>
                                                <select name="sponsorship" id="sponsorship" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="yes" @if($edit['view']->sponsorship == 'yes') selected @endif>Yes</option>
                                                <option value="no" @if($edit['view']->sponsorship == 'no') selected @endif>No</option>
                                                </select>
                                                
                                            </div>
                                            
                                            <div id="package_info" @if($edit['view']->sponsorship == 'yes') class="form-group force-block" @else class="form-group force-none" @endif>
                                            <h5>Package A</h5>
                                            <div class="form-group mt-2">
                                                <label for="name" class="control-label mb-1">Amount <span class="require">*</span></label>
                                               <input id="package_amount_1" name="package_amount_1" type="text" class="form-control" data-bvalidator="required" value="{{ $edit['view']->package_amount_1 }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Inclusions <span class="require">*</span></label>
                                               <input id="package_inclusion_1" name="package_inclusion_1" type="text" class="form-control" data-bvalidator="required" value="{{ $edit['view']->package_inclusion_1 }}">
                                            </div>
                                            <h5>Package B</h5>
                                            <div class="form-group mt-2">
                                                <label for="name" class="control-label mb-1">Amount <span class="require">*</span></label>
                                               <input id="package_amount_2" name="package_amount_2" type="text" class="form-control" data-bvalidator="required" value="{{ $edit['view']->package_amount_2 }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Inclusions <span class="require">*</span></label>
                                               <input id="package_inclusion_2" name="package_inclusion_2" type="text" class="form-control" data-bvalidator="required" value="{{ $edit['view']->package_inclusion_2 }}">
                                            </div>
                                            <h5>Package C</h5>
                                            <div class="form-group mt-2">
                                                <label for="name" class="control-label mb-1">Amount <span class="require">*</span></label>
                                               <input id="package_amount_3" name="package_amount_3" type="text" class="form-control" data-bvalidator="required" value="{{ $edit['view']->package_amount_3 }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Inclusions <span class="require">*</span></label>
                                               <input id="package_inclusion_3" name="package_inclusion_3" type="text" class="form-control" data-bvalidator="required" value="{{ $edit['view']->package_inclusion_3 }}">
                                            </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Upload Image File</label>
                                                <input type="file" id="upload_image" name="upload_image" class="form-control-file" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg">
                                                @if($edit['view']->upload_image !='')
                                                    <img src="{{ url('/') }}/public/storage/events/{{ $edit['view']->upload_image }}" alt="{{ $edit['view']->upload_image }}" class="image-size">
                                                    @else
                                                    <img src="{{ url('/') }}/public/img/no-image.jpg" alt="{{ $edit['view']->upload_image }}" class="image-size">
                                                    @endif
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Status <span class="require">*</span></label>
                                                <select name="event_status" id="event_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" @if($edit['view']->event_status == '1') selected @endif>Active</option>
                                                <option value="0" @if($edit['view']->event_status == '0') selected @endif>InActive</option>
                                                </select>
                                                
                                            </div> 
                                                    
                            <input type="hidden" name="image_size" value="{{ $allsettings->site_max_image_size }}">
                            <input type="hidden" name="save_upload_image" value="{{ $edit['view']->upload_image }}">
                            <input type="hidden" name="event_token" value="{{ $edit['view']->event_token }}">
                             </div>
                             </div>
                             
                             </div>
                            
                            
                            <div class="card-footer col-md-12">
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
