<form action="{{ $action }}" method="POST">
    @csrf

    @isset($method)
        @method($method)
    @endisset

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Property Name</label>
            <input type="text" name="property_name" class="form-control"
                value="{{ old('property_name', $unit->property_name) }}">
            @error('property_name')
                <p class="text-danger text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Block Name</label>
            <input type="text" name="block_name" class="form-control"
                value="{{ old('block_name', $unit->block_name) }}">
            @error('block_name')
                <p class="text-danger text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Unit Number</label>
            <input type="text" name="unit_number" class="form-control"
                value="{{ old('unit_number', $unit->unit_number) }}">
            @error('unit_number')
                <p class="text-danger text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Unit Type</label>
            <input type="text" name="unit_type" class="form-control" value="{{ old('unit_type', $unit->unit_type) }}"
                placeholder="Type 45/90">
            @error('unit_type')
                <p class="text-danger text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                @foreach ($statuses as $value => $label)
                    <option value="{{ $value }}"
                        {{ old('status', $unit->status) === $value ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
            @error('status')
                <p class="text-danger text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-3 mb-3">
            <label class="form-label">Land Area</label>
            <input type="number" name="land_area" class="form-control"
                value="{{ old('land_area', $unit->land_area) }}">
            @error('land_area')
                <p class="text-danger text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-3 mb-3">
            <label class="form-label">Building Area</label>
            <input type="number" name="building_area" class="form-control"
                value="{{ old('building_area', $unit->building_area) }}">
            @error('building_area')
                <p class="text-danger text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-3 mb-3">
            <label class="form-label">Bedrooms</label>
            <input type="number" name="bedrooms" class="form-control"
                value="{{ old('bedrooms', $unit->bedrooms ?? 2) }}">
            @error('bedrooms')
                <p class="text-danger text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-3 mb-3">
            <label class="form-label">Bathrooms</label>
            <input type="number" name="bathrooms" class="form-control"
                value="{{ old('bathrooms', $unit->bathrooms ?? 1) }}">
            @error('bathrooms')
                <p class="text-danger text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $unit->price) }}">
            @error('price')
                <p class="text-danger text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Booking Fee</label>
            <input type="number" name="booking_fee" class="form-control"
                value="{{ old('booking_fee', $unit->booking_fee) }}">
            @error('booking_fee')
                <p class="text-danger text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-12 mb-3">
            <label class="form-label">Notes</label>
            <textarea name="notes" class="form-control" rows="3">{{ old('notes', $unit->notes) }}</textarea>
            @error('notes')
                <p class="text-danger text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('erp.units') }}" class="btn btn-outline-secondary mb-0">Cancel</a>
        <button type="submit" class="btn bg-gradient-primary mb-0">{{ $buttonLabel }}</button>
    </div>
</form>
