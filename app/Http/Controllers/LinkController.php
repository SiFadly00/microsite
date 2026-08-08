<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;

class LinkController extends Controller
{
    /**
     * Menampilkan daftar data tautan di admin dashboard.
     */
    public function index(): View
    {
        // Mengambil semua data link diurutkan dari yang terbaru
        // $links = Link::latest()->get();
        $links = Link::latest()->paginate(5);
        
        // Mengirimkan data $links ke view 'admin.links.index'
        return view('admin.links.index', compact('links'));
    }

    public function create(): View
    {
        return view('admin.links.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi Input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url'   => 'required|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // 2. Handling Upload Gambar
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('links', 'public');
        }

        // 3. Evaluasi Status Checkbox (Boolean Helper)
        $isActive = $request->boolean('is_active');

        // 3. Simpan ke Database via Eloquent
        Link::create([
            'title'     => $validated['title'],
            'url'       => $validated['url'],
            'image'     => $imagePath,
            'is_active' => $isActive,
            'clicks'    => 0,
        ]);

        return redirect()
            ->route('admin.links.index')
            ->with('success', 'Tautan baru berhasil ditambahkan!');
    }

    public function edit(Link $link): View
    {
        return view('admin.links.edit', compact('link'));
    }

    public function update(Request $request, Link $link): RedirectResponse
    {
        // 1. Validasi Input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url'   => 'required|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = $link->image;

        // 2. Logic Penggantian / Penghapusan Gambar
        if ($request->boolean('remove_image')) {
            if ($link->image) {
                Storage::disk('public')->delete($link->image);
            }
            $imagePath = null;
        }

        if ($request->hasFile('image')) {
            // Hapus gambar lama dari disk 'public' jika ada
            if ($link->image) {
                Storage::disk('public')->delete($link->image);
            }
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('links', 'public');
        }

        // 3. Update Record Database
        $link->update([
            'title'     => $validated['title'],
            'url'       => $validated['url'],
            'image'     => $imagePath,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.links.index')
            ->with('success', 'Tautan berhasil diperbarui!');
    }

    public function destroy(Link $link): RedirectResponse
    {
        // 1. Hapus berkas fisik gambar terlebih dahulu
        if ($link->image) {
            Storage::disk('public')->delete($link->image);
        }

        // 2. Hapus record dari database
        $link->delete();

        return redirect()
            ->route('admin.links.index')
            ->with('success', 'Tautan berhasil dihapus secara permanen!');
    }
}