@extends('dashboard.layouts.main')
@section('title', 'Categories')
@section('content')
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Categories List</h4>
		</div>
	</div>
	<div class="d-flex my-xl-auto right-content">
		<div class="mb-3 mb-xl-0">
			<div class="btn-group dropdown">
        <a class="modal-effect btn btn-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo1">Add Category</a>
			</div>
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
  @if(session()->has('add'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('add') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if(session()->has('delete'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('delete') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
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

<div class="row row-sm">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table key-buttons text-md-nowrap" id="example1">
						<thead>
							<tr>
								<th class="wd-5p border-bottom-0">#</th>
								<th class="wd-10p border-bottom-0">Category Name</th>
								<th class="wd-20p border-bottom-0">Category Description</th>
								<th class="wd-5p border-bottom-0">Action</th>
							</tr>
						</thead>
						<tbody>
              <?php $i = 0 ?>
              @foreach ($categories as $category)
              <?php $i++ ?>
							<tr>
								<td>{{$i}}</td>
								<td>{{$category->category_name}}</td>
								<td>@if($category->category_description){{$category->category_description}}@else Data is not found @endif</td>
								<td>								
                  <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale" data-id="{{ $category->id }}" data-category_name="{{ $category->category_name }}" data-category_description="{{ $category->category_description }}" data-toggle="modal" href="#modaldemo2" title="Edit"> <i class="fas fa-edit"></i> </a>
                  <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-id="{{ $category->id }}" data-category_name="{{ $category->category_name }}" data-toggle="modal" href="#modaldemo9" title="Delete"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                </td>
							</tr>
              @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
  
  <!-- create -->
  <div class="modal" id="modaldemo1">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-content-demo">
        <div class="modal-header">
          <h6 class="modal-title">Add Category</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Category Name <span>*</span></label>
              <input type="text" name="category_name" class="form-control">
            </div>
            <div class="form-group">
              <label>Category Description</label>
              <input type="text" name="category_description" class="form-control">
            </div>
            <div class="modal-footer">
              <input class="btn ripple btn-primary" type="submit" value="Add">
              <input class="btn ripple btn-secondary" data-dismiss="modal" type="submit" value="Cancel">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- edit -->
	<div class="modal" id="modaldemo2">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-content-demo">
        <div class="modal-header">
          <h6 class="modal-title">Edit Category</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="categories/update" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <input type="hidden" name="id" id="id" value="">
              <label>Category Name <span>*</span></label>
              <input type="text" name="category_name" id="category_name" class="form-control">
            </div>
            <div class="form-group">
              <label>Category Description</label>
              <input type="text" name="category_description" id="category_description" class="form-control">
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn ripple btn-primary" value="Edit">
              <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- delete -->
  <div class="modal" id="modaldemo9">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content modal-content-demo">
        <div class="modal-header">
          <h6 class="modal-title">Delete Category</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
        </div>
        <form action="categories/destroy" method="post">
          @csrf
          @method('DELETE')
          <div class="modal-body">
            <p>Are you sure to delete the category ?</p><br>
            <input type="hidden" name="id" id="id">
            <input class="form-control" name="category_name" id="category_name" type="text" readonly>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-danger" value="Delete">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script>
  $('#modaldemo2').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var category_name = button.data('category_name')
    var category_description = button.data('category_description')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #category_name').val(category_name);
    modal.find('.modal-body #category_description').val(category_description);
  })
  
  $('#modaldemo9').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var category_name = button.data('category_name')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #category_name').val(category_name);
  })
</script>
@endsection