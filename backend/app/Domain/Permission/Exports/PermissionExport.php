<?php

namespace App\Domain\Permission\Exports;

use App\Domain\Core\ExportTrait;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class PermissionExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping, WithEvents, WithColumnWidths
{
    use ExportTrait;

    protected $permissions;

    public function __construct($query)
    {
        $this->permissions = $query;
    }

    public function collection()
    {
        return $this->permissions;
    }

    /**
     * @param $permission
     * @return array
     */
    public function map($permission): array
    {


        return [
            $permission->id,
            $permission->name,
            $permission->parent->name ?? '' ,
            $permission->description,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Action',
            'Parent',
            'Description'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $this->afterSheet($event, 'A1:D225', 'A1:D1');
            }
        ];
    }

    public function columnWidths(): array
    {

        return [
            'A' => 10,
            'B' => 25,
            'C' => 25,
            'D' => 60
        ];
    }
}
