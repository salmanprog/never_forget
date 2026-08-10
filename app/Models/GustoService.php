<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GustoService extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function options()
    {
        return $this->hasMany(GustoOption::class)->orderBy('sort_order')->orderBy('id');
    }

    public function activeOptions()
    {
        return $this->hasMany(GustoOption::class)
            ->where('status', '1')
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public static function makeUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $base = $slug ?: 'service';
        $candidate = $base;
        $i = 1;

        while (
            static::where('slug', $candidate)
                ->when($ignoreId, function ($q) use ($ignoreId) {
                    $q->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $candidate = $base . '-' . $i;
            $i++;
        }

        return $candidate;
    }
}
