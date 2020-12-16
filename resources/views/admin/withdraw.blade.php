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
              <th>Username</th>
              <th>Name</th>
              <th>Amount</th>
              <th>Remark</th>
              <th>Action</th>
            </tr>
            @foreach ($transaction as $item)
            <tr>
              <td>{{ $item->created_at->format('d M Y h:i:s A') }}</td>
              <td>{{ $item->userInfo->username }}</td>
              <td>{{ $item->userInfo->name }}</td>
              <td>{{ $item->payment }}</td>
              <td>{{ $item->remark }}</td>
              <td>@if($item->confirm == 0 )
                  <a onclick="return confirmSubmit();" href="{{ route('withdrawConfirm', $item->id ) }}" class="btn btn-primary btn-sm">Get Confirm</a>
                  <a onclick="return confirmSubmit();" href="{{ route('withdrawCancel', $item->id ) }}" class="btn btn-danger btn-sm">Cancel</a>
                  @elseif($item->confirm == 2)
                    Cancel
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