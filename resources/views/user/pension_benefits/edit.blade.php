@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')
<div class="container">
    <h3 class="mb-3">Edit Pension Benefits Page</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.pension-benefits.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title *</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $page->title) }}" required>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Employer Rate (%)</label>
                        <input type="number" step="0.01" name="employer_rate" class="form-control"
                               value="{{ old('employer_rate', $page->employer_rate) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Employee Rate (%)</label>
                        <input type="number" step="0.01" name="employee_rate" class="form-control"
                               value="{{ old('employee_rate', $page->employee_rate) }}">
                    </div>
                </div>

                <hr class="my-4">

                <div class="mb-3">
                    <label class="form-label">Intro</label>
                    <textarea name="intro" rows="3" class="form-control">{{ old('intro', $page->intro) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Eligibility</label>
                    <textarea name="eligibility" rows="2" class="form-control">{{ old('eligibility', $page->eligibility) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Retirement Age</label>
                    <textarea name="retirement_age" rows="2" class="form-control">{{ old('retirement_age', $page->retirement_age) }}</textarea>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Early Retirement</label>
                        <textarea name="early_retirement" rows="3" class="form-control">{{ old('early_retirement', $page->early_retirement) }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Normal Retirement</label>
                        <textarea name="normal_retirement" rows="3" class="form-control">{{ old('normal_retirement', $page->normal_retirement) }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Late Retirement</label>
                        <textarea name="late_retirement" rows="3" class="form-control">{{ old('late_retirement', $page->late_retirement) }}</textarea>
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label class="form-label">Ill-health Retirement</label>
                    <textarea name="ill_health_retirement" rows="4" class="form-control">{{ old('ill_health_retirement', $page->ill_health_retirement) }}</textarea>
                </div>

                <hr class="my-4">

                <div class="mb-3">
                    <label class="form-label">Pension Benefit</label>
                    <textarea name="pension_benefit" rows="4" class="form-control">{{ old('pension_benefit', $page->pension_benefit) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pre-retirement Spouse’s Pension</label>
                    <textarea name="pre_retirement_spouse_pension" rows="2" class="form-control">{{ old('pre_retirement_spouse_pension', $page->pre_retirement_spouse_pension) }}</textarea>
                </div>

                <hr class="my-4">

                <div class="mb-3">
                    <label class="form-label">Children’s Pension (With Spouse) — JSON</label>
                    <textarea name="children_with_spouse_json" rows="5" class="form-control">@json(old('children_with_spouse_json') ? json_decode(old('children_with_spouse_json'), true) : $page->children_with_spouse, JSON_PRETTY_PRINT)</textarea>
                    <small class="text-muted">Format: [{"children":"3 Children","benefit":"50% ..."}]</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Children’s Pension (Without Spouse) — JSON</label>
                    <textarea name="children_without_spouse_json" rows="6" class="form-control">@json(old('children_without_spouse_json') ? json_decode(old('children_without_spouse_json'), true) : $page->children_without_spouse, JSON_PRETTY_PRINT)</textarea>
                </div>

                <hr class="my-4">

                <div class="mb-3">
                    <label class="form-label">Death Benefit</label>
                    <textarea name="death_benefit" rows="3" class="form-control">{{ old('death_benefit', $page->death_benefit) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Death After Retirement</label>
                    <textarea name="death_after_retirement" rows="3" class="form-control">{{ old('death_after_retirement', $page->death_after_retirement) }}</textarea>
                </div>

                <hr class="my-4">

                <div class="mb-3">
                    <label class="form-label">Withdrawals Scale — JSON</label>
                    <textarea name="withdrawal_scale_json" rows="8" class="form-control">@json(old('withdrawal_scale_json') ? json_decode(old('withdrawal_scale_json'), true) : $page->withdrawal_scale, JSON_PRETTY_PRINT)</textarea>
                    <small class="text-muted">Format: [{"years":"5 Years","percent":"30"}]</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Withdrawals Note</label>
                    <textarea name="withdrawals_note" rows="4" class="form-control">{{ old('withdrawals_note', $page->withdrawals_note) }}</textarea>
                </div>

                <hr class="my-4">

                <div class="mb-3">
                    <label class="form-label">Commutation Factors</label>
                    <textarea name="commutation_factors" rows="3" class="form-control">{{ old('commutation_factors', $page->commutation_factors) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contribution Rates Note</label>
                    <textarea name="contribution_rates_note" rows="3" class="form-control">{{ old('contribution_rates_note', $page->contribution_rates_note) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pension Increases</label>
                    <textarea name="pension_increases" rows="3" class="form-control">{{ old('pension_increases', $page->pension_increases) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Voluntary Additional Contributions</label>
                    <textarea name="voluntary_additional_contributions" rows="3" class="form-control">{{ old('voluntary_additional_contributions', $page->voluntary_additional_contributions) }}</textarea>
                </div>

                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ $page->is_active ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>

                <hr class="my-4">

                <button class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection
