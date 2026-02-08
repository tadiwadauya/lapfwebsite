<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pension_benefit_pages', function (Blueprint $table) {
            $table->id();

            $table->string('title')->default('Pension Benefits');

            // Main intro text
            $table->longText('intro')->nullable();

            // Contribution rates
            $table->decimal('employer_rate', 5, 2)->default(17.30);
            $table->decimal('employee_rate', 5, 2)->default(6.00);

            // Eligibility + retirement notes (simple text blocks)
            $table->longText('eligibility')->nullable();
            $table->longText('retirement_age')->nullable();
            $table->longText('early_retirement')->nullable();
            $table->longText('normal_retirement')->nullable();
            $table->longText('late_retirement')->nullable();
            $table->longText('ill_health_retirement')->nullable();

            // Benefits (paragraph blocks)
            $table->longText('pension_benefit')->nullable();
            $table->longText('pre_retirement_spouse_pension')->nullable();

            // Children’s pension tables (we store as JSON so admin can change)
            $table->json('children_with_spouse')->nullable();
            $table->json('children_without_spouse')->nullable();

            // Other sections
            $table->longText('death_benefit')->nullable();
            $table->longText('death_after_retirement')->nullable();

            // Withdrawals table (JSON)
            $table->json('withdrawal_scale')->nullable();
            $table->longText('withdrawals_note')->nullable();

            $table->longText('commutation_factors')->nullable();
            $table->longText('contribution_rates_note')->nullable();
            $table->longText('pension_increases')->nullable();
            $table->longText('voluntary_additional_contributions')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pension_benefit_pages');
    }
};
