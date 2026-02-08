<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PensionBenefitPage;
use Illuminate\Http\Request;

class PensionBenefitPageController extends Controller
{
    public function edit()
    {
        $page = PensionBenefitPage::first();

        if (!$page) {
            $page = PensionBenefitPage::create($this->defaultData());
        }

        return view('user.pension_benefits.edit', compact('page'));
    }

    public function update(Request $request)
    {
        $page = PensionBenefitPage::firstOrFail();

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'intro' => ['nullable', 'string'],

            'employer_rate' => ['required', 'numeric', 'min:0'],
            'employee_rate' => ['required', 'numeric', 'min:0'],

            'eligibility' => ['nullable', 'string'],
            'retirement_age' => ['nullable', 'string'],
            'early_retirement' => ['nullable', 'string'],
            'normal_retirement' => ['nullable', 'string'],
            'late_retirement' => ['nullable', 'string'],
            'ill_health_retirement' => ['nullable', 'string'],

            'pension_benefit' => ['nullable', 'string'],
            'pre_retirement_spouse_pension' => ['nullable', 'string'],

            // JSON textareas input
            'children_with_spouse_json' => ['nullable', 'string'],
            'children_without_spouse_json' => ['nullable', 'string'],
            'withdrawal_scale_json' => ['nullable', 'string'],

            'death_benefit' => ['nullable', 'string'],
            'death_after_retirement' => ['nullable', 'string'],
            'withdrawals_note' => ['nullable', 'string'],

            'commutation_factors' => ['nullable', 'string'],
            'contribution_rates_note' => ['nullable', 'string'],
            'pension_increases' => ['nullable', 'string'],
            'voluntary_additional_contributions' => ['nullable', 'string'],

            'is_active' => ['nullable'],
        ]);

        // Decode JSON blocks safely
        $data['children_with_spouse'] = $this->decodeJson($request->input('children_with_spouse_json'));
        $data['children_without_spouse'] = $this->decodeJson($request->input('children_without_spouse_json'));
        $data['withdrawal_scale'] = $this->decodeJson($request->input('withdrawal_scale_json'));

        unset($data['children_with_spouse_json'], $data['children_without_spouse_json'], $data['withdrawal_scale_json']);

        $data['is_active'] = $request->has('is_active');

        $page->update($data);

        return redirect()->route('user.pension-benefits.edit')->with('success', 'Pension Benefits page updated.');
    }

    private function decodeJson(?string $json)
    {
        if (!$json) return null;

        $decoded = json_decode($json, true);
        return json_last_error() === JSON_ERROR_NONE ? $decoded : null;
    }

    private function defaultData(): array
    {
        return [
            'title' => 'Pension Benefits',
            'intro' => "A BRIEF OUTLINE of the main provisions of the pension scheme is provided in the following notes. For further information you should contact the Local Authorities Pension Fund or read the Rules of the Principal Pension Scheme.",
            'employer_rate' => 17.30,
            'employee_rate' => 6.00,
            'eligibility' => "All local authority employees who are under the age of 60 years are eligible.",
            'retirement_age' => "55 to 65 and is optional to the contributor.",
            'early_retirement' => "3% per annum reduction for each year below 60.",
            'normal_retirement' => "60 years – 100% benefit payable.",
            'late_retirement' => "6% per annum incremental factor for each year above 60 years (maximum of 65 years).",
            'ill_health_retirement' => "10 or more years of service: pension calculated based at age 60 (100%).\n5 years or less than 10 years: specially calculated pension as advised by the Actuary.",
            'pension_benefit' => "Defined benefit based on average annual salary over the last 12 months preceding retirement and current accrual rate is 1/600 for each month of service. Pension is guaranteed for 7 years and thereafter for life.",
            'pre_retirement_spouse_pension' => "25% of annual salary at date of death.",
            'children_with_spouse' => [
                ['children' => '3 Children', 'benefit' => "50% of widow’s pension"],
                ['children' => '2 Children', 'benefit' => "37.5% of widow’s pension"],
                ['children' => '1 Child', 'benefit' => "25% of widow’s pension"],
            ],
            'children_without_spouse' => [
                ['children' => '3 Children', 'benefit' => "100% of pension that would have been payable to the widowed spouse"],
                ['children' => '2 Children', 'benefit' => "75% of pension that would have been payable to the widowed spouse"],
                ['children' => '1 Child', 'benefit' => "50% of pension that would have been payable to the widowed spouse"],
            ],
            'death_benefit' => "2 x (accumulated contributions plus 1/400 for each month of service) plus a spouse’s and children’s pension as in 5 and 6 above.",
            'death_after_retirement' => "Lump sum of the unexpired guaranteed period and thereafter a spouse and orphans pension based on salary at retirement.",
            'withdrawal_scale' => [
                ['years' => 'Less than 5 years', 'percent' => 'Nil'],
                ['years' => '5 Years', 'percent' => '30'],
                ['years' => '6 Years', 'percent' => '40'],
                ['years' => '7 Years', 'percent' => '50'],
                ['years' => '8 Years', 'percent' => '60'],
                ['years' => '9 Years', 'percent' => '70'],
                ['years' => '10 Years', 'percent' => '80'],
                ['years' => '11 Years', 'percent' => '90'],
                ['years' => '12 Years', 'percent' => '100'],
            ],
            'withdrawals_note' => "Accumulated interest in the Fund is payable if pensionable service amounts to 15 years or more and the contributor is below the age of 55. This benefit is payable on condition that the entire capital sum is utilized to purchase a retirement annuity from a registered insurance company.",
            'commutation_factors' => "Dependent on the age at retirement (55–65 years). One-third of pension can be commuted for a single cash sum.",
            'contribution_rates_note' => "6% employee, 17.3% employer but reviewed every three years by the Fund’s Actuary.",
            'pension_increases' => "Determination by the Management Committee on an annual basis taking into account inflation and the Fund’s Actuary’s recommendation.",
            'voluntary_additional_contributions' => "Payment of additional contributions to purchase an additional pension or relevant past service is permitted. This enables contributors to enhance their pensions on retiring.",
            'is_active' => true,
        ];
    }
}
