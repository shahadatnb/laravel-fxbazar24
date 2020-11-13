@extends('layouts.admin-master')
@section('stylesheet')
  {!! Html::style('public/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}
  {!! Html::style('public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}
  {!! Html::style('public/admin/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') !!}
  {!! Html::style('public/admin/plugins/timepicker/bootstrap-timepicker.min.css') !!}
  {!! Html::style('public/admin/plugins/iCheck/all.css') !!}
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Admin panel</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Games</li>
      </ol>
    

    <!-- Main content -->
    

      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title">Live Games</h3>
          <div class="card-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          @include('layouts._message')
          {!! Form::open(['route'=>'createBett','method'=>'POST','class'=>'form-horizontal']) !!}
          <div class="row">
            <div class="col-md-4">
              {{ Form::label('name','Name') }}
              {{ Form::select('name', ['live' => 'Live', 'live2' => 'Live2'
                        ], null, ['class'=>'form-control','required'=>'','placeholder' => 'Game Name']) }}
            </div>
            <div class="col-md-8">
              {{ Form::label('description','Description') }}
              {{ Form::text('description',null,['class'=>'form-control','value'=>'Cricket: To Win The Match? ','required'=>'']) }} 
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              {{ Form::label('teamA','Team A') }}
              {{ Form::text('teamA',null,['class'=>'form-control','required'=>'']) }}
            </div>
            <div class="col-md-4">
              {{ Form::label('teamB','Team B') }}
              {{ Form::text('teamB',null,['class'=>'form-control','required'=>'']) }}
            </div>
            <div class="col-md-4">
              {{ Form::label('draw','Draw') }}
              {{ Form::text('draw','Draw',['class'=>'form-control','required'=>'']) }}
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
                  {{ Form::label('lastTime','Last Time') }}
                  <div class="input-group">
                    <input name="lastTime" id="lastTime" type="text" class="form-control timepicker">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
            </div>
            <div class="col-md-4"> <br>
            {{ Form::submit('Submit',array('class'=>'form-control btn btn-success')) }}</div>
          </div>
         {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
        <div class="card-footer">
          <table class="table">
            <tr>
              <th>Remove</th>
              <th>Name</th>
              <th>Description</th>
              <th>Winner</th>
              <th>Last Time</th>
              <th>Winner Select</th>
              <th>View</th>
            </tr>
            @foreach ($games as $data)
            <tr>
              <td>@if($data->winner == null ) 
                <a onclick="return confirmSubmit();" href="{{ route('gameDelete',$data->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> @endif
              </td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->description }} {{ $data->teamA }} VS {{ $data->teamB }}</td>
              <td>{{ $data->winner }}</td>
              <td>{{ date('d-m-Y h:i:s A', strtotime($data->lastTime)) }}</td>
              <td>@if($data->winner == null )
                {!! Form::open(['route'=>['winnerSelect',$data->id],'method'=>'POST']) !!}
                  {{ Form::hidden('id', $data->id) }}
                  {{ Form::text('bonus',null,['class'=>'form-control','required'=>'','placeholder' => 'Bonus Amount']) }}
                  {{ Form::select('winner', [ $data->teamA => $data->teamA, $data->teamB => $data->teamB, $data->draw => $data->draw], 
                  null, ['class'=>'form-control','required'=>'','placeholder' => 'Select Team']) }}
                  {{ Form::submit('Select',array('class'=>'form-control btn btn-success')) }}
                {!! Form::close() !!}
                @else
                  Bonus ${{ $data->bonus }}, {{ $data->parson }}, Cost ${{ $data->bonus*$data->parson }}
                @endif
              </td>
              <td><a target="_blank" href="{{ route('viewParticipant',$data->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i></a></td>
            </tr>
            @endforeach
          </table>
          <div class="text-center">{{ $games->links() }}</div>          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    
    <!-- /.content -->
  </div>
 @endsection
 @section('scripts')
  {!! Html::script('public/admin/plugins/input-mask/jquery.inputmask.js') !!}
  {!! Html::script('public/admin/bower_components/moment/min/moment.min.js') !!}
  {!! Html::script('public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}
  {!! Html::script('public/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}
  {!! Html::script('public/admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') !!}
  {!! Html::script('public/admin/plugins/timepicker/bootstrap-timepicker.min.js') !!}
  {!! Html::script('public/admin/plugins/iCheck/icheck.min.js') !!}
  <script>
    $('.timepicker').timepicker({
      showInputs: false
    })

  function confirmSubmit() {
        var msg;
        msg= "Are you sure delete?";
        var agree=confirm(msg);
        if (agree)
        return true ;
        else
        return false ;
      }
  </script>
@endsection