<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Department Name *</label>
        <input type="text" name="name"
               class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $department->name ?? '') }}" required>
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Slug (optional)</label>
        <input type="text" name="slug"
               class="form-control @error('slug') is-invalid @enderror"
               value="{{ old('slug', $department->slug ?? '') }}"
               placeholder="pensions-administration">
        @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
        <small class="text-muted">If left blank, it will be generated from the name.</small>
    </div>

    <div class="col-md-6">
        <label class="form-label">Icon Class (optional)</label>
        <input type="text" name="icon"
               class="form-control @error('icon') is-invalid @enderror"
               value="{{ old('icon', $department->icon ?? '') }}"
               placeholder="icon-report">
        @error('icon') <div class="invalid-feedback">{{ $message }}</div> @enderror
        <small class="text-muted">Example: icon-report, icon-planning, icon-tax-strategy11</small>
    </div>

    <div class="col-md-6">
        <label class="form-label">Display Order</label>
        <input type="number" name="display_order"
               class="form-control @error('display_order') is-invalid @enderror"
               value="{{ old('display_order', $department->display_order ?? 0) }}">
        @error('display_order') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Short Description (Card text)</label>
        <textarea name="short_description" rows="3"
                  class="form-control @error('short_description') is-invalid @enderror"
                  placeholder="Short summary shown on the cards...">{{ old('short_description', $department->short_description ?? '') }}</textarea>
        @error('short_description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Full Description (Details page)</label>
        <textarea name="description" rows="6"
                  class="form-control @error('description') is-invalid @enderror"
                  placeholder="Full department content...">{{ old('description', $department->description ?? '') }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <div class="form-check mt-1">
            <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                {{ old('is_active', $department->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Active</label>
        </div>
    </div>
</div>

<hr class="my-4">
