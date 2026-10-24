<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\Admin\RsvpController as AdminRsvpController;

class RsvpController extends Controller
{
    public function store(Request $request, string $slug)
    {
        // Hanya undangan yang sudah diterbitkan yang menerima RSVP
        $invitation = Invitation::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Validasi data dari form tamu
        $validated = $request->validate([
            'guest_name' => ['required', 'string', 'max:150'],
            'phone' => ['nullable', 'string', 'max:30'],

            'attendance_status' => [
                'required',
                'in:hadir,tidak_hadir,ragu_ragu',
            ],

            'guest_count' => [
                'required',
                'integer',
                'min:1',
                'max:10',
            ],

            'message' => ['nullable', 'string', 'max:1000'],
        ], [
            'guest_name.required' => 'Nama tamu wajib diisi.',
            'attendance_status.required' => 'Pilih konfirmasi kehadiran.',
            'attendance_status.in' => 'Pilihan kehadiran tidak valid.',
            'guest_count.min' => 'Jumlah tamu minimal 1 orang.',
            'guest_count.max' => 'Jumlah tamu maksimal 10 orang.',
            'message.max' => 'Ucapan maksimal 1000 karakter.',
        ]);

        // Jika tidak hadir, jumlah tamu yang datang adalah nol
        if ($validated['attendance_status'] === 'tidak_hadir') {
            $validated['guest_count'] = 0;
        }

        // Simpan RSVP melalui relasi undangan
        $invitation->rsvps()->create($validated);

        return redirect()
            ->to(route('invitations.show', $invitation->slug) . '#rsvp')
            ->with('success', 'Terima kasih! Konfirmasi kehadiran kamu berhasil dikirim.');
    }
}