<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Full Name *</label>
        <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror"
               value="{{ old('full_name', $member->full_name ?? '') }}" required>
        @error('full_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Position Title</label>
        <input type="text" name="position_title" class="form-control @error('position_title') is-invalid @enderror"
               value="{{ old('position_title', $member->position_title ?? '') }}">
        @error('position_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Qualifications</label>
        <textarea name="qualifications" rows="5"
                  class="form-control @error('qualifications') is-invalid @enderror">{{ old('qualifications', $member->qualifications ?? '') }}</textarea>
        @error('qualifications') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Photo</label>
        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
        @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror

        @if(!empty($member?->photo))
            <div class="mt-2">
                <img src="{{ asset('storage/'.$member->photo) }}" style="width:120px;height:120px;object-fit:cover;border-radius:12px;">
            </div>
        @endif
    </div>

    <div class="col-md-3">
        <label class="form-label">Display Order</label>
        <input type="number" name="display_order" class="form-control @error('display_order') is-invalid @enderror"
               value="{{ old('display_order', $member->display_order ?? 0) }}">
        @error('display_order') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-3 d-flex align-items-end">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                   {{ old('is_active', $member->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">
                Active
            </label>
        </div>
    </div>
</div>

<hr class="my-4">
