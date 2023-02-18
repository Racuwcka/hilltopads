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
        Schema::create('company_labels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('label_id');
            $table->timestamps();

            // IDX
            $table->index('company_id', 'company_label_company_idx');
            $table->index('label_id', 'company_label_label_idx');

            // FK
            $table->foreign('company_id', 'company_label_company_fk')->on('companies')->references('id');
            $table->foreign('label_id', 'company_label_label_fk')->on('labels')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_labels');
    }
};
