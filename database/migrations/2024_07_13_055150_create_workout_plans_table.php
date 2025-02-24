<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutPlansTable extends Migration
{
    public function up()
    {
        Schema::create('workout_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('body_part');
            $table->string('type');
            $table->string('day');
            $table->string('week');
            $table->boolean('status')->default(1);
            $table->integer('set');
            $table->integer('raps');
            $table->string('image')->nullable();
            $table->string('gender');
            $table->foreignId('subscription_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('workout_plans');
    }
}
