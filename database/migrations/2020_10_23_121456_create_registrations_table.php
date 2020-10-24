<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('plan_id')->index();
            $table->integer('student_id')->index();
            $table->integer('due_date');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('registrations', function (Blueprint $table) {
            $table->foreign('plan_id', 'fk_registrations_to_plans')
                ->references('id')
                ->on('plans');

            $table->foreign('student_id', 'fk_registrations_to_students')
                ->references('id')
                ->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
