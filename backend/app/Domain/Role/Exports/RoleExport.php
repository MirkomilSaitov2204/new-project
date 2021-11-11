<?php

namespace App\Domain\Role\Exports;

use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

/**
 * @class RoleExport
 * @implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping, WithEvents, WithColumnWidths
 * @description Export Roles to Excel file
 *
 * @author Mirkomil Saitov <mirkomilmirabdullaevich@gmail.com>
 * @phone +998903248563
 */
class RoleExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping, WithEvents, WithColumnWidths
{
    protected $roles;

    public function __construct($query)
    {
        $this->roles = $query;
    }

    public function collection()
    {
        return $this->roles;
    }

    /**
     * @param $role
     * @return array
     */
    public function map($role): array
    {


        return [
            $role->id,
            $role->name,
            $role->description,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Description'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:C225')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
                $event->sheet->getDelegate()->getStyle('A1:C225')->getAlignment()->setWrapText(true)->setHorizontal(Alignment::HORIZONTAL_CENTER);

                /**
                 * Borders
                 */
                $event->sheet->getStyle('A1:C1')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => [
                                'rgb' => '#211ED6'
                            ]
                        ]
                    ],
                ]);
            }
        ];
    }

    public function columnWidths(): array
    {

        return [
            'A' => 10,   'B' => 20,   'C' => 60
        ];
    }

}
