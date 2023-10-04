@extends('layout')
@section('title','Product')
@section('breadcrum','Product Details')
@section('content')

@php
$product = [];
if(!empty($data['data']['Products'][0]))
{
    $product = $data['data']['Products'][0];
}
@endphp

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
  {{Session::get('success')}}
</div>
@endif

<section class="section profile">
  <div class="row">
    <div class="col-xl-12">    

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Product</h5>

           <!-- Default Accordion -->
           <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Product Details
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body">
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Image</div>
                        <div class="col-lg-9 col-md-8"><img src="{{ $product['productImage'] }}" alt="Profile"  class="img-thumbnail" style="width: 150px; height: 150px;"></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Name</div>
                        <div class="col-lg-9 col-md-8">{{ $product['name'] }}</div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Category</div>
                        <div class="col-lg-9 col-md-8">{{ $product['categoryName'] }}</div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Price</div>
                        <div class="col-lg-9 col-md-8">{{ $product['price'] }}</div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Offer Price</div>
                        <div class="col-lg-9 col-md-8">{{ $product['offerPrice'] }}</div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Short description</div>
                        <div class="col-lg-9 col-md-8">{{ $product['shortDesc'] }}</div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Description</div>
                        <div class="col-lg-9 col-md-8">{{ $product['description'] }}</div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Status</div>
                        <div class="col-lg-9 col-md-8">{{ $product['status'] }}</div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Created on</div>
                        <div class="col-lg-9 col-md-8">{{ $product['createdAt'] }}</div>
                      </div>
                     
                    </div>
                  </div>
                </div>
            </div><!-- End Default Accordion Example -->        

        </div>
      </div>

    </div>
  </div>
</section>


@endsection