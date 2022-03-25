@extends('backend.layout.template')

@section('title') <title>Color list</title> @endsection

@section('content')


    <div class="br-mainpanel">
        <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4 class='text-light'>Color</h4>
                <p class="mg-b-0 text-dark">All  Color Board.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">

                <div class="card">
                    <div class="card-header tx-medium">
                        <div class='d-flex align-items-center justify-content-between'>
                            <h4 class='text-dark'>Color List</h4>
                            <a href="{{route('color.create')}}" class='btn btn-info '>Create Color</a>
                        </div>
                        
                    </div><!-- card-header -->
                    <div class="card-body">
                        

                    <table class="table table-bordered mg-b-0">
                        <thead class="thead-colored thead-info">
                            <tr>
                                <th>NO</th>
                                <th>Color</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach($colors as $color)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                
                                <td>
                                    @if( !empty($color->image ))
                                        <img src="{{asset('image/'. $color->image)}}" width="40px" style='width:25px;height:25px;border-radius:50%' alt="">
                                    @else
                                        -N/A-
                                    @endif
                                </td>
                                <td>{{$color->color}}</td>
                                <td>
                                    @if( $color->status == 1)
                                        Active
                                    @else
                                        In-Active
                                    @endif
                                </td>
                                <td style='width:180px;'>
                                <div>
                                    <a href="{{route('color.edit', $color->id)}}" class='btn btn-primary btn-sm text-white'><i class='fa fa-edit'></i> EDIT</a>
                                    <a  class='btn btn-danger btn-sm text-white' data-toggle="modal" data-target="#delModal{{$color->id}}"><i class="fa fa-trash"></i> DELETE</a>
                                </div>
                                <div>
                                    <!-- modal start  -->
                                    <div id="delModal{{$color->id}}" class="modal fade show" style="padding-right: 17px;">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content bd-0 tx-14">
                                                <div class="modal-header pd-y-20 pd-x-25">
                                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                            <div class="modal-body pd-25">
                                                <h4 class="lh-3 mg-b-20"><a href="" class="tx-inverse hover-primary">Delete <b class='text-primary'>{{$color->color}}</b> Color ?</a></h4>
                                                <p class="mg-b-5">  </p>
                                            </div>
                                            <div class="modal-footer">
                                                
                                                <button type="button" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">CLOSE</button>
                                                <form action="{{route('color.delete', $color->id)}}" method='POST'>
                                                    @csrf 
                                                    <button type="submit" class="btn btn-danger tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">CONFIRT</button>
                                                </form>
                                            </div>
                                        </div>
                                        </div><!-- modal-dialog -->
                                    </div>
                                    <!-- modal end -->
                                </div>
                                    

                                </td>

                            </tr>

                              
                            @php $i++ @endphp
                            @endforeach
                           
                        </tbody>
                        @if( $colors->count() > 0)
                        @else
                            <div class="alert alert-info text-center">No Color Found</div>
                        @endif
                    </table>




                    </div><!-- card-body -->
                </div>


                </div>
            </div>
        </div>
    </div>

@endsection

