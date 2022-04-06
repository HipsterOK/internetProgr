<?php
  require('tfpdf/tfpdf.php');
//соединение с БД
 $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
//конец блока соединения с БД
   //if (!$mysqli->connect_errno) {
       echo "OKoK";
        $result = $mysqli->query("SELECT
                 shop.name as shop_name,
                 shop.inn as shop_inn,
                 tochk.adress,
                 tochk.prod,
                 tochk.bal,
                 tochk.direct
                 FROM tochk
                 LEFT JOIN city ON tochk.id_city=city.id
                 LEFT JOIN shop ON tochk.id_shop=shop.id"
        );

    $pdf = new tFPDF();
    $pdf->AddFont('PDFFont','','times.ttf');
    $pdf->SetFont('PDFFont','',14);
    $pdf->AddPage();

    $pdf->Cell(50);
    $pdf->Cell(80,10,'Населенные пункты',1,0,'C');
    $pdf->Ln(20);

    $pdf->SetFillColor(200,200,200);
    $pdf->SetFontSize(10);

    $header = array("п/п","Название сети","ИНН","Адрес точки продаж","Объем продаж","Торговый баланс","ФИО директора");
    $w = array(10,30,30,35,30,30,30);
    $h = 7;
    for ($c = 0; $c < 7; $c++){
        $pdf->Cell($w[$c],$h,$header[$c],'LRTB','0','',true);
    }
    $pdf->Ln();

    if ($result){
        $counter = 1;
        while ($row = $result->fetch_row()){
            $pdf->Cell($w[0],$h,$counter,'LRBT','0','C',true);
            $pdf->Cell($w[1],$h,$row[0],'LRB');

            for ($c = 2; $c < 7; $c++){
                $pdf->Cell($w[$c],$h,$row[$c-1],'RB');
            }
            $pdf->Ln();
            $counter++;
        }
    }

    $pdf->Output("I",'NP.pdf',true);