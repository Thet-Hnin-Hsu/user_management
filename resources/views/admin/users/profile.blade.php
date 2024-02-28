@extends('admin.home.app')

@section('content')
    <h1 class="app-page-title">My Account</h1>

    <div class="row gy-4">
        <div class="col-12 col-lg-12">
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <div class="app-icon-holder">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                </svg>
                            </div><!--//icon-holder-->
                        </div><!--//col-->

                        <div class="col-auto">
                            <h4 class="app-card-title">Profile</h4>
                        </div><!--//col-->
                    </div><!--//row-->

                    @if (Session::has('updateSuccess'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert"><!--//alert-->
                            {{ Session::get('updateSuccess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div><!--//alert-->
                    @endif
                </div><!--//app-card-header-->

                <div class="app-card-body px-4 w-100">
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label mb-2 mb-2"><strong>Photo</strong></div>

                                <div class="item-data"><img class="profile-image" src="{{ asset('assets/images/user.png') }}" alt=""></div>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//item-->

                    <form action="{{ route('admin#update') }}" method="POST">
                        @csrf
                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label mb-2"><strong>Name</strong></div>

                                    <div class="item-data">
                                        <input type="text" class="
                                        form-control profile_form" placeholder="Enter Name..." name="adminName" value="{{ old('adminName', $user->name) }}">

                                        @error('adminName')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->

                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label mb-2"><strong>Email</strong></div>

                                    <div class="item-data">
                                        <input type="email" class="
                                        form-control profile_form" placeholder="Enter Email..." name="adminEmail" value="{{ old('adminEmail', $user->email) }}">

                                        @error('adminEmail')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->

                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label mb-2"><strong>Role</strong></div>

                                    <div class="item-data">
                                        <select name="adminRole" class="form-control profile_form">
                                            <option value="null">Choose Role...</option>
                                            @foreach ($role as $item)
                                                <option value="{{ $item['role_id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->

                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label mb-2"><strong>Phone</strong></div>

                                    <div class="item-data">
                                        <input type="text" class="
                                        form-control profile_form" placeholder="Enter Phone..." name="adminPhone" value="{{ $user->phone }}">
                                    </div>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->

                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label mb-2"><strong>Address</strong></div>

                                    <div class="item-data">
                                        <textarea name="adminAddress" class="form-control profile_form" cols="30" rows="10" placeholder="Enter Address...">{{ $user->address }}</textarea>
                                    </div>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->

                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label mb-2"><strong>adminGender</strong></div>

                                    <div class="d-flex justify-content-between">
                                        <div class="item-data me-5">
                                            <input type="radio" name="adminGender" value="male"> Male
                                        </div>
                                        <div class="item-data">
                                            <input type="radio" name="adminGender" value="female"> Female
                                        </div>
                                    </div>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->

                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label mb-2"><strong>adminGender</strong></div>

                                    <div class="d-flex justify-content-between">
                                        <div class="item-data me-5">
                                            <input type="checkbox" name="adminIsactive"> Is Active
                                        </div>
                                    </div>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->

                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-data">
                                        <button type="submit" class="btn btn-success text-white">Update</button>
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
