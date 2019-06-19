@extends('frontend.layouts.layout')

@section('content')


<section class="hero hero-page gray-bg padding-small">
  <div class="container">
    <div class="row d-flex">
      <div class="col-lg-9 order-2 order-lg-1">
        <h1>Your orders</h1><p class="lead">Your orders in one place.</p>
      </div>
      <div class="col-lg-3 text-right order-1 order-lg-2">
        <ul class="breadcrumb justify-content-lg-end">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Orders</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="padding-small">
  <div class="container">
    <div class="row">
      <!-- Customer Sidebar-->
      @include('frontend.layouts.profile-sidebar')
      <div class="col-lg-8 col-xl-9 pl-lg-3">
        @if (Session::has('message'))
            <div class="text-center alert-danger">{{ Session::get('message') }}</div>
        @endif
        
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <table class="table table-hover table-responsive-md">
          <thead>
            <tr>
                <th>#</th>
                <th>Invoice No</th>
                <th>Total Amount</th>
                <th>Shipping Fee</th>
                <th>Grand Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
                @foreach($data as $product)
                {!! Form::open(['url' => ['/order-list', $product->id], 'method' =>'PATCH', 'class'=>'form-horizontal','enctype'=>"multipart/form-data"]) !!}
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$product->invoice_no}}</td>
                    <td>{{$product->total_amount}}</td>
                    <td>{{$product->shipping_fee}}</td>
                    <td>{{$product->total_amount + $product->shipping_fee}}</td>
                    <td>{{$product->operational_status}}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{url('order', $product->id)}}">View</a>
                        @if($product->operational_status != 'cancel')
                        {!! Form::submit('Cancel ', ['class'=> 'btn btn-sm btn-danger']) !!}
                        @endif
                    </td>
                </tr>
                {!! Form::close() !!}
                @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

@endsection