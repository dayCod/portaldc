@extends('fs.layout.app')

@section('title', 'Register')

@section('header-section')
    <header class="masthead" style="background-color: #070F2B">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Sign Up</h1>
                        <span class="subheading">Fill this Form Below</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content-section')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="my-5">
                    <form action="{{ route('fs.register.store') }}" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input class="form-control" id="name" type="name" placeholder="Enter your name..." name="name" required />
                            <label for="name">Name</label>
                        </div>
                        <br />
                        <div class="form-floating">
                            <input class="form-control" id="email" type="email" placeholder="Enter your email..."
                                data-sb-validations="required,email" name="email" required />
                            <label for="email">Email address</label>
                        </div>
                        <br />
                        <div class="form-floating mb-2">
                            <input class="form-control" id="password" type="password" placeholder="Enter your password..." name="password" required />
                            <label for="email">Password</label>
                        </div>
                        <a href="{{ route('fs.login.index') }}" style="font-size: 11pt; text-decoration: underline; text-underline-offset:8px;">Already have an account ?</a>
                        <br />
                        <!-- Submit Button-->
                        <button class="btn btn-dark-blue text-uppercase mt-3" id="submitButton"
                            type="submit">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
