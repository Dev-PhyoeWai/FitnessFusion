<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  
     public function up()
     {
         Schema::create('activities', function (Blueprint $table) {
             $table->id(); // ActivityID (Primary Key)
             $table->unsignedBigInteger('user_id'); // UserID (Foreign Key)
             $table->string('type');
             $table->integer('duration');
             $table->decimal('distance', 8, 2)->nullable(); 
             $table->integer('calories_burned');
             $table->date('date');
             $table->timestamps();
 
             $table->foreign('user_id')->references('id')->on('users');
         });
     }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
