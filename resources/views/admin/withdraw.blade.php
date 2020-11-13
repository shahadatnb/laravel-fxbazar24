@extends('layouts.master')
@section('title','Withdraw')
@section('content')
<div class="content-wrapper">    

      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title">Withdraw Money</h3>
        </div>
        <!-- /.box-body -->
        <div class="card-footer">
          <p>Transaction List</p>
          <table class="table">
            <tr>
              <th>Date</th>
              <th>User ID</th>
              <th>User Name</th>
              <th>Amount</th>
              <th>Remark</th>
              <th>Action</th>
            </tr>
            @foreach ($transaction as $member)
            <tr>
              <td>{{ $member->created_at->format('d M Y h:i:s A') }}</td>
              <td>{{ $member->user_id }}</td>
              <td>{{ $member->userInfo->name }}</td>
              <td>{{ $member->payment }}</td>
              <td>{{ $member->remark }}</td>
              <td>@if($member->confirm == 0 )
                  <a onclick="return confirmSubmit();" href="{{ route('withdrawConfirm', $member->id ) }}" class="btn btn-primary btn-sm">Get Confirm</a>
                  @else
                  Comfirmed
                  @endif
                </td>
            </tr>
            @endforeach
          </table>
          <div class="text-center">{{ $transaction->links() }}</div>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    
    <!-- /.content -->
  </div>
 @endsection

@section('scripts')
  <script>
    function confirmSubmit() {
      var msg;
      msg= "Are you sure? Withdraw Confirm.";
      var agree=confirm(msg);
      if (agree)
      return true ;
      else
      return false ;
    }
  </script>
@endsection