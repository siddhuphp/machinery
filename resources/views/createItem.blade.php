@extends('layout')
@section('title','Add Item')
@section('breadcrum','Add Item')
@section('content')
@php
$customerId = "";
if(isset($_GET['customerId'])){
  $customerId = $_GET['customerId'];
}
@endphp
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Customer</h5>

          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif    

      

          <!-- Multi Columns Form -->
          <form method="post" class="row g-3" action="{{ route('store-item') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
              <label for="customer" class="form-label">Select Customer</label>
              <!-- <input type="text" class="form-control" value="{{ old('customer') }}"> -->
              <select class="form-select select2" aria-label="Default select example"  id="customer" name="customer" >
                      <option selected="">Select Customer</option>
                      @foreach($customer as $c)
                      <option {{ ($customerId ==  $c['customer_id'])?"selected":"" }} value="{{ $c['customer_id'] }}">{{ $c['name'] }}</option>
                      @endforeach                     
                    </select>
            </div>
            <div class="col-md-6">
              <label for="interest_rate" class="form-label">Interest Rate</label>
              <input type="text" class="form-control" id="interest_rate" name="interest_rate" value="{{ old('interest_rate') }}">
            </div>

            <h5 class="card-title">Add Item</h5>

            <div class="col-md-2">
              <label for="inputState" class="form-label">Item Type</label>
              <select id="inputState" class="form-select" name="item_type">
                <option selected="">Choose...</option>
                <option value='1' {{ (old('item_type') == 1)?"selected":""; }}>Gold</option>
                <option value='2' {{ (old('item_type') == 2)?"selected":""; }}>Silver</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="name" class="form-label">Item Name</label>
              <input type="text" class="form-control" id="name" name="item_name" value="{{ old('item_name') }}">
            </div>
            <div class="col-md-4">
              <label for="name" class="form-label">Number of items</label>
              <input type="number" class="form-control" id="name" name="no_of_items" value="{{ old('no_of_items') }}">
            </div>
            <div class="col-md-2">
              <label for="gross_weight" class="form-label">Gross weight</label>
              <input type="text" class="form-control" id="gross_weight" name="gross_weight" value="{{ old('gross_weight') }}">
            </div>
            <div class="col-md-2">
              <label for="net_weight" class="form-label">Net weight</label>
              <input type="text" class="form-control" id="net_weight" name="net_weight" value="{{ old('net_weight') }}">
            </div>
            <div class="col-md-2">
              <label for="amount" class="form-label">Amount</label>
              <input type="text" class="form-control" id="amount" name="amount"  value="{{ old('amount') }}">
            </div>
            <div class="col-2">
              <label for="start_date" class="form-label">Date</label>
              <input type="date" class="form-control" id="start_date" name="start_date"  value="{{ (old('start_date'))?old('start_date'):date('Y-m-d') }}">
            </div>
            <div class="col-6">
              <label for="comments" class="form-label">Comments</label>
              <input type="text" class="form-control" id="comments" name="comments" placeholder="like with stones this grms" value="{{ old('comments') }}">
            </div>
            <div class="col-4">
              <label for="item_images" class="form-label">Item Image</label>
              <input type="file" class="form-control" id="item_images" name="item_images[]">
            </div>
            
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" name="deduction_of_stones" value="Yes">
                <label class="form-check-label" for="gridCheck">
                Deduction of stones
                </label>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" value="submit">Submit</button>
              <button type="submit" class="btn btn-primary"  value="add_more">Add More Items</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- End Multi Columns Form -->

        </div>
      </div>

    </div>

    
  </div>
</section>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
  .select2-selection__rendered {
    line-height: 31px !important;
}
.select2-container .select2-selection--single {
    height: 35px !important;
}
.select2-selection__arrow {
    height: 34px !important;
}
</style>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.select2').select2({
      theme: "classic"
    });
});
</script>
@endsection
