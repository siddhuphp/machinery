@extends('layout')
@section('title','Edit Customer')
@section('breadcrum','Edit Customer')
@section('content')


<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Customer</h5>

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
              <form method="post" action="{{ route('update-customer', $data->customer_id ) }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="{{ $data->email }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Gender</label>
                  <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example" name="gender">                     
                      <option value="male" {{ (old("gender") == "male")?"selected":""; }}>Male</option>
                      <option value="female" {{ (old("gender") == "female")?"selected":""; }}>Female</option>
                  </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Contact No</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="contact_no" value="{{ $data->contact_no }}">
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">                    
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address">{{ $data->address }}</textarea><!-- End TinyMCE Editor -->
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="status">
                      <option value="Active" {{ ($data->status == 'Active')?"selected":""; }}>Active</option>
                      <option value="Inactive" {{ ($data->status == 'Inactive')?"selected":""; }} >Inactive</option>                      
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile"  accept="image/png, image/jpeg" name="proj_img">
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
