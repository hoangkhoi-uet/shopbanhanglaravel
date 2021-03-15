@extends('layout')
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div>
        <!--/breadcrums-->

        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>
        <div class="table-responsive cart_info">
            <?php
                $content = Cart::content();
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Mô tả</td>
                        <td class="price">Giá</td>
                        <td class="quantity">số lượng</td>
                        <td class="total">Tổng</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $v_content)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ URL::to('public/uploads/product/'.$v_content->options->image) }}"
                                    style="height: 100px" alt="" /></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $v_content->name }}</a></h4>
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
                                    <input class="cart_quantity_input" type="text" name="quantity"
                                        value="{{$v_content->qty}}" autocomplete="off" size="2">
                                    {{-- <a class="cart_quantity_down" href=""> - </a> --}}
                                    <input class="cart_quantity_input" type="hidden" name="rowId_cart"
                                        value="{{$v_content->rowId}}">
                                    <input class="cart_quantity_input" type="submit" name="update_qty" value="Cập nhật">

                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{number_format($v_content->price * $v_content->qty)}} đ</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete"
                                href="{{URL::to('/delete-from-cart/'.$v_content->rowId)}}"><i
                                    class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach



                </tbody>
            </table>
        </div>

        <form action="{{URL::to('/order-place')}}" method="post">
            {{ csrf_field() }}
            <div class="payment-options">
                <h3>Chọn hình thức thanh toán</h2>
                    <span>
                        <label><input name="payment_option" value="1" type="checkbox"> ATM nội địa</label>
                    </span>
                    <span>
                        <label><input name="payment_option" value="2" type="checkbox"> Nhận hàng trả tiền</label>
                    </span>
                    <span>
                        <label><input name="payment_option" value="3" type="checkbox"> Paypal</label>
                    </span>
                    <input class="btn btn-primary" type="submit" name="send_order_place" value="Đặt hàng">

            </div>
        </form>

    </div>
</section>
<!--/#cart_items-->

@endsection