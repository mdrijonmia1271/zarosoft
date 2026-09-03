<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Admin forms accept an image either as an upload or as a path/URL typed into
 * the text field. This resolves the two into the single value stored on the
 * model, keeping uploads on the `public` disk behind the storage symlink.
 */
trait HandlesImageUploads
{
    /**
     * @param  string  $field   Form field name (the file input uses "{$field}_file").
     * @param  string  $folder  Sub-folder under storage/app/public.
     * @param  string|null  $current  Existing value, kept when nothing new is supplied.
     */
    protected function resolveImageField(Request $request, string $field, string $folder, ?string $current = null): ?string
    {
        $fileKey = $field . '_file';

        if ($request->hasFile($fileKey)) {
            $file = $request->file($fileKey);

            $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $name = Str::limit($name ?: 'image', 60, '');
            $path = $file->storeAs(
                $folder,
                $name . '-' . Str::random(6) . '.' . $file->getClientOriginalExtension(),
                'public'
            );

            // Delete the previous upload so old files do not pile up.
            $this->deletePreviousUpload($current);

            return 'storage/' . $path;
        }

        $typed = trim((string) $request->input($field, ''));

        return $typed !== '' ? $typed : $current;
    }

    /**
     * Validation rules for an image field pair. Merge into a controller's rules.
     */
    protected function imageFieldRules(string $field): array
    {
        return [
            $field => 'nullable|string|max:2048',
            $field . '_file' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
        ];
    }

    protected function deletePreviousUpload(?string $current): void
    {
        if (!$current || !Str::startsWith($current, 'storage/')) {
            return;
        }

        Storage::disk('public')->delete(Str::after($current, 'storage/'));
    }
}
