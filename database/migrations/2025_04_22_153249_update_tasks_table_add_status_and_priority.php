<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('completed'); // remove old column

            // Add status enum column
            $table->enum('status', ['pending', 'in progress', 'completed'])->default('pending');

            // Add priority column (can use enum or integer based on your needs)
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
        });
    }

    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('priority');
            $table->boolean('completed')->default(false); // restore old column
        });
    }
};
