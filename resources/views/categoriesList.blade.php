@extends('layout')
@section('title','Categories')
@section('breadcrum','Category')
@section('content')

@php

$categories = [];
$pagination = [];
if(!empty($data['data']['categories'])) {
$categories = $data['data']['categories'];
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
          <h5 class="card-title">Categories</h5>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a type="button" href="{{ route('add-category') }}" class="btn btn-primary btn-sm me-md-2">Add Category</a>
          </div>

          <!-- Default Table -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Created On</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories AS $c)
              <tr>
                <th scope="row">{{ $j++ }}</th>
                <td> {{ $c['name'] }} </td>
                <td>{{ $c['status'] }}</td>
                <td>{{ $c['createdAt'] }}</td>
                <td>
                  <a href="{{ route('add-product',['categoryId' => $c['categoryId']]) }}"><i class="bi bi-plus-square" title="Add Product"></i></a> |
                  <a href="{{ route('edit-category',$c['categoryId']) }}"><i class="bi bi-pencil-square"></i></a> |
                  <a href="{{ route('delete-category',$c['categoryId']) }}" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>

          </table>
          <!-- End Default Table Example -->
          <div class="d-flex justify-content-end">
            <nav aria-label="Page navigation">
              <ul class="pagination">
                @if ($pagination['prev_page_url'])
                <li class="page-item"><a class="page-link" href="{{ $pagination['prev_page_url'] }}">Previous</a></li>
                @else
                <li class="page-item disabled"><span class="page-link">Previous</span></li>
                @endif

                @for ($i = 1; $i <= $pagination['last_page']; $i++) <li class="page-item {{ $i == $pagination['current_page'] ? 'active' : '' }}">
                  <a class="page-link" href="{{ route('categories') }}{{ $i == 1 ? '' : '?page=' . $i }}">{{ $i }}</a>
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