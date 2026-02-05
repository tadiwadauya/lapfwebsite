@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')

<div class="dashboard-main-body">

    {{-- Breadcrumb/Header --}}
    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h1 class="fw-semibold mb-4 h6 text-primary-light">News Posts</h1>
            <div>
                <a href="{{ url('/user/dashboard') }}" class="text-secondary-light hover-text-primary hover-underline">
                    Dashboard
                </a>
                <span class="text-secondary-light">/ News Posts</span>
            </div>
        </div>

        <a href="{{ route('user.news-posts.create') }}" class="btn btn-primary-600 d-flex align-items-center gap-6">
            <span class="d-flex text-md">
                <i class="ri-add-large-line"></i>
            </span>
            Create Post
        </a>
    </div>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success mb-16">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-24">
        <div class="card h-100">
            <div class="card-body p-0 dataTable-wrapper">

                {{-- Top controls: Export (optional), Search, Rows per page --}}
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-16 px-20 py-12 border-bottom border-neutral-200">

                    <div class="d-flex flex-wrap align-items-center gap-16">

                        {{-- Optional Export dropdown (UI only) --}}
                        <div class="dropdown">
                            <button type="button"
                                class="px-12 py-5-px border border-neutral-300 radius-8 d-flex align-items-center gap-20"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="d-flex align-items-center gap-1 text-secondary-light text-sm">
                                    <i class="ri-file-upload-line text-md line-height-1"></i>
                                    Export
                                </span>
                                <span><i class="ri-arrow-down-s-line"></i></span>
                            </button>
                            <ul class="dropdown-menu p-12 border bg-base shadow">
                                <li>
                                    <button type="button"
                                        class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10">
                                        <i class="ri-file-3-line"></i>
                                        PDF
                                    </button>
                                </li>
                                <li>
                                    <button type="button"
                                        class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10">
                                        <i class="ri-file-excel-line"></i>
                                        Excel
                                    </button>
                                </li>
                            </ul>
                        </div>

                        {{-- Search --}}
                        <form class="navbar-search dt-search m-0" onsubmit="return false;">
                            <input type="text" class="dt-input bg-transparent radius-4" aria-controls="dataTable"
                                   name="search" placeholder="Search...">
                            <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                        </form>

                    </div>

                    {{-- Rows per page --}}
                    <div class="d-flex align-items-center gap-8 text-secondary-light">
                        <span>Rows per page:</span>
                        <div class="dt-length">
                            <select name="dataTable_length" aria-controls="dataTable"
                                class="dt-input form-control form-select">
                                <option value="5">5</option>
                                <option value="10" selected>10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>

                </div>

                {{-- Table --}}
                <div class="p-0">
                    <table class="table bordered-table mb-0 data-table" id="dataTable" data-page-length="10">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 70px;">#</th>
                                <th scope="col">Title</th>
                                <th scope="col" style="width: 120px;">Published</th>
                                <th scope="col" style="width: 160px;">Date</th>
                                <th scope="col" style="width: 120px;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td>
                                    <span class="text-secondary-light">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="text-md mb-0 fw-medium text-secondary-light">
                                            {{ $post->title }}
                                        </span>
                                        @if(!empty($post->excerpt))
                                            <span class="text-secondary-light text-sm">
                                                {{ \Illuminate\Support\Str::limit($post->excerpt, 80) }}
                                            </span>
                                        @endif
                                    </div>
                                </td>

                                <td>
                                    @if($post->is_published)
                                        <span class="badge bg-success-600">Yes</span>
                                    @else
                                        <span class="badge bg-danger-600">No</span>
                                    @endif
                                </td>

                                <td class="text-secondary-light">
                                    {{ optional($post->published_at)->format('d M Y') ?? '—' }}
                                </td>

                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="text-primary-light text-xl"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                                        </button>

                                        <ul class="dropdown-menu dropdown-menu-lg-end border p-12">

                                            <li>
                                                <a href="{{ route('user.news-posts.edit', $post) }}"
                                                   class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6">
                                                    <i class="ri-edit-2-line"></i> Edit
                                                </a>
                                            </li>

                                            <li>
                                                <form action="{{ route('user.news-posts.destroy', $post) }}" method="POST"
                                                      onsubmit="return confirm('Delete this post?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6">
                                                        <i class="ri-delete-bin-6-line"></i> Delete
                                                    </button>
                                                </form>
                                            </li>

                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-secondary-light py-24">
                                    No posts found.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Laravel pagination --}}
                <div class="px-20 py-16 border-top border-neutral-200">
                    {{ $posts->links() }}
                </div>

            </div>
        </div>
    </div>

</div>

{{-- DataTables script: only keep if DataTable() is loaded in your layout --}}
<script>
    // If DataTable library is available, enable searching + page length
    $('.data-table').each(function () {
        const $table = $(this);
        const tableInstance = new DataTable(this);

        // Search input
        $table.closest('.dataTable-wrapper').find('.dt-search .dt-input').on('keyup', function () {
            tableInstance.search(this.value).draw();
        });

        // Page length
        $table.closest('.dataTable-wrapper').find('.dt-length .dt-input').on('change', function () {
            tableInstance.page.len($(this).val()).draw();
        });
    });
</script>
@endsection
