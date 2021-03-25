@extends('layout')
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li class="active">Notification</li>
            </ol>
        </div>
        <!--/breadcrums-->

        <div class="review-payment">
            <h1>Order Success. Please wait for confirmation to your email!</h1>
            <a href="{{URL::to('/')}}">Back to Home</a>
        </div>
        
    </div>
</section>
<!--/#cart_items-->

@endsection