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
            $table->string("task");
            $table->text("description");
            $table->text("comments")->nullable();
            $table->datetime("start_time")->nullable();
            $table->datetime("end_time")->nullable();
            $table->boolean("is_task_all_day")->default(false);
            $table->boolean("pending")->default(true);
            $table->boolean("ongoing")->default(false);
            $table->boolean("done")->default(false);
            $table->boolean("completed")->default(false);
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
        Schema::dropIfExists('tasks');
    }
}
