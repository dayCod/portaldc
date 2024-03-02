@extends('fs.layout.app')

@section('title', 'Subs')

@section('header-section')
    <header class="masthead" style="background-color: #070F2B">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Fear of missing out ?</h1>
                        <span class="subheading">here suitable place for you.</span>
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
                    <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon
                        as possible!</p>
                    @if (Session::has('success'))
                        <div class="alert alert-dark-blue alert-dismissible" role="alert">
                            <div>
                                {{ Session::get('success') }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="my-5">
                        <form action="{{ route('fs.newsletter.submit') }}" method="POST">
                            @csrf
                            <div class="form-floating">
                                <input class="form-control" id="email" type="email" placeholder="Enter your email..."
                                    data-sb-validations="required,email" name="email" required />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <br />
                            <!-- Submit Button-->
                            <button class="btn btn-dark-blue text-uppercase" id="submitButton"
                                type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
