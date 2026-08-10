<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ExtendContactUsForCustomizeSolution extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Allow customize_solution (and future types) without ENUM friction
        try {
            DB::statement("ALTER TABLE contact_us MODIFY COLUMN type VARCHAR(50) NOT NULL DEFAULT 'custom_quote'");
        } catch (\Throwable $e) {
            // Column may already be a string, or type may not exist yet
        }

        Schema::table('contact_us', function (Blueprint $table) {
            if (!Schema::hasColumn('contact_us', 'type')) {
                $table->string('type', 50)->default('custom_quote')->after('id');
            }
            if (!Schema::hasColumn('contact_us', 'job_title')) {
                $table->string('job_title')->nullable()->after('company');
            }
            if (!Schema::hasColumn('contact_us', 'website')) {
                $table->string('website')->nullable()->after('job_title');
            }
            if (!Schema::hasColumn('contact_us', 'industry')) {
                $table->string('industry')->nullable()->after('website');
            }
            if (!Schema::hasColumn('contact_us', 'number_of_employees')) {
                $table->string('number_of_employees')->nullable()->after('industry');
            }
            if (!Schema::hasColumn('contact_us', 'approximate_customers')) {
                $table->string('approximate_customers')->nullable()->after('number_of_employees');
            }
            if (!Schema::hasColumn('contact_us', 'business_goals')) {
                $table->text('business_goals')->nullable()->after('approximate_customers');
            }
            if (!Schema::hasColumn('contact_us', 'estimated_budget')) {
                $table->string('estimated_budget')->nullable()->after('business_goals');
            }
            if (!Schema::hasColumn('contact_us', 'selected_services')) {
                $table->longText('selected_services')->nullable()->after('estimated_budget');
            }
            if (!Schema::hasColumn('contact_us', 'other_services_text')) {
                $table->text('other_services_text')->nullable()->after('selected_services');
            }
        });

        // Message can hold longer notes for custom solutions
        try {
            DB::statement('ALTER TABLE contact_us MODIFY COLUMN message TEXT NULL');
        } catch (\Throwable $e) {
            // ignore if already text
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_us', function (Blueprint $table) {
            $columns = [
                'job_title',
                'website',
                'industry',
                'number_of_employees',
                'approximate_customers',
                'business_goals',
                'estimated_budget',
                'selected_services',
                'other_services_text',
            ];
            foreach ($columns as $column) {
                if (Schema::hasColumn('contact_us', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
}
