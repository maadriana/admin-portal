<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // First, add the column
        Schema::table('contents', function (Blueprint $table) {
            $table->unsignedBigInteger('updated_by')->nullable()->after('value');
        });

        // Then, add the foreign key constraint
        Schema::table('contents', function (Blueprint $table) {
            $table->foreign('updated_by')
                  ->references('id')->on('users')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        // Drop the foreign key first, then the column
        Schema::table('contents', function (Blueprint $table) {
            $table->dropForeign(['updated_by']);
            $table->dropColumn('updated_by');
        });
    }
};
