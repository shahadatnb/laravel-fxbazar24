@extends('layouts.master')
@section('content')
@section('title','Youtube')
<div class="content-wrapper">
      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-success with-border">
          <strong class="card-title text-light">Balance: {{$youtubeEarn}}</strong>
        </div>
        <div class="card-body">
            @foreach($ptcs as $ptc)
            <a id="p{{$ptc}}" target="_blank" class="btn btn-danger" href="{{url('youtubeClick',$ptc)}}"><i class="fa fa-youtube"></i>&nbsp; Click</a>
            @endforeach
        </div>
        <!-- /.box-body -->
        <div class="card-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    
    <!-- /.content -->
  </div>
 @endsection
 @section('scripts')
 <script>
  $( "a" ).click(function() {
    //console.log(this.id);
    $( "#"+this.id ).remove();
  });
 </script>
@endsection