@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Update Category Product
                </header>
                <div class="panel-body">
                    <?php
                        $message = Session::get('message');
                        if($message) {
                            echo '<span class="text-alert">'.$message.'</span>';
                            Session::put('message', null);
                        }
                    ?>
                    @foreach ($edit_category_product as $key => $edit_value)
                    <div class="position-center">
                        <form action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post" role="form">
                            {{ csrf_field() }}
                            <div class="form-group">
                            <label for="">Category name</label>
                            <input type="text" value="{{ $edit_value->category_name }}" name="category_product_name" class="form-control" id="" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category Description</label>
                            <textarea type="text" style="resize: none" name="category_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{ $edit_value->category_desc }}</textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="category_product_status" class="form-control input-lg m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div> --}}

                        <button type="submit" name="add_category-product" class="btn btn-info">Update Category</button>
                    </form>
                    </div>

                    @endforeach


                </div>
            </section>

    </div>
@endsection

