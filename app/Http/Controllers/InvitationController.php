<?php

namespace App\Http\Controllers;

use App\Models\Invitation;

class InvitationController extends Controller
{
    public function show($slug)
    {
        $invitation = Invitation::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('invitations.show', compact('invitation'));
    }
}
