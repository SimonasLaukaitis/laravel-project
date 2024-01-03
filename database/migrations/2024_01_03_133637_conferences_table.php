<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConferencesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('conferences', function (Blueprint $table) {
           $table->id();
           $table->string('location');
           $table->string('event_name');
           $table->text('registered_users');
           $table->date('event_date');
           $table->text('info');
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
       Schema::dropIfExists('conferences');
   }
}
