<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Campuses;
use App\Models\OpenRecruitment;
use App\Models\User;

class C_dashboard extends Controller
{
    public function index()
    {
        return view('open_recruitment.panitia.dashboard', [
            'pendaftar' => OpenRecruitment::count(),
            'jumlahCampus' => Campuses::count(),
            'jumlahPanitia' => User::count(),
        ]);
    }
}