<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('template_sections', function (Blueprint $table) {
            $table->integer('id', true)->unsigned(false)->length(11);
            $table->integer('section_id');
            $table->integer('template_id');

            $table->integer('order_no');
            $table->string('section_style')->nullable();
            $table->string('header_style')->nullable();
            $table->string('body_style')->nullable();
            $table->string('sub_header_style')->nullable();
            $table->string('sub_body_style')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('template_id')->references('id')->on('templates');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('template_sections');
    }
};
