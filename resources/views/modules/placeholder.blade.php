@extends('layouts.user_type.auth')

@section('content')
@php
    $module = $module ?? [
        'eyebrow' => 'ERP Module',
        'title' => 'Demo Module',
        'description' => 'Halaman demo untuk showcase UI ERP properti.',
        'icon' => 'fa-layer-group',
        'stats' => [],
        'rows' => [],
    ];
@endphp

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <p class="text-sm text-uppercase text-info text-gradient font-weight-bold mb-2">{{ $module['eyebrow'] }}</p>
                        <h4 class="font-weight-bolder mb-2">{{ $module['title'] }}</h4>
                        <p class="text-sm text-secondary mb-0">{{ $module['description'] }}</p>
                    </div>
                    <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg d-inline-flex align-items-center justify-content-center">
                            <i class="fas {{ $module['icon'] }} text-white" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @foreach ($module['stats'] as $stat)
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ $stat['label'] }}</p>
                    <h5 class="font-weight-bolder mb-0">{{ $stat['value'] }}</h5>
                    <span class="text-xs text-secondary">{{ $stat['note'] }}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row mt-4">
    <div class="col-lg-8 mb-lg-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <h6 class="mb-0">Demo Data</h6>
                <p class="text-sm mb-0">Contoh tampilan list untuk modul {{ $module['title'] }}.</p>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Metric</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($module['rows'] as $row)
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="icon icon-shape icon-sm bg-gradient-primary shadow text-center border-radius-md me-3 d-flex align-items-center justify-content-center">
                                                <i class="fas {{ $module['icon'] }} text-white text-xs" aria-hidden="true"></i>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $row['name'] }}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ $row['meta'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><p class="text-xs font-weight-bold mb-0">{{ $row['category'] }}</p></td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-{{ $row['color'] ?? 'success' }}">{{ $row['status'] }}</span>
                                    </td>
                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $row['metric'] }}</span></td>
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
                <h6>Next Development</h6>
                <p class="text-sm">Tahap berikutnya saat modul database mulai dibuat.</p>
            </div>
            <div class="card-body p-3">
                <div class="timeline timeline-one-side">
                    <div class="timeline-block mb-3">
                        <span class="timeline-step"><i class="fas fa-database text-info text-gradient"></i></span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">Migration & Model</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Struktur tabel utama modul.</p>
                        </div>
                    </div>
                    <div class="timeline-block mb-3">
                        <span class="timeline-step"><i class="fas fa-edit text-warning text-gradient"></i></span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">CRUD Form</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Create, update, search, filter.</p>
                        </div>
                    </div>
                    <div class="timeline-block">
                        <span class="timeline-step"><i class="fas fa-shield-alt text-success text-gradient"></i></span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">Role Permission</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Admin, finance, sales, technician.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
