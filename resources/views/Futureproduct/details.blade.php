@extends('layouts.frontend')

@section('content')

    <div class="page-info-section page-info">
        <div class="container">
            <div class="site-breadcrumb">
                <a href="{{url('/')}}">Home</a> / 
                <a href="#">Product</a> / 
                <span>{{$future_product_info->product_name}}</span>
            </div>
            <img src="img/page-info-art.png" alt="" class="page-info-art">
        </div>
    </div>
 

    <div class="page-area product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <figure>
                        <img class="product-big-img" src="{{asset('upload/Futurephotos/best')}}/{{$future_product_info->product_image}}" alt="">
                    </figure>
                    <div class="product-thumbs">
                        <div class="product-thumbs-track">
                            <div class="pt" data-imgbigurl="{{asset('upload/Futurephotos/left')}}/{{$future_product_info->product_left_image}}"><img src="{{asset('upload/Futurephotos/left')}}/{{$future_product_info->product_left_image}}" alt=""></div>
                            <div class="pt" data-imgbigurl="{{asset('upload/Futurephotos/right')}}/{{$future_product_info->product_right_image}}"><img src="{{asset('upload/Futurephotos/right')}}/{{$future_product_info->product_right_image}}" alt=""></div>
                            <div class="pt" data-imgbigurl="{{asset('upload/Futurephotos/up')}}/{{$future_product_info->product_up_image}}"><img src="{{asset('upload/Futurephotos/up')}}/{{$future_product_info->product_up_image}}" alt=""></div>
                            <div class="pt" data-imgbigurl="{{asset('upload/Futurephotos/down')}}/{{$future_product_info->product_down_image}}"><img src="{{asset('upload/Futurephotos/down')}}/{{$future_product_info->product_down_image}}" alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-content">
                        <h2>{{$future_product_info->product_name}}</h2>
                        <div class="pc-meta">
                            <h4 class="price">Coming Soon</h4>
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
                        <strong>Product code:</strong> <span>{{$future_product_info->product_code}}</span>
                        </div> <hr>
                        <p>{{$future_product_info->product_description}}</p>
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
                                <p>{{$future_product_info->product_description}}</p>
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
                @foreach($related_fproduct_info as $related_fproduct)
                  <div class="col-lg-3">
                    <div class="product-item">
                        <figure>
                            <img src="{{asset('upload/Futurephotos/best')}}/{{$related_fproduct->product_image}}" alt="">
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
                            <h6>{{$related_fproduct->product_name}}</h6>
                            <p>Coming Soon</p>
                            <a href="{{url('/product/future/details')}}/{{$related_fproduct->id}}" class="site-btn btn-line">DETAILS</a>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div> 
   
@endsection
