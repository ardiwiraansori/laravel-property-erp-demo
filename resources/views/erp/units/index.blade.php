@extends('layouts.user_type.auth')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body p-4">
                    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
                        <div>
                            <p class="text-sm text-info text-gradient text-uppercase font-weight-bold mb-2">Master Data</p>
                            <h4 class="font-weight-bolder mb-2">Units</h4>
                            <p class="text-sm text-secondary mb-0">
                                Master unit properti, harga, status booking, dan status serah terima.
                            </p>
                        </div>
                        <a href="{{ route('erp.units.create') }}" class="btn bg-gradient-primary mb-0">
                            <i class="fas fa-plus me-1"></i> Add Unit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success text-white">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <p class="text-sm mb-0 font-weight-bold">Total Units</p>
                    <h5 class="font-weight-bolder mb-0">{{ $summary['total'] }}</h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <p class="text-sm mb-0 font-weight-bold">Available</p>
                    <h5 class="font-weight-bolder mb-0">{{ $summary['available'] }}</h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <p class="text-sm mb-0 font-weight-bold">Booked</p>
                    <h5 class="font-weight-bolder mb-0">{{ $summary['booked'] }}</h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <p class="text-sm mb-0 font-weight-bold">Sold / Occupied</p>
                    <h5 class="font-weight-bolder mb-0">{{ $summary['sold_occupied'] }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <form method="GET" action="{{ route('erp.units') }}" class="row g-3 align-items-end">
                        <div class="col-md-5">
                            <label class="form-label">Search</label>
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Unit number, property, block, type">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="">All Status</option>
                                @foreach ($statuses as $value => $label)
                                    <option value="{{ $value }}"
                                        {{ request('status') === $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn bg-gradient-info mb-0">Filter</button>
                            <a href="{{ route('erp.units') }}" class="btn btn-outline-secondary mb-0">Reset</a>
                        </div>
                    </form>
                </div>

                <div class="card-body px-0 pt-3 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Area</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Price</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($units as $unit)
                                    @php
                                        $badgeClass =
                                            [
                                                'available' => 'bg-gradient-success',
                                                'booked' => 'bg-gradient-info',
                                                'sold' => 'bg-gradient-primary',
                                                'occupied' => 'bg-gradient-secondary',
                                                'maintenance' => 'bg-gradient-warning',
                                                'handover' => 'bg-gradient-dark',
                                            ][$unit->status] ?? 'bg-gradient-secondary';
                                    @endphp

                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div
                                                    class="icon icon-shape icon-sm bg-gradient-primary shadow text-center border-radius-md me-3">
                                                    <i class="fas fa-home text-white text-sm opacity-10"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 text-sm">{{ $unit->unit_number }}</h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $unit->property_name }} / {{ $unit->block_name }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $unit->unit_type ?? '-' }}</p>
                                            <p class="text-xs text-secondary mb-0">
                                                LT {{ $unit->land_area ?? '-' }} / LB {{ $unit->building_area ?? '-' }}
                                            </p>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                Rp {{ number_format($unit->price, 0, ',', '.') }}
                                            </span>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm {{ $badgeClass }}">
                                                {{ $statuses[$unit->status] ?? $unit->status }}
                                            </span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <a href="{{ route('erp.units.edit', $unit) }}"
                                                class="btn btn-link text-dark px-2 mb-0">
                                                <i class="fas fa-pencil-alt text-dark me-1"></i>Edit
                                            </a>

                                            <form action="{{ route('erp.units.destroy', $unit) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Hapus unit ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger px-2 mb-0">
                                                    <i class="fas fa-trash text-danger me-1"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-secondary text-sm">
                                            Belum ada data unit.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="px-4 pt-3">
                        {{ $units->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
