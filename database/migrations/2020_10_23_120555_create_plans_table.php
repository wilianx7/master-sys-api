<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('modality_id')->index();
            $table->string('name');
            $table->float('price');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('plans', function (Blueprint $table) {
            $table->foreign('modality_id', 'fk_plans_to_modalities')
                ->references('id')
                ->on('modalities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
