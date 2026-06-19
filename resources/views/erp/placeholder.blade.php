@extends('layouts.user_type.auth')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-body p-4">
          <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
            <div>
              <p class="text-sm text-info text-gradient text-uppercase font-weight-bold mb-2">{{ $module ?? 'Property ERP' }}</p>
              <h4 class="font-weight-bolder mb-2">{{ $title ?? 'ERP Demo Page' }}</h4>
              <p class="text-sm text-secondary mb-0" style="max-width: 720px;">{{ $description ?? 'Demo page for Laravel Property ERP portfolio.' }}</p>
            </div>
            <span class="badge bg-gradient-primary px-3 py-2">Static UI Demo</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    @foreach (($stats ?? []) as $label => $value)
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ $label }}</p>
                  <h5 class="font-weight-bolder mb-0">{{ $value }}</h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-chart-bar-32 text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="row mt-4">
    <div class="col-lg-8 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-header pb-0">
          <h6>{{ $title ?? 'Demo Data' }} Overview</h6>
          <p class="text-sm mb-0">Contoh data statis untuk memperlihatkan alur dan layout modul.</p>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reference</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Related</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Value / Notes</th>
                </tr>
              </thead>
              <tbody>
                @foreach (($rows ?? []) as $row)
                  <tr>
                    <td>
                      <div class="d-flex px-3 py-1">
                        <div class="icon icon-shape icon-sm bg-gradient-primary shadow text-center border-radius-md me-3">
                          <i class="fas fa-layer-group text-white text-sm opacity-10"></i>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $row[0] ?? '-' }}</h6>
                          <p class="text-xs text-secondary mb-0">{{ $module ?? 'ERP' }}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{ $row[1] ?? '-' }}</p>
                      <p class="text-xs text-secondary mb-0">Property ERP Demo</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm bg-gradient-info">{{ $row[2] ?? '-' }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $row[3] ?? '-' }}</span>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card h-100">
        <div class="card-header pb-0">
          <h6>Module Notes</h6>
          <p class="text-sm mb-0">Tahap portfolio demo</p>
        </div>
        <div class="card-body">
          <div class="timeline timeline-one-side">
            <div class="timeline-block mb-3">
              <span class="timeline-step"><i class="ni ni-check-bold text-success text-gradient"></i></span>
              <div class="timeline-content">
                <h6 class="text-dark text-sm font-weight-bold mb-0">Navigation ready</h6>
                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Menu sudah mengikuti flow ERP properti.</p>
              </div>
            </div>
            <div class="timeline-block mb-3">
              <span class="timeline-step"><i class="ni ni-app text-info text-gradient"></i></span>
              <div class="timeline-content">
                <h6 class="text-dark text-sm font-weight-bold mb-0">Static module screen</h6>
                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Data masih dummy sebelum CRUD dibuat.</p>
              </div>
            </div>
            <div class="timeline-block">
              <span class="timeline-step"><i class="ni ni-settings text-warning text-gradient"></i></span>
              <div class="timeline-content">
                <h6 class="text-dark text-sm font-weight-bold mb-0">Next step</h6>
                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Buat database master unit dan konsumen.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
