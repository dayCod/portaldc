@extends('fs.layout.app')

@section('title', 'Detail')

@section('header-section')
    <header class="masthead" style="background-color: #070F2B">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>{{ $article->title }}</h1>
                        <span class="subheading">Posted on {{ $article->created_at->format('d F Y') }}. By {{ $article->user->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content-section')
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <span>
                        {!! html_entity_decode(str_replace('&nbsp;', ' ', $article->contentArticle->long_text)) !!}
                    </span>
                </div>
            </div>
        </div>
    </article>
@endsection
