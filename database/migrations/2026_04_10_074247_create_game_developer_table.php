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
        Schema::create('game_developer', function (Blueprint $table) {
            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('developer_id');

            $table->primary(['game_id', 'developer_id']);

            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('developer_id')->references('id')->on('developers');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('game_developer');
        Schema::dropIfExists('game_platform');
        Schema::dropIfExists('developers');
        Schema::dropIfExists('platforms');
        Schema::dropIfExists('games');

        Schema::enableForeignKeyConstraints();
    }
};
