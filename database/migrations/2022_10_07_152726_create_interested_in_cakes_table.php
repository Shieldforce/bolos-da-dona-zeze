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
        Schema::create('interested_in_cakes', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger("lead_id");
            $table->foreign("lead_id")
                ->references("id")
                ->on("leads")
                ->onDelete("cascade");

            $table->unsignedBigInteger("cake_id");
            $table->foreign("cake_id")
                ->references("id")
                ->on("cakes")
                ->onDelete("cascade");

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
        Schema::dropIfExists('interested_in_cakes');
    }
};
