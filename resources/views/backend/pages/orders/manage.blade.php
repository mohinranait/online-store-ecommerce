@extends('backend.layout.template')

@section('title') <title>Order list</title> @endsection

@section('content')


    <div class="br-mainpanel">
        <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4 class='text-light'>Order</h4>
                <p class="mg-b-0 text-dark">All  Order Board.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">

                <div class="card">
                    <div class="card-header tx-medium">
                        <div class='d-flex align-items-center justify-content-between'>
                            <h4 class='text-dark'>Order List</h4>
                        </div>
                        
                    </div><!-- card-header -->
                    <div class="card-body">
                        

                    <table class="table table-bordered mg-b-0">
                        <thead class="thead-colored thead-info">
                            <tr>
                                <th>NO</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Order Details</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                
                                <td>{{ $order->name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->address}}</td>
                                <td><a href="{{route('order.show', $order->id)}}" class='btn btn-info btn-sm'>View</a></td>
                                <td>
                                    @if( $order->status == 1)
                                    hold
                                    @elseif( $order->status == 0)
                                        <span class='badge badge-info'>Prosseing</span>
                                    @elseif( $order->status == 2)
                                        <span class="badge badge-success">Delevery</span>
                                    @elseif( $order->status == 3)
                                        Cancle
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('order.edit', $order->id)}}" class='btn btn-primary btn-sm'><i class="fa fa-edit text-white"></i> EDIT</a>
                                </td>

                            </tr>

                              
                            @php $i++ @endphp
                            @endforeach
                           
                        </tbody>
                        @if( $orders->count() > 0)
                        @else
                            <div class="alert alert-info text-center">No Order Found</div>
                        @endif
                    </table>




                    </div><!-- card-body -->
                </div>


                </div>
            </div>
        </div>
    </div>

@endsection

