@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Update Brand Product
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
                        <form action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="post" role="form">
                            {{ csrf_field() }}
                            <div class="form-group">
                            <label for="">Brand name</label>
                            <input type="text" value="{{ $edit_value->brand_name }}" name="brand_product_name" class="form-control" id="" placeholder="Tên thương hiệu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Brand Description</label>
                            <textarea type="text" style="resize: none" name="brand_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả thương hiệu">{{ $edit_value->brand_desc }}</textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="brand_product_status" class="form-control input-lg m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div> --}}

                        <button type="submit" name="add_brand-product" class="btn btn-info">Update Brand</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
@endsection

