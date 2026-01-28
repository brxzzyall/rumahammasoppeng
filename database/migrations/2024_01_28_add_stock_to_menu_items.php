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
        if (!Schema::hasTable('menu_items')) {
            // Table will be created by the initial create migration; skip if not present yet.
            return;
        }

        Schema::table('menu_items', function (Blueprint $table) {
            if (!Schema::hasColumn('menu_items', 'stock')) {
                $table->integer('stock')->default(999)->after('price');
            }
            if (!Schema::hasColumn('menu_items', 'is_available')) {
                $table->boolean('is_available')->default(true)->after('stock');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!Schema::hasTable('menu_items')) {
            return;
        }

        Schema::table('menu_items', function (Blueprint $table) {
            if (Schema::hasColumn('menu_items', 'stock')) {
                $table->dropColumn('stock');
            }
            if (Schema::hasColumn('menu_items', 'is_available')) {
                $table->dropColumn('is_available');
            }
        });
    }
};
