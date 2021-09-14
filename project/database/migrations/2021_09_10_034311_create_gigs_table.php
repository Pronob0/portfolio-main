<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gigs', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('category_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('photo');
            $table->string('price');
            $table->longText('description')->nullable();
            $table->string('tags')->nullable();
            $table->tinyInteger('status')->default(0);       
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
        Schema::dropIfExists('gigs');
    }
}
