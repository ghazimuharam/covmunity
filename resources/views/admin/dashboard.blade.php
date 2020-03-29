@extends('layout.main')

@section('title','Covmunity - Admin Forum')

@section('body')
<body>
  @include('layout.header')
            <div class="header bg-primary pb-6">
                <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('adminhome') }}">Admin Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Default</li>
                        </ol>
                        </nav>
                    </div>
                    </div>
                </div>
                </div>
            </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
          <div class="col">
            <div class="card bg-default">
              <!-- Card header -->
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-light text-uppercase ls-1 mb-1">Admin Panel</h6>
                            <h3 class="h1 text-white mb-0">General Settings</h3>
                        </div>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card card-pricing bg-gradient-secondary border-0 text-center mb-4">
                                <div class="card-header bg-transparent">
                                  <h4 class="text-uppercase ls-1 py-3 mb-0">General Settings</h4>
                                </div>
                                <div class="card-body px-lg-7">
                                  <a type="button" href="{{ route('generalSettings') }}" class="btn btn-default mb-3 text-white">Go</a>
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-pricing bg-gradient-secondary border-0 text-center mb-4">
                                <div class="card-header bg-transparent">
                                  <h4 class="text-uppercase ls-1 py-3 mb-0">Basics Management</h4>
                                </div>
                                <div class="card-body px-lg-7">
                                    <a type="button" href="{{ route('basicsManagement') }}" class="btn btn-default mb-3 text-white">Go</a>
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-pricing bg-gradient-secondary border-0 text-center mb-4">
                                <div class="card-header bg-transparent">
                                  <h4 class="text-uppercase ls-1 py-3 mb-0">Threads Management</h4>
                                </div>
                                <div class="card-body px-lg-7">
                                    <a type="button" href="{{ route('threadsManagement') }}" class="btn btn-default mb-3 text-white">Go</a>
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-pricing bg-gradient-secondary border-0 text-center mb-4">
                                <div class="card-header bg-transparent">
                                  <h4 class="text-uppercase ls-1 py-3 mb-0">Users Management</h4>
                                </div>
                                <div class="card-body px-lg-7">
                                    <a type="button" href="{{ route('usersManagement') }}" class="btn btn-default mb-3 text-white">Go</a>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
