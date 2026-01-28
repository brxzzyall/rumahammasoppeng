<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Map legacy categories to new ones
        DB::table('menu_items')->whereIn('category', ['Starters', 'Main'])->update(['category' => 'Makanan']);
        DB::table('menu_items')->where('category', 'Dessert')->update(['category' => 'Minuman']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Best-effort revert
        DB::table('menu_items')->where('category', 'Makanan')->update(['category' => 'Main']);
        DB::table('menu_items')->where('category', 'Minuman')->update(['category' => 'Dessert']);
    }
};
