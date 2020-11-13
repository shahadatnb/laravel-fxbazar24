@extends('layouts.master')
@section('content')
<div class="content-wrapper">   

      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title">Order List</a></h3>
        </div>
        <div class="card-body">
         <table class="table">
                <tr>
                  <th>Order No</th>
                  <th>Product Name</th>
                  <th>Date</th>
                  <th>Price</th>
                  <th>PV</th>
                  <th>User Name</th>
                  <th>Mobile</th>
                  <th>Kuriar</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
                @foreach ($orders as $order)
                <tr>
                  <td>#{{ $order->id }}</td>
                  <td>{{ $order->myProduct->product_name }}</td>
                  <td>{{ $order->created_at->format('d M Y') }}</td>
                  <td>{{ $order->myProduct->price }}</td>
                  <td>{{ $order->myProduct->pv }}</td>
                  <td>{{ $order->userInfo->name }}</td>
                  <td>{{ $order->mobile }}</td>
                  <td>{{ $order->kuriar }}</td>
                  <td>{{ $order->address }}</td>
                  <td>
                    @if($order->confirm == 0)
                      <a href="{{url('/productDeleveryConfirm',$order->id)}}" class="btn btn-success btn-sm">Confirm</a>
                    @else
                      Delivered
                    @endif
                  </td>
                </tr>
                @endforeach
              </table>
          <div class="text-center">{{ $orders->links() }}</div>
        <!-- /.box-body -->
        <div class="card-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    
    <!-- /.content -->
  </div>
 @endsection