@extends('admin.layouts.master')
@section('content')
 <!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Create Category</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">create-category</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
	<div class="container-fluid">
		<div class="card">
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Category Title(English) @required </label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="English Title" required>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Category Title(Bangla) </label>
                        <input type="text" name="bn_title" class="form-control @error('bn_title') is-invalid @enderror" placeholder="Bangla Title">
                        @error('bn_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Parent Category</label>
                        <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                          <option value="0">Please Select a Parent Category</option>
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @foreach($category->child as $subcategory)
                                <option value="{{ $subcategory->id }}">->{{ $subcategory->title }}</option>
                            @endforeach
                          @endforeach
                        </select>
                        @error('parent_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Category Position</label>
                        <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" placeholder="Position">
                        @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    
                    <div class="col-md-3 p-1">
                      <div class="form-group shadow rounded px-3">
                        <label for="">Is Featured</label>
                        <div class="">
                          <label for="yes" class=""><input class="" type="radio" id="yes" value="1" name="is_featured"> Yes</label>
                          <label for="no" class="ml-2"><input class="" type="radio" id="no" value="0" checked name="is_featured"> No</label>
                        </div>
                      </div>
                    </div>

                    
                    <div class="col-md-3 p-1">
                      <div class="form-group shadow rounded px-3">
                        <label for="">Is Menu Active</label>
                        <div class="">
                          <label for="is_menu_yes" class=""><input class="" type="radio" id="is_menu_yes" value="1" name="is_menu_active"> Active</label>
                          <label for="is_menu_no" class="ml-2"><input class="" type="radio" id="is_menu_no" value="0" checked name="is_menu_active"> Deactive</label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Menu Positon</label>
                        <input type="text" name="menu_position" class="form-control @error('menu_position') is-invalid @enderror" placeholder="Menu Position">
                        @error('menu_position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Thumbnail ( 500px X 393px ) @required </label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="Image" required>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Banner</label>
                        <input type="file" name="banner" class="form-control @error('banner') is-invalid @enderror" placeholder="banner">
                        @error('banner')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Description *</label>
                        <textarea name="description" class="tinymce form-control @error('description') is-invalid @enderror" placeholder="Description"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <button class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
	</div>
</section>
@endsection

@section('scripts')
	<script>
  
</script>
@endsection