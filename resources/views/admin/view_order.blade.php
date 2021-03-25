@extends('admin_layout')
@section('admin_content')
{{-- <form action="{{URL::to('/send-mail')}}" method="post">
    {{ csrf_field() }}
    @foreach ($order_by_id as $data)
        <input type="hidden" name="somedata[]" value="{{ $data }}">
    @endforeach
    <input type="submit" value="fdsafdaadgsffadsfsdafsad">
</form> --}}
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Customer Information
        </div>

        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Phone</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$order_by_id[0]->customer_name}}</td>
                        <td>{{$order_by_id[0]->customer_phone}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<br>
{{-- delivery --}}

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Shipping information
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Recipient's name</th>
                        <th>Message</th>
                        <th>Receiving address</th>
                        <th>Phone</th>
                        <th>Order confirmation</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$order_by_id[0]->shipping_name}}</td>
                        <td>{{$order_by_id[0]->shipping_note}}</td>
                        <td>{{$order_by_id[0]->shipping_address}}</td>
                        <td>{{$order_by_id[0]->shipping_phone}}</td>
                        <td><a href="{{URL::to('/send-mail-confirm/'.$order_by_id[0]->order_id)}}"><i class="fa fa-2x fa-check" aria-hidden="true"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<br>


{{-- details --}}
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Order details
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Products</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total order amount (tax included)</th>

                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_by_id as $v_content)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$v_content->product_name}}</td>
                        <td>{{$v_content->product_sales_quantity}}</td>
                        <td>{{number_format($v_content->product_price)}} đ</td>
                        <td>{{$v_content->order_total}} đ</td>
                        {{-- <td>{{$order_by_id->}}</td> --}}
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>


@endsection