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
        $rows = DB::table('menu_items')->get();
        foreach ($rows as $r) {
            $value = $this->parsePriceToInt($r->price ?? null);
            if ($value > 0) {
                DB::table('menu_items')->where('id', $r->id)->update(['price_int' => $value]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('menu_items')->update(['price_int' => null]);
    }

    private function parsePriceToInt($p)
    {
        if (is_null($p)) return 0;
        $s = strtolower(trim($p));
        $s = str_replace(['rp', '$', ',', ' '], '', $s);
        if ($s === '') return 0;
        if (strpos($s, 'k') !== false) {
            $s = str_replace('k', '', $s);
            return (int) (floatval($s) * 1000);
        }
        $digits = preg_replace('/\D/', '', $s);
        return $digits !== '' ? (int) $digits : 0;
    }
};
