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
        Schema::create('user_labels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('label_id');
            $table->timestamps();

            // IDX
            $table->index('user_id', 'user_label_user_idx');
            $table->index('label_id', 'user_label_label_idx');

            // FK
            $table->foreign('user_id', 'user_label_user_fk')->on('users')->references('id');
            $table->foreign('label_id', 'user_label_label_fk')->on('labels')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_labels');
    }
};
