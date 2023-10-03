@extends('layout')
@section('title','Product')
@section('breadcrum','Edit Product')
@section('content')
@php
$data = [];
if(!empty($product[0]))
{
$data = $product[0];
}
@endphp
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Product</h5>

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
          <form method="post" class="row g-3" action="{{ route('update-product', $data->product_id) }}" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
              <label for="category_id" class="col-sm-2 col-form-label">Select category</label>
              <div class="col-sm-10">
                <select class="form-select select2" aria-label="Default select example" id="category_id" name="category_id">
                  <option selected="">Select category</option>
                  @foreach($category as $c)
                  <option {{ ( $data->category_id ==  $c->id )?"selected":"" }} value="{{ $c->id }}">{{ $c->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{  $data->name }}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="price" class="col-sm-2 col-form-label">Price</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="price" value="{{ $data->price }}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="offer_price" class="col-sm-2 col-form-label">Offer Price</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="offer_price" value="{{ $data->offer_price }}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Short desc</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="short_desc">{{ $data->short_desc }}</textarea><!-- End TinyMCE Editor -->
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="description" rows="3" name="description">{{ $data->description }}</textarea><!-- End TinyMCE Editor -->
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="status">
                  <option value="Active" {{ ($data->status == "Active")?"selected":""; }}>Active</option>
                  <option value="Inactive" {{ ($data->status == "Inactive")?"selected":""; }}>Inactive</option>
                </select>
              </div>
            </div>


            <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile" accept="image/png, image/jpeg" name="product_image">
              </div>
            </div>

            <div class="row mb-3">
              <label for="meta_title" class="col-sm-2 col-form-label">Meta Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="meta_title" value="{{ $data->meta_title }}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="meta_keywords" class="col-sm-2 col-form-label">Meta Keywords</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="meta_keywords" value="{{ $data->meta_keywords }}">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Meta Desc</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="meta_desc" rows="3" name="meta_desc">{{ $data->meta_desc }}</textarea><!-- End TinyMCE Editor -->
              </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary" value="submit">Update</button>
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