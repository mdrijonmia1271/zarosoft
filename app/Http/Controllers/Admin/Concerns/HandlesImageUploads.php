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

            // Delete the previous upload so old files do not pile up.
            $this->deletePreviousUpload($current);

            return $this->storeUpload($file, $folder);
        }

        $typed = trim((string) $request->input($field, ''));

        return $typed !== '' ? $typed : $current;
    }

    /**
     * Resolves a multi-image field: the textarea holds one path/URL per line
     * (the kept images, editable and re-orderable by hand) and the file input
     * appends any freshly uploaded ones.
     *
     * @param  string  $field   Form field name (the file input uses "{$field}_files").
     * @param  array<int, string>|null  $current  Existing list, kept when the form sends nothing.
     * @return array<int, string>
     */
    protected function resolveGalleryField(Request $request, string $field, string $folder, ?array $current = null): array
    {
        // A form that never rendered the field must not wipe what is stored.
        if (!$request->has($field) && !$request->hasFile($field . '_files')) {
            return array_values($current ?? []);
        }

        $kept = collect(preg_split('/\r\n|\r|\n/', (string) $request->input($field, '')))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();

        foreach ($request->file($field . '_files', []) as $file) {
            $kept[] = $this->storeUpload($file, $folder);
        }

        $kept = array_values(array_unique($kept));

        // Drop uploads that the editor removed from the list.
        foreach (array_diff($current ?? [], $kept) as $removed) {
            $this->deletePreviousUpload($removed);
        }

        return $kept;
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

    /**
     * Validation rules for a multi-image field. Merge into a controller's rules.
     */
    protected function galleryFieldRules(string $field): array
    {
        return [
            $field => 'nullable|string',
            $field . '_files' => 'nullable|array|max:12',
            $field . '_files.*' => 'image|mimes:jpg,jpeg,png,webp,gif|max:4096',
        ];
    }

    protected function deletePreviousUpload(?string $current): void
    {
        if (!$current || !Str::startsWith($current, 'storage/')) {
            return;
        }

        Storage::disk('public')->delete(Str::after($current, 'storage/'));
    }

    /**
     * Stores one upload under the given folder and returns its public path.
     */
    protected function storeUpload($file, string $folder): string
    {
        $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        $name = Str::limit($name ?: 'image', 60, '');

        $path = $file->storeAs(
            $folder,
            $name . '-' . Str::random(6) . '.' . $file->getClientOriginalExtension(),
            'public'
        );

        return 'storage/' . $path;
    }
}
