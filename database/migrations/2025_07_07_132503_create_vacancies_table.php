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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('requirements');
            $table->decimal('salary', 12, 2)->nullable();
            $table->date('deadline')->nullable();
            $table->foreignId('recruiter_id')->constrained('users')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('project_id')->nullable()->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
