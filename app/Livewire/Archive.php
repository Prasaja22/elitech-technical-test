<?php

namespace App\Livewire;

use App\Models\UploadModel;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UploadsExport;
use Barryvdh\DomPDF\Facade\Pdf;

class Archive extends Component
{
    use WithPagination;

    public $startDate;
    public $endDate;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $query = UploadModel::query();

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('created_at', [$this->startDate, $this->endDate]);
        }

        $posts = $query->orderBy('created_at', 'desc')->paginate(4);

        return view('livewire.archive', [
            'posts' => $posts,
        ]);
    }

    public function exportExcel()
    {
        $currentDateTime = now()->format('Y-m-d_H-i-s');
        return Excel::download(new UploadsExport($this->startDate, $this->endDate), "export_excel_{$currentDateTime}.xlsx");
    }

    public function exportPdf()
    {
        $posts = UploadModel::query();

        if ($this->startDate && $this->endDate) {
            $posts->whereBetween('created_at', [$this->startDate, $this->endDate]);
        }

        $posts = $posts->orderBy('created_at', 'desc')->get();

        // Memastikan semua caption adalah UTF-8
        $posts->each(function ($post) {
            $post->caption = mb_convert_encoding($post->caption, 'UTF-8', 'UTF-8');
        });

        $pdf = Pdf::loadView('pdf.data', ['posts' => $posts])
        ->setOption('isHtml5ParserEnabled', true)
        ->setOption('isPhpEnabled', true)
        ->setOption('font', 'Arial');  // Ganti dengan font yang Anda inginkan

        // dd($pdf);
        // Format tanggal dan jam saat ini (misalnya, 2024-12-03_15-30-45)
        $currentDateTime = now()->format('Y-m-d_H-i-s');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, "export_pdf_{$currentDateTime}.pdf");
    }

}
