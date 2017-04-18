@extends('layouts.app')

@section('contentheader_title')
{{ trans('message.change_password') }}
@endsection

@section('main-content')
<div class="box box-primary col-lg-6">
  <div class="box-header with-border ">
    <h3 class="box-title">{{ trans('message.change_password') }}</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  					{!! Form::model(Auth::user()->id, array('action' => array('Auth\UserController@changepassword', Auth::user()->id), 'method' => 'PUT')) !!}
  {{-- {!! Form::open(array('url' => '/changepassword'),['method' => 'PUT', 'class' => 'form-horizontal']) !!} --}}
    <input type="hidden" name="_token" id="_token" value="{!! csrf_token() !!}">  

  
    <div class="box-body">
      <div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Password</label>  
           {!! $errors->first('password','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
          <input type="password" class="form-control" name="password" id="password"  value="{{ old('password') }}" placeholder="Password" >
        </div>        
      </div> 
      
      <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Confirm Password</label>  
           {!! $errors->first('password_confirmation','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
          <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation ') }}" placeholder="confirm Password" >
        </div>        
      </div>

      @if(Session::has('success_msg'))
      <div class="alert alert-success">
          <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
          {{Session::get('success_msg')}}
      </div> <!-- /.alert -->
      @endif

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        {!! Form::submit(trans('message.change'), ['class' => 'btn btn-info pull-right']) !!}           
    </div>
    <!-- /.box-footer -->
  {!! Form::close() !!}
</div>
@endsection

<script type="text/javascript">
		document.addEventListener("DOMContentLoaded", function(event) {
		  	matching_password_check();
		});
        function matching_password_check11() {
            var password = document.getElementById("password");
            var confirm_password = document.getElementById("password_confirmation");
            function validatePassword(){
                if(password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("The Passwords do not match");
                } else {
                    confirm_password.setCustomValidity('');
                }
            }
            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
        }
    </script>