@foreach ($product as $item)
    <div class="col-lg-4 col-md-6 col-sm-6">
    <!--  Single Grid product Start -->
    <div class="single-grid-product mb-40">
        <div class="product-image">
            <div class="product-label">
                <span>-{{$item->pro_sale}}%</span>
            </div>
            <a href="{{route('client.single-product', $item->id)}}">
                @if($item->imgpro != "")
                @php
                    $images = explode('|', $item->imgpro->add_avatar)
                @endphp  
                <img src="{{asset("images/product/$images[0]")}}" class="img-fluid" alt="">
                @empty(!$images[1])
                    <img src="{{asset("images/product/$images[1]")}}" class="img-fluid" alt="">
                @endempty
                
                @endif
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
            <h3 class="title"> <a href="single-product.html">{{$item->pro_name}}</a></h3>
            <p class="product-price"><span class="discounted-price">{{$item->into_price}} đ</span> <span class="main-price discounted">{{$item->pro_price}} đ</span></p>
        </div>
    </div>
    <!--  Single Grid product End -->
</div>

@endforeach
{{-- {{$product->links("pagination::bootstrap-4")}} --}}