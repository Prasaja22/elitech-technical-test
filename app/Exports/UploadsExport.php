<?php

namespace App\Exports;

use App\Models\UploadModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UploadsExport implements FromCollection, WithHeadings
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        $query = UploadModel::query();

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('created_at', [$this->startDate, $this->endDate]);
        }

        return $query->get(['caption', 'media', 'created_at']); // Tentukan kolom yang ingin diekspor
    }

    public function headings(): array
    {
        return ['Caption', 'Media', 'Date'];
    }
}
