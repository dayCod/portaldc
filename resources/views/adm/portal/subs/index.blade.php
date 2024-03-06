@extends('adm.layout.master')

@section('title', 'Subscribers')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Portal Data - Subscribers</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Subscribers Data</h6>
                    {{-- <a href="{{ route('adm.subs.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        Add Subsri
                    </a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($subscribers as $subs)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subs->email }}</td>
                                        <td>
                                            <x-delete-btn :url="route('adm.subs.delete', $subs->id)" />
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
