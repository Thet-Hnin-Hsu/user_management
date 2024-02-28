@extends('admin.home.app')

@section('content')
    <h1 class="app-page-title">Change Password</h1>

    <div class="row gy-4">
        <div class="col-12 col-lg-12">
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-header p-3 border-bottom-0">
                    @if (Session::has('fail'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert"><!--//alert-->
                            {{ Session::get('fail') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div><!--//alert-->
                    @endif

                    @if (Session::has('lengthError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert"><!--//alert-->
                            {{ Session::get('lengthError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div><!--//alert-->
                    @endif
                </div><!--//app-card-header-->

                <div class="app-card-body px-4 w-100">
                    <form action="{{ route('admin#changePassword') }}" method="POST">
                        @csrf
                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label mb-2"><strong>Old Password</strong></div>

                                    <div class="item-data">
                                        <input type="password" class="
                                        form-control profile_form" placeholder="Enter Old Password..." name="adminOldPassword">

                                        @error('adminOldPassword')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->

                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label mb-2"><strong>New Password</strong></div>

                                    <div class="item-data">
                                        <input type="password" class="
                                        form-control profile_form" placeholder="Enter New Password..." name="adminNewPassword">

                                        @error('adminNewPassword')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->

                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label mb-2"><strong>Confirm Password</strong></div>

                                    <div class="item-data">
                                        <input type="password" class="
                                        form-control profile_form" placeholder="Enter Confirm Password..." name="adminConfirmPassword">

                                        @error('adminConfirmPassword')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->

                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-data">
                                        <button type="submit" class="btn btn-success text-white">Change Password</button>
                                    </div>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->
                    </form>
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div><!--//col-->
    </div><!--//row-->
@endsection
