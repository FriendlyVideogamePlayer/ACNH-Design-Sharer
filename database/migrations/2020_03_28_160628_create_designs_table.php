<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create a DB containg the correct fields
        Schema::create('designs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50);
            $table->string('username',50);
            $table->string('imageLink',38)->unique();
            $table->string('designtype');
            $table->string('tag1', 20)->nullable();
            $table->string('tag2', 20)->nullable();
            $table->string('tag3', 20)->nullable();
            $table->boolean('approved');
            $table->dateTime('updated_at');
            $table->dateTime('created_at');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('designs');
    }
}
