<?php

use App\Models\Collaborator;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddContentFieldsToCollaboratorsTable extends Migration
{
    public function up()
    {
        Schema::table('collaborators', function (Blueprint $table) {
            if (!Schema::hasColumn('collaborators', 'slug')) {
                $table->string('slug')->nullable()->after('title');
            }
            if (!Schema::hasColumn('collaborators', 'short_description')) {
                $table->string('short_description', 500)->nullable()->after('slug');
            }
            if (!Schema::hasColumn('collaborators', 'overview')) {
                $table->longText('overview')->nullable()->after('short_description');
            }
            if (!Schema::hasColumn('collaborators', 'services')) {
                $table->longText('services')->nullable()->after('overview');
            }
            if (!Schema::hasColumn('collaborators', 'features')) {
                $table->longText('features')->nullable()->after('services');
            }
            if (!Schema::hasColumn('collaborators', 'benefits')) {
                $table->longText('benefits')->nullable()->after('features');
            }
            if (!Schema::hasColumn('collaborators', 'industries_served')) {
                $table->longText('industries_served')->nullable()->after('benefits');
            }
            if (!Schema::hasColumn('collaborators', 'why_choose')) {
                $table->longText('why_choose')->nullable()->after('industries_served');
            }
            if (!Schema::hasColumn('collaborators', 'sort_order')) {
                $table->unsignedInteger('sort_order')->default(0)->after('why_choose');
            }
        });

        // Backfill unique slugs for existing records
        $used = [];
        Collaborator::withTrashed()->orderBy('id')->get()->each(function ($collaborator) use (&$used) {
            if (!empty($collaborator->slug)) {
                $used[$collaborator->slug] = true;
                return;
            }

            $base = Str::slug($collaborator->title ?: ('collaborator-' . $collaborator->id)) ?: ('collaborator-' . $collaborator->id);
            $slug = $base;
            $i = 1;
            while (isset($used[$slug])) {
                $slug = $base . '-' . $i;
                $i++;
            }
            $used[$slug] = true;
            $collaborator->slug = $slug;
            $collaborator->save();
        });

        Schema::table('collaborators', function (Blueprint $table) {
            // Unique index after backfill
            try {
                $table->unique('slug');
            } catch (\Throwable $e) {
                // index may already exist
            }
        });

        if (!Schema::hasTable('collaborator_faqs')) {
            Schema::create('collaborator_faqs', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('collaborator_id');
                $table->string('question');
                $table->text('answer')->nullable();
                $table->unsignedInteger('sort_order')->default(0);
                $table->string('status')->default('1')->comment('0=inactive, 1=active');
                $table->timestamps();

                $table->foreign('collaborator_id', 'collaborator_faqs_collaborator_fk')
                    ->references('id')
                    ->on('collaborators')
                    ->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('collaborator_faqs');

        Schema::table('collaborators', function (Blueprint $table) {
            $columns = [
                'slug',
                'short_description',
                'overview',
                'services',
                'features',
                'benefits',
                'industries_served',
                'why_choose',
                'sort_order',
            ];
            foreach ($columns as $column) {
                if (Schema::hasColumn('collaborators', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
}
