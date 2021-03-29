@extends('layout')
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/')}}">Home</a></li>
              <li class="active">Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php
                $content = Cart::content();
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Product Image</td>
                        <td class="description">Description</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $v_content)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ URL::to('public/uploads/product/'.$v_content->options->image) }}" style="height: 100px" alt="" /></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="{{ URL::to('/chi-tiet-san-pham/'.$v_content->id) }}">{{ $v_content->name }}</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($v_content->price)}} đ</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{URL::to('/update-quantity')}}" method="post">
                                    {{ csrf_field() }}
                                    {{-- <a class="cart_quantity_up" href=""> + </a> --}}
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{$v_content->qty}}" autocomplete="off" size="2">
                                    {{-- <a class="cart_quantity_down" href=""> - </a> --}}
                                    <input class="cart_quantity_input" type="hidden" name="rowId_cart" value="{{$v_content->rowId}}">
                                    <input class="cart_quantity_input" type="submit" name="update_qty" value="Update cart">

                                </form>                            
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{number_format($v_content->price * $v_content->qty)}} đ</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/delete-from-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    


                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->



<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">

            {{-- <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                            
                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                        
                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div> --}}

            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Total <span>{{Cart::subtotal()}} đ</span></li>
                        <li>Tax <span>{{Cart::tax()}} đ</span></li>
                        <li>Shipping cost <span>Free</span></li>
                        <li>Have to Pay <span>{{Cart::total()}} đ</span></li>
                    </ul>
                        {{-- <a class="btn btn-default update" href="">Update</a> --}}
                        <?php
                            $customer_id = Session::get('customer_id');	
                        ?>
                        @if ($customer_id)
                            <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Delivery</a>
                        @else
                            <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Delivery</a>
                        @endif
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

@endsection