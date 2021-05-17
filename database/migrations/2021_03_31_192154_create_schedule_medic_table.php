<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleMedicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_medic', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_employee')->index('fk_id_employee_schedule');
            $table->unsignedBigInteger('id_schedule')->index('fk_id__schedule');
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
        Schema::dropIfExists('schedule_medic');
    }
}
