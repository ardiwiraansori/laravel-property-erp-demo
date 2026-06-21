<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UnitController extends Controller
{
    public function index(Request $request)
    {
        $query = Unit::query()->latest();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($unitQuery) use ($search) {
                $unitQuery->where('unit_number', 'like', "%{$search}%")
                    ->orWhere('property_name', 'like', "%{$search}%")
                    ->orWhere('block_name', 'like', "%{$search}%")
                    ->orWhere('unit_type', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $units = $query->paginate(10)->withQueryString();

        $summary = [
            'total' => Unit::count(),
            'available' => Unit::where('status', 'available')->count(),
            'booked' => Unit::where('status', 'booked')->count(),
            'sold_occupied' => Unit::whereIn('status', ['sold', 'occupied'])->count(),
        ];

        return view('erp.units.index', [
            'units' => $units,
            'summary' => $summary,
            'statuses' => $this->statuses(),
        ]);
    }

    public function create()
    {
        return view('erp.units.create', [
            'unit' => new Unit([
                'status' => 'available',
                'bedrooms' => 2,
                'bathrooms' => 1,
            ]),
            'statuses' => $this->statuses(),
        ]);
    }

    public function store(Request $request)
    {
        Unit::create($this->validatedData($request));

        return redirect()
            ->route('erp.units')
            ->with('success', 'Unit baru berhasil ditambahkan.');
    }

    public function show(Unit $unit)
    {
        return redirect()->route('erp.units.edit', $unit);
    }

    public function edit(Unit $unit)
    {
        return view('erp.units.edit', [
            'unit' => $unit,
            'statuses' => $this->statuses(),
        ]);
    }

    public function update(Request $request, Unit $unit)
    {
        $unit->update($this->validatedData($request, $unit));

        return redirect()
            ->route('erp.units')
            ->with('success', 'Data unit berhasil diperbarui.');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()
            ->route('erp.units')
            ->with('success', 'Unit berhasil dihapus.');
    }

    private function validatedData(Request $request, ?Unit $unit = null): array
    {
        $unitNumberRule = Rule::unique('units', 'unit_number');

        if ($unit) {
            $unitNumberRule->ignore($unit->id);
        }

        return $request->validate([
            'property_name' => ['required', 'string', 'max:150'],
            'block_name' => ['required', 'string', 'max:100'],
            'unit_number' => ['required', 'string', 'max:50', $unitNumberRule],
            'unit_type' => ['nullable', 'string', 'max:100'],
            'land_area' => ['nullable', 'integer', 'min:0'],
            'building_area' => ['nullable', 'integer', 'min:0'],
            'bedrooms' => ['required', 'integer', 'min:0', 'max:20'],
            'bathrooms' => ['required', 'integer', 'min:0', 'max:20'],
            'price' => ['required', 'numeric', 'min:0'],
            'booking_fee' => ['nullable', 'numeric', 'min:0'],
            'status' => ['required', Rule::in(array_keys($this->statuses()))],
            'notes' => ['nullable', 'string'],
        ]);
    }

    private function statuses(): array
    {
        return [
            'available' => 'Available',
            'booked' => 'Booked',
            'sold' => 'Sold',
            'occupied' => 'Occupied',
            'maintenance' => 'Maintenance',
            'handover' => 'Handover',
        ];
    }
}