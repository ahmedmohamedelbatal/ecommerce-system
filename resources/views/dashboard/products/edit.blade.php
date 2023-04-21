@extends('dashboard.layouts.main')
@section('title', 'Edit Product')
@section('css')
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="breadcrumb-header justify-content-between">
  <div class="my-auto">
    <div class="d-flex">
      <h4 class="content-title mb-0 my-auto">Edit Product</h4>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col form-group">
              <label>Product Name <span>*</span></label>
              <input class="form-control @error('product_name') is-invalid @enderror" name="product_name" type="text" value="{{$product->product_name}}"/>
              @error('product_name') <strong class="invalid-feedback">{{ $message }}</strong> @enderror
            </div>
            <div class="col form-group">
              <label>Product Price <span>*</span></label>
              <input class="form-control @error('product_price') is-invalid @enderror" name="product_price" type="number" value="{{$product->product_price}}"/>
              @error('product_price') <strong class="invalid-feedback">{{ $message }}</strong> @enderror
            </div>
          </div>
          <div class="row">
            <div class="col form-group">
              <label>Product Category <span>*</span></label>
              <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                @endforeach
              </select>
              @error('category_id') <strong class="invalid-feedback">{{ $message }}</strong> @enderror
            </div>
            <div class="col form-group">
              <label>Product Status <span>*</span></label>
              <select name="product_status" class="form-control @error('product_status') is-invalid @enderror">
                @if ($product->product_status == 0)
                <option value="0" selected>Out Stock</option>
                <option value="1">In Stock</option>
                @else
                <option value="0">Out Stock</option>
                <option value="1" selected>In Stock</option>
                @endif
              </select>
              @error('product_status') <strong class="invalid-feedback">{{ $message }}</strong> @enderror
            </div>
          </div>
          <div class="row">
            <div class="col form-group">
              <label for="exampleTextarea">Product Description</label>
              <textarea class="form-control" id="exampleTextarea" name="product_description" rows="4">{{$product->product_description}}</textarea>
            </div>
          </div>
          <br />
          <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-primary" value="Edit Product">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
<script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
<script src="{{ URL::asset('assets/js/select2.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
<script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
@endsection