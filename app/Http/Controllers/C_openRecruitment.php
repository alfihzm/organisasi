<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\PendaftaranBerhasilMail;
use Illuminate\Support\Facades\Storage;
use App\Models\{Campuses, OpenRecruitment, OpenRecruitmentHistory};

class C_openRecruitment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('open_recruitment.V_index');
    }

    public function chooseMember()
    {
        return view('open_recruitment.V_choose_member');
    }

    public function chooseCampus()
    {
        $campuses = Campuses::orderBy('name', 'ASC')->get();
        return view('open_recruitment.V_choose_campuses', [
            'campuses' => $campuses
        ]);
    }

    public function inputNIM(Request $request)
    {
        $campuses = Campuses::where('name', $request->campus)->first();
        if (!$campuses) {
            return redirect('/oprec/choose-campus')->with('failed', 'Aksi Ilegal');
        }
        return view('open_recruitment.V_input_nim', [
            'campus' => $request->campus
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'NIM' => [
                'required',
                'size:8',
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

        ], [
            'NIM.required' => 'NIM wajib di isi',
            'NIM.size' => 'NIM harus 8 angka yang di input ' . strlen($request->NIM) . ' angka'
        ]);

        $cek = OpenRecruitment::where('NIM', $request->NIM)->first();
        if ($cek) {
            return view('open_recruitment.V_done', [
                'data' => $cek
            ]);
        }
        return redirect("/oprec/form/$request->campus/$request->NIM");
    }

    public function form(Request $request)
    {
        $campuses = Campuses::where('name', $request->campus)->first();
        if (!$campuses || strlen($request->NIM) < 8 || strlen($request->NIM) > 8) {
            return redirect('/')->with('failed', 'Mau ngapain? aksi yang kamu lakukan illegal.');
        }
        return view('open_recruitment.V_form_oprec', [
            'campus' => $campuses,
            'NIM' => $request->NIM
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = '/oprec/choose-campus';
        $isActive = DB::table('is_active_urls')->where('url', $url)->value('is_active');

        if ($isActive === null || $isActive == 0) {
            return redirect('/oprec/closed')->with('error', 'Pendaftaran untuk kampus ini telah ditutup.');
        }

        $campus = Campuses::find($request->campuses_id);

        $rules = [
            'NIM' => ['required', 'size:8', 'unique:open_recruitment'],
            'full_name' => ['required', 'min:3'],
            'campuses_id' => ['required', 'exists:campuses,id'],
            'semester' => ['required', 'integer', 'min:1', 'max:5'],
            'ektm' => ['required', 'image', 'max:2048'],
            'follow' => ['required', 'image', 'max:2048'],
            'whatsapp' => ['required', 'min:11', 'max:13', 'unique:open_recruitment,whatsapp,'],
            'instagram' => ['required', 'min:1', 'max:30'],
            'email' => ['required', 'email:dns', 'unique:open_recruitment'],
            'motivasi_bergabung' => ['required']
        ];

        if ($campus && $campus->instagram) {
            $rules['follow_dpc'] = ['required', 'image', 'max:2048'];
        }

        $dataValid = $request->validate($rules, [
            'nim.unique' => 'NIM sudah terdaftar',
            'email.unique' => 'Email sudah terdaftar',
            'semester.min' => 'Peserta hanya diperuntukkan untuk semester 1 s.d 5',
            'semester.max' => 'Peserta hanya diperuntukkan untuk semester 1 s.d 5',
            'ektm.required' => 'Masukkan screenshot E-KTM dengan benar',
            'ektm.image' => 'Tolong upload gambar yah jangan yang lain',
            'ektm.max' => 'Maximal upload 2mb',
            'follow.required' => 'Masukkan Bukti Follow IG HIMSI dengan benar',
            'follow.image' => 'Tolong upload gambar yah jangan yang lain',
            'follow.max' => 'Maximal upload 2mb',
            'follow_dpc.required' => 'Masukkan Bukti Follow IG HIMSI DPC dengan benar',
            'follow_dpc.image' => 'Tolong upload gambar yah jangan yang lain',
            'follow_dpc.max' => 'Maximal upload 2mb',
            'whatsapp.max' => 'Nomor Whatsapp max 13 angka',
            'whatsapp.min' => 'Nomor Whatsapp min 11 angka',
            'whatsapp.unique' => 'No. Whatsapp telah terdaftar',
            'instagram.required' => 'Masukkan username instagram dengan benar',
            'instagram.min' => 'Username instagram min 1 karakter',
            'instagram.unique' => 'Username instagram maksimal 30 karakter',
            'motivasi_bergabung.required' => 'Motivasi bergabung wajib di isi'
        ]);

        $create = new OpenRecruitment();
        $create->NIM = $dataValid['NIM'];
        $create->full_name = $dataValid['full_name'];
        $create->campuses_id = $dataValid['campuses_id'];
        $create->semester = $dataValid['semester'];
        $create->whatsapp = $dataValid['whatsapp'];

        $cleanInstagram = $dataValid['instagram'];
        $cleanInstagram = trim($cleanInstagram);
        $cleanInstagram = strtolower($cleanInstagram);
        $cleanInstagram = ltrim($cleanInstagram, '@');
        $cleanInstagram = preg_replace('/[^a-z0-9]/', '', $cleanInstagram);
        $create->instagram = $cleanInstagram;

        $create->email = $dataValid['email'];
        $create->motivasi_bergabung = $dataValid['motivasi_bergabung'];

        if ($request->hasFile('ektm') && $request->hasFile('follow')) {
            $create->ektm = FileHelper::optimizeAndConvertToWebP($request->file('ektm'), 'img/ektm');
            $create->follow = FileHelper::optimizeAndConvertToWebP($request->file('follow'), 'img/follow');
            if ($request->hasFile('follow_dpc')) {
                $create->follow_dpc = FileHelper::optimizeAndConvertToWebP($request->file('follow_dpc'), 'img/follow_dpc');
            }
        }

        $account = $create->save();

        if ($account) {
            $campusId = $create->campuses_id;
            $campus = Campuses::find($campusId);

            $campusName = $campus ? $campus->name : 'Tidak Diketahui';

            OpenRecruitmentHistory::create([
                'NIM'        => $create->NIM,
                'kampus'     => $campusName,
                'keterangan' => 'Peserta ' . $create->full_name . ' telah berhasil membuat akun.',
            ]);
        }


        // Mail::to($create->email)->send(new PendaftaranBerhasilMail($create));

        return view('open_recruitment.V_done', [
            'data' => $create
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OpenRecruitment  $openRecruitment
     * @return \Illuminate\Http\Response
     */
    public function show(OpenRecruitment $openRecruitment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OpenRecruitment  $openRecruitment
     * @return \Illuminate\Http\Response
     */
    public function edit(OpenRecruitment $openRecruitment)
    {
        return view('open_recruitment.V_form_edit', [
            'OR' => $openRecruitment,
            'campuses' => Campuses::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OpenRecruitment  $openRecruitment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OpenRecruitment $openRecruitment)
    {
        $request->validate([
            'NIM' => [
                'required',
                'size:8',
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

            'full_name' => ['required', 'min:3'],
            'campuses_id' => ['required'],
            'semester' => ['required', 'integer', 'min:1', 'max:5'],
            'ektm' => ['image', 'max:2048'],
            'whatsapp' => ['required', 'min:11', 'max:13'],
            'instagram' => ['required', 'min:1', 'max:30'],
            'email' => ['required', 'email:dns',],
            'motivasi_bergabung' => ['required']
        ], [
            'nim.unique' => 'NIM sudah terdaftar',
            'email.unique' => 'Email sudah terdaftar',
            'semester.min' => 'Pendaftaran hanya diperuntukkan untuk mahasiswa semester 1 s.d 5',
            'semester.max' => 'Pendaftaran hanya diperuntukkan untuk mahasiswa semester 1 s.d 5',
            'ektm.image' => 'Tolong upload gambar yah jangan yang lain',
            'ektm.max' => 'Maximal upload 2mb',
            'whatsapp.max' => 'Nomor Whatsapp max 13 angka',
            'whatsapp.min' => 'Nomor Whatsapp min 11 angka'
        ]);

        $openRecruitment->NIM = $request->NIM;
        $openRecruitment->full_name = $request->full_name;
        $openRecruitment->campuses_id = $request->campuses_id;
        $openRecruitment->semester = $request->semester;
        $openRecruitment->whatsapp = $request->whatsapp;

        $cleanInstagram = $request->instagram;
        $cleanInstagram = trim($cleanInstagram);
        $cleanInstagram = strtolower($cleanInstagram);
        $cleanInstagram = ltrim($cleanInstagram, '@');
        $cleanInstagram = preg_replace('/[^a-z0-9]/', '', $cleanInstagram);
        $openRecruitment->instagram = $cleanInstagram;

        $openRecruitment->email = $request->email;
        $openRecruitment->motivasi_bergabung = $request->motivasi_bergabung;

        // if ($request->hasFile('ektm')) {
        //     $openRecruitment->ektm = $request->file('ektm')->store('img/ektm');
        //     Storage::delete($request->old_ektm);
        // }

        if ($request->hasFile('ektm')) {
            if ($openRecruitment->ektm && Storage::disk('public')->exists($openRecruitment->ektm)) {
                Storage::disk('public')->delete($openRecruitment->ektm);
            }

            $openRecruitment->ektm = FileHelper::optimizeAndConvertToWebP($request->file('ektm'), 'img/ektm');
        }

        if ($request->hasFile('follow')) {
            if ($openRecruitment->follow && Storage::disk('public')->exists($openRecruitment->follow)) {
                Storage::disk('public')->delete($openRecruitment->follow);
            }

            $openRecruitment->follow = FileHelper::optimizeAndConvertToWebP($request->file('follow'), 'img/follow');
        }

        if ($request->hasFile('follow_dpc')) {
            if ($openRecruitment->follow_dpc && Storage::disk('public')->exists($openRecruitment->follow_dpc)) {
                Storage::disk('public')->delete($openRecruitment->follow_dpc);
            }

            $openRecruitment->follow_dpc = FileHelper::optimizeAndConvertToWebP($request->file('follow_dpc'), 'img/follow_dpc');
        }


        // if ($request->hasFile('cv')) {
        //     $openRecruitment->cv =  $request->file('cv')->store('document/cv');
        //     Storage::delete($request->old_cv);
        // }
        $openRecruitment->save();

        return view('open_recruitment.V_done', [
            'data' => $openRecruitment
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OpenRecruitment  $openRecruitment
     * @return \Illuminate\Http\Response
     */
    public function destroy(OpenRecruitment $openRecruitment)
    {
        //
    }

    public function closed()
    {
        return view('open_recruitment.V_closed');
    }
}