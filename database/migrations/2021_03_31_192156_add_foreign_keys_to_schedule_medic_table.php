<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToScheduleMedicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedule_medic', function (Blueprint $table) {
            $table->foreign('id_schedule', 'fk_id__schedule')->references('id')->on('schedule')->onDelete('RESTRICT');
            $table->foreign('id_employee', 'fk_id_employee_schedule')->references('id')->on('users')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedule_medic', function (Blueprint $table) {
            $table->dropForeign('fk_id__schedule');
            $table->dropForeign('fk_id_employee_schedule');
        });
    }
}
