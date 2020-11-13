@extends('layouts.master')
@section('title','All Members')
@section('content')
<div class="content-wrapper">   

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Member List</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6"><input type="text" class="form-control" id="userID" placeholder="User ID" name="id"></div>
            <div class="col-md-6"><button onclick="" class="btn btn-primary" id="go">GO</button></div>
          </div>         
          
          <table class="table">
            <tr>
              <th>ID</th>
              {{-- <th>Type</th> --}}
              <th>Member Name</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>R. ID</th>
              <th>P. ID</th>
              <th>J. Date</th>
            </tr>
            @foreach ($members as $member)
            <tr>
              <td><a href="{{ route('profileView',$member->id) }}" target="_blank">{{ $member->id }}</a></td>
              {{-- <td>
                @if($member->premium == 1)
                  <span class="label label-info">Premium</span>
                @elseif($member->premium == 2)
                  <span class="label label-success">Standrad</span>
                  <!-- <a href="{{url('/getpremium',$member->id)}}" class="btn btn-success btn-xs">Apprve</a> -->
                @endif
              </td> --}}
              <td>{{ $member->name }}</td>
              <td>{{ $member->email }}</td>
              <td>{{ $member->mobile }}</td>
              <td>{{ $member->referralId }}</td>
              <td>{{ $member->placementId }}</td>
              <td>{{ $member->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
          </table>
          <div class="text-center">{{ $members->links() }}</div>
        <!-- /.box-body -->
        <div class="card-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    
    <!-- /.content -->
  </div>
</div>
 @endsection
    @section('scripts')
      <script>
        $('#go').click(function(){
          var userID = $('#userID').val();
          location.href = '{{ url('/profileView/') }}/'+userID;
          console.log(userID);
        });
      </script>
    @endsection