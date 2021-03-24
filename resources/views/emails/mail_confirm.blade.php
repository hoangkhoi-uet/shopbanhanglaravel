<!DOCTYPE html>
<html>
<head>
    <title>HK SHOP</title>
</head>
<body>
    {{-- <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p> --}}
   {{-- <h1>{{$name}}</h1> --}}
    <h2>Order Success</h2>
    <p>Your order id is: {{ $details[0]->order_id }}</p>
    <table>
        <thead>
            <tr>
                <th>Products</th>
                <th>Quantity</th>
                <th>Unit price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $v_content)
            <tr>
                <td>{{$v_content->product_name}}</td>
                <td>{{$v_content->product_sales_quantity}}</td>
                <td>{{$v_content->product_price}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p>Total order amount {{$details[0]->order_total}} đ</p>
    <p>Thank you!</p>
</body>
</html>