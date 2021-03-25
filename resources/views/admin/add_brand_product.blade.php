@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Brand Product
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
                        <form action="{{URL::to('/save-brand-product')}}" method="post" role="form">
                            {{ csrf_field() }}
                            <div class="form-group">
                            <label for="">Brand Name</label>
                            <input type="text" name="brand_product_name" class="form-control" id="" placeholder="Brand Name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Brand Description</label>
                            <textarea type="text" style="resize: none" name="brand_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Activated ?</label>
                            <select name="brand_product_status" class="form-control input-lg m-bot15">
                                <option value="0">Not Activate</option>
                                <option value="1">Activate</option>
                            </select>
                        </div>

                        <button type="submit" name="add_brand-product" class="btn btn-info">Add Brand</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
@endsection

