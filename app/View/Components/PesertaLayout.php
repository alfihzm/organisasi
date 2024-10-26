<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class PesertaLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;

    public function __construct($title = 'Himpunan Mahasiswa Sistem Informasi')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.peserta-layout', [
            'title' => $this->title
        ]);
    }
}