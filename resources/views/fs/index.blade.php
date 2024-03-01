@extends('fs.layout.app')

@section('title', 'Home')

@section('header-section')
    <header class="masthead" style="background-color: #070F2B">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Welcome Home</h1>
                        <span class="subheading">Feels like your lovely home</span>
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
                @forelse ($articles->items() as $post)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{ $post->reference_url }}">
                            <h2 class="post-title">
                                {{ $post->title }}
                            </h2>
                            <h3 class="post-subtitle">
                                {{ $post->description }}
                            </h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">{{ $post->user->name }}</a>
                            on {{ $post->created_at->format(' F d, Y') }}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @empty
                    <div class="card my-5">
                        <div class="card-body text-center">
                            404 Not Found
                        </div>
                    </div>
                @endforelse

                @if ($articles->hasPages())
                    <!-- Pager-->
                    <div class="d-flex justify-content-{{ (!$articles->onFirstPage() ? 'between' : (!$articles->onLastPage() ? 'end' : 'start')) }} mb-4">
                        @if (!$articles->onFirstPage())
                            <a class="btn btn-dark-blue text-uppercase" href="{{ $articles->previousPageUrl() }}">
                                <i class="fa fa-arrow-left"></i>
                                Previous Posts
                            </a>
                        @endif
                        @if (!$articles->onLastPage())
                            <a class="btn btn-dark-blue text-uppercase" href="{{ $articles->nextPageUrl() }}">
                                Next Posts
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
