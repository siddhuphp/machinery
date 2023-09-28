@php
include(app_path('Helpers/SimpleInterestHelper.php'));
@endphp

@extends('layout')
@section('title','Customer Details')
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

<section class="section profile">
  <div class="row">
    <div class="col-xl-12">    

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Customer Details</h5>

           <!-- Default Accordion -->
           <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Customer Details
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body">
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Image</div>
                        <div class="col-lg-9 col-md-8"><img src="{{ asset('storage/' . $customer[0]->customer_img) }}" alt="Profile"  class="rounded-circle img-thumbnail" style="width: 150px; height: 150px;"></div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                        <div class="col-lg-9 col-md-8">{{ $customer[0]->name }}</div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Contcat</div>
                        <div class="col-lg-9 col-md-8">{{ $customer[0]->contact_no }}</div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8">{{ $customer[0]->email }}</div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Gender</div>
                        <div class="col-lg-9 col-md-8">{{ $customer[0]->gender }}</div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Address</div>
                        <div class="col-lg-9 col-md-8">{{ $customer[0]->address }}</div>
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


<section class="section">
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Items</h5>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a type="button" href="{{ route('add-item'). '?customerId=' . $customer[0]->customer_id}}" class="btn btn-primary btn-sm me-md-2">Add Items</a>
              </div>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item</th>
                    <th scope="col">No of Items</th>
                    <th scope="col">Type</th>                    
                    <th scope="col">Gross wgt</th>
                    <th scope="col">Net wgt</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Interest %</th>                    
                    <th scope="col">Taken on</th>                    
                    <th scope="col">No of months</th>                    
                    <th scope="col">Interest</th>                    
                    <th scope="col">Actions</th>                                       
                  </tr>
                </thead>
                <tbody>
                @foreach($items['data'] AS $c)
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td> {{ $c['item_name'] }} </td>
                    <td> {{ $c['no_of_items'] }} </td>
                    <td>{{ $c['item_type_name'] }}</td>                   
                    <td>{{ $c['gross_weight'] }}</td>
                    <td>{{ $c['net_weight'] }}</td>
                    <td>{{ $c['amount'] }}</td>
                    <td>{{ $c['interest_rate'] }}</td>
                    <td>{{ $c['start_date'] }}</td>
                    @php
                    $endDate = date('Y-m-d');
                    $result = calculateSimpleInterest($c['amount'], $c['start_date'], $endDate, $c['interest_rate']);                   
                    @endphp
                    <td>{{ "Y:" . $result['years']. " M:" . $result['months']. " D:" . $result['days']  }}</td>
                    <td>{{ round($result['simpleInterest']) }}</td>
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