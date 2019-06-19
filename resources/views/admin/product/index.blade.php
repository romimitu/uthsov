@extends('admin.master.layout')

@section('content')
    <section class="content-header">
      <h1>Product Setup</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
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
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th class="">Sl</th>
                                        <th class="col-sm-3">Name</th>
                                        <th class="col-sm-2">Category</th>
                                        <th class="col-sm-1">Brand</th>
                                        <th class="col-sm-1">Color</th>
                                        <th class="col-sm-1">InStock</th>
                                        <th class="col-sm-2">Size(Price TK)</th>
                                        <th class="col-sm-1">image</th>
                                        <th class="col-sm-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="MainCatbody">
                                    @foreach($data as $index => $product)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->brand->name}}</td>
                                        <td>{{$product->color->name}}</td>
                                        <td>{{$product->in_stock}}</td>
                                        <td>
                                            @foreach($product->productDetail as $detail)
                                                <span class="label label-success"> {{$detail->size->name}} - {{number_format($detail->sales_price,0)}}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($product->image->count() > 0)
                                            <img src="/uploads/product/{{$product->image[0]->image}}" width="70px">
                                            @endif
                                        </td>
                                        <td>
                                            @can('product-edit')
                                            <a href="{{ url('/products/'.$product->id.'/edit') }}"><i class="fa fa-edit btn-primary btn btn-sm"></i></a>
                                            @endcan
                                            @can('product-delete')
                                            {!! Form::open([ 'method' => 'Delete', 'url' => ['/products', $product->id]]) !!}
                                            {!! Form::submit('Delete',['class'=>'btn-danger btn btn-sm']) !!}
                                            {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="/products/create" class="btn btn-sm btn-warning pull-right">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

