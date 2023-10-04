@extends('layout')
@section('title','Products')
@section('breadcrum','Products list')
@section('content')

@php
$products = [];
$pagination = [];
if(!empty($data['data']['products'])) {
$products = $data['data']['products'];
}
if(!empty($data['data']['pagination'])) {
$pagination = $data['data']['pagination'];
}
$j = 1;
@endphp

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
  {{Session::get('success')}}
</div>
@endif



<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Products</h5>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a type="button" href="{{ route('add-product') }}" class="btn btn-primary btn-sm me-md-2">Add Product</a>
          </div>

          <!-- Default Table -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Offer Price</th>
                <th scope="col">Category</th>
                <th scope="col" class="custom-image-header">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Created On</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products AS $c)
              <tr>
                <th scope="row">{{ $j++ }}</th>
                <td> {{ $c['name'] }} </td>
                <td> {{ $c['price'] }} </td>
                <td> {{ $c['offerPrice'] }} </td>
                <td>{{ $c['categoryName'] }}</td>
                <td scope="row" class="custom-image-header"><img class="img-thumbnail custom-image" src="{{ $c['productImage'] }}" alt=""></td>
                <td>{{ $c['status'] }}</td>
                <td>{{ $c['createdAt'] }}</td>
                <td>
                  <a href="{{ route('view-product', $c['productId']) }}" title="View"><i class="bi bi-eye"></i></a> |
                  <a href="{{ route('edit-product', $c['productId']) }}" title="Edit"><i class="bi bi-pencil-square"></i></a> |
                  <a href="{{ route('delete-product', $c['productId']) }}" title="Delete" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Default Table Example -->

          <!-- Pagination links -->
          <div class="d-flex justify-content-end">
            <nav aria-label="Page navigation">
              <ul class="pagination">
                @if ($pagination['prev_page_url'])
                <li class="page-item"><a class="page-link" href="{{ $pagination['prev_page_url'] }}">Previous</a></li>
                @else
                <li class="page-item disabled"><span class="page-link">Previous</span></li>
                @endif

                @for ($i = 1; $i <= $pagination['last_page']; $i++) <li class="page-item {{ $i == $pagination['current_page'] ? 'active' : '' }}">
                <a class="page-link" href="{{ route('products') }}{{ $i == 1 ? '' : '?page=' . $i }}">{{ $i }}</a>
                </li>
                @endfor

                  @if ($pagination['next_page_url'])
                  <li class="page-item"><a class="page-link" href="{{ $pagination['next_page_url'] }}">Next</a></li>
                  @else
                  <li class="page-item disabled"><span class="page-link">Next</span></li>
                  @endif
              </ul>
            </nav>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('css')
<style>
  .custom-image {
    width: 80%;
    height: auto;
  }

  .custom-image-header {
    width: 10%;
    /* Adjust the width as needed */
  }

  .custom-image-cell {
    width: 10%;
    /* Adjust the width as needed */
  }
</style>
@endsection