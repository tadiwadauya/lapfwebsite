<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PensionBenefitPage extends Model
{
    protected $fillable = [
        'title',
        'intro',
        'employer_rate',
        'employee_rate',
        'eligibility',
        'retirement_age',
        'early_retirement',
        'normal_retirement',
        'late_retirement',
        'ill_health_retirement',
        'pension_benefit',
        'pre_retirement_spouse_pension',
        'children_with_spouse',
        'children_without_spouse',
        'death_benefit',
        'death_after_retirement',
        'withdrawal_scale',
        'withdrawals_note',
        'commutation_factors',
        'contribution_rates_note',
        'pension_increases',
        'voluntary_additional_contributions',
        'is_active',
    ];

    protected $casts = [
        'children_with_spouse' => 'array',
        'children_without_spouse' => 'array',
        'withdrawal_scale' => 'array',
        'is_active' => 'boolean',
        'employer_rate' => 'decimal:2',
        'employee_rate' => 'decimal:2',
    ];
}
