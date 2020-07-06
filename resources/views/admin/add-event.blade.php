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
                        <h1>Add Tabo/Bazaar Event</h1>
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
                       <form action="{{ route('admin.add-event') }}" method="post" id="setting_form" enctype="multipart/form-data">
                        
                        {{ csrf_field() }}
                        @endif
                        <div class="row bg-white">
                           
                           
                           
                           <div class="col-md-6">
                           
                            
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                       
                                        
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Name of the Tabo/Bazaar Event <span class="require">*</span></label>
                                               <input id="event_name" name="event_name" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Theme of the Tabo/Bazaar Event <span class="require">*</span></label>
                                               <input id="event_theme" name="event_theme" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                                            
                                             
                                                
                                            
                                                                                      
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Description <span class="require">*</span></label>
                                                <textarea name="event_description" id="summary-ckeditor" cols="30" rows="5" class="form-control" data-bvalidator="required"></textarea>
                                                
                                            </div>   
                                            
                                            
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Requirements/Things to bring <span class="require">*</span></label>
                                               <input id="event_requirement" name="event_requirement" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Target Date for Meetup/Event <span class="require">*</span></label>
                                                
                                                <input id="event_date" name="event_date" type="text" class="form-control" data-bvalidator="required">
                                            </div> 
                                                                                       
                                         
                                    
                                </div>

                            </div>
                            </div>
                            
                            
                            
                             <div class="col-md-6">
                             
                            
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                    
                                     <div class="form-group">
                                                <label for="name" class="control-label mb-1">Venue/Location of the Meetup/Event <span class="require">*</span></label>
                                               <input id="event_location" name="event_location" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                                            
                                           
                                     
                                            
                                     <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Type of Registration <span class="require">*</span></label>
                                                <select name="type_of_registration" id="type_of_registration" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="paid">Paid</option>
                                                <option value="free">Free</option>
                                                </select>
                                                
                                            </div>
                                            
                                            <div class="form-group" id="reg_amount">
                                                <label for="name" class="control-label mb-1">Registration Amount <span class="require">*</span></label>
                                               <input id="registration_amount" name="registration_amount" type="text" class="form-control" data-bvalidator="required,digit,min[1]">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Sponsorship <span class="require">*</span></label>
                                                <select name="sponsorship" id="sponsorship" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                </select>
                                                
                                            </div>
                                            
                                            <div id="package_info">
                                            <h5>Package A</h5>
                                            <div class="form-group mt-2">
                                                <label for="name" class="control-label mb-1">Amount <span class="require">*</span></label>
                                               <input id="package_amount_1" name="package_amount_1" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Inclusions <span class="require">*</span></label>
                                               <input id="package_inclusion_1" name="package_inclusion_1" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                                            <h5>Package B</h5>
                                            <div class="form-group mt-2">
                                                <label for="name" class="control-label mb-1">Amount <span class="require">*</span></label>
                                               <input id="package_amount_2" name="package_amount_2" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Inclusions <span class="require">*</span></label>
                                               <input id="package_inclusion_2" name="package_inclusion_2" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                                            <h5>Package C</h5>
                                            <div class="form-group mt-2">
                                                <label for="name" class="control-label mb-1">Amount <span class="require">*</span></label>
                                               <input id="package_amount_3" name="package_amount_3" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Inclusions <span class="require">*</span></label>
                                               <input id="package_inclusion_3" name="package_inclusion_3" type="text" class="form-control" data-bvalidator="required">
                                            </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Upload Image File</label>
                                                <input type="file" id="upload_image" name="upload_image" class="form-control-file" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please select file of type .jpg, .png or .jpeg">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Status <span class="require">*</span></label>
                                                <select name="event_status" id="event_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                                </select>
                                                
                                            </div> 
                                                    
                            <input type="hidden" name="image_size" value="{{ $allsettings->site_max_image_size }}">
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
