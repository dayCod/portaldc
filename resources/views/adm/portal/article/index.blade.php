@extends('adm.layout.master')

@section('title', 'Article')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Portal Data - Article</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Article Data</h6>
                    <a href="{{ route('adm.article.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        Add Article
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Headline</th>
                                    <th>Short Description</th>
                                    <th>Views</th>
                                    <th>Likes</th>
                                    <th>Comments</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Headline</th>
                                    <th>Short Description</th>
                                    <th>Views</th>
                                    <th>Likes</th>
                                    <th>Comments</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $article->title }}</td>
                                        <td>{{ $article->description }}</td>
                                        <td>{{ $article->views_counter }}</td>
                                        <td>{{ $article->likes_counter }}</td>
                                        <td>{{ $article->comments_counter }}</td>
                                        <td>
                                            <a href="{{ route('adm.article.edit', $article->id) }}" class="btn btn-success btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <x-delete-btn :url="route('adm.article.delete', $article->id)" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
