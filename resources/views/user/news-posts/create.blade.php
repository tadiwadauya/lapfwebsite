@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')

<div class="dashboard-main-body">

    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h6 class="fw-semibold mb-0">Create News Post</h6>
            <p class="text-neutral-600 mt-4 mb-0">Dashboard / News / Create</p>
        </div>
    </div>

    <div class="card shadow-1 radius-12 bg-base">
        <div class="card-body p-24">

            <form method="POST" action="{{ route('user.news-posts.store') }}" enctype="multipart/form-data">
                @csrf

                @include('user.news-posts.partials.form', ['post' => null])

                <div class="d-flex justify-content-end mt-20">
                    <button class="btn btn-primary-600">Save Post</button>
                </div>
            </form>

        </div>
    </div>

</div>

@push('scripts')
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const el = document.getElementById('bodyEditor');
            if (!el) return;

            tinymce.init({
                selector: '#bodyEditor',

                // ✅ THIS is what removes the "license key not provided" disabled editor in v7
                license_key: 'gpl',

                height: 350,
                menubar: false,
                plugins: 'lists link table code',
                toolbar: 'undo redo | bold italic underline | bullist numlist | link table | removeformat | code',
                branding: false
            });
        });
    </script>
@endpush
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const dropZone = document.getElementById('imageDropZone');
    const input = document.getElementById('imageInput');
    const previewWrap = document.getElementById('imagePreviewWrap');
    const previewImg = document.getElementById('imagePreview');

    if (!dropZone || !input) return;

    // Click drop zone => open file picker
    dropZone.addEventListener('click', () => input.click());

    // Show preview when file selected
    input.addEventListener('change', () => {
        const file = input.files && input.files[0];
        if (!file) return;

        previewImg.src = URL.createObjectURL(file);
        previewWrap.classList.remove('d-none');
    });

    // Drag over styling
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('bg-hover-neutral-200');
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('bg-hover-neutral-200');
    });

    // Drop file into zone
    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('bg-hover-neutral-200');

        const file = e.dataTransfer.files && e.dataTransfer.files[0];
        if (!file) return;

        // Put dropped file into input
        const dt = new DataTransfer();
        dt.items.add(file);
        input.files = dt.files;

        // Preview
        previewImg.src = URL.createObjectURL(file);
        previewWrap.classList.remove('d-none');
    });
});
</script>
@endpush

@endsection
