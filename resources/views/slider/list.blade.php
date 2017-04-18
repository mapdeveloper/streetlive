@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('message.Ngo') }}
@endsection

@section('contentheader_title')
{{ trans('message.ngo_details') }}
@endsection

@section('contentheader_subtitle')
{{ trans('message.Ngo') }}
@endsection


{{-- List View --}}
@section('main-content') 
  <div class="box">
    <div class="box-header">                      
      <div class="">         
        <div class="col-lg-8">                  
        </div>  
        <div class="col-lg-3">      
         {!! Form::open(array('method' => 'get')) !!} 
          <div class="input-group input-group-sm  pull-right" style="width: 150px;">              
            <input type="text" name="table_search" value="{{ old('table_search') }}" class="form-control pull-right" placeholder="name">
            <div class="input-group-btn">
            {!! Form::button('<i class="fa fa-search"></i>', ['type'=>'submit','class' => 'btn btn-default']) !!}            
            </div>              
          </div>
          {!! Form::close() !!}    
        </div>
        <div class="col-lg-1 pull-right">              
          <a href="{{ url('/admin/countries/create/') }}" class="btn btn-block btn-primary" style="text-decoration:none"><i class="fa fa-plus"></i></a>          
        </div>
      </div>
    </div>
    <div class="box-body">
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12">
        <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
          <thead>
            <tr role="row">
              <th class="sorting col-lg-5" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Name</th>
              <th class="sorting col-lg-5" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Regd Address</th> 
              <th class="sorting col-lg-5" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Address</th> 
              <th class="sorting col-lg-5" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Phone No</th> 
              <th class="sorting col-lg-5" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Email</th> 
              <th class="sorting col-lg-5" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">vision</th> 
              <th class="sorting col-lg-5" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Others</th> 
              <th class="sorting col-lg-5" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Created On</th>              
              <th class="sorting col-lg-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Actions</th>
            </tr>
          </thead>
          <tbody>    
           @foreach ($ngoslist as $ngos)           
            <tr role="row" class="odd">
              <td>{{$ngos->name}}</td>
              <td>{{$ngos->regdoffice}}</td>
               <td>{{$ngos->address}}</td>
              <td>{{$ngos->phoneno}}</td>
              <td>{{$ngos->email}}</td>
             
              <td>{{$ngos->vision}}</td>
              <td>{{$ngos->others}}</td>
              <td>{{$ngos->created_at}}</td>              
              <td>
                
                <a href="{{ url('/admin/countries/'.$ngos->id.'/edit/') }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                {{-- {{Form::open(array('route' => array('volunteers.destroy', $volunteers->id),'method' => 'DELETE','style' => 'display:inline'))}}
                  {{Form::button('<i class="fa fa-trash"></i>', array(
                    'class' => 'btn btn-danger',
                    'data-toggle' => 'modal',
                    'data-target' => '#confirmDelete',
                    'data-title' => trans('countries.delete'),
                    'data-message' => 'Are you sure you want to delete this ' . $volunteers->name . ' ?',                                        
                    ))
                  }}
                {{Form::close()}} --}}
              </td>
            </tr>
          @endforeach
          </tbody>         
        </table>  
        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
          @endforeach
        </div> <!-- end .flash-message -->       
      </div>
    </div>  
        <div class="pagination  no-margin pull-right">
        {{-- {{ $volunteerslist->links() }}          --}}
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