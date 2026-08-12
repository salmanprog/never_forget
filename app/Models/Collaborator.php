<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Collaborator extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'services' => 'array',
        'features' => 'array',
        'benefits' => 'array',
        'industries_served' => 'array',
    ];

    public function hasCreatedBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function faqs()
    {
        return $this->hasMany(CollaboratorFaq::class)->orderBy('sort_order')->orderBy('id');
    }

    public function activeFaqs()
    {
        return $this->hasMany(CollaboratorFaq::class)
            ->where('status', '1')
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            return asset('public/admin/assets/images/collaborators/' . $this->image);
        }

        return asset('public/admin/assets/images/default.jpg');
    }

    public static function makeUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $base = $slug ?: 'collaborator';
        $candidate = $base;
        $i = 1;

        while (
            static::withTrashed()
                ->where('slug', $candidate)
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

    public static function linesToArray(?string $text): array
    {
        return collect(preg_split("/\r\n|\n|\r/", (string) $text))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();
    }

    public function listToText(?string $field): string
    {
        $value = $this->{$field} ?? [];
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            $value = is_array($decoded) ? $decoded : [];
        }

        return implode("\n", is_array($value) ? $value : []);
    }
}
