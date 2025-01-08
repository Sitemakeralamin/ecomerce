@extends('admin.layouts.master')
@section('content')
 <!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Image List</h1>
      </div><!-- /.col -->
      <div class="col-sm-6 text-right">
        <a href="#addModal" class="btn btn-primary" data-toggle="modal"><i class="fas fa-plus"></i> Upload</a>
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
              <div class="card-body text-center">
                <div class="row">

                    @forelse($images as $image)
                    <div class="card col-2 m-2" style="width: 18rem;">
                    <img class="card-img-top mt-2" style="border-radius:5px;" src="{{ asset($image->file_path) }}" alt="{{ $image->title }}">
                    <div class="card-body">
                      <h5 class="card-title">{{ $image->title }}</h5>
                      <p class="card-text">{{ $image->file_size }}</p>
                      {{-- Edit --}}
                      <button href="#editModal{{ $image->id }}" class="btn btn-outline-primary btn-sm" data-toggle="modal" title="Edit"><i class="fas fa-edit"></i></button>

		            <button href="#deleteModal{{ $image->id }}" class="btn btn-outline-danger btn-sm" data-toggle="modal" title="Delete"><i class="fas fa-trash"></i></button>

                    {{-- Copy --}}
                    <button class="btn btn-outline-primary btn-xs" onclick="copyImagePath('{{ asset($image->file_path) }}')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                    </button>
                    <!-- Edit brand Modal -->
                    <div class="modal fade" id="editModal{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                      Edit - {{ $image->title }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('image.upload.update', $image->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="card-text"> Title @required</label>
                                          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" Value="{{ $image->title }}" required>
                                          @error('title')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                        </div>
                                      </div> 
                                      <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                          <label>Image</label>
                                          <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" Value="{{ $image->image }}">
                                          <img src="{{ asset($image->file_path) }}" class="img-fluid" alt="">
                                          @error('image')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                        </div>
                                      </div>
                                        <div class="form-group text-right">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <button class="btn btn-primary">Save Changes</button>
                                        </div>
                                      </div>
                                    </div>
                                  </form>

                                </div>
                                
                            </div>
                        </div>
                        {{-- Edit End --}}
                         <!-- Delete brand Modal -->
                    <div class="modal fade" id="deleteModal{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-body" align="center">
                                <h3 class="fw-bold my-5"><b>Are you sure you want to delete?</b></h3>
                                  <form action="{{ route('image.upload.destroy', $image->id) }}" method="POST">
                                      @csrf
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-danger">Permanent Delete</button>
                                  </form>
                              </div>
                          </div>
                        </div>
                    </div>
                    {{-- Delete End --}}

                    </div>
                </div>

                @empty
                <h4 class="text-danger">Data Not Found !!</h4>             
                @endforelse
                
            </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Add Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ route('image.upload.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <div class="modal-body">
                    
                      <div class="row">
                        <div class="col-md-12 d-none">
                          <div class="form-group">
                            <label>Title @required </label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image[]" multiple class="form-control @error('image') is-invalid @enderror" placeholder="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              {{-- Add Modal End --}}
	</div>
</section>
@endsection

@section('scripts')
	<script>
        function copyImagePath(path) {
            const el = document.createElement('textarea');
            el.value = path;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
            alert('Image path copied to clipboard!');
        }
    </script>
@endsection