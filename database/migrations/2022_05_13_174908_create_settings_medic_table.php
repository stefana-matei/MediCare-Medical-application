<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsMedicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_medic', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained();
            $table->foreignId('level_id')->nullable()->constrained();
            $table->foreignId('specialty_id')->nullable()->constrained();
            $table->text('specialisation')->nullable();
            $table->text('skills')->nullable();
            $table->text('areas_of_activity')->nullable();
            $table->text('education')->nullable();
            $table->text('postgraduate_courses')->nullable();
            $table->text('trainings')->nullable();
            $table->text('international_certifications')->nullable();
            $table->text('publications')->nullable();
            $table->text('member')->nullable();
            $table->text('other_realizations')->nullable();
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
        Schema::dropIfExists('settings_medic');
    }
}
