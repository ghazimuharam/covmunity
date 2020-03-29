@extends('layout.main')

@section('title','Covmunity - Forum')

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
                            <li class="breadcrumb-item"><a href="{{ route('basic') }}">Basic</a></li>
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
                        <h6 class="text-light text-uppercase ls-1 mb-1">Welcome to Covmunity Basic</h6>
                        <h3 class="h1 text-white mb-0">Basic</h3>
                    </div>
              </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
              <div class="table-responsive py-4">
                <table class="table table-dark table-flush" id="datatable-buttons">
                  <thead class="thead-dark">
                    <tr>
                      <th>Subject</th>
                      <th>Last update</th>
                      <th>Starter</th>
                      <th>Views</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($allThreads as $thread)
                        <tr>
                            <td class="col-6">
                                <a href="{{ route('viewbasic',$thread->id) }}"><h1 class="text-white">{{ $thread->subject }}</h1></a>
                                <span>{{Str::limit(strip_tags($thread->thread),30,' (...)')}}</span>
                            </td>
                            <td>
                                <h3 class="text-white">{{ $thread->updated_at }}</h3>
                            </td>
                            <td>
                                <h3 class="text-white text-capitalize">{{ $thread->user->name }}</h3>
                            </td>
                            <td>
                                <h3 class="text-white">{{ $thread->views }}</h3>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
@endsection
