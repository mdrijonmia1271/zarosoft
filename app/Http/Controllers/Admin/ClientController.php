<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesImageUploads;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    use HandlesImageUploads;

    public function index()
    {
        $clients = Client::orderBy('order')->paginate(20);

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        Client::create($this->validated($request));
        $this->forgetCache();

        return redirect()->route('admin.clients.index')->with('success', 'Client logo added successfully.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $client->update($this->validated($request, $client));
        $this->forgetCache();

        return redirect()->route('admin.clients.index')->with('success', 'Client logo updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        $this->forgetCache();

        return redirect()->route('admin.clients.index')->with('success', 'Client logo removed successfully.');
    }

    protected function validated(Request $request, ?Client $client = null): array
    {
        $rules = [
            'name' => 'required|string|max:150',
            'slug' => 'nullable|string|max:150|unique:clients,slug' . ($client ? ',' . $client->id : ''),
            'website_url' => 'nullable|url|max:255',
            'order' => 'nullable|integer|min:0',
        ] + $this->imageFieldRules('logo');

        // A logo is the whole point of the record, so require one on create.
        if (!$client) {
            $rules['logo'] = 'required_without:logo_file|nullable|string|max:2048';
        }

        $validated = $request->validate($rules);

        return [
            'name' => $validated['name'],
            'slug' => Str::slug(($validated['slug'] ?? '') ?: $validated['name']),
            'logo' => $this->resolveImageField($request, 'logo', 'clients', $client?->logo),
            'website_url' => $validated['website_url'] ?? null,
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ];
    }

    protected function forgetCache(): void
    {
        Cache::forget('layout.clients');
    }
}
