<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SlugHelper
{
    public static function generateUniqueSlug(string $title, string $modelClass, string $column = 'slug', ?int $excludeId = null): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (
            $modelClass::where($column, $slug)
            ->when($excludeId, fn($q) => $q->where('id', '!=', $excludeId))
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }
}
