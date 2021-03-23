@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
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
                    <form action="{{URL::to('/save-product')}}" method="post" role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="" placeholder="Tên danh mục" required>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_image" class="form-control" id="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Giá sản phẩm</label>
                            <input type="text" name="product_price" class="form-control" id="" placeholder="Giá sản phẩm" required>
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả sản phẩm</label>
                            <textarea type="text" style="resize: none" name="product_desc" class="form-control" id="" placeholder="Mô tả sản phẩm" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung sản phẩm</label>
                            <textarea type="text" style="resize: none" name="product_content" class="form-control" id="" placeholder="Nội dung sản phẩm" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control input-lg m-bot15">
                                @foreach ($cate_product as $key => $cate)
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Thương hiệu</label>
                            <select name="product_brand" class="form-control input-lg m-bot15">
                                @foreach ($brand_product as $key => $brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Hiển thị</label>
                            <select name="product_status" class="form-control input-lg m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>

                        <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
@endsection

