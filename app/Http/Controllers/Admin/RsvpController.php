<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rsvp;

class RsvpController extends Controller
{
    public function index()
    {
        $rsvps = Rsvp::with('invitation')
            ->latest()
            ->paginate(15);

        $totalRsvp = Rsvp::count();

        $hadir = Rsvp::where(
            'attendance_status',
            'hadir'
        )->count();

        $tidakHadir = Rsvp::where(
            'attendance_status',
            'tidak_hadir'
        )->count();

        $raguRagu = Rsvp::where(
            'attendance_status',
            'ragu_ragu'
        )->count();

        $totalTamuHadir = Rsvp::where(
            'attendance_status',
            'hadir'
        )->sum('guest_count');

        return view('admin.rsvps.index', compact(
            'rsvps',
            'totalRsvp',
            'hadir',
            'tidakHadir',
            'raguRagu',
            'totalTamuHadir'
        ));
    }
}