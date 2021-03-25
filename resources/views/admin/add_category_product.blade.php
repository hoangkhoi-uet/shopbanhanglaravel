@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    New Category Product
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
                        <form action="{{URL::to('/save-category-product')}}" method="post" role="form">
                            {{ csrf_field() }}
                            <div class="form-group">
                            <label for="">Category Name</label>
                            <input type="text" name="category_product_name" class="form-control" id="" placeholder="Tên danh mục" required>
                        </div>
                        <div class="form-group">
                            <label for="">Category Description</label>
                            <textarea type="text" style="resize: none" name="category_product_desc" class="form-control" id="" placeholder="Mô tả danh mục" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Activated ?</label>
                            <select name="category_product_status" class="form-control input-lg m-bot15">
                                <option value="0">Not Activate</option>
                                <option value="1">Activate</option>
                            </select>
                        </div>

                        <button type="submit" name="add_category-product" class="btn btn-info">Add Category Product</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
@endsection

