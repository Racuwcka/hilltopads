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
        Schema::create('site_labels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('site_id');
            $table->unsignedBigInteger('label_id');
            $table->timestamps();

            // IDX
            $table->index('site_id', 'site_label_site_idx');
            $table->index('label_id', 'site_label_label_idx');

            // FK
            $table->foreign('site_id', 'site_label_site_fk')->on('sites')->references('id');
            $table->foreign('label_id', 'site_label_label_fk')->on('labels')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_labels');
    }
};
