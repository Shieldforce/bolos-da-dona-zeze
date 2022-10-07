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
        Schema::create('cake_stock', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("cake_id");
            $table->foreign("cake_id")
                ->references("id")
                ->on("cakes")
                ->onDelete("cascade");

            $table->integer("amount");

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
        Schema::dropIfExists('cake_stock');
    }
};
