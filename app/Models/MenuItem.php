<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'price_int',
        'image',
        'stock',
        'is_available'
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'stock' => 'integer',
        'price_int' => 'integer',
    ];

    public function markOutOfStock()
    {
        $this->stock = 0;
        $this->is_available = false;
        $this->save();
    }

    public function getPriceValueAttribute()
    {
        if (!is_null($this->price_int) && $this->price_int !== 0) {
            return (int) $this->price_int;
        }

        $p = $this->attributes['price'] ?? null;
        if (!$p) return 0;

        $s = strtolower($p);
        $s = str_replace(['$', 'rp', ',', ' '], '', $s);

        if (strpos($s, 'k') !== false) {
            $s = str_replace('k', '', $s);
            return (int) (floatval($s) * 1000);
        }

        $digits = preg_replace('/\D/', '', $s);
        return $digits !== '' ? (int) $digits : 0;
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price_value, 0, ',', '.');
    }

    public function toggleAvailability()
    {
        $this->is_available = !$this->is_available;
        $this->save();
    }
}
