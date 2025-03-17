<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use function Pest\Laravel\get;

class MentoringController extends Controller
{
    public function create(): View
    {
        return view('mentoring.input-mentoring');
    }

    public function index()
    {
        $indexMentoring = DB::table('mentoring')
            ->leftJoin('users as nipUsers', 'mentoring.nip', '=', 'nipUsers.nip')
            ->leftJoin('users as mentorUsers', 'mentoring.mentor', '=', 'mentorUsers.nip')
            ->select(['mentoring.created_at', 'nipUsers.nip as nip', 'nipUsers.name as name', 'mentorUsers.nip as nipMentor', 'mentorUsers.name as mentor', 'mentoring.status_verifikasi'])
            ->get();

        return view('mentoring.mentoring', compact('indexMentoring')); // Kirim data ke view
    }
}