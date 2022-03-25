@if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        {!! \Session::get('success') !!} <b>{{Auth::user()->name}} . </b> Thanks For Register.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@extends("frontend.layout.template")

@section('title') <title>Online Shope | Email Verify </title> @endsection

@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 m-auto">
           <div style="border-radius:5px; box-shadow:0px 0px 5px #ddd;padding:15px;border-top:3px solid #39f">


            <div class="mb-4 text-sm text-gray-600">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking your Email address.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="mt-4 d-flex items-center justify-content-around">
                    <form method="POST" action="{{ route('verification.send') }}" class='wd-200'>
                        @csrf

                        <div>
                            <button class='btn btn-primary wd-250'>Resend Verification Email</button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}" class=''>
                        @csrf

                        <button type="submit" class=" btn btn-danger hover:text-gray-900 wd-250">Log Out</button>
                    </form>
                </div>

           </div>
        </div>
    </div>
</div>

        
@endsection
