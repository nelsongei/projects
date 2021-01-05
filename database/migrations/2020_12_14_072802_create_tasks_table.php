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
            $table->id();
            $table->bigInteger('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('card_id')->unsigned();
            $table->foreign('card_id')->references('id')->on('cards')->onUpdate('cascade')->onDelete('cascade');
            $table->string('task_name')->nullable();
            $table->text('task_description');
            $table->string('due_date')->nullable();
            $table->boolean('completed')->default(false);
            $table->timestamps();
            $table->index('card_id');
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
