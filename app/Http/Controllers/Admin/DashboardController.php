<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invitation;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUndangan = Invitation::count();

        $undanganTerbit = Invitation::where(
            'is_published',
            true
        )->count();

        $undanganDraft = Invitation::where(
            'is_published',
            false
        )->count();

        $undanganTerbaru = Invitation::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUndangan',
            'undanganTerbit',
            'undanganDraft',
            'undanganTerbaru'
        ));
    }
}
