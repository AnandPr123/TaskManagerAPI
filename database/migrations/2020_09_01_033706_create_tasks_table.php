<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {

             $table->uuid('id')->primary();
             $table->string('Title');
             $table->string('Description');
             $table->uuid('AssignedId');
             $table->uuid('TeamId');
             $table->string('Status');
             $table->timestamps();
             $table
             ->foreign('AssignedId')
             ->references('id')
             ->on('members')
             ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
