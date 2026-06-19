@extends('layouts.user_type.auth')

@section('content')
@php
    $stats = [
        ['label' => 'Total Unit', 'value' => '128', 'delta' => '+12 baru', 'icon' => 'ni ni-shop', 'trend' => 'success'],
        ['label' => 'Occupancy Rate', 'value' => '87%', 'delta' => '+4% bulan ini', 'icon' => 'ni ni-chart-bar-32', 'trend' => 'success'],
        ['label' => 'Invoice Jatuh Tempo', 'value' => 'Rp 82,5 jt', 'delta' => '18 invoice', 'icon' => 'ni ni-credit-card', 'trend' => 'warning'],
        ['label' => 'Revenue Bulanan', 'value' => 'Rp 436 jt', 'delta' => '+18% YoY', 'icon' => 'ni ni-money-coins', 'trend' => 'success'],
    ];

    $units = [
        ['unit' => 'A-1201', 'project' => 'Skyline Residence', 'tenant' => 'PT Nusantara Digital', 'status' => 'Occupied', 'invoice' => 'Paid'],
        ['unit' => 'B-0807', 'project' => 'Citra Office Park', 'tenant' => 'CV Sumber Makmur', 'status' => 'Occupied', 'invoice' => 'Due Soon'],
        ['unit' => 'C-0210', 'project' => 'Green Valley Cluster', 'tenant' => '-', 'status' => 'Available', 'invoice' => '-'],
        ['unit' => 'A-0315', 'project' => 'Skyline Residence', 'tenant' => 'Andini Pratama', 'status' => 'Maintenance', 'invoice' => 'Pending'],
    ];

    $activities = [
        ['time' => '09:15', 'title' => 'Booking unit C-0210 dibuat oleh sales', 'meta' => 'Lead: Budi Santoso'],
        ['time' => '10:40', 'title' => 'Invoice sewa B-0807 menunggu pembayaran', 'meta' => 'Due date: minggu ini'],
        ['time' => '13:20', 'title' => 'Maintenance AC unit A-0315 dijadwalkan', 'meta' => 'Vendor: CoolAir Service'],
        ['time' => '15:00', 'title' => 'Kontrak Skyline Residence diperpanjang', 'meta' => 'Durasi: 12 bulan'],
    ];
@endphp

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-body p-4">
        <div class="row align-items-center">
          <div class="col-lg-8">
            <p class="text-sm mb-1 text-uppercase font-weight-bold text-gradient text-info">Portfolio Demo</p>
            <h4 class="font-weight-bolder mb-2">Laravel Property ERP Dashboard</h4>
            <p class="mb-0 text-sm text-secondary">
              Demo alur operasional properti: unit, tenant, invoice, occupancy, dan maintenance. Data pada halaman ini masih statis untuk showcase UI sebelum modul database dibuat.
            </p>
          </div>
          <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
            <a href="{{ url('tables') }}" class="btn bg-gradient-info mb-0">Lihat tabel demo</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  @foreach ($stats as $stat)
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ $stat['label'] }}</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $stat['value'] }}
                  <span class="text-{{ $stat['trend'] }} text-sm font-weight-bolder">{{ $stat['delta'] }}</span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="{{ $stat['icon'] }} text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>

