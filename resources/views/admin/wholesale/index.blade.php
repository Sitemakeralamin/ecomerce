@extends('admin.layouts.master')
@section('content')
 <!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Wholesale Queries </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Wholesale Query </li>
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
                {{-- <h4>Totoal Orders : {{ count($orders) }}</h4> --}}
               
              </h4>
              <hr>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
	                  <tr>
	                    <th>S.N</th>
	                    <th>Customer Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Order Note </th>
                      <th>Status</th>
                      <th>Date</th>
	                    <th>Action</th>
	                  </tr>
                  </thead>
                  <tbody>
	                  @foreach($orders as $order)
	                  	<tr>
                            <td>{{ $loop->index + 1 }}</td> 
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->phone }}</td>  
                            <td>{{ $order->email }}</td>   
                            <td>{{ $order->note }}</td>  
                            <td><span class="badge badge-primary">{{ $order->status }}</span></td>
                            <td>{{\Carbon\Carbon::parse($order->created_at)->format('d M, Y g:iA')}}</td>
                            <td>
                            <a href="{{ route('wholesale.edit', $order->id) }}" class="btn btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                            <a href="#deleteModal{{ $order->id }}" class="btn btn-danger" data-toggle="modal" title="Delete"><i class="fas fa-trash"></i></a>
                            </td>
		                </tr>
        <!-- Delete order Modal -->
            <div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are tou sure you want to delete ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('wholeseal.order.destroy', $order->id) }}" method="POST">
                                @csrf
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Permanent Delete</button>
                            </form>

                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

	                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
	                    <th>S.N</th>
	                    <th>Customer Name</th>
                      <th>Phone</th>
                      <th>Quantity</th>
                      <th>Order Note </th>
                      <th>Status</th>
                      <th>Date</th>
	                    <th>Action</th>
	                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
	</div>
</section>
@endsection

@section('scripts')
	<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
    $('#district_id').change(function(){
        var district_id = $(this).val();
        if (district_id == ''){
            district_id = -1;
        }
        var option = "<option value=''>Please Select an Area (Optional)</option>";
        var url = "{{ url('/') }}";

        $.get( url + "/get-area/"+district_id, function( data ) {
            data = JSON.parse(data);
            data.forEach(function (element) {
                option += "<option value='"+ element.id +"'>"+ element.name + "</option>";
            });
            //console.log(option);
            $('#areas').html(option);
        });

    });
</script>
@endsection