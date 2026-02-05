@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')

<div class="dashboard-main-body">

    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h6 class="fw-semibold mb-0">Contact Page Settings</h6>
            <p class="text-neutral-600 mt-4 mb-0">Dashboard / Website / Contact</p>
        </div>
        <a href="{{ route('contact') }}" target="_blank" class="btn btn-primary-600 d-flex align-items-center gap-6">
            <i class="ri-external-link-line"></i>
            View Contact Page
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="shadow-1 radius-12 bg-base h-100 overflow-hidden">
        <div class="card-header border-bottom bg-base py-16 px-24">
            <h6 class="text-lg fw-semibold mb-0">Edit Details</h6>
        </div>

        <div class="card-body p-24">
            <form method="POST" action="{{ route('user.contact-settings.update') }}">
                @csrf
                @method('PUT')

                <div class="row gy-3">

                    <div class="col-xl-6">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Page Title</label>
                        <input class="form-control" name="page_title" value="{{ old('page_title', $settings->page_title) }}">
                    </div>

                    <div class="col-xl-6">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Breadcrumb Title</label>
                        <input class="form-control" name="breadcrumb_title" value="{{ old('breadcrumb_title', $settings->breadcrumb_title) }}">
                    </div>

                    <div class="col-12 mt-12">
                        <h6 class="text-lg fw-semibold mb-0">Information Cards</h6>
                    </div>

                    <div class="col-xl-3">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Voip Title</label>
                        <input class="form-control" name="chat_title" value="{{ old('chat_title', $settings->chat_title) }}">
                    </div>
                    <div class="col-xl-3">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">VOIP line</label>
                        <input class="form-control" name="chat_subtitle" value="{{ old('chat_subtitle', $settings->chat_subtitle) }}">
                    </div>
                    <div class="col-xl-3">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Chat Button Text</label>
                        <input class="form-control" name="chat_button_text" value="{{ old('chat_button_text', $settings->chat_button_text) }}">
                    </div>
                    

                    <div class="col-xl-3">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Phone Title</label>
                        <input class="form-control" name="phone_title" value="{{ old('phone_title', $settings->phone_title) }}">
                    </div>
                    <div class="col-xl-3">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Phone Number (text)</label>
                        <input class="form-control" name="phone_number" value="{{ old('phone_number', $settings->phone_number) }}">
                    </div>
                    <div class="col-xl-3">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Phone Link (tel:)</label>
                        <input class="form-control" name="phone_link" value="{{ old('phone_link', $settings->phone_link) }}" placeholder="tel:+263...">
                    </div>
                    <div class="col-xl-3">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Phone Button Text</label>
                        <input class="form-control" name="phone_button_text" value="{{ old('phone_button_text', $settings->phone_button_text) }}">
                    </div>

                    <div class="col-xl-4">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Email Title</label>
                        <input class="form-control" name="email_title" value="{{ old('email_title', $settings->email_title) }}">
                    </div>
                    <div class="col-xl-4">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Postal Address</label>
                        <input class="form-control" name="email_address" value="{{ old('email_address', $settings->email_address) }}">
                    </div>
                  

                    <div class="col-xl-4">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Address Title</label>
                        <input class="form-control" name="address_title" value="{{ old('address_title', $settings->address_title) }}">
                    </div>
                    <div class="col-xl-4">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Office Address</label>
                        <input class="form-control" name="office_address" value="{{ old('office_address', $settings->office_address) }}">
                    </div>
                    <div class="col-xl-4">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Directions URL</label>
                        <input class="form-control" name="directions_url" value="{{ old('directions_url', $settings->directions_url) }}">
                    </div>

                    <div class="col-12 mt-12">
                        <h6 class="text-lg fw-semibold mb-0">Form & Map</h6>
                    </div>

                    <div class="col-xl-6">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Form Title</label>
                        <input class="form-control" name="form_title" value="{{ old('form_title', $settings->form_title) }}">
                    </div>
                    <div class="col-xl-6">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Form Subtitle</label>
                        <input class="form-control" name="form_subtitle" value="{{ old('form_subtitle', $settings->form_subtitle) }}">
                    </div>

                    <div class="col-12">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Google Map iframe SRC</label>
                        <textarea class="form-control" name="map_iframe_src" rows="4"
                                  placeholder="Paste ONLY the src value from the iframe...">{{ old('map_iframe_src', $settings->map_iframe_src) }}</textarea>
                        <small class="text-secondary-light">
                            Tip: from the iframe, copy just the value inside <b>src="..."</b>.
                        </small>
                    </div>

                    <div class="col-12 mt-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active"
                                   {{ old('is_active', $settings->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex justify-content-end mt-8">
                            <button class="btn btn-primary-600">Save Settings</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

</div>
@endsection
