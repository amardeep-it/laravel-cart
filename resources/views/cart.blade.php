@extends('layouts.layout')
@section('content')
    <h1>Shopping Cart</h1>
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
    <div class="col-sm-10 text-right">
        <button class="btn btn-primary checkout-button">Checkout & Pay</button>
    </div>

    <div class="col-sm-10">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Cart Total: {{Cart::total()}}</h3></div>
            <div class="panel-body">
                @foreach(Cart::content() as $cartItem)
                    <?php
                    $product = ProductHelper::getProductDetails($sku = $cartItem->id);
                    ?>
                    <div class="container product-container">
                        <div class="col-sm-3 product-image">
                            <a><img src="{{ asset('products/' . $product['imageURL']) }}" width="260"></a>
                        </div>
                        <div class="col-sm-5 product-desc"><h4>{!! $product['name'] !!}</h4>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <form class="form-group" action="{{ route('cart-update') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$cartItem->rowId}}">
                                <div class="col-sm-6">
                                    <label for="selectQty">Selected Quantity: </label>
                                    <select class="form-control" id="selectQty" name="selectQty">
                                        @for($i = 1; $i <= (($cartItem->qty < 5)?5:($cartItem->qty+10)); $i++)
                                            <option
                                                value="{{$i}}"{{($cartItem->qty == $i) ? 'selected="selected"':''}}>{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-primary">Update Item Quantity</button>
                                </div>
                            </form>
                            <p>&nbsp;</p>
                            <form class="form-group" action="{{ route('cart-item-delete') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$cartItem->rowId}}">
                                <div class="text-right col-sm-12 mt-sm-4">
                                    <button class="btn btn-primary">Remove Item</button>
                                </div>
                            </form>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </div>
                        <div class="col-sm-3 container">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h4>Unit Price:</h4>
                                </div>
                                <div class="col-sm-3 text-right">
                                    <h4><i class="fa fa-rupee"
                                           style="font-size:24px;color: #718096">{{$product['price']}}</i></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <h4>Sub Total:</h4>
                                </div>
                                <div class="col-sm-3 text-right">
                                    <h4><i class="fa fa-rupee"
                                           style="font-size:24px;color: #718096">{{number_format($cartItem->qty * $product['price'], 2)}}</i>
                                    </h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <h3>Item Discount:</h3>
                                </div>
                                <div class="col-sm-3 text-right">
                                    <h3><i class="fa "
                                           style="font-size:24px;color: #718096">{{number_format($cartItem->discountRate, 2)}}%</i>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                    </div>
                @endforeach
                <div class="container text-right">
                    <div class="row col-sm-11">
                        <div class="col-sm-8"><h3>Cart Total:</h3></div>
                        <div><h3>{{Cart::priceTotal()}}</h3></div>
                    </div>
                    <div class="row col-sm-11">
                        <div class="col-sm-8"><h3>Discounts:</h3></div>
                        <div><h3>{{Cart::discount()}}</h3></div>
                    </div>
                    <div class="row col-sm-11">
                        <div class="col-sm-8"><h3>Tax:</h3></div>
                        <div><h3>{{Cart::tax()}}</h3></div>
                    </div>
                    <div class="row col-sm-11">
                        <div class="col-sm-8"><h3>Grand Total</h3></div>
                        <div><h3>{{Cart::total()}}</h3></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-sm-10 text-right">
        <button class="btn btn-primary checkout-button">Checkout & Pay</button>
    </div>
@endsection
