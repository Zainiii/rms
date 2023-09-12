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
        Schema::create('apl_resumes', function (Blueprint $table) {
            $table->integer('id', true)->unsigned(false)->length(11);
            $table->integer('section_id');
            $table->integer('applicant_id');

            $table->text('data')->nullable();
            $table->boolean('is_group')->default(false);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('applicant_id')->references('id')->on('applicants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apl_resumes');
    }
};
