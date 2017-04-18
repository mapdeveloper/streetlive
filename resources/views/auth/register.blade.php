@extends('layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

<body class="hold-transition register-page">
    <div id="app">
        <div class="register-box">
            <div class="register-logo">
                <a href="{{ url('/') }}"><img src="img/mapol-logo-lg.png" alt="" style="width:160px;height:60px"></a>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="register-box-body">
                <p class="login-box-msg">{{ trans('message.registermember') }}</p>
                <form action="{{ url('/register') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div class="form-group has-feedback">
                        
                        
                     @foreach($roles as $role)
                      <input type="radio" class="roles_class" name='role_id' id="roles{{ $role->id }}" value="{{ $role->id }}" > {{ $role->title }}
                    @endforeach
                        
                    </div>
                    
                    
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="{{ trans('message.fullname') }}" name="name" value="{{ old('name') }}"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="{{ trans('message.email') }}" name="email" value="{{ old('email') }}"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="{{ trans('message.password') }}" name="password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="{{ trans('message.retrypepassword') }}" name="password_confirmation"/>
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>

                    {{-- <div class="form-group has-feedback">
                        

                        <select class="form-control m-bot15" name="role_id" id="role">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" >{{ $role->title }}</option>    
                        @endforeach 
                    </select>
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div> --}}

                    <div id="ngo">
                        <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.nameoftheorganization') }}" name="organizationname" value="{{ old('organizationname') }}"/>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.regdaddress') }}" name="regdaddress" value="{{ old('regdaddress') }}"/>
                                <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.commaddress') }}" name="commaddress" value="{{ old('commaddress') }}"/>
                                <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.vision') }}" name="vision" value="{{ old('vision') }}"/>
                                <span class="glyphicon glyphicon-menu-hamburger form-control-feedback"></span>
                        </div>
 

                         <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.phone') }}" name="phone" value="{{ old('phone') }}"/>
                                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                        </div>

                          <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.others') }}" name="others" value="{{ old('others') }}"/>
                                <span class="glyphicon glyphicon glyphicon-menu-hamburger form-control-feedback"></span>
                        </div>
                    </div>

                      <div id="donor">
                        <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.donoraddress') }}" name="donoraddress" value="{{ old('donoraddress') }}"/>
                                <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.donorphone') }}" name="donorphone" value="{{ old('donorphone') }}"/>
                                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.donoroccupation') }}" name="donoroccupation" value="{{ old('donoroccupation') }}"/>
                                <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.donoroccupationdetails') }}" name="donoroccupationdetails" value="{{ old('donoroccupationdetails') }}"/>
                                <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                        </div>
                         <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.panno') }}" name="panno" value="{{ old('panno') }}"/>
                                <span class="glyphicon gglyphicon glyphicon-menu-hamburger form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.donorothers') }}" name="donorothers" value="{{ old('donorothers') }}"/>
                                <span class="glyphicon glyphicon-menu-hamburger form-control-feedback"></span>
                        </div>
                    </div>
                    <div id="volunteer">

                      <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.address') }}" name="address" value="{{ old('commaddress') }}"/>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                         <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.phone') }}" name="volunteerphone" value="{{ old('phone') }}"/>
                                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.occupation') }}" name="occupation" value="{{ old('occupation') }}"/>
                                <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.occupation_details') }}" name="occupation_details" value="{{ old('occupation_details') }}"/>
                                <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.areaofinterset') }}" name="areaofinterset" value="{{ old('areaofinterset') }}"/>
                                <span class="glyphicon glyphicon-menu-hamburger form-control-feedback"></span>
                        </div>
                          <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('message.others') }}" name="volunteerothers" value="{{ old('others') }}"/>
                                <span class="glyphicon glyphicon-menu-hamburger form-control-feedback"></span>
                        </div>
                    </div>

                    

                    <div class="row">
                        <div class="col-xs-1">
                            <label>
                                <div class="checkbox_register icheck">
                                    <label>
                                        <input type="checkbox" name="terms">
                                    </label>
                                </div>
                            </label>
                        </div><!-- /.col -->
                        <div class="col-xs-6">
                            <div class="form-group">
                                <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal">{{ trans('message.terms') }}</button>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4 col-xs-push-1">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('message.register') }}</button>
                        </div><!-- /.col -->
                    </div>
                </form>

                @include('auth.partials.social_login')

                <a href="{{ url('/login') }}" class="text-center">{{ trans('message.membreship') }}</a>
            </div><!-- /.form-box -->
        </div><!-- /.register-box -->
    </div>

    @include('layouts.partials.scripts_auth')

    @include('auth.terms')

    <script>
    $(function(){
        $(".roles_class").click(function(){
         var role_id = $(this).val();
        if (role_id == "2"){
             $("#ngo").show();
             $("#volunteer").hide();
             $("#donor").hide();
         }
         if (role_id == "3"){
             $("#volunteer").show();
             $("#ngo").hide();
              $("#donor").hide();
         }
        
         if (role_id == "4"){
             $("#donor").show();
             $("#ngo").hide();
             $("#volunteer").hide();
         }

        });
      });


        $(function () {
            $("#ngo").hide();
            $("#volunteer").hide();
            $("#donor").show();
            var $radios = $('input:radio[name=role_id]');
            if($radios.is(':checked') === false) {
                $radios.filter('[value=4]').prop('checked', true);
            }
        });
      
    

         $("#role").on('change',function(){
        var role_id = $(this).find('option:checked').val();
        if (role_id == "2"){
             $("#ngo").show();
             $("#volunteer").hide();
             $("#donor").hide();
         }
         if (role_id == "3"){
             $("#volunteer").show();
             $("#ngo").hide();
              $("#donor").hide();
         }
        
         if (role_id == "4"){
             $("#donor").show();
             $("#ngo").hide();
             $("#volunteer").hide();
         }
        
      }); 
    </script>

</body>

@endsection
