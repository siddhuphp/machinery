@extends('layout')
@section('title','Category')
@section('breadcrum','Edit Category')
@section('content')
@php
$categories = [];
if(!empty($data['data']['categories'])) {
$categories = $data['data']['categories'];
}
@endphp

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Category</h5>

          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <!-- General Form Elements -->
          <form method="post" action="{{ route('update-category', $categories['categoryId']) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{ $categories['name'] }}">
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="status">
                  <option value="Active" {{ ($categories['status'] == "Active")?"selected":""; }}>Active</option>
                  <option value="Inactive" {{ ($categories['status'] == "Inactive")?"selected":""; }}>Inactive</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>

          </form><!-- End General Form Elements -->

        </div>
      </div>

    </div>


  </div>
</section>

@endsection