@extends('layouts.user_type.auth')

@section('content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header pb-0">
                    <p class="text-sm text-info text-gradient text-uppercase font-weight-bold mb-2">Master Data</p>
                    <h5 class="mb-0">Edit Unit {{ $unit->unit_number }}</h5>
                    <p class="text-sm text-secondary mb-0">Update data harga, spesifikasi, dan status unit.</p>
                </div>

                <div class="card-body">
                    @include('erp.units._form', [
                        'action' => route('erp.units.update', $unit),
                        'method' => 'PUT',
                        'buttonLabel' => 'Update Unit',
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection
