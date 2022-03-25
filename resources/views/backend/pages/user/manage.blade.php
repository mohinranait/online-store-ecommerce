@extends('backend.layout.template')

@section('title') <title>User list</title> @endsection

@section('content')


    <div class="br-mainpanel">
        <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)'>
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4 class='text-light'>User</h4>
                <p class="mg-b-0 text-dark">All  User Board.</p>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-12">

                <div class="card">
                    <div class="card-header tx-medium">
                        <div class='d-flex align-items-center justify-content-between'>
                            <h4 class='text-dark'>User List</h4>
                            <a href="#" class='btn btn-info '>Create User</a>
                        </div>
                        
                    </div><!-- card-header -->
                    <div class="card-body">
                        

                    <table class="table table-bordered mg-b-0">
                        <thead class="thead-colored thead-info">
                            <tr>
                                <th>NO</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                
                                <td>
                                    @if( !empty($user->image ))
                                        <img src="{{asset('image/'. $user->image)}}" width="40px"  alt="">
                                    @else
                                        -N/A-
                                    @endif
                                </td>
                                <td>{{$user->name}}</td>
                                <td>
                                    @if( !empty($user->email))
                                        {{$user->email}}
                                    @else
                                        -N/A-
                                    @endif
                                </td>
                                <td>
                                    @if( !empty($user->phone))
                                        {{$user->phone}}
                                    @else
                                        -N/A-
                                    @endif
                                </td>
                                <td>
                                    @if( $user->role == 1)
                                        Admin
                                    @else
                                        User
                                    @endif
                                </td>
                                <td>
                                    @if( $user->status == 1)
                                        Active
                                    @else
                                        In-Active
                                    @endif
                                </td>
                                <td style='width:180px;'>
                                <div>
                                    <a href="{{route('user.edit', $user->id)}}" class='btn btn-primary btn-sm text-white'><i class='fa fa-edit'></i> EDIT</a>
                                    <a  class='btn btn-danger btn-sm text-white' data-toggle="modal" data-target="#delModal{{$user->id}}"><i class="fa fa-trash"></i> DELETE</a>
                                </div>
                                <div>
                                    <!-- modal start  -->
                                    <div id="delModal{{$user->id}}" class="modal fade show" style="padding-right: 17px;">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content bd-0 tx-14">
                                                <div class="modal-header pd-y-20 pd-x-25">
                                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                            <div class="modal-body pd-25">
                                                <h4 class="lh-3 mg-b-20"><a href="" class="tx-inverse hover-primary">Delete <b class='text-primary'>{{$user->color}}</b> User ?</a></h4>
                                                <p class="mg-b-5">  </p>
                                            </div>
                                            <div class="modal-footer">
                                                
                                                <button type="button" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">CLOSE</button>
                                                <form action="{{route('user.delete', $user->id)}}" method='POST'>
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
                        @if( $users->count() > 0)
                        @else
                            <div class="alert alert-info text-center">No Users Found</div>
                        @endif
                    </table>




                    </div><!-- card-body -->
                </div>


                </div>
            </div>
        </div>
    </div>

@endsection

