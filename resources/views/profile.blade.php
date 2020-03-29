@extends('layout.main')

@section('title','Covmunity - Dashboard')

@section('body')
<body>
    @include('layout.header')

    <div class="header pb-6 d-flex align-items-center" style="min-height: 350px; background-image: url(../../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white">Hello {{ $user->name }}</h1>
                    <p class="text-white mt-0 mb-3">This is your profile page. You can edit your account information and related.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-4 order-xl-2">
                <div class="card card-profile">
                    <img src="../../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="../../assets/img/theme/team-4.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
                            <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">Friends</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{ count($user->threads) }}</span>
                                        <span class="description">Thread</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{ count($user->replies) }}</span>
                                        <span class="description">Replies</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 class="h3">
                                {{ $user->name }}
                            </h5>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>
                                @if (isset($user->country->long_name))
                                    {{ $user->country->long_name }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 order-xl-1">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card bg-gradient-info border-0">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Thread Contribution</h5>
                                        <span class="h2 font-weight-bold mb-0 text-white">{{ count($user->threads) }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                            <i class="ni ni-single-copy-04"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card bg-gradient-danger border-0">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Reply Thread</h5>
                                        <span class="h2 font-weight-bold mb-0 text-white">{{ count($user->replies) }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                            <i class="ni ni-send"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-default">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0 text-white">Edit profile </h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="text-white" action="{{ route('submitProfile') }}" method="post">
                            @csrf
                            <h6 class="heading-small text-muted mb-4 text-white">Account information</h6>
                            <div class="pl-lg-4">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-white" for="input-username">Username</label>
                                            <input type="text" name="name" id="input-username" class="form-control text-dark" placeholder="Username" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-white" for="input-email">Email address</label>
                                            <input type="email" name="email" id="input-email" class="form-control text-dark" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select class="form-control text-dark" id="country" name="country" value="none">
                                            @if (isset($user->country->long_name))
                                            <option value="{{ $user->country_id }}" selected disabled hidden>{{ $user->country->long_name }}</option>
                                            @else
                                            <option value="none" selected disabled hidden>Select an Option</option>
                                            @endif

                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->long_name }}</option>
                                            @endforeach
                                            </select>
                                          </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="from-group col-xl-12 col-md-12 col-xs-8">
                                        <button type="submit" id="submit" class="btn btn-secondary btn-lg btn-block">Change Profile</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
