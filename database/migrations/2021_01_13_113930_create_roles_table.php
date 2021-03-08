<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
        
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('view_member')->default(0);
            $table->boolean('create_member')->default(0);
            $table->boolean('edit_member')->default(0);
            $table->boolean('delete_member')->default(0);
            $table->boolean('view_payroll')->default(0);
            $table->boolean('edit_payroll')->default(0);
            $table->boolean('view_appointments')->default(0);
            $table->boolean('edit_appointments')->default(0);
            $table->boolean('manage_documents')->default(0);
            $table->boolean('view_roles')->default(0);
            $table->boolean('edit_roles')->default(0);
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
