<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CustomSolutionService extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'has_other_text' => 'boolean',
    ];

    public function options()
    {
        return $this->hasMany(CustomSolutionOption::class)->orderBy('sort_order')->orderBy('id');
    }

    public function activeOptions()
    {
        return $this->hasMany(CustomSolutionOption::class)
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

    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return asset('public/assets/website/images/perfect-gifts/01.png');
        }

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        // Stored as relative public path (assets/...)
        if (Str::startsWith($this->image, 'assets/')) {
            return asset('public/' . $this->image);
        }

        return asset('public/assets/website/images/' . ltrim($this->image, '/'));
    }
}
