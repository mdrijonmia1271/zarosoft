<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

/**
 * Media columns accept either an absolute URL (external CDN) or a path
 * relative to public/ (locally hosted asset). This resolves whichever is
 * stored into something a browser can load, and returns null when the
 * column is empty so views can render their own fallback.
 */
trait ResolvesMediaPath
{
    protected function resolveMediaPath(?string $path): ?string
    {
        $path = trim((string) $path);

        if ($path === '') {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://', '//', 'data:'])) {
            return $path;
        }

        return asset(ltrim($path, '/'));
    }
}
