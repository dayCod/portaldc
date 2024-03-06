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
                    <h6 class="m-0 font-weight-bold text-primary">Article Form</h6>
                    <a href="{{ route('adm.article.index') }}" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ $actions['url'] }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="{{ $actions['method'] }}">

                        <div class="form-group">
                            <label for="title">Headline / Title <sup class="text-danger">*</sup></label>
                            <input
                                type="text"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="Headline / Title"
                                name="title"
                                value="{{ old('title', @$article->title) }}"
                                required
                            >
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">Short Description <sup class="text-danger">*</sup></label>
                            <input
                                type="text"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Short Description"
                                name="description"
                                value="{{ old('description', @$article->description) }}"
                                required
                            >
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">URL References</label>
                            <input
                                type="text"
                                class="form-control @error('reference_url') is-invalid @enderror"
                                placeholder="URL References"
                                name="reference_url"
                                value="{{ old('reference_url') }}"
                            >
                            @error('reference_url')
                                <div class="invalid-feedback">
                                    {{ $errors->first('reference_url') }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Long Text</label>
                            <textarea rows="10" class="form-control summernotes" data-placeholder="Long Text" name="long_text">{{ old('long_text', @$article->contentArticle->long_text) }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ $actions['act'] }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

