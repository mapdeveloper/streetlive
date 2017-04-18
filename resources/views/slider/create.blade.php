@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('message.slider') }}
@endsection

@section('contentheader_title')
{{ trans('message.slider_details') }}
@endsection

@section('contentheader_subtitle')
{{ trans('message.slider') }}
@endsection

@section('main-content')
<div class="box box-primary col-lg-6">
  <div class="box-header with-border">
    <h3 class="box-title">{{ trans('message.slider_create') }}</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  {!! Form::open(array('action' => 'SliderController@store', 'method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data')) !!}
  {{-- {!! Form::open(array('action' => 'UsersManagementController@store', 'method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data')) !!} --}}
    <input type="hidden" name="_token" id="_token" value="{!! csrf_token() !!}">  
    <div class="box-body">
     

       <div class="form-group {{ $errors->has('file') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          {!! Form::label('File Upload', Lang::get('message.slider_upload'), array('class' => 'col-md-3 control-label')); !!}
							     {{-- {!! Form::file('images[]', array('multiple'=>true,'class'=>'form-control')) !!}  --}}
				 
             <input type="file" id="i_file" name="file" class="form-control"/>
                                            Maximum upload file size : 2MB
        </div>              
      </div>

         <div class="form-group {{ $errors->has('position') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Position</label>  
            <select class="form-control m-bot15" name="position" id="position">
                            <option value="1" >1</option>    
                            <option value="2" >2</option>    
                            <option value="3" >3</option>  
                            <option value="4" >4</option>    
                            <option value="5" >5</option>    
                          
                        
                    </select>
        </div>              
      </div>
    <div class="flash-message">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
      @endforeach
    </div> <!-- end .flash-message -->
    <!-- /.box-body -->
    <div class="box-footer">
      <a href="{{ url('/sliders') }}" class="btn btn-default pull-left" style="text-decoration:none">{{ trans('message.back') }}</a>              
      {!! Form::submit(trans('message.slider_save'), ['class' => 'btn btn-info pull-right']) !!}           
    </div>
    <!-- /.box-footer -->
  {!! Form::close() !!}
</div>
@endsection

@section('page-script')
  <script type="text/javascript">
    $(".select2").select2();  
  </script>
@stop