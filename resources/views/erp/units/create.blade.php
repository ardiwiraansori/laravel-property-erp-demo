@extends('layouts.user_type.auth')

@section('content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header pb-0">
                    <p class="text-sm text-info text-gradient text-uppercase font-weight-bold mb-2">Master Data</p>
                    <h5 class="mb-0">Add Unit</h5>
                    <p class="text-sm text-secondary mb-0">Input unit properti baru untuk inventory penjualan.</p>
                </div>

                <div class="card-body">
                    @include('erp.units._form', [
                        'action' => route('erp.units.store'),
                        'buttonLabel' => 'Save Unit',
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection
