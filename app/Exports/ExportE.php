<?php
namespace App\Exports;

use App\Models\Stagiaire;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportE implements FromCollection
{
    public function collection()
    {
        return Stagiaire::all();
    }
}
