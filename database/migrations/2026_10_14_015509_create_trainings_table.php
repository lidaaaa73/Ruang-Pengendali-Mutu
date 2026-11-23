<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('training_name');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('organizer');
            $table->string('venue');
            $table->unsignedInteger('participant_count')->default(0);
            $table->text('event_notes')->nullable();
            $table->string('funding_source')->nullable();
            $table->unsignedSmallInteger('budget_year')->nullable();

            $table->string('execution_status')->default('akan_dilaksanakan');
            $table->string('approval_status')->default('draft');
            $table->text('delay_reason')->nullable();
            $table->date('rescheduled_date')->nullable();

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
