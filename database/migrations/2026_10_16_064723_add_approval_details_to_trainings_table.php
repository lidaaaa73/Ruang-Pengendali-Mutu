<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->text('approval_notes')->nullable();
            $table->foreignId('approval_decided_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->timestamp('approval_decided_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropForeign(['approval_decided_by']);
            $table->dropColumn([
                'approval_notes',
                'approval_decided_by',
                'approval_decided_at',
            ]);
        });
    }
};