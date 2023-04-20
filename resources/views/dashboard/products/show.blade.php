@extends('dashboard.layouts.main')
@section('title', 'Product Detail')
@section('css')
<!---Internal  Prism css-->
<link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet" />
<!---Internal Input tags css-->
<link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet" />
<!--- Custom-scroll -->
<link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Product Detail</h4>
		</div>
	</div>
</div>
<div class="alerts-section">
  @if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    @foreach ($errors->all() as $error)
      <strong>{{ $error }}</strong>
    @endforeach
  </div>
  @endif
	@if(session()->has('edit'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('edit') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
</div>
<!-- row opened -->
<div class="row row-sm">
  <div class="col-xl-12">
    <!-- div -->
    <div class="card mg-b-20" id="tabs-style2">
      <div class="card-body">
        <div class="text-wrap">
          <div class="example">
            <div class="panel panel-primary tabs-style-2">
              <div class="tab-menu-heading">
                <div class="tabs-menu1">
                  <!-- Tabs -->
                  <ul class="nav panel-tabs main-nav-line">
                    <li><a href="#tab4" class="nav-link active" data-toggle="tab">Product Detail</a></li>
                    <li><a href="#tab6" class="nav-link" data-toggle="tab">Product Image</a></li>
                  </ul>
                </div>
              </div>
              <div class="panel-body tabs-menu-body main-content-body-right border">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab4">
                    <div class="table-responsive mt-15">
                      <table class="table table-striped" style="text-align: center;">
                        <tbody>
                          <tr>
                            <th style="white-space: nowrap;">Product Name</th>
                            <td style="white-space: nowrap;">{{ $product->product_name }}</td>
                            <th style="white-space: nowrap;">Product Price</th>
                            <td style="white-space: nowrap;">{{ $product->product_price }}</td>
                          </tr>
                          <tr>
                            <th style="white-space: nowrap;">Product Category</th>
                            <td style="white-space: nowrap;">{{ $product->category->category_name }}</td>
                            <th style="white-space: nowrap;">Product Status</th>
                            <td style="white-space: nowrap;">@if ($product->product_status == 0) <p class="badge badge-danger">Out Stock</p> @else <p class="badge badge-success">In Stock</p> @endif</td>
                          </tr>
                          <tr class="" even>
                            <th style="white-space: nowrap;">Product Description</th>
                            <td style="white-space: nowrap;"> @if($product->product_description) {{ $product->product_description }} @else Data is not found @endif </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab6">
                    <div class="table-responsive mt-15">
                      <table class="table center-aligned-table mb-0 table-hover" style="text-align: center;">
                        <thead>
                          <tr class="text-dark">
                            <th>Product Name</th>
                            <th>Image Path</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="white-space: nowrap;">{{$product->product_name}}</td>
                            <td style="white-space: nowrap;">@if($product->product_image) images/{{$product->product_image}} @else Image is not found @endif</td>
                            <td style="white-space: nowrap;">
                              <a class="btn btn-outline-success btn-sm" href="{{asset('images/'.$product->product_image)}}" target="_blank"><i class="fas fa-eye"></i>&nbsp; Show</a>
                              <a class="btn btn-outline-info btn-sm" href="{{asset('images/'.$product->product_image)}}" download><i class="fas fa-download"></i>&nbsp; Download</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="card-body">
                      <form method="post" action="{{route('upload-image')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <p class="text-danger">Image Format: jpeg, png, jpg, webp</p>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupFileAddon01">Product Image</span>
                            </div>
                            <div class="custom-file">
                              <input type="hidden" name="id" id="id" value="{{$product->id}}">
                              <input type="file" class="custom-file-input" id="inputGroupFile01" name="product_image" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                            </div>
                          </div> 
                        </div>
                        <br />
                        <div class="d-flex">
                          <input type="submit" class="btn btn-primary" value="Upload Image">
                        </div>
                      </form>
                    </div>
                  </div>                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /div -->
  </div>
</div>
<!-- /row -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<!-- Internal Select2 js-->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<!-- Internal Jquery.mCustomScrollbar js-->
<script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- Internal Input tags js-->
<script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
<!--- Tabs JS-->
<script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
<script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
<!--Internal  Clipboard js-->
<script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
<!-- Internal Prism js-->
<script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
@endsection