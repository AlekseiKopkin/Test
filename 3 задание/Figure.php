<?php
class Data
{
    public $type = "";
    public $area = 0;
}

class Figure
{
    protected $type = '';
    public function getArea()
    {
    }
    public function getType()
    {
        if ($this->type == '') {
            return 'Неопределен';
        }
        else {
            return $this->type;
        }
    }
}

//Класс квадрат
class Square extends Figure
{
    private $side;
    function __construct($a = 0)
    {
        $this->type = '';
        $a = floatval($a);
        if ($a > 0) {
            $this->type = 'Square';
            $this->side = $a;
        }
    }

    public function getArea()
    {
        if (!$this->type) {
            return 0;
        }
        return $this->side * $this->side;
    }
}

//Класс пирамида
class Pyramid extends Figure
{
private $perimeter;
private $apophem;
    function __construct($p = 0,$a = 0)
    {
        $this->type = '';
        $p = floatval($p);
        $a = floatval($a);
        if ($a > 1 and $p > 1) {
            $this->type = 'Pyramid';
            $this->perimeter = $p;
            $this->apophem = $a;
        }
    }

    public function getArea()
    {
        if (!$this->type) {
            return 0;
        }
        return (($this->perimeter * $this->apophem)/2);
    }
}

//Класс круг
class Circle extends Figure
{
    private $radius;
    function __construct($r = 0)
    {
        $this->type = '';
        $r = floatval($r);
        if ($r > 0) {
            $this->type = 'Circle';
            $this->radius = $r;
        }
    }

    public function getArea()
    {
        if (!$this->type) {
            return 0;
        }
        return M_PI * $this->radius * $this->radius;
    }
}
?>