<?php

  require('tfpdf/tfpdf.php');
//соединение с БД
$mysqli= new mysqli("localhost","root", "", "noskov_internet_prog");
$mysqli->set_charset("utf8");
if ($mysqli->connect_errno) {
echo "Невозможно подключиться к серверу";
}
//конец блока соединения с БД
        $result = $mysqli->query("SELECT                 				 shop.name as name,
                 shop.inn as inn,
                 tochk.adress,
                 tochk.prod,
                 tochk.bal,
                 tochk.direct
                 FROM tochk
                 LEFT JOIN city ON tochk.city=city.name
                 LEFT JOIN shop ON tochk.id_shop=shop.name"
        );

    $pdf = new tFPDF();
    $pdf->AddFont('PDFFont','','times.ttf');
    $pdf->SetFont('PDFFont','',14);
    $pdf->AddPage();
    $pdf->SetFillColor(200,200,200);

	    $pdf->Cell(50);
    $pdf->Cell(80,10,'Населенные пункты','LRTB','0','C');
    $pdf->Ln(20);

    $pdf->SetFontSize(10);

    $header = array("п/п","Название сети","ИНН","Адрес точки продаж","Объем продаж","Торговый баланс","ФИО директора");
    $w = array(10,30,30,35,30,30,30);
    $h = 7;
    for ($c = 0; $c < 7; $c++){
        $pdf->Cell($w[$c],$h,$header[$c],'LRTB','0','');
    }
    $pdf->Ln();

    if ($result){
        $counter = 1;
        while ($row = $result->fetch_row()){
            $pdf->Cell($w[0],$h,$counter,'LRBT','0','C');
            $pdf->Cell($w[1],$h,$row[0],'LRB');

            for ($c = 2; $c < 7; $c++){
                $pdf->Cell($w[$c],$h,$row[$c-1],'RB');
            }
            $pdf->Ln();
            $counter++;
        }
    }

    $pdf->Output("I",'NP.pdf',true);
?>