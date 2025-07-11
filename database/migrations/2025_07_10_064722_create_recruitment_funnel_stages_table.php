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
        Schema::create('recruitment_funnel_stages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vacancy_id')->constrained('vacancies')->cascadeOnUpdate()->restrictOnDelete();
            $table->enum('stage_name', [
                'Application Received',
                'Screening',
                'Interview Scheduled',
                'Interview Completed',
                'Offer Extended',
                'Offer Accepted',
                'Hired',
                'Rejected'
            ]);
            $table->integer('order');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitment_funnel_stages');
    }
};
