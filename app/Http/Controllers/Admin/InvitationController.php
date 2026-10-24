<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    // Menampilkan semua undangan
    public function index()
    {
        $invitations = Invitation::latest()->paginate(10);

        return view('admin.invitations.index', compact('invitations'));
    }

    // Menampilkan form tambah
    public function create()
    {
        $invitation = new Invitation();

        return view('admin.invitations.create', compact('invitation'));
    }

    // Menyimpan undangan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'groom_name' => 'required|string|max:255',
            'bride_name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|alpha_dash|unique:invitations,slug',
            'groom_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'bride_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'akad_date' => 'nullable|date',
            'akad_location' => 'nullable|string|max:255',
            'akad_address' => 'nullable|string',
            'reception_date' => 'nullable|date',
            'reception_location' => 'nullable|string|max:255',
            'reception_address' => 'nullable|string',
            'google_maps_url' => 'nullable|url|max:2000',
            'story' => 'nullable|string',
            'is_published' => 'nullable|boolean',
        ]);

        // Membuat slug otomatis jika kosong
        $validated['slug'] = $validated['slug']
            ?: Str::slug(
                $validated['groom_name'] . '-' . $validated['bride_name']
            );

        // Upload foto
        foreach (['groom_photo', 'bride_photo', 'cover_photo'] as $photo) {
            if ($request->hasFile($photo)) {
                $validated[$photo] = $request->file($photo)
                    ->store('invitations', 'public');
            }
        }

        $validated['is_published'] = $request->boolean('is_published');

        Invitation::create($validated);

        return redirect()
            ->route('admin.invitations.index')
            ->with('success', 'Undangan berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit(Invitation $invitation)
    {
        return view('admin.invitations.edit', compact('invitation'));
    }

    // Memperbarui undangan
    public function update(Request $request, Invitation $invitation)
    {
        $validated = $request->validate([
            'groom_name' => 'required|string|max:255',
            'bride_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|alpha_dash|unique:invitations,slug,' . $invitation->id,
            'groom_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'bride_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'akad_date' => 'nullable|date',
            'akad_location' => 'nullable|string|max:255',
            'akad_address' => 'nullable|string',
            'reception_date' => 'nullable|date',
            'reception_location' => 'nullable|string|max:255',
            'reception_address' => 'nullable|string',
            'google_maps_url' => 'nullable|url|max:2000',
            'story' => 'nullable|string',
            'is_published' => 'nullable|boolean',
        ]);

        // Upload foto baru jika dipilih
        foreach (['groom_photo', 'bride_photo', 'cover_photo'] as $photo) {
            if ($request->hasFile($photo)) {
                if ($invitation->$photo) {
                    Storage::disk('public')->delete($invitation->$photo);
                }

                $validated[$photo] = $request->file($photo)
                    ->store('invitations', 'public');
            }
        }

        $validated['is_published'] = $request->boolean('is_published');

        $invitation->update($validated);

        return redirect()
            ->route('admin.invitations.index')
            ->with('success', 'Undangan berhasil diperbarui!');
    }
    // Menampilkan detail undangan
    public function show(Invitation $invitation)
{
    return view('admin.invitations.show', compact('invitation'));
}
    // Menghapus undangan
    public function destroy(Invitation $invitation)
    {
        foreach (['groom_photo', 'bride_photo', 'cover_photo'] as $photo) {
            if ($invitation->$photo) {
                Storage::disk('public')->delete($invitation->$photo);
            }
        }

        $invitation->delete();

        return redirect()
            ->route('admin.invitations.index')
            ->with('success', 'Undangan berhasil dihapus!');
    }
}
