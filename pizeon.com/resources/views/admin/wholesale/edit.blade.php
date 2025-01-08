@extends('admin.layouts.master')
@section('content')
@php
  $business = App\Models\Setting::find(1);
@endphp
 <!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"> Wholesale </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Wholsesale</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> -->


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                  <img src="{{ asset('images/website/'.$business->footer_logo) }}" width="50">
                    <small class="float-right" style="float: right;">Date: {{ optional($wholesale)->created_at }}</small>
                  </h4><br>
                </div><br>
                
                  <hr style="color: #800020;">
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-8 invoice-col">
                  
                  <address>
                   	Name: <strong>{{ $wholesale->name??'N/A' }}</strong><br>
                    Phone:  <strong>{{ $wholesale->phone??'N/A' }}</strong><br>
                    Phone:  <strong>{{ $wholesale->email??'N/A' }}</strong><br>
                  </address>
                </div> 
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  
                  <address>
                    
                  </address>
                </div>
              </div>
              <!-- /.row -->

              <div class="row">
                <div class="col-md-6">
                  <form action="{{ route('wholesale.status.change', optional($wholesale)->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label>Order Status</label>
                      <select name="status" class="form-control">
                        <option value="Pending" {{ optional($wholesale)->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Approved" {{ optional($wholesale)->status == 'Approved' ? 'selected' : '' }}>Approve</option>
                        <option value="Rejected" {{ optional($wholesale)->status == 'Rejected' ? 'selected' : '' }}>Reject</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              	<div class="col-md-6">
              	</div>
              </div>

           
               <!-- Table row -->
               <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $product = App\Models\Product::where('id', optional($wholesale)->product_id)->first();
                      @endphp
                        <tr>
                        
                          <td>{{ $product->title??'N/A' }}</td>
                          <td>{{ env('CURRENCY') }}{{ $product->price??0 }}</td>
                          <td>{{ $wholesale->p_quantity??0 }}</td>
                          <td>{{ env('CURRENCY') }}{{ optional($product)->price * optional($wholesale)->p_quantity }}</td>
                        </tr>
                  
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              

              <!-- this row will not appear when printing -->
              <!-- <div class="row no-print">
                <div class="col-12">
                  
                  <a href="" class="btn btn-primary float-right" style="margin-right: 5px;"><i class="fas fa-download"></i> Generate PDF</a>
                </div>
              </div> -->
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
	<script>
    //Date range picker
    $('#reservation').daterangepicker();
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection
