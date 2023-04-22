@extends('front.layouts.main')
@section('title', 'Products Details')
@section('css')
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@endsection 

@section('content')
<div class="breadcrumb-header justify-content-between">
  <div class="my-auto">
    <div class="d-flex">
      <h4 class="content-title mb-0 my-auto">Product Details</h4>
    </div>
  </div>
</div>

<!-- row -->
<div class="row row-sm">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body h-100">
        <div class="row row-sm">
          <div class="col-xl-5 col-lg-12 col-md-12">
            <div class="preview-pic tab-content">
              <div class="tab-pane active" id="pic-1"><img src="{{URL::asset('assets/img/products/product-1.jpg')}}" alt="image" /></div>
              <div class="tab-pane" id="pic-2"><img src="{{URL::asset('assets/img/products/product-2.jpg')}}" alt="image" /></div>
              <div class="tab-pane" id="pic-3"><img src="{{URL::asset('assets/img/products/product-3.jpg')}}" alt="image" /></div>
              <div class="tab-pane" id="pic-4"><img src="{{URL::asset('assets/img/products/product-1.jpg')}}" alt="image" /></div>
            </div>
            <ul class="preview-thumbnail nav nav-tabs">
              <li class="active">
                <a data-target="#pic-1" data-toggle="tab"><img src="{{URL::asset('assets/img/products/product-1.jpg')}}" alt="image" /></a>
              </li>
              <li>
                <a data-target="#pic-2" data-toggle="tab"><img src="{{URL::asset('assets/img/products/product-2.jpg')}}" alt="image" /></a>
              </li>
              <li>
                <a data-target="#pic-3" data-toggle="tab"><img src="{{URL::asset('assets/img/products/product-3.jpg')}}" alt="image" /></a>
              </li>
              <li>
                <a data-target="#pic-4" data-toggle="tab"><img src="{{URL::asset('assets/img/products/product-1.jpg')}}" alt="image" /></a>
              </li>
            </ul>
          </div>
          <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
            <h4 class="product-title mb-1">RED TSHIRT</h4>
            <p class="text-muted tx-13 mb-1">Men red & Grey Checked Casual Shirt</p>
            <div class="rating mb-1">
              <div class="stars">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star text-muted"></span>
                <span class="fa fa-star text-muted"></span>
              </div>
              <span class="review-no">41 reviews</span>
            </div>
            <h6 class="price">current price: <span class="h3 ml-2">$180</span></h6>
            <p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
            <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
            <div class="sizes d-flex">
              sizes:
              <span class="size d-flex" data-toggle="tooltip" title="small">
                <label class="rdiobox mb-0"><input checked="" name="rdio" type="radio" /> <span class="font-weight-bold">s</span></label>
              </span>
              <span class="size d-flex" data-toggle="tooltip" title="medium">
                <label class="rdiobox mb-0"><input name="rdio" type="radio" /> <span>m</span></label>
              </span>
              <span class="size d-flex" data-toggle="tooltip" title="large">
                <label class="rdiobox mb-0"><input name="rdio" type="radio" /> <span>l</span></label>
              </span>
              <span class="size d-flex" data-toggle="tooltip" title="extra-large">
                <label class="rdiobox mb-0"><input name="rdio" type="radio" /> <span>xl</span></label>
              </span>
            </div>
            <div class="colors d-flex mr-3 mt-2">
              <span class="mt-2">colors:</span>
              <div class="row gutters-xs mr-4">
                <div class="mr-2">
                  <label class="colorinput">
                    <input name="color" type="radio" value="azure" class="colorinput-input" checked="" />
                    <span class="colorinput-color bg-danger"></span>
                  </label>
                </div>
                <div class="mr-2">
                  <label class="colorinput">
                    <input name="color" type="radio" value="indigo" class="colorinput-input" />
                    <span class="colorinput-color bg-secondary"></span>
                  </label>
                </div>
                <div class="mr-2">
                  <label class="colorinput">
                    <input name="color" type="radio" value="purple" class="colorinput-input" />
                    <span class="colorinput-color bg-dark"></span>
                  </label>
                </div>
                <div class="mr-2">
                  <label class="colorinput">
                    <input name="color" type="radio" value="pink" class="colorinput-input" />
                    <span class="colorinput-color bg-pink"></span>
                  </label>
                </div>
              </div>
            </div>
            <div class="d-flex mt-2">
              <div class="mt-2 product-title">Quantity:</div>
              <div class="d-flex ml-2">
                <ul class="mb-0 qunatity-list">
                  <li>
                    <div class="form-group">
                      <select name="quantity" id="select-countries17" class="form-control nice-select wd-100">
                        <option value="1" selected="">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="action">
              <button class="add-to-cart btn btn-danger" type="button">ADD TO WISHLIST</button>
              <button class="add-to-cart btn btn-success" type="button">ADD TO CART</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /row -->
@endsection

@section('js')
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection