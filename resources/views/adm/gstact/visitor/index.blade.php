@extends('adm.layout.master')

@section('title', 'Visitor Log')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Guest Activities - Visitor Log</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Visitor Log Data</h6>
                    {{-- <a href="{{ route('adm.article.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        Add Article
                    </a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Session ID</th>
                                    <th>IP Address</th>
                                    <th>Status Code</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Session ID</th>
                                    <th>IP Address</th>
                                    <th>Status Code</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($visitors as $visitor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $visitor->session_id }}</td>
                                        <td>{{ $visitor->ip }}</td>
                                        <td>{{ $visitor->status_code }}</td>
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
