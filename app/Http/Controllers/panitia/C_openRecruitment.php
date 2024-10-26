<?php

namespace App\Http\Controllers\panitia;

use App\Exports\excelOprec;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\{Campuses, OpenRecruitment};
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Notification;

class C_openRecruitment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('open_recruitment.panitia.data.V_campuses', [
            'campuses' => Campuses::with('openRecruitment')->orderBy('name', 'ASC')->get(),
        ]);
    }

    public function campus(Campuses $campuses)
    {
        if (Auth::user()->positions->level != 'DPP' xor Auth::user()->positions->name != 'admin') {
        } else {
            if (Auth::user()->campuses->name != $campuses->name) {
                $samudra  = ['Pemuda', 'Kramat 98', 'Dewi Sartika'];
                $marwati  = ['Margonda', 'Fatmawati'];
                $cutMutia = ['Cut Mutia', 'Kalimalang'];
                $cikarung = ['Cikarang', 'Cibitung'];

                if (in_array(Auth::user()->campuses->name, $samudra) && in_array($campuses->name, $samudra)) {
                } elseif (Auth::user()->campuses->name == 'Margonda' && in_array($campuses->name, $marwati)) {
                } elseif (Auth::user()->campuses->name == 'Cut Mutia' && in_array($campuses->name, $cutMutia)) {
                } elseif (Auth::user()->campuses->name == 'Cikarang' && in_array($campuses->name, $cikarung)) {
                } else {
                    if (Auth::user()->campuses->name == 'Margonda' || Auth::user()->campuses->name == 'Fatmawati') {
                        return back()->with('failed', 'Kamu hanya bisa mengakses peserta dari kampus Margonda, Fatmawati');
                    } elseif (Auth::user()->campuses->name == 'Pemuda' || Auth::user()->campuses->name == 'Kramat 98' || Auth::user()->campuses->name == 'Dewi Sartika') {
                        return back()->with('failed', 'Kamu hanya bisa mengakses peserta dari kampus Pemuda, Kramat 98, Dewi Sartika');
                    } elseif (Auth::user()->campuses->name == 'Cut Mutia' || Auth::user()->campuses->name == 'Kalimalang') {
                        return back()->with('failed', 'Kamu hanya bisa mengakses peserta dari kampus Cut Mutia, Kalimalang');
                    } elseif (Auth::user()->campuses->name == 'Cikarang' || Auth::user()->campuses->name == 'Cibitung') {
                        return back()->with('failed', 'Kamu hanya bisa mengakses peserta dari kampus Cikarang, Cibitung');
                    } else {
                        return back()->with('failed', 'Kamu hanya bisa mengakses peserta dari kampus ' . Auth::user()->campuses->name);
                    }
                }
            }
        }

        return view('open_recruitment.panitia.data.V_oprec', [
            'openRecruitment' => OpenRecruitment::with('campuses')
                ->where('campuses_id', $campuses->id)
                ->get(),
            'campus' => $campuses->name,
            'linkExcel' => "/export/excel/$campuses->id",
        ]);
    }

    public function exportExcel(Campuses $campuses)
    {
        $dataOprec = OpenRecruitment::with('campuses')
            ->where('campuses_id', $campuses->id)
            ->where('status_interview', 'lolos')
            ->get();
        $data = [
            'dataOprec' => $dataOprec,
        ];
        return Excel::download(new excelOprec($data), 'OPREC ' . strtoupper($campuses->name) . ' ' . date('Y') . '.xlsx');
    }

    public function filterInterview(Campuses $campuses, Request $request)
    {
        return view('open_recruitment.panitia.data.V_oprec', [
            'openRecruitment' => OpenRecruitment::with('campuses')
                ->where(['campuses_id' => $campuses->id, 'status_interview' => $request->status_interview])
                ->get(),
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
     * @param  \App\Models\OpenRecruitment  $openRecruitment
     * @return \Illuminate\Http\Response
     */
    public function show(OpenRecruitment $openRecruitment)
    {
        return view('open_recruitment.panitia.data.V_detail-oprec', [
            'oprec' => $openRecruitment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OpenRecruitment  $openRecruitment
     * @return \Illuminate\Http\Response
     */
    public function edit(OpenRecruitment $openRecruitment)
    {
        //
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
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OpenRecruitment  $openRecruitment
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, OpenRecruitment $openRecruitment)
    {
        $userCampus = Auth::user()->campuses->name;

        if (Auth::user()->positions->level == 'DPP' || Auth::user()->positions->name == 'admin') {
        } else {
            if (Auth::user()->positions->level != 'DPP' || Auth::user()->positions->name != 'admin') {
                $margonda = ['Fatmawati', 'Margonda'];
                $samudra  = ['Pemuda', 'Kramat 98', 'Dewi Sartika'];
                $cutMutia = ['Cut Mutia', 'Kalimalang'];
                $cikarung = ['Cikarang', 'Cibitung'];

                if ($userCampus == 'Margonda' && !in_array($openRecruitment->campuses->name, $margonda)) {
                    return back()->with('failed', 'Kamu hanya bisa mengakses data kampus Margonda dan Fatmawati.');
                }

                if ($userCampus == 'Samudra' && !in_array($openRecruitment->campuses->name, $samudra)) {
                    return back()->with('failed', 'Kamu hanya bisa mengakses data kampus Pemuda, Kramat 98, dan Dewi Sartika.');
                }

                if ($userCampus == 'Cut Mutia' && !in_array($openRecruitment->campuses->name, $cutMutia)) {
                    return back()->with('failed', 'Kamu hanya bisa mengakses data kampus Cut Mutia dan Kalimalang.');
                }

                if ($userCampus == 'Cikarang' && !in_array($openRecruitment->campuses->name, $cikarung)) {
                    return back()->with('failed', 'Kamu hanya bisa mengakses data kampus Cikarang dan Cibitung.');
                }

                if (!in_array($openRecruitment->campuses->name, array_merge($margonda, $samudra, $cutMutia, $cikarung)) && $userCampus != $openRecruitment->campuses->name) {
                    return back()->with('failed', 'Kamu hanya bisa mengakses data kampus ' . $userCampus);
                }
            }
        }

        $openRecruitment->status_interview = $request->status_interview;

        if (!$openRecruitment->no_anggota) {
            $no_cabang = $openRecruitment->campuses_id < 10 ? "0$openRecruitment->campuses_id" : "$openRecruitment->campuses_id";
            $year = Carbon::now()->format('y');
            $kode_prodi = substr("$openRecruitment->NIM", 0, 2);
            $anggota_terakhir = OpenRecruitment::where('no_anggota', '!=', null)->latest('updated_at')->first();

            if ($anggota_terakhir) {
                $last_year = explode('.', $anggota_terakhir->no_anggota)[3];
                $nomer_anggota_terakhir = (int) explode('.', $anggota_terakhir->no_anggota)[1] + 1;
                if ($last_year != $year) {
                    $nomer_anggota_terakhir = 1;
                }
                $anggota_ke = str_repeat('0', 4 - strlen($nomer_anggota_terakhir)) . "$nomer_anggota_terakhir";
                $no_anggota = "H$no_cabang.$anggota_ke.$kode_prodi.$year";
            } else {
                $no_anggota = "H$no_cabang.0001.$kode_prodi.$year";
            }
            $openRecruitment->no_anggota = $no_anggota;
        }

        if ($request->status_interview == 'belum') {
            $openRecruitment->no_anggota = null;
        }

        $openRecruitment->save();

        return back()->with('success', 'Berhasil update status pengecekan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OpenRecruitment  $
     * @return \Illuminate\Http\Response
     */
    public function destroy(OpenRecruitment $openRecruitment)
    {
        if (Auth::user()->positions->name != 'admin') {
            return back()->with('failed', 'Kamu tidak mempunyai hak untuk menghapus');
        }

        $campuses_id = $openRecruitment->campuses_id;
        $adminFullName = Auth::user()->full_name;
        $participantId = $openRecruitment->NIM;

        $files = [
            'cv' => $openRecruitment->cv,
            'ektm' => $openRecruitment->ektm,
            'follow' => $openRecruitment->follow,
            'follow_dpc' => $openRecruitment->follow_dpc,
        ];

        foreach ($files as $key => $filePath) {
            if ($filePath) {
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                } elseif (Storage::disk('local')->exists($filePath)) {
                    Storage::disk('local')->delete($filePath);
                }
            }
        }

        $delete = $openRecruitment->delete();

        if ($delete) {
            Notification::create([
                'keterangan' => "$adminFullName telah menghapus peserta $participantId dari tabel peserta",
            ]);

            return redirect("panitia/openrecruitment/campus/$campuses_id")->with('success', 'Berhasil menghapus calon pendaftar.');
        }

        return redirect("panitia/openrecruitment/campus/$campuses_id")->with('failed', 'Gagal menghapus calon pendaftar.');
    }

    public function hapusCV(OpenRecruitment $openRecruitment)
    {
        if (Auth::user()->positions->name != 'admin' && Auth::user()->positions->name != 'committee') {
            return back()->with('failed', 'Kamu tidak mempunyai hak untuk menghapus.');
        }

        $cvPath = $openRecruitment->cv;
        $openRecruitment->cv = null;
        $cvDeleted = $openRecruitment->save();

        $adminFullName = Auth::user()->full_name;
        $participantId = $openRecruitment->NIM;

        if ($cvDeleted && $cvPath) {
            Storage::delete($cvPath);

            Notification::create([
                'keterangan' => "$adminFullName telah menghapus CV peserta $participantId dari database.",
            ]);

            return redirect()->back()->with('success', 'Berhasil menghapus CV calon pendaftar.');
        }

        return redirect()->back()->with('failed', 'Gagal menghapus CV calon pendaftar.');
    }
}
