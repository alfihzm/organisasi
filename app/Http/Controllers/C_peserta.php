<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Campuses;
use App\Models\InfoDpc;
use Illuminate\Http\Request;
use App\Models\OpenRecruitment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class C_peserta extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peserta = Auth::guard('participant')->user();
        $campus = $peserta->campuses;
        $totalCampus = Campuses::count();
        $dpc = $campus->infoDpc;

        return view('open_recruitment.peserta.V_dashboard', [
            'peserta' => $peserta,
            'campus' => $campus,
            'totalCampus' => $totalCampus,
            'dpc' => $dpc
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $campuses = Campuses::all();
        $peserta = Auth::guard('participant')->user();

        return view('open_recruitment.peserta.V_ubahProfil', [
            'peserta' => $peserta,
            'campuses' => $campuses
        ]);
    }

    public function update(Request $request)
    {
        $peserta = Auth::guard('participant')->user();

        $request->validate([
            'full_name' => ['required', 'min:3'],
            'NIM' => [
                'required',
                'size:8',
                'unique:open_recruitment,NIM,' . $peserta->id . ',id',
                function ($attribute, $value, $fail) {
                    $nimPrefix = (int) substr($value, 0, 4);
                    if ($nimPrefix >= 1200 && $nimPrefix < 1223) {
                        $fail('Pendaftaran hanya diperuntukkan untuk mahasiswa D3 dengan semester 1 s.d 3.');
                    } elseif ($nimPrefix >= 1900 && $nimPrefix < 1922) {
                        $fail('Pendaftaran hanya diperuntukkan untuk mahasiswa S1 dengan semester 1 s.d 5.');
                    } elseif ($nimPrefix >= 1925) {
                        $fail('NIM pada angka depan tidak boleh melebihi dari 1924.');
                    } elseif (in_array($nimPrefix, [1223, 1224])) {
                        return;
                    } elseif (!in_array($nimPrefix, [1922, 1923, 1924])) {
                        $fail('Pendaftaran hanya diperuntukkan untuk mahasiswa sistem informasi.');
                    }
                }
            ],
            'email' => ['required', 'email:dns', 'unique:open_recruitment,email,' . $peserta->id . ',id'],
            'whatsapp' => ['required', 'min:11', 'max:13'],
            'instagram' => ['required', 'min:1', 'max:30'],
            'campuses_id' => ['required'],
            'semester' => ['required', 'integer', 'min:1', 'max:5'],
        ], [
            'full_name.required' => 'Masukkan nama dengan benar',
            'full_name.min' => 'Nama minimal 3 karakter',
            'NIM.required' => 'Masukkan NIM dengan benar',
            'NIM.size' => 'NIM harus 8 karakter',
            'NIM.unique' => 'NIM telah terdaftar',
            'email.required' => 'Masukkan email dengan benar',
            'email.unique' => 'Email telah terdaftar',
            'whatsapp.required' => 'Masukkan no. whatsapp dengan benar',
            'whatsapp.min' => 'No. Whatsapp minimal 11 karakter',
            'whatsapp.max' => 'No. Whatsapp maksimal 13 karakter',
            // Percobaan untuk membuat no. whatsapp unique menjadi masalah dikarenakan ketika peserta ingin mengubah salah satu biodata, sistem membaca peserta harus mengubah whatsapp mereka pada form. 
            // Padahal peserta tidak ingin mengubah no. whatsapp karena memang sudah benar. Untuk itu saya matikan saja
            // 'whatsapp.unique' => 'No. Whatsapp telah terdaftar',
            'instagram.required' => 'Masukkan Instagram dengan benar',
            'instagram.min' => 'Username instagram minimal 1 karakter',
            'instagram.max' => 'Username instagram maksimal 30 karakter',
            'campuses_id.required' => 'Masukkan asal kampus dengan benar',
            'semester.required' => 'Masukkan semester dengan benar',
            'semester.integer' => 'Semester hanya dengan karakter angka',
            'semester.min' => 'Pendaftaran hanya diperuntukkan untuk mahasiswa semester 1 s.d 5',
            'semester.max' => 'Pendaftaran hanya diperuntukkan untuk mahasiswa semester 1 s.d 5',
        ]);

        if ($peserta->updated_at && $peserta->updated_at->diffInMinutes(now()) < 1) {
            return redirect()->route('peserta.dashboard')->withErrors(['error' => 'Kamu mengubah data (CV / Biodata) kurang dari 1 menit yang lalu. Silakan coba lagi nanti.']);
        }

        $peserta->full_name = $request->full_name;
        $peserta->NIM = $request->NIM;
        $peserta->email = $request->email;
        $peserta->whatsapp = $request->whatsapp;

        $cleanInstagram = $request->instagram;
        $cleanInstagram = trim($cleanInstagram);
        $cleanInstagram = strtolower($cleanInstagram);
        $cleanInstagram = ltrim($cleanInstagram, '@');
        $cleanInstagram = preg_replace('/[^a-z0-9]/', '', $cleanInstagram);
        $peserta->instagram = $cleanInstagram;

        $peserta->campuses_id = $request->campuses_id;
        $peserta->semester = $request->semester;

        $peserta->save();

        return redirect()->route('peserta.dashboard')->with('success', 'Berhasil mengubah informasi');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadCV(Request $request)
    {
        $request->validate([
            'cv' => 'required|file|mimetypes:application/pdf|max:2048',
        ], [
            'cv.required' => 'Masukkan CV dengan benar',
            'cv.mimetypes' => 'Format file hanya PDF, jangan yang lain',
            'cv.max' => 'Maksimal upload 2MB'
        ]);

        $peserta = Auth::guard('participant')->user();

        if ($request->hasFile('cv')) {
            if (!is_null($peserta->cv)) {
                Storage::delete('public/document/cv/' . $peserta->cv);
            }

            $file = $request->file('cv');
            $filename = $peserta->id . '_cv.' . $file->getClientOriginalExtension();
            $file->storeAs('public/document/cv', $filename);

            $peserta->cv = $filename;
            $peserta->save();
        } else {
            return back()->withErrors(['cv' => 'File CV tidak ditemukan.']);
        }

        return redirect()->route('peserta.dashboard')->with('success', 'CV berhasil diunggah.');
    }


    public function editCV(Request $request)
    {
        $peserta = Auth::guard('participant')->user();
        if ($peserta->updated_at && $peserta->updated_at->diffInMinutes(now()) < 1) {
            return redirect()->route('peserta.dashboard')->withErrors(['error' => 'Kamu mengubah data (CV / Biodata) kurang dari 1 menit yang lalu. Silakan coba lagi nanti.']);
        }

        $request->validate([
            'cv' => 'required|file|mimetypes:application/pdf|max:2048',
        ], [
            'cv.required' => 'Masukkan CV dengan benar',
            'cv.mimetypes' => 'Tolong upload PDF yaa jangan yang lain',
            'cv.max' => 'Maximal upload 2MB',
        ]);

        if ($request->hasFile('cv')) {
            if (!is_null($peserta->cv)) {
                Storage::delete('public/document/cv/' . $peserta->cv);
            }

            $cvPath = $request->file('cv')->store('public/document/cv');

            $peserta->cv = str_replace('public/document/cv/', '', $cvPath);
        }

        $peserta->save();

        return redirect()->route('peserta.dashboard')->with('success', 'CV berhasil diubah.');
    }
}
