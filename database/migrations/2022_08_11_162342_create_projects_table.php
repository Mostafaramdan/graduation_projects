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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctors_id')->nullable();
            $table->unsignedBigInteger('suggested_doctors_id')->nullable();;
            $table->unsignedBigInteger('create_by')->comment('students_id')->nullable();;
            $table->text('name');
            $table->integer('progress')->default(0);
            $table->longText('description');
            $table->string('proposal')->nullable();
            $table->enum('status', ['pending','accept','decline','suggestByAdmin'])->default('pending');


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
        Schema::dropIfExists('projects');
    }
};
