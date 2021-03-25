@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Edit Product
            </header>
            <div class="panel-body">
                <?php
                    $message = Session::get('message');
                    if($message) {
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message', null);
                    }
                ?>
                <div class="position-center">
                    @foreach ($edit_product as $key => $pro)
                    <form action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" role="form"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Product name</label>
                            <input type="text" name="product_name" class="form-control" id=""
                                placeholder="Tên danh mục" value="{{ $pro->product_name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="product_image" class="form-control" id="">
                            <img src="{{URL::to('public/uploads/product/'. $pro->product_image )}}" height="100px"
                                width="100px">
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" name="product_price" class="form-control" id=""
                                placeholder="Giá sản phẩm" value="{{ $pro->product_price }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product description</label>
                            <textarea type="text" style="resize: none" name="product_desc" class="form-control"
                                id="exampleInputPassword1"
                                placeholder="Mô tả sản phẩm">{{ $pro->product_desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product content</label>
                            <textarea type="text" style="resize: none" name="product_content" class="form-control"
                                id="exampleInputPassword1"
                                placeholder="Nội dung sản phẩm">{{ $pro->product_content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category</label>
                            <select name="product_cate" class="form-control input-lg m-bot15">
                                @foreach ($cate_product as $key => $cate)
                                @if($cate->category_id == $pro->category_id)
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @else
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Brand</label>
                            <select name="product_brand" class="form-control input-lg m-bot15">
                                @foreach ($brand_product as $key => $brand)
                                @if($brand->brand_id == $pro->brand_id)
                                    <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @else
                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Activated?</label>
                            <select name="product_status" class="form-control input-lg m-bot15">
                                @if ($pro->product_status=="0")
                                    <option value="0">Not activate</option>
                                    <option value="1">Activate</option>
                                @else
                                    <option value="1">Activate</option>
                                    <option value="0">Not activate</option>
                                @endif

                            </select>
                        </div>

                        <button type="submit" name="add_product" class="btn btn-info">Update Product</button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>

    </div>
    @endsection