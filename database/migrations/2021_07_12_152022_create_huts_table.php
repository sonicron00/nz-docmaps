<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('huts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('assetId');
            $table->string('name');
            $table->string('status');
            $table->string('region')->nullable();
            $table->float('x');
            $table->float('y');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('huts');
    }
}
