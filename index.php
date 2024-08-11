<?php

use \PhpOffice\PhpSpreadsheet\Style\Border;

require __DIR__.'/vendor/autoload.php';
ini_set("error_log", "/var/www/html/error.log");


$xls = __DIR__.'/test.xlsx';
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($xls);
$phpWord = $reader->load($xls);

$phpWord ->getDefaultStyle()->applyFromArray(
            [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ]
            ]
        );

$xmlWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($phpWord,'Mpdf');

$xmlWriter->writeAllSheets();
//$xmlWriter->setFooter("Sdfsdf");
$num = rand(00, 99);
//create folder named files
$xmlWriter->save(__DIR__."/helloWorld-$num.pdf");

echo 1;