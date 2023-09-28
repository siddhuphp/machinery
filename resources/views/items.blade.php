@extends('layout')
@section('title','Dashboard')
@section('breadcrum','About us')
@section('content')

@php

   $i = $items['per_page'] * ($items['current_page'] - 1) + 1;
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
              <h5 class="card-title">Items</h5>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a type="button" href="{{ route('add-item') }}" class="btn btn-primary btn-sm me-md-2">Add Items</a>
              </div>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Item</th>
                    <th scope="col">No of Items</th>
                    <th scope="col">Type</th>
                    <th scope="col">Interest %</th>
                    <th scope="col">Gross wgt</th>
                    <th scope="col">Net wgt</th>
                    <th scope="col">Amount</th>                    
                    <th scope="col">Taken on</th>                    
                    <th scope="col">Actions</th>                                       
                  </tr>
                </thead>
                <tbody>
                @foreach($items['data'] AS $c)
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td> {{ $c['customer']['name'] }} </td>
                    <td> {{ $c['item_name'] }} </td>
                    <td> {{ $c['no_of_items'] }} </td>
                    <td>{{ $c['item_type_name'] }}</td>
                    <td>{{ $c['interest_rate'] }}</td>
                    <td>{{ $c['gross_weight'] }}</td>
                    <td>{{ $c['net_weight'] }}</td>
                    <td>{{ $c['amount'] }}</td>
                    <td>{{ $c['start_date'] }}</td>
                    <td>
                      <a href="{{ route('view-customer', $c['customer_id']) }}"><i class="bi bi-eye"></i></a> | 
                      <a href="{{ route('edit-customer', $c['customer_id']) }}"><i class="bi bi-pencil-square"></i></a> |
                      <a href="{{ route('delete-customer', $c['customer_id']) }}" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i></a>
                    </td>
                  </tr>                  
                @endforeach 
                  </tbody>
              </table>              
              <!-- End Default Table Example -->

               <!-- Pagination links -->
               <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <nav>
                        <ul class="pagination">                     
                            @foreach ($pagination as $page)
                                <li class="page-item {{ $page['active'] ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $page['url'] }}">{!! $page['label'] !!}</a>
                                </li>
                            @endforeach                       
                        </ul>
                    </nav>
                </div>
             
            </div>
          </div>
        </div>
    </div>
</section>
@endsection


