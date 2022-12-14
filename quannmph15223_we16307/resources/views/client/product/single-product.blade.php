@extends('home')

@section('title', "list product")

@section('slider')
    @include('layouts.client.name-page')
@endsection

@section('product')
<div class="single-product-section section pt-60 pt-lg-40 pt-md-30 pt-sm-20 pt-xs-25 pb-100 pb-lg-80 pb-md-70 pb-sm-30 pb-xs-20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="shop-area">
                    <div class="row">
                        <div class="col-md-6 pr-35 pr-lg-15 pr-md-15 pr-sm-15 pr-xs-15">
                            <!-- Product Details Left -->
                            <div class="product-details-left">
                                <div class="product-details-images">
                                    @if($product->imgpro != "")
                                        @php
                                            $images = explode('|', $product->imgpro->add_avatar)
                                        @endphp   
                                        @foreach($images as $image) 
                                    <div class="lg-image">
                                        <img src="{{asset("images/product/$image")}}" alt="">
                                        <a href="{{asset("images/product/$image")}}" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-expand"></i></a>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="product-details-thumbs">
                                    @if($product->imgpro != "")
                                        @php
                                            $images = explode('|', $product->imgpro->add_avatar)
                                        @endphp   
                                        @foreach($images as $image) 
                                    
                                    <div class="sm-image"><img src="{{asset("images/product/$image")}}" alt="product image thumb"></div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <!--Product Details Left -->
                        </div>
                        <div class="col-md-6">
                            <!--Product Details Content Start-->
                            <div class="product-details-content">
                                <!--Product Nav Start-->
                                <div class="product-nav">
                                    <a href="#"><i class="fa fa-angle-left"></i></a>
                                    <a href="#"><i class="fa fa-angle-right"></i></a>
                                </div>
                                <!--Product Nav End-->
                                <h2>{{$product->pro_name}}</h2>
                                <div class="single-product-reviews">
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star-o"></i>
                                    <a class="review-link" href="#">(1 customer review)</a>
                                </div>
                                <div class="single-product-price">
                                    <span class="price new-price">{{$product->into_price}} ??  </span>
                                    <span style="margin-left: 15px" class="regular-price">  {{$product->pro_price}} ??</span>
                                </div>
                                <div class="product-description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus</p>
                                </div>
                                <div class="single-product-quantity">
                                    {{-- <form class="add-quantity" action="{{route('client.addcart', $product->id)}}" method="POST"> --}}
                                        <form class="add-quantity" action="{{route('client.cart.save-cart', $product->id)}}" method="POST">
                                        <div class="product-variants">
                                            @foreach($attributes as $attribute)
                                            
                                            <div class="product-variants-item">
                                                <span class="control-label">{{$attribute->name}}</span>
                                                <select name="attribute[]">
                                                    @php
                                                        $abc = $attribute_el->where('parent_id' , '=' , $attribute->id)->get();   
                                                        //  dd($attribute_el);
                                                    @endphp
                                                    @foreach($abc as $item)
                                                        @foreach($product->attr_pro as $attr)
                                                            @if($attr->attribute->id == $item->id)
                                                                <option value="{{$item->name}}">{{$item->name}}</option>
                
                                                            @endif
                                                        @endforeach 
                                                        
                                                    @endforeach
                                                    
                                                </select>
                                                <div class="nice-select" tabindex="0"><span class="current">{{$attribute->name}}</span>
                                                    <ul class="list">
                                                        @foreach($abc as $item)
                                                            @foreach($product->attr_pro as $attr)
                                                                @if($attr->attribute->id == $item->id)
                                                                <li data-value="{{$item->name}}" class="option">{{$item->name}}</li>
                    
                                                                @endif
                                                            @endforeach 
                                                            
                                                           
                                                        @endforeach
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="product-variants-item">
                                                <span class="control-label">Color</span>
                                                <ul class="procuct-color">
                                                    <li><a href="#"><span class="color"></span></a></li>
                                                    <li class="active"><a href="#"><span class="color"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-quantity">
                                            <input name="quantity" value="1" type="number">
                                        </div>
                                        <div class="add-to-link">
                                            @csrf
                                            <button class="btn"><i class="fa fa-shopping-bag"></i> add to cart</button>
                                            @method('POST')
                                        </div>
                                    </form>
                                </div>
                                <div class="wishlist-compare-btn">
                                    <a href="#" class="wishlist-btn">Add to Wishlist</a>
                                    <a href="#" class="add-compare">Compare</a>
                                </div>
                                <div class="product-meta">
                                    <span class="posted-in">
                                        Categories: 
                                        <a href="#">Accessories</a>,
                                        <a href="#">Electronics</a>
                                    </span>
                                </div>
                                <div class="single-product-sharing">
                                    <h3>Share this product</h3>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Product Details Content End-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single Product Section End -->

<!--Product Description Review Section Start-->
<div class="product-description-review-section section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-review-tab section">
                    <!--Review And Description Tab Menu Start-->
                    <ul class="nav dec-and-review-menu">
                        <li>
                            <a class="active" data-toggle="tab" href="#description">Description</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#reviews">Reviews (1)</a>
                        </li>
                    </ul>
                    <!--Review And Description Tab Menu End-->
                    <!--Review And Description Tab Content Start-->
                    <div class="tab-content product-review-content-tab" id="myTabContent-4">
                        <div class="tab-pane fade active show" id="description">
                            <div class="single-product-description">

                               
                                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                <p>Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.</p> --}}
                            </div>
                            <script>
                                var description = @json($product->pro_description) ;
                                $('.single-product-description').html(description);
                            </script>
                        </div>
                        <div class="tab-pane fade" id="reviews">
                            <div class="review-page-comment">
                                <h2>1 review for Sit voluptatem</h2>
                                <ul>
                                    <li>
                                        <div class="product-comment">
                                            <img src="assets/images/icons/author.png" alt="">
                                            <div class="product-comment-content">
                                                <div class="product-reviews">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p class="meta">
                                                    <strong>admin</strong> - <span>November 22, 2018</span>
                                                    <div class="description">
                                                        <p>Good Product</p>
                                                    </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="review-form-wrapper">
                                    <div class="review-form">
                                        <span class="comment-reply-title">Add a review </span>
                                        <form action="#">
                                            <p class="comment-notes">
                                                <span id="email-notes">Your email address will not be published.</span>
                                                Required fields are marked
                                                <span class="required">*</span>
                                            </p>
                                            <div class="comment-form-rating">
                                                <label>Your rating</label>
                                                <div class="rating">
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <div class="input-element">
                                                <div class="comment-form-comment">
                                                    <label>Comment</label>
                                                    <textarea name="message" cols="40" rows="8"></textarea>
                                                </div>
                                                <div class="review-comment-form-author">
                                                    <label>Name </label>
                                                    <input required="required" type="text">
                                                </div>
                                                <div class="review-comment-form-email">
                                                    <label>Email </label>
                                                    <input required="required" type="text">
                                                </div>
                                                <div class="comment-submit">
                                                    <button type="submit" class="form-button">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Review And Description Tab Content End-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--Product Description Review Section Start-->

