<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('training_documents', function (Blueprint $table) {
            $table->string('gdrive_file_id')->nullable()->after('file_path');
            $table->text('gdrive_url')->nullable()->after('gdrive_file_id');
        });
    }

    public function down(): void
    {
        Schema::table('training_documents', function (Blueprint $table) {
            $table->dropColumn(['gdrive_file_id', 'gdrive_url']);
        });
    }
};