@extends('fs.layout.app')

@section('title', 'Profile')

@section('header-section')
    <header class="masthead" style="background-color: #070F2B">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>My Profile</h1>
                        <span class="subheading">Here's the perfect place for adjusting your profile</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content-section')
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <h3 style="text-decoration: underline; text-underline-offset:13px;">Welcome {{ $user->firstname }}</h3>
                    <div class="my-5">
                        <div class="form-floating mb-3">
                            <input class="form-control" value="{{ $user->name }}" readonly/>
                            <label>Fullname</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" value="{{ $user->email }}" readonly/>
                            <label>Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" value="{{ Str::ucfirst($user->role->name) }}" readonly/>
                            <label>As</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" value="{{ $user->created_at->format('d-M-Y') }}" readonly/>
                            <label>Registered Since</label>
                        </div>
                    </div>
                    <a href="{{ route('fs.panel.profile.edit') }}" class="btn btn-dark-blue text-uppercase">Edit Profile</a>
                </div>
            </div>
        </div>
    </main>
@endsection

