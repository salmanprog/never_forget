<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class AddSalesPersonRoleToRolesTable extends Migration
{
    /**
     * Run the migrations. Add "Sales Person" role so admin-created sales persons
     * get the role assigned and login/dashboard work with hasRole('Sales Person').
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('roles')) {
            return;
        }
        Role::firstOrCreate(
            ['name' => 'Sales Person', 'guard_name' => 'web']
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasTable('roles')) {
            return;
        }
        $role = Role::where('name', 'Sales Person')->where('guard_name', 'web')->first();
        if ($role) {
            $role->delete();
        }
    }
}
