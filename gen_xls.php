<?php
require_once('Classes/PHPExcel.php');$mysqli= new mysqli("localhost","root", "", "noskov_internet_prog");
$mysqli->set_charset("utf8");
if ($mysqli->connect_errno) {
echo "Невозможно подключиться к серверу";
}
//конец блока соединения с БД
   if (!$mysqli->connect_errno) {
        $result = $mysqli->query("SELECT                 shop.name as shop_name,
                 shop.inn as shop_INN,
                 tochk.adress,
                 tochk.prod,
                 tochk.bal,
                 tochk.direct
                 FROM tochk
                 LEFT JOIN city ON tochk.city=city.name
                 LEFT JOIN shop ON tochk.id_shop=shop.name"
        );
    }

    
    $xls = new PHPExcel();
    // Устанавливаем индекс активного листа
    $xls->setActiveSheetIndex(0);
    // Получаем активный лист
    $sheet = $xls->getActiveSheet();
    // Подписываем лист
    $sheet->setTitle('Населенные пункты');
    // Вставляем текст в ячейку A1
    $sheet->setCellValue("A1", 'Населенные пункты');
    $sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
    $sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');
    // Объединяем ячейки
    $sheet->mergeCells('A1:J1');
    // Выравнивание текста
    $sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $c = 0;

    $header = array("Номер","Магазин","ИНН","Город","Объем продаж","Торговый баланс","ФИО директора");
    foreach ($header as $h){
        $sheet->setCellValueByColumnAndRow($c,2,$h);
        // Применяем выравнивание
        $sheet->getColumnDimensionByColumn($c)->setAutoSize(true);
        $c++;
    }

    if ($result){
        $r = 3;
        // Для каждой строки из запроса
        while ($row = $result->fetch_row()){
            $c = 0;

            $sheet->setCellValueByColumnAndRow($c,$r,$r-2);
            $c++;

            foreach ($row as $cell){
                //if ($c==7 || $c==8){
                   // $cell = date('d-m-Y', strtotime($cell));
                //}
                $sheet->setCellValueByColumnAndRow($c,$r,$cell);
                $c++;
            }
            $r++;
        }
    }

    header('Content-Type: application/xls');
    header('Content-Disposition: inline; filename=city.xls');
    header('Cache-Control: private, max-age=0, must-revalidate');
    header('Pragma: public');

    $objWriter = new PHPExcel_Writer_Excel5($xls);
    $objWriter->save('php://output');
?>