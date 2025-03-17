<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditMentoringController extends Controller
{
    public function store(Request $request)
    {
        $mentoringData = [
            'created_at' => $request->input('created_at'),
            'nip' => $request->input('nip'),
            'nip_mentor' => $request->input('nip_mentor'),
        ];

        return view('edit-mentoring', compact('mentoringData'));
    }

}