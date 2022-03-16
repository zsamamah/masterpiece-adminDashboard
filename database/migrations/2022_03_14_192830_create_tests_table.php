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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('problem_id')->unique();
            $table->foreign('problem_id')->references('id')->on('problems')->onDelete('cascade');
            $table->text('case_1');
            $table->string('sol_1');
            $table->text('case_2');
            $table->string('sol_2');
            $table->text('case_3');
            $table->string('sol_3');
            $table->text('case_4');
            $table->string('sol_4');
            $table->text('case_5');
            $table->string('sol_5');
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
        Schema::dropIfExists('tests');
    }
};