<!--Product section start-->
<div class="product-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-55 pb-lg-35 pb-md-25 pb-sm-15 pb-xs-5">
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="section-title text-center mb-50 mb-xs-20">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
        <div class="row product-slider">
            <div class="col">
                <!--  Single Grid product Start -->
                <div class="single-grid-product mb-40">
                    <div class="product-image">
                        <div class="product-label">
                            <span>-20%</span>
                        </div>
                        <a href="single-product.html">
                            <img src="assets/images/product/product-1.jpg" class="img-fluid" alt="">
                            <img src="assets/images/product/product-2.jpg" class="img-fluid" alt="">
                        </a>

                        <div class="product-action">
                            <ul>
                                <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="title"> <a href="single-product.html">Stylish Design Chair</a></h3>
                        <p class="product-price"><span class="discounted-price">$190.00</span> <span class="main-price discounted">$230.00</span></p>
                    </div>
                </div>
                <!--  Single Grid product End -->
            </div>

            <div class="col">
                <!--  Single Grid product Start -->
                <div class="single-grid-product mb-40">
                    <div class="product-image">
                        <div class="product-label">
                            <span>-20%</span>
                        </div>
                        <a href="single-product.html">
                            <img src="assets/images/product/product-2.jpg" class="img-fluid" alt="">
                            <img src="assets/images/product/product-3.jpg" class="img-fluid" alt="">
                        </a>

                        <div class="product-action">
                            <ul>
                                <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="title"> <a href="single-product.html">Miro Dining Table</a></h3>
                        <p class="product-price"><span class="discounted-price">$113.00</span> <span class="main-price discounted">$180.00</span></p>
                    </div>
                </div>
                <!--  Single Grid product End -->
            </div>

            <div class="col">
                <!--  Single Grid product Start -->
                <div class="single-grid-product mb-40">
                    <div class="product-image">
                        <div class="product-label">
                            <span>-20%</span>
                        </div>
                        <a href="single-product.html">
                            <img src="assets/images/product/product-4.jpg" class="img-fluid" alt="">
                            <img src="assets/images/product/product-1.jpg" class="img-fluid" alt="">
                        </a>

                        <div class="product-action">
                            <ul>
                                <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="title"> <a href="single-product.html">Janus Table Lamp</a></h3>
                        <p class="product-price"><span class="discounted-price">$86.00</span> <span class="main-price discounted">$150.00</span></p>
                    </div>
                </div>
                <!--  Single Grid product End -->
            </div>

            <div class="col">
                <!--  Single Grid product Start -->
                <div class="single-grid-product mb-40">
                    <div class="product-image">
                        <a href="single-product.html">
                            <img src="assets/images/product/product-3.jpg" class="img-fluid" alt="">
                        </a>

                        <div class="product-action">
                            <ul>
                                <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="title"> <a href="single-product.html">Discus Floor and Table</a></h3>
                        <p class="product-price"><span class="discounted-price">$290.00</span> <span class="main-price discounted">$330.00</span></p>
                    </div>
                </div>
                <!--  Single Grid product End -->
            </div>

            <div class="col">
                <!--  Single Grid product Start -->
                <div class="single-grid-product mb-40">
                    <div class="product-image">
                        <div class="product-label">
                            <span class="sale">Sale</span>
                        </div>
                        <a href="single-product.html">
                            <img src="assets/images/product/product-5.jpg" class="img-fluid" alt="">
                            <img src="assets/images/product/product-2.jpg" class="img-fluid" alt="">
                        </a>

                        <div class="product-action">
                            <ul>
                                <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="title"> <a href="single-product.html">Sled Mini Sideboard</a></h3>
                        <p class="product-price"><span class="discounted-price">$90.00</span></p>
                    </div>
                </div>
                <!--  Single Grid product End -->
            </div>

            <div class="col">
                <!--  Single Grid product Start -->
                <div class="single-grid-product mb-40">
                    <div class="product-image">
                        <div class="product-label">
                            <span class="sale">New</span>
                        </div>
                        <a href="single-product.html">
                            <img src="assets/images/product/product-6.jpg" class="img-fluid" alt="">
                            <img src="assets/images/product/product-4.jpg" class="img-fluid" alt="">
                        </a>

                        <div class="product-action">
                            <ul>
                                <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="title"> <a href="single-product.html">Mega 2 Seater Sofa</a></h3>
                        <p class="product-price"><span class="discounted-price">$390.00</span> <span class="main-price discounted">$470.00</span></p>
                    </div>
                </div>
                <!--  Single Grid product End -->
            </div>

            <div class="col">
                <!--  Single Grid product Start -->
                <div class="single-grid-product mb-40">
                    <div class="product-image">
                        <div class="product-label">
                            <span>-20%</span>
                        </div>
                        <a href="single-product.html">
                            <img src="assets/images/product/product-7.jpg" class="img-fluid" alt="">
                        </a>

                        <div class="product-action">
                            <ul>
                                <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="title"> <a href="single-product.html">Sentei Pruning Shears</a></h3>
                        <p class="product-price"><span class="discounted-price">$65.00</span> </p>
                    </div>
                </div>
                <!--  Single Grid product End -->
            </div>

            <div class="col">
                <!--  Single Grid product Start -->
                <div class="single-grid-product mb-40">
                    <div class="product-image">
                        <div class="product-label">
                            <span>-29%</span>
                        </div>
                        <a href="single-product.html">
                            <img src="assets/images/product/product-8.jpg" class="img-fluid" alt="">
                            <img src="assets/images/product/product-2.jpg" class="img-fluid" alt="">
                        </a>

                        <div class="product-action">
                            <ul>
                                <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="title"> <a href="single-product.html">Affordances Side Table</a></h3>
                        <p class="product-price"><span class="discounted-price">$170.00</span> <span class="main-price discounted">$280.00</span></p>
                    </div>
                </div>
                <!--  Single Grid product End -->
            </div>

            <div class="col">
                <!--  Single Grid product Start -->
                <div class="single-grid-product mb-40">
                    <div class="product-image">
                        <a href="single-product.html">
                            <img src="assets/images/product/product-9.jpg" class="img-fluid" alt="">
                            <img src="assets/images/product/product-10.jpg" class="img-fluid" alt="">
                        </a>

                        <div class="product-action">
                            <ul>
                                <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="title"> <a href="single-product.html">Normal Dining chair</a></h3>
                        <p class="product-price"><span class="discounted-price">$130.00</span> </p>
                    </div>
                </div>
                <!--  Single Grid product End -->
            </div>

            <div class="col">
                <!--  Single Grid product Start -->
                <div class="single-grid-product mb-40">
                    <div class="product-image">
                        <div class="product-label">
                            <span class="sale">Sale</span>
                        </div>
                        <a href="single-product.html">
                            <img src="assets/images/product/product-11.jpg" class="img-fluid" alt="">
                            <img src="assets/images/product/product-12.jpg" class="img-fluid" alt="">
                        </a>

                        <div class="product-action">
                            <ul>
                                <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="title"> <a href="single-product.html">Tripod lampshade</a></h3>
                        <p class="product-price"><span class="discounted-price">$210.00</span> <span class="main-price discounted">$240.00</span></p>
                    </div>
                </div>
                <!--  Single Grid product End -->
            </div>

            <div class="col">
                <!--  Single Grid product Start -->
                <div class="single-grid-product mb-40">
                    <div class="product-image">
                        <a href="single-product.html">
                            <img src="assets/images/product/product-10.jpg" class="img-fluid" alt="">
                            <img src="assets/images/product/product-13.jpg" class="img-fluid" alt="">
                        </a>

                        <div class="product-action">
                            <ul>
                                <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="title"> <a href="single-product.html">Hot Design Table</a></h3>
                        <p class="product-price"><span class="discounted-price">$250.00</span> <span class="main-price discounted">$280.00</span></p>
                    </div>
                </div>
                <!--  Single Grid product End -->
            </div>

            <div class="col">
                <!--  Single Grid product Start -->
                <div class="single-grid-product mb-40">
                    <div class="product-image">
                        <a href="single-product.html">
                            <img src="assets/images/product/product-14.jpg" class="img-fluid" alt="">
                        </a>

                        <div class="product-action">
                            <ul>
                                <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="title"> <a href="single-product.html">Outdoor Lock Chair</a></h3>
                        <p class="product-price"><span class="discounted-price">$180.00</span></p>
                    </div>
                </div>
                <!--  Single Grid product End -->
            </div>

            <div class="col">
                <!--  Single Grid product Start -->
                <div class="single-grid-product mb-40">
                    <div class="product-image">
                        <div class="product-label">
                            <span class="sale">New</span>
                        </div>
                        <a href="single-product.html">
                            <img src="assets/images/product/product-14.jpg" class="img-fluid" alt="">
                            <img src="assets/images/product/product-13.jpg" class="img-fluid" alt="">
                        </a>

                        <div class="product-action">
                            <ul>
                                <li><a href="cart.html"><i class="fa fa-cart-plus"></i></a></li>
                                <li><a href="#quick-view-modal-container" data-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                <li><a href="wishlit.html"><i class="fa fa-heart-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="title"> <a href="single-product.html">Classic Chair</a></h3>
                        <p class="product-price"><span class="discounted-price">$60.00</span> </p>
                    </div>
                </div>
                <!--  Single Grid product End -->
            </div>
        </div>

    </div>
</div>
<!--Product section end-->
<!-- Newsletter Section Start -->
<div class="newsletter-section section bg-gray-two pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-95 pb-lg-75 pb-md-65 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="newsletter-content">
                    <h2>Subscribe Our Newsletter</h2>
                    <p>Subscribe Today for free and save 10% on your first purchase.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="newsletter-wrap">
                    <div class="newsletter-form">
                        <form id="mc-form" class="mc-form">
                            <input type="email" placeholder="Enter Your Email Address Here..." required>
                            <button type="submit" value="submit">SUBSCRIBE!</button>
                        </form>

                    </div>
                    <!-- mailchimp-alerts Start -->
                    <div class="mailchimp-alerts">
                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                    </div>
                    <!-- mailchimp-alerts end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('testimonial')
    @include('layouts.client.testimonial')
@endsection