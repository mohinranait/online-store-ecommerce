@extends('backend.layout.template')

@section('title') <title>Order details</title> @endsection

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
                            <h4 class='text-dark'>Order Details Information</h4>
                            <a href="{{route('order.edit', $details->id)}}" class='btn btn-info '>Order Update</a>
                        </div>
                        
                    </div><!-- card-header -->
                    <div class="card-body">

                        <div class="row mb-4">
                            <div class="col-lg-4">
                                <div class='order-summary-box'>
                                    <h3 class='br-section-label'>Personal Information</h3>
                                    <p><span class='summary-span-tag' >Name</span>: {{$details->name}}</p>
                                    <p><span class='summary-span-tag' >Email</span>: {{$details->email}}</p>
                                    <p><span class='summary-span-tag' >Phone</span>: {{$details->phone}}</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class='order-summary-box'>
                                    <h3 class='br-section-label'>Order Status</h3>
                                    <p><span class='summary-span-tag' >TotalAmount</span>: {{$details->amount}} {{$details->currency}}</p>
                                    <p><span class='summary-span-tag' >Transaction ID</span>: {{$details->transaction_id}}</p>
                                    <p><span class='summary-span-tag' >Status</span>:  
                                        @if( $details->status == 0)
                                            <span class='badge badge-info'>Prossessing</span>
                                        @elseif( $details->status == 1)
                                        <span class='badge badge-warning'>Hold</span>
                                        @elseif( $details->status == 2)
                                        <span class='badge badge-success'>Delevery Successfull</span>
                                        @elseif( $details->status == 3)
                                        <span class='badge badge-danger'>Cancled</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class='order-summary-box'>
                                    <h3 class='br-section-label'>Shipping Address</h3>
                                    <p><span class='summary-span-tag' >Address</span>: {{$details->address}}</p>
                                    <p><span class='summary-span-tag' >Distict</span>: {{$details->district->name}}</p>
                                    <p><span class='summary-span-tag' >Division</span>: {{$details->division->name}}</p>
                                    <p><span class='summary-span-tag' >Cuntry</span>: {{$details->adCuntry->name}}</p>
                                    <p><span class='summary-span-tag' >Zip Code</span>: {{$details->post_code}}</p>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <div class='order-summary-box'>
                                    <h3 class='br-section-label'>Product Information</h3>

                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Quintity</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1 @endphp
                                                @foreach(App\Models\Card::orderby('id','desc')->where('order_id',$details->id)->get() as $item)
                                                <tr>
                                                    <th scope="row">{{$i}}</th>
                                                    <td>
                                                        @if( $item->product->imagess->count() > 0)
                                                        <img src="{{asset('image/' . $item->product->imagess->first()->image)}}" class='wd-50' alt="">
                                                        @endif
                                                    </td>
                                                    <td>{{$item->product->name}}</td>
                                                    <td>{{$item->unite_price}} BDT</td>
                                                    <td>{{ $item->product_qty}} Pcs</td>
                                                    <td>{{$item->unite_price * $item->product_qty}} BDT</td>
                                                </tr>
                                                @php $i++ @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                    
                                </div>
                            </div>
                            
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                

                                @if( !empty($details->massage))
                                <div class="col-lg-12 bg-info p-4 text-center">
                                    
                                    <label for="" class='text-dark br-section-label m-0' >User Massage</label>
                                    <p class='text-light'> {{$details->massage}}</p>
                                </div>
                                @endif
                                    
                               
                            </div>
                            
                        </div>
                    

                    </div><!-- card-body -->
                </div>


                </div>
            </div>
        </div>
    </div>

@endsection

