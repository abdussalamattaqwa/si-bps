<?php

require 'assets/phpspreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class Myexcel
{

    public function halaqah($filename, $jkhalaqah, $data)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman')->setSize(10);
        $sheet->getColumnDimension('A')->setWidth(8);
        $sheet->getColumnDimension('B')->setWidth(9);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(30);


        $sheet->setCellValue('A1', 'Daftar Halaqah ' . $jkhalaqah)
            ->setCellValue('A2', 'Semester ' . $data['kelas']['semester'] . ' Tahun ' . $data['tahun']);

        $sheet->mergeCells('A1:F1')
            ->mergeCells('A2:F2');

        $sheet->getStyle('A1:A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('B4', 'Jurusan     : ' . $data['kelas']['jurusan'])
            ->setCellValue('B5', 'Prodi         : ' . $data['kelas']['prodi'])
            ->setCellValue('B6', 'Kelas         : ' . $data['kelas']['kelas']);

        $sheet->mergeCells('B4:F4')
            ->mergeCells('B5:F5')
            ->mergeCells('B6:F6');


        $baris = 8;
        foreach ($data['halaqah'] as $h) {

            $sheet->setCellValue(
                'B' . $baris,
                'Tutor         : ' . $h['nama']
            )
                ->setCellValue(
                    'B' . ($baris + 1),
                    'No. Telp   : ' . $h['telp']
                )
                ->setCellValue(
                    'B' . ($baris + 2),
                    'Halaqah    : ' . $h['level']
                );

            $sheet->mergeCells('B' . $baris . ':G' . $baris)
                ->mergeCells('B' . ($baris + 1) . ':G' . ($baris + 1))
                ->mergeCells('B' . ($baris + 2) . ':G' . ($baris + 2));

            $baris += 3;

            $borderCell = 'B' . $baris . ':';
            $sheet->setCellValue('B' . $baris, 'No')
                ->setCellValue('C' . $baris, 'NIM')
                ->setCellValue('D' . $baris, 'Nama');


            $tableHead = [
                'font' => [
                    'color' => [
                        'rgb' => '000000'
                    ],
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'rgb' => 'EEEEEE'
                    ]
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => [
                            'rgb' => '000000',
                        ]

                    ]
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER
                ]
            ];
            $sheet->getStyle('B' . $baris . ':D' . $baris)->applyFromArray($tableHead)->getFont()->setBold(true);

            $baris++;

            $i = 1;
            $alignCell = 'B' . $baris . ':';
            foreach ($data['mahasiswa'] as $mhs) {
                $sheet->setCellValue('B' . $baris, $i)
                    ->setCellValue('C' . $baris, $mhs['nim'])
                    ->setCellValue('D' . $baris, $mhs['nama']);
                $i++;
                $baris++;
            }
            $sheet->getStyle($alignCell . 'C' . ($baris - 1))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            $borderCell .= 'D' . ($baris - 1);
            $sheet->getStyle($borderCell)->getBorders()->getAllBorders()->applyFromArray([
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => [
                    'rgb' => '000000',
                ]
            ]);
            $baris++;
        }



        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        $writer->save('php://output');
    }

    public function nilai($filename, $data)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman')->setSize(10);

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(3.20);
        $sheet->getColumnDimension('C')->setWidth(14);
        $sheet->getColumnDimension('D')->setWidth(21);
        $sheet->getColumnDimension('E')->setWidth(5);
        $sheet->getColumnDimension('F')->setWidth(10);
        $sheet->getColumnDimension('G')->setWidth(8);
        $sheet->getColumnDimension('H')->setWidth(8);
        $sheet->getColumnDimension('I')->setWidth(8);
        $sheet->getColumnDimension('J')->setWidth(8);
        $sheet->getColumnDimension('K')->setWidth(8);


        $sheet->setCellValue('A1', 'LAPORAN NILAI AKHIR')
            ->setCellValue('A2', 'SEMESTER GENAP 2028/2019');

        $sheet->mergeCells('A1:K1')
            ->mergeCells('A2:K2');

        $sheet->getStyle('A1:A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('B4', 'Jurusan     : ' . $data['kelas']['jurusan'])
            ->setCellValue('B5', 'Prodi          : ' . $data['kelas']['prodi'])
            ->setCellValue('H4', 'Kelas     : ' . $data['kelas']['kelas']);

        $sheet->mergeCells('B4:G4')
            ->mergeCells('B5:G5')
            ->mergeCells('H4:K4');



        $i = 1;

        $sheet->setCellValue('B' . ($i + 5), 'No')
            ->setCellValue('C' . ($i + 5), 'NIM')
            ->setCellValue('D' . ($i + 5), 'Nama')
            ->setCellValue('E' . ($i + 5), 'JK')
            ->setCellValue('F' . ($i + 5), 'Kehadiran')
            ->setCellValue('G' . ($i + 5), 'MID')
            ->setCellValue('H' . ($i + 5), 'Final')
            ->setCellValue('I' . ($i + 5), 'Tugas')
            ->setCellValue('J' . ($i + 5), 'Nilai Akhir')
            ->setCellValue('J' . ($i + 6), 'Angka')
            ->setCellValue('K' . ($i + 6), 'Huruf');

        $sheet->mergeCells('B6:B7')
            ->mergeCells('C6:C7')
            ->mergeCells('D6:D7')
            ->mergeCells('E6:E7')
            ->mergeCells('F6:F7')
            ->mergeCells('G6:G7')
            ->mergeCells('H6:H7')
            ->mergeCells('I6:I7')
            ->mergeCells('J6:K6');


        $tableHead = [
            'font' => [
                'color' => [
                    'rgb' => '000000'
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'EEEEEE'
                ]
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => [
                        'rgb' => '000000',
                    ]

                ]
            ]
        ];



        foreach ($data['mahasiswa'] as $mhs) {
            // var_dump($mhs);
            $sheet->setCellValue('B' . ($i + 7), $i)
                ->setCellValue('C' . ($i + 7), $mhs['nim'])
                ->setCellValue('D' . ($i + 7), $mhs['nama'])
                ->setCellValue('E' . ($i + 7), $mhs['jk'])
                ->setCellValue('F' . ($i + 7), ($mhs['kehadiran'] != null) ? $mhs['kehadiran'] : '0')
                ->setCellValue('G' . ($i + 7), ($mhs['mid'] != null) ? $mhs['mid'] : '0')
                ->setCellValue('H' . ($i + 7), ($mhs['final_test'] != null) ? $mhs['final_test'] : '0')
                ->setCellValue('I' . ($i + 7), ($mhs['tugas'] != null) ? $mhs['tugas'] : '0')
                ->setCellValue('J' . ($i + 7), $mhs['akhir'])
                ->setCellValue('K' . ($i + 7), $mhs['huruf']);
            $i++;
        }

        $sheet->getStyle('B6:K7')->applyFromArray($tableHead)->getFont()->setBold(true);


        $sheet->getStyle('B6:K' . ($i + 6))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D8:D' . ($i + 6))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);


        $sheet->getStyle('B6:K' . ($i + 6))->getBorders()->getAllBorders()->applyFromArray([
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => [
                'rgb' => '000000',
            ]
        ]);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        $writer->save('php://output');
    }
}
