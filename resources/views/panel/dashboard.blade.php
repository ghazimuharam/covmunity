@extends('layout.main')

@section('title','Covmunity - Dashboard')

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
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Confirmed Case</h5>
                      <span class="h2 font-weight-bold mb-0" id="confirmedCase">Fetching..</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-world"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Total confirmed case of Covid-19</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Recovered</h5>
                      <span class="h2 font-weight-bold mb-0" id="caseRecovered">Fetching..</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-world"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Total recovered case of Covid-19</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Deaths</h5>
                      <span class="h2 font-weight-bold mb-0" id="deathsCase">Fetching..</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-world"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Total deaths case of Covid-19</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Deaths rate</h5>
                      <span class="h2 font-weight-bold mb-0" id='deathsRate'>Fetching..</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Total deaths divide to all confirmed case</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-8">
          <div class="card bg-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                  <h5 class="h3 text-white mb-0">Global Confirmed Case</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h5 class="h3 mb-0">Cov-#Tips</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush" data-toggle="checklist">
                    <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                        <div class="checklist-item checklist-item-primary">
                          <div class="checklist-info">
                          <h5 class="checklist-title mb-0">Wash your hands frequently</h5>
                        </div>
                        <div>
                          <div class="custom-control custom-checkbox custom-checkbox-primary">
                            <input class="custom-control-input" id="chk-todo-task-1" type="checkbox">
                            <label class="custom-control-label" for="chk-todo-task-1"></label>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                      <div class="checklist-item checklist-item-warning">
                        <div class="checklist-info">
                          <h5 class="checklist-title mb-0">Maintain physical distancing</h5>
                        </div>
                        <div>
                          <div class="custom-control custom-checkbox custom-checkbox-warning">
                            <input class="custom-control-input" id="chk-todo-task-2" type="checkbox">
                            <label class="custom-control-label" for="chk-todo-task-2"></label>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                      <div class="checklist-item checklist-item-success">
                        <div class="checklist-info">
                          <h5 class="checklist-title mb-0">Eat healthy food</h5>
                        </div>
                        <div>
                          <div class="custom-control custom-checkbox custom-checkbox-success">
                            <input class="custom-control-input" id="chk-todo-task-3" type="checkbox">
                            <label class="custom-control-label" for="chk-todo-task-3"></label>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                        <div class="checklist-item checklist-item-info checklist-item">
                          <div class="checklist-info">
                            <h5 class="checklist-title mb-0">Stay hydrated</h5>
                          </div>
                          <div>
                            <div class="custom-control custom-checkbox custom-checkbox-info">
                              <input class="custom-control-input" id="chk-todo-task-4" type="checkbox">
                              <label class="custom-control-label" for="chk-todo-task-4"></label>
                            </div>
                          </div>
                        </div>
                      </li>
                    <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                      <div class="checklist-item checklist-item-dark checklist-item">
                        <div class="checklist-info">
                          <h5 class="checklist-title mb-0">Stay informed and follow advice given by your healthcare provider</h5>
                        </div>
                        <div>
                          <div class="custom-control custom-checkbox custom-checkbox-dark">
                            <input class="custom-control-input" id="chk-todo-task-4" type="checkbox">
                            <label class="custom-control-label" for="chk-todo-task-4"></label>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
            </div>
          </div>
        </div>
      </div>
      @include('layout.footer')
    <script>
        var confirmed = @json($confirmed);
        var date = @json($date);
    </script>

  <script src="{{ asset('fetchData.js') }}"></script>
@endsection
