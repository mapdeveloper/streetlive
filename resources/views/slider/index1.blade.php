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

{{-- List View --}}
@section('main-content') 
  <div class="box">
    <div class="box-header">                      
      <div class="">         
        <div class="col-lg-8">                  
        </div>  
     
      </div>
    </div>
    <div class="box-body">
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12">
        <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
          {{-- <thead>
            <tr role="row">
              <th class="sorting col-lg-5" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Name</th>
              <th class="sorting col-lg-5" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Created On</th>              
              <th class="sorting col-lg-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Actions</th>
            </tr>
          </thead> --}}
          <tbody>    
           

           @foreach($ngoslist as $ngo)       
     
        </div>     
              <tr role="row" class="odd">
              <td>Name Of The Organization</td>
              <td>{{$ngo->name}}</td>
              </tr>
              

   <tr>
              <td>Regd Address</td>
              <td>{{$ngo->regdoffice}}</td>              
              </tr>

                 <tr>
              <td>Communication Address</td>
              <td>{{$ngo->address}}</td>              
              </tr>

                 <tr>
              <td>Vision/Mission of the Organisation</td>
              <td>{{$ngo->vision}}</td>              
              </tr>

                 <tr>
              <td>Phone No</td>
              <td>{{$ngo->phoneno}}</td>              
              </tr>

                 <tr>
              <td>Email</td>
              <td>{{$ngo->email}}</td>              
              </tr>

                 <tr>
              <td>Others</td>
              <td>{{$ngo->others}}</td>              
              </tr>


              

          @endforeach
          </tbody>         
        </table>  
        {{-- <td>
                <a href="{{ url('/admin/countries/'.$ngo->id.'/edit/') }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
  
              </td> --}}
        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
          @endforeach
        </div> <!-- end .flash-message -->       
      </div>
    </div>  
           
  </div>
</div>

{{-- Show View --}}
<div class="modal modal-default" id="show_country_info" style="left:0;right:0;top:0;bottom:0;margin:auto;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd class="modal-name"></dd>               
          </dl>
        </div>
      </div>        
    </div>
  </div>
</div>

<div class="modal modal-default" id="confirmDelete" id="delete_country">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Info Modal</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete <span id="pName"></span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="confirm">Yes Delete</button>
      </div>
    </div>
  </div>
</div>

{{-- @include('masters.partials.delete') --}}
@endsection

@section('page-script')
  <script type="text/javascript">
    // View Model Pop up
    $(document).on('click', '.viewPopLink', function(e) {         
      e.preventDefault();           
      var country_id = $(this).data('id');
      $.ajax({
        url: 'countries/' + country_id,
        type: 'GET',
        //data: 'id='+user_id,
        dataType: 'JSON',
        success: function(data, textStatus, jqXHR){  
          if (jqXHR.status == 200)
          {            
            $('.modal-title').text('Information about country');     
            $('.modal-name').text(data.name);                     
            $('#show_country_info').modal('show');
          } else {                        
            location.reload();
          }                   
        },
        error: function(data,jqXHR, textStatus, errorThrown){
                 
        },
      });    
    });

    // Delete pop up
    $('#confirmDelete').on('show.bs.modal', function(e) {
      $message = $(e.relatedTarget).attr('data-message');
      $(this).find('.modal-body p').text($message);
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);
    
      // Button Text for action button
      $btntxt = $(e.relatedTarget).attr('data-btntxt');
      $(this).find('.modal-footer x').text($btntxt);

      // Cancel Button Class
      $btncan = $(e.relatedTarget).attr('data-btncancel');
      // Primary Action Button Class
      $btnac = $(e.relatedTarget).attr('data-btnaction');

      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
  });

  $('#confirmDelete').find('.modal-footer #confirm').on('click', function() {
      $(this).data('form').submit();
  });

  $('.flash-message').delay(3000).fadeOut(350);
  </script>
@stop