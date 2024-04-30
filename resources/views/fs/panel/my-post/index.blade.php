@extends('fs.layout.app')

@section('title', 'About')

@section('header-section')
    <header class="masthead" style="background-color: #070F2B">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>My Posts</h1>
                        <span class="subheading">The Right Place for Creativity</span>
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
                <div class="col-7">
                    <h3 style="text-decoration: underline; text-underline-offset:13px;">Library</h3>
                </div>
            </div>

            @forelse ($articles as $article)
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-7">
                        <div class="my-4">
                            <a href="{{ $article->reference_url }}">
                                <div class="card rounded shadow-sm">
                                    <div class="card-header">
                                        <span>{{ $article->title }}</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            {{ $article->description }}
                                        </div>
                                        <div class="d-flex align-items-center gap-3">
                                            <div>
                                                <i class="fa fa-eye"></i>
                                                {{ $article->views_counter }}
                                            </div>
                                            <div>
                                                <i class="fa fa-thumbs-up"></i>
                                                {{ $article->likes_counter }}
                                            </div>
                                            <div>
                                                <i class="fa fa-comment"></i>
                                                {{ $article->comments_counter }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-7">
                        <div class="card my-5">
                            <div class="card-body text-center">
                                Thanks for your Enthusiasm but, article not ready yet
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse

            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-7">
                    @if ($articles->hasPages())
                        <!-- Pager-->
                        <div
                            class="d-flex justify-content-{{ !$articles->onFirstPage() ? 'between' : (!$articles->onLastPage() ? 'end' : 'start') }} mb-4">
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
    </main>
@endsection

@push('js')
    <script>
        new Chart(
            document.getElementById('post-chart'), {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr'],
                    datasets: [{
                            label: 'Viewers',
                            fill: false,
                            data: [20, 98, 15, 0],
                            backgroundColor: '#50C4ED',
                            borderColor: '#50C4ED'
                        },
                        {
                            label: 'Likes',
                            fill: false,
                            data: [10, 74, 10, 0],
                            backgroundColor: '#387ADF',
                            borderColor: '#387ADF'
                        },
                        {
                            label: 'Comments',
                            fill: false,
                            data: [35, 30, 20, 1],
                            backgroundColor: '#333A73',
                            borderColor: '#333A73'
                        },
                        {
                            label: 'Reports',
                            fill: false,
                            data: [85, 28, 30, 0],
                            backgroundColor: '#FBA834',
                            borderColor: '#FBA834'
                        },

                    ]
                }
            }
        );
    </script>
@endpush
