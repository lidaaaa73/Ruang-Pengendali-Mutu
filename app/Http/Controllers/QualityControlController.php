<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QualityControlController extends Controller
{
    public function documentCheck(Request $request): View
    {
        $trainings = Training::with('documents')
            ->orderByDesc('start_date')
            ->get();

        return view('quality-control.document-check', compact('trainings'));
    }

    public function reports(Request $request): View
    {
        $trainings = Training::with([
            'documents' => function ($query) {
                $query->whereIn('document_type', [
                    'laporan_penyelenggara',
                    'evaluasi_penyelenggaraan',
                ])->with(['uploader', 'verifier']);
            },
        ])
            ->where('execution_status', 'selesai')
            ->orderByDesc('end_date')
            ->get();

        return view('quality-control.reports', compact('trainings'));
    }
}
