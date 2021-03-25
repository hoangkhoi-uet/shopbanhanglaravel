@extends('layout')
@section('content')
@foreach ($product_details as $key => $pro)
    

<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{URL::to('/public/uploads/product/'.$pro->product_image)}}" alt="" />
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            
              <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                      <a href=""><img style="width: 65px; height: auto" src="https://gamek.mediacdn.vn/zoom/220_160/133514250583805952/2021/2/7/2000-gaming-pc-build-featured-image-1024x768-16126965104021353307923.jpg" alt=""></a>
                      <a href=""><img style="width: 65px; height: auto" src="https://gamek.mediacdn.vn/zoom/220_160/133514250583805952/2021/2/7/2000-gaming-pc-build-featured-image-1024x768-16126965104021353307923.jpg" alt=""></a>
                      <a href=""><img style="width: 65px; height: auto"src="https://gamek.mediacdn.vn/zoom/220_160/133514250583805952/2021/2/7/2000-gaming-pc-build-featured-image-1024x768-16126965104021353307923.jpg" alt=""></a>
                    </div>

                    
                </div>

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$pro->product_name}}</h2>
            <p>ID: {{$pro->product_id}}</p>
            <img src="images/product-details/rating.png" alt="" />
            <form action="{{URL::to('/save-cart')}}" method="post">
                {{ csrf_field() }}
                <span>
                    <span>{{number_format($pro->product_price)}} đ</span>
                    <label>Quantity:</label>
                    <input name="qty" type="number" min="1" value="1" />
                    <input name="productIdHidden"type="hidden" value="{{$pro->product_id}}" />
                    <button type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Add to Cart
                    </button>
                </span>
            </form>
            
            <p><b>Status:</b> Stocking</p>
            <p><b>Formality:</b> New full box</p>
            <p><b>Category:</b> {{ $pro->category_name }}</p>
            <p><b>Brand:</b> {{ $pro->brand_name }}</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->


<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">Product Details</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Company Information</a></li>
            <li><a href="#reviews" data-toggle="tab">Review</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details" >
            {{-- <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery1.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            <p><b>Content:</b> {{ $pro->product_content }}</p>

        </div>
        
        <div class="tab-pane fade" id="companyprofile" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery1.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        

        
        <div class="tab-pane fade" id="reviews" >
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>Duc Tran</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2020</a></li>
                </ul>
                <p>Very good</p>
                <p><b>Write review!</b></p>
                
                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name"/>
                        <input type="email" placeholder="Email Address"/>
                    </span>
                    <textarea name="" ></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Rate
                    </button>
                </form>
            </div>
        </div>
        
    </div>
</div><!--/category-tab-->
@endforeach


<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Related Products</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">	

                @foreach ($related_product as $key => $rel)
                <a href="{{ URL::to('/chi-tiet-san-pham/'.$pro->product_id) }}">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ URL::to('public/uploads/product/'.$rel->product_image) }}" alt="" />
                                    <h2>{{number_format($rel->product_price)}} đ</h2>
                                    <p>{{$rel->product_name}}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach

            </div> 


        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>			
    </div>
</div><!--/recommended_items-->


@endsection