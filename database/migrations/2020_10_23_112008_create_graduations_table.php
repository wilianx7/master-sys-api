<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduations', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('modality_id')->index();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('graduations', function (Blueprint $table) {
            $table->foreign('modality_id', 'fk_graduations_to_modalities')
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
        Schema::dropIfExists('graduations');
    }
}
