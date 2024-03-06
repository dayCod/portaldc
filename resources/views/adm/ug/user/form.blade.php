@extends('adm.layout.master')

@section('title', 'Artikel')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users Group - Users</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Users Form</h6>
                    <a href="{{ route('adm.user.index') }}" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ $actions['url'] }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="{{ $actions['method'] }}">

                        <div class="form-group">
                            <label for="name">User Name <sup class="text-danger">*</sup></label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="User Name"
                                name="name"
                                value="{{ old('name', @$user->name) }}"
                                required
                            >
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">User Email <sup class="text-danger">*</sup></label>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="User Email"
                                name="email"
                                value="{{ old('email', @$user->email) }}"
                                required
                            >
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">
                                @if(@$user)
                                    New Password
                                @else
                                    User Password <sup class="text-danger">*</sup>
                                @endif
                            </label>
                            <input
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Password"
                                name="password"
                                value="{{ old('password') }}"
                                @if(!@$user) required @endif
                            >
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Roles <sup class="text-danger">*</sup></label>
                            <select name="role_id" class="form-control @error('role_id') border border-danger @enderror" required>
                                <option value="" selected hidden>Roles</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @selected(old('role_id', @$user->role_id) == $role->id)>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <div class="invalid-feedback">
                                    {{ $errors->first('role_id') }}
                                </div>
                            @enderror
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

