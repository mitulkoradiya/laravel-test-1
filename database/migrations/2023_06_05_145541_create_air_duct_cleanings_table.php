<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('air_duct_cleanings', function (Blueprint $table) {
            $table->id();
            $table->string("job_name");
            $table->date("schedule_date");
            $table->enum("time_frame",['8am_9am','11am_1pm','1pm_4pm']);
            $table->enum("furnace",['1','2','3+']);
            $table->integer("area");

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
        Schema::dropIfExists('air_duct_cleanings');
    }
};
