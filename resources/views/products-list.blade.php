@extends('layouts.layout')
@section('content')
    <h1>Products</h1>
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            {{ implode('', $errors->all(':message')) }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    @foreach(ProductHelper::getProducts() as $sku => $product)
        <div class="container product-container">
            <div class="col-sm-3 product-image">
                <a><img src="{{ asset('products/' . $product['imageURL']) }}" width="260"></a>
            </div>
            <div class="col-sm-5 product-desc"><h4>{!! $product['name'] !!}</h4>{!! $product['description'] !!}</div>
            <div class="col-sm-3 product-actions">
                <div>
                    <div class="col-sm-8">
                        <h3>Selling Price:</h3>
                    </div>
                    <div class="col-sm-4 text-right">
                        <h3><i class="fa fa-rupee" style="font-size:30px;color: #718096">{{$product['price']}}</i></h3>
                    </div>
                </div>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <form class="form-group" action="{{ route('cart-add') }}" method="post">
                    @csrf
                    <input type="hidden" name="productId" value="{{$product['id']}}">
                    <input type="hidden" name="sku" value="{{$sku}}">
                    <div>
                        <label for="selectQty">Select Quantity: </label>
                        <select class="form-control" id="selectQty" name="selectQty">
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-primary button-add-cart">Add to Cart</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    <button class="btn btn-primary">Test Me</button>
@endsection
