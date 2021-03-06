<?php
include ('Figure.php');

$object = '';
$file = file('file.txt');
//action = 1 - создание рандомной фигуры
//action != 1 - чтение данных из файла
$action = 1;
$randomNumber = 0;
$randomNumber1 = 0;
$randomNumber2 = 0;
if ($action == 1) {
    $figure[] = array();
    $figure[0] = 'circle';
    $figure[1] = 'square';
    $figure[2] = 'pyramid';
    $randomFigure = rand(0,2);
    switch ($figure[$randomFigure]) {
        case 'circle':
            $randomNumber = rand();
            $object[] = new Circle($randomNumber);
            file_put_contents('file.txt', PHP_EOL . ($figure[$randomFigure].','.$randomNumber), FILE_APPEND);
            break;
        case 'square':
            $randomNumber = rand();
            $object[] = new Square($randomNumber);
            file_put_contents('file.txt', PHP_EOL . ($figure[$randomFigure].','.$randomNumber), FILE_APPEND);
            break;
        case 'pyramid':
            $randomNumber1 = rand();
            $randomNumber2 = rand();
            $object[] = new Pyramid($randomNumber1,$randomNumber2);
            file_put_contents('file.txt', PHP_EOL . ($figure[$randomFigure].','.$randomNumber1.','.$randomNumber2), FILE_APPEND);
            break;
    }
} else {
    foreach ($file as $val){
        $who = explode(',', trim($val)); 
        switch ($who[0]){
            case 'circle':
                $object[] = new Circle($who[1]);
                break;
            case 'square':
                $object[] = new Square($who[1]);
                break;
            case 'pyramid':
                $object[] = new Pyramid($who[1], $who[2]);
                break;
        }
    }
}
if ($object) {
    $i=0;
    $array[]=new Data();
    foreach ($object as $v) {
        $array[$i]=new stdClass();
        $array[$i]->type=$v->getType();
        $array[$i]->area=$v->getArea();
        $i=$i+1;
    }
    uasort($array,"mySort");
    print_r($array);
}
// Функция сортировки по убыванию
function mySort($f1,$f2)
{
    if($f1->area < $f2->area) {
        return 1;
    } elseif($f1->area > $f2->area) {
        return -1;
    } else {
        return 0;
    }
}
?>