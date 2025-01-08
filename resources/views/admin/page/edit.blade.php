@extends('admin.layouts.master')
@section('content')
  <!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Page Edit</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('index') }}" target="_blank">Home</a></li>
          <li class="breadcrumb-item active">Page</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
	<div class="container-fluid">
		<form action="{{ route('page.update', $page->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="card p-2">

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					  <label>Title(English) @required </label>
					  <input type="text" name="name" value="{{optional($page)->name}}" class="form-control @error('name') is-invalid @enderror" required>
					  @error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					  @enderror
					</div>
				  </div>
				  <div class="col-md-6">
					  <div class="form-group">
						<label>Title(Bangla) </label>
						<input type="text" name="bn_name" value="{{optional($page)->bn_name}}" class="form-control @error('bn_name') is-invalid @enderror">
						@error('bn_name')
						  <span class="invalid-feedback" role="alert">
							  <strong>{{ $message }}</strong>
						  </span>
						@enderror
					  </div>
					</div>

				<div class="col-md-12">
				  <div class="form-group">
					<label>Description</label>
					<textarea name="description" class="form-control" id="" cols="30" rows="5">{{optional($page)->description}}</textarea>
					@error('description')
					  <span class="invalid-feedback" role="alert">
						  <strong>{{ $message }}</strong>
					  </span>
					@enderror
				  </div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
					  <label>Description(Bangla)</label>
					  <textarea name="bn_description" class="form-control" id="" cols="30" rows="5">{{optional($page)->bn_description}}</textarea>
					  @error('bn_description')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					  @enderror
					</div>
				  </div>
				<div class="col-md-12">
				  <div class="form-group text-right">
					<button type="submit" class="btn btn-primary">Save</button>
				  </div>
				</div>
				
			  </div>
			</div>

		</form>
	</div>
</section>
@endsection
