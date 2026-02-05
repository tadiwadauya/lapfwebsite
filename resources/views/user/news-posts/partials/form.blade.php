@php
    $p = $post;
@endphp

<div class="row gy-3">

    {{-- Title --}}
    <div class="col-xl-6 col-sm-12">
        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
            Title <span class="text-danger-600">*</span>
        </label>
        <input
            type="text"
            name="title"
            value="{{ old('title', $p->title ?? '') }}"
            class="form-control @error('title') is-invalid @enderror"
            placeholder="Enter post title"
        >
        @error('title')
            <div class="text-danger-600 text-sm mt-8">{{ $message }}</div>
        @enderror
    </div>

    {{-- Author --}}
    <div class="col-xl-6 col-sm-12">
        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
            Author Name <span class="text-danger-600">*</span>
        </label>
        <input
            type="text"
            name="author_name"
            value="{{ old('author_name', $p->author_name ?? 'Admin') }}"
            class="form-control @error('author_name') is-invalid @enderror"
            placeholder="Author name"
        >
        @error('author_name')
            <div class="text-danger-600 text-sm mt-8">{{ $message }}</div>
        @enderror
    </div>

    {{-- Comments Count --}}
    <div class="col-xl-4 col-sm-6">
        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
            Comments Count
        </label>
        <input
            type="number"
            name="comments_count"
            min="0"
            value="{{ old('comments_count', $p->comments_count ?? 0) }}"
            class="form-control @error('comments_count') is-invalid @enderror"
        >
        @error('comments_count')
            <div class="text-danger-600 text-sm mt-8">{{ $message }}</div>
        @enderror
    </div>

    {{-- Published Date --}}
    <div class="col-xl-4 col-sm-6">
        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
            Published Date
        </label>
        <input
            type="datetime-local"
            name="published_at"
            value="{{ old('published_at', optional($p?->published_at)->format('Y-m-d\TH:i')) }}"
            class="form-control @error('published_at') is-invalid @enderror"
        >
        @error('published_at')
            <div class="text-danger-600 text-sm mt-8">{{ $message }}</div>
        @enderror
    </div>

    {{-- Published Toggle --}}
    <div class="col-xl-4 col-sm-6 d-flex align-items-center">
        <div class="form-check mt-24">
            <input
                class="form-check-input"
                type="checkbox"
                name="is_published"
                value="1"
                id="is_published"
                {{ old('is_published', $p->is_published ?? true) ? 'checked' : '' }}
            >
            <label class="form-check-label text-sm fw-semibold text-primary-light" for="is_published">
                Published
            </label>
        </div>
    </div>

    {{-- Excerpt --}}
    <div class="col-12">
        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
            Excerpt (Short Description)
        </label>
        <textarea
            name="excerpt"
            rows="3"
            class="form-control @error('excerpt') is-invalid @enderror"
            placeholder="Short summary shown on homepage"
        >{{ old('excerpt', $p->excerpt ?? '') }}</textarea>
        @error('excerpt')
            <div class="text-danger-600 text-sm mt-8">{{ $message }}</div>
        @enderror
    </div>

    {{-- Body --}}
    <div class="col-12">
        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
            Full Content
        </label>
        <textarea
    id="bodyEditor"
    name="body"
    rows="8"
    class="form-control @error('body') is-invalid @enderror"
>{{ old('body', $p->body ?? '') }}</textarea>


        @error('body')
            <div class="text-danger-600 text-sm mt-8">{{ $message }}</div>
        @enderror
    </div>

    {{-- Image Upload --}}
<div class="col-xl-6 col-sm-12">
    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
        Featured Image
    </label>

    <div id="imageDropZone"
        class="drop-zone height-44-px p-4 d-flex justify-content-center align-items-center text-center fw-medium text-md cursor-pointer
               border border-neutral-400 radius-8 border-dashed bg-hover-neutral-200">
        <span class="drop-zone__prompt">Drag & drop image here or click</span>
        <input id="imageInput" type="file" name="image" class="drop-zone__input" accept="image/*">
    </div>

    @error('image')
        <div class="text-danger-600 text-sm mt-8">{{ $message }}</div>
    @enderror

    {{-- Live preview (new upload) --}}
    <div class="mt-16 d-none" id="imagePreviewWrap">
        <p class="text-sm text-secondary-light mb-8">Selected Image:</p>
        <img id="imagePreview" style="max-width: 320px; border-radius: 12px;" alt="Preview">
    </div>

    {{-- Current saved image (edit page) --}}
    @if(!empty($p?->image))
        <div class="mt-16">
            <p class="text-sm text-secondary-light mb-8">Current Image:</p>
            <img src="{{ asset('storage/'.$p->image) }}" alt="Post Image" style="max-width: 320px; border-radius: 12px;">
        </div>
    @endif
</div>


</div>