<div class="row mt-4">
  <div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100">
      <div class="card-header pb-0">
        <h6>Revenue & Occupancy</h6>
        <p class="text-sm mb-0">
          <i class="fa fa-arrow-up text-success"></i>
          <span class="font-weight-bold">18% growth</span> dibanding tahun lalu
        </p>
      </div>
      <div class="card-body p-3">
        <div class="chart">
          <canvas id="property-revenue-chart" class="chart-canvas" height="300"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card h-100">
      <div class="card-header pb-0">
        <h6>Pipeline Leasing</h6>
        <p class="text-sm mb-0">Status prospek dan kontrak aktif.</p>
      </div>
      <div class="card-body p-3">
        <div class="timeline timeline-one-side">
          @foreach ($activities as $activity)
            <div class="timeline-block mb-3">
              <span class="timeline-step">
                <i class="ni ni-bell-55 text-info text-gradient"></i>
              </span>
              <div class="timeline-content">
                <h6 class="text-dark text-sm font-weight-bold mb-0">{{ $activity['title'] }}</h6>
                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $activity['time'] }} · {{ $activity['meta'] }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-8 mb-lg-0 mb-4">
    <div class="card">
      <div class="card-header pb-0">
        <div class="row">
          <div class="col-lg-6 col-7">
            <h6>Unit Monitoring</h6>
            <p class="text-sm mb-0">Snapshot unit, tenant, dan status tagihan.</p>
          </div>
          <div class="col-lg-6 col-5 my-auto text-end">
            <span class="badge badge-sm bg-gradient-info">Demo Data</span>
          </div>
        </div>
      </div>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Project</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tenant</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invoice</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($units as $unit)
                <tr>
                  <td>
                    <div class="d-flex px-3 py-1">
                      <div class="icon icon-shape icon-sm shadow border-radius-md bg-gradient-primary text-center me-3 d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-white"></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $unit['unit'] }}</h6>
                      </div>
                    </div>
                  </td>
                  <td><p class="text-sm font-weight-bold mb-0">{{ $unit['project'] }}</p></td>
                  <td><p class="text-sm mb-0">{{ $unit['tenant'] }}</p></td>
                  <td class="align-middle text-center text-sm">
                    @php
                      $statusClass = match ($unit['status']) {
                        'Occupied' => 'success',
                        'Available' => 'info',
                        'Maintenance' => 'warning',
                        default => 'secondary',
                      };
                    @endphp
                    <span class="badge badge-sm bg-gradient-{{ $statusClass }}">{{ $unit['status'] }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $unit['invoice'] }}</span>
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
        <h6>ERP Modules Roadmap</h6>
        <p class="text-sm mb-0">Rencana modul portfolio.</p>
      </div>
      <div class="card-body p-3">
        <ul class="list-group">
          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm me-3 bg-gradient-success shadow text-center"><i class="ni ni-check-bold text-white opacity-10"></i></div>
              <div class="d-flex flex-column"><h6 class="mb-1 text-dark text-sm">Authentication</h6><span class="text-xs">Login, logout, demo account</span></div>
            </div>
            <span class="badge badge-sm bg-gradient-success">Done</span>
          </li>
          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm me-3 bg-gradient-info shadow text-center"><i class="ni ni-app text-white opacity-10"></i></div>
              <div class="d-flex flex-column"><h6 class="mb-1 text-dark text-sm">Master Data</h6><span class="text-xs">Projects, towers, units</span></div>
            </div>
            <span class="badge badge-sm bg-gradient-info">Next</span>
          </li>
          <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm me-3 bg-gradient-secondary shadow text-center"><i class="ni ni-single-copy-04 text-white opacity-10"></i></div>
              <div class="d-flex flex-column"><h6 class="mb-1 text-dark text-sm">Billing</h6><span class="text-xs">Invoices, payments, receipts</span></div>
            </div>
            <span class="badge badge-sm bg-gradient-secondary">Planned</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection

@push('dashboard')
<script>
  const ctx = document.getElementById('property-revenue-chart').getContext('2d');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
      datasets: [{
        label: 'Revenue (juta rupiah)',
        tension: 0.4,
        borderWidth: 3,
        pointRadius: 2,
        data: [320, 348, 372, 390, 418, 436]
      }, {
        label: 'Occupancy (%)',
        tension: 0.4,
        borderWidth: 3,
        pointRadius: 2,
        data: [78, 80, 81, 84, 86, 87]
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: true }
      },
      interaction: {
        intersect: false,
        mode: 'index'
      },
      scales: {
        y: {
          grid: { drawBorder: false, borderDash: [5, 5] },
          ticks: { padding: 10 }
        },
        x: {
          grid: { drawBorder: false, display: false },
          ticks: { padding: 10 }
        }
      }
    }
  });
</script>
@endpush
