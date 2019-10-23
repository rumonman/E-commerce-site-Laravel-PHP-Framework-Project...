@extends('layouts.frontend')
@section('content')
<div class="page-info-section page-info">
    <div class="container">
        <div class="site-breadcrumb">
            <a href="{{url('/')}}">Home</a> /
            <a href="#"> Product</a> /
            <span>{{$single_product_info->product_name}}</span>
        </div>
        <img src="img/page-info-art.png" alt="" class="page-info-art">
    </div>
</div>

<div class="page-area product-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <figure>
                    <img class="product-big-img" src="{{asset('upload/photos/main')}}/{{$single_product_info->product_image}}" alt="">
                </figure>
                <div class="product-thumbs">
                    <div class="product-thumbs-track">
                        <div class="pt" data-imgbigurl="{{asset('upload/photos/left')}}/{{$single_product_info->product_left_image}}"><img src="{{asset('upload/photos/left')}}/{{$single_product_info->product_left_image}}" alt=""></div>
                        <div class="pt" data-imgbigurl="{{asset('upload/photos/right')}}/{{$single_product_info->product_right_image}}"><img src="{{asset('upload/photos/right')}}/{{$single_product_info->product_right_image}}" alt=""></div>
                        <div class="pt" data-imgbigurl="{{asset('upload/photos/up')}}/{{$single_product_info->product_up_image}}"><img src="{{asset('upload/photos/up')}}/{{$single_product_info->product_up_image}}" alt=""></div>
                        <div class="pt" data-imgbigurl="{{asset('upload/photos/down')}}/{{$single_product_info->product_down_image}}"><img src="{{asset('upload/photos/down')}}/{{$single_product_info->product_down_image}}" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-content">
                    <h2>{{$single_product_info->product_name}}</h2>
                    <div class="pc-meta">
                        <h4 class="price">Tk: {{$single_product_info->product_price}}</h4>
                        <div class="review">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star is-fade"></i>
                            </div>
                            <span>(2 reviews)</span>
                        </div>
                    </div>
                    <div>
                        <strong>Product code:</strong> <span>{{$single_product_info->product_code}}</span>
                        <hr>
                        <strong>Category Name:</strong> <span>{{$single_product_info->relationcategory->category_name }}</span>
                    </div> 
                    <p>{{$single_product_info->product_description}}</p>
                    <div class="color-choose">
                        <span>Colors:</span>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="black-color" checked>
                            <label class="cs-black" for="black-color"></label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="blue-color">
                            <label class="cs-blue" for="blue-color"></label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="yollow-color">
                            <label class="cs-yollow" for="yollow-color"></label>
                        </div>
                        <div class="cs-item">
                            <input type="radio" name="cs" id="orange-color">
                            <label class="cs-orange" for="orange-color"></label>
                        </div>
                    </div>
                    <div class="size-choose">
                        <span>Size:</span>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="l-size" checked>
                            <label for="l-size">L</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="xl-size">
                            <label for="xl-size">XL</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="xxl-size">
                            <label for="xxl-size">XXL</label>
                        </div>
                    </div>
                    @if ($single_product_info->product_quentity>0)

                      <a href="{{url('add/product/to/card')}}/{{$single_product_info->id}}" class="site-btn btn-line">ADD TO CART</a>

                    @else

                    <div class="alert alert-danger">
                        No Product Available.
                    </div>

                    @endif
                </div>
            </div>
        </div>
        <div class="product-details">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <ul class="nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Additional information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Reviews (0)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                            <p>{{$single_product_info->product_description}}</p>
                        </div>
                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                        </div>
                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center rp-title">
            <h5>Related products</h5>
        </div>
        <div class="row">
            @forelse($related_product_info as $related_product)
            <div class="col-lg-3">
                <div class="product-item">
                    <figure>
                        <img src="{{asset('upload/photos/main')}}/{{$related_product->product_image}}" alt="">
                        <div class="pi-meta">
                            <div class="pi-m-left">
                                <img src="{{asset('frontend/img/icons/eye.png')}}" alt="">
                                <p>quick view</p>
                            </div>
                            <div class="pi-m-right">
                                <img src="{{asset('frontend/img/icons/heart.png')}}" alt="">
                                <p>save</p>
                            </div>
                        </div>
                    </figure>
                    <div class="product-info">
                        <h6>{{$related_product->product_name}}</h6>
                        <p>TK: {{$related_product->product_price}}</p>
                        <a href="{{url('/product/details')}}/{{$related_product->id}}" class="site-btn btn-line">DETAILS</a>
                    </div>
                </div>
            </div>
            @empty
            
            <div class="text-center rp-title">
                <h3 class="">No Related Product To Show</h3>
            </div>
            
            @endforelse
        </div>
    </div>
</div>

@endsection