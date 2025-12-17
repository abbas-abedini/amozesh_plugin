<?php



// vehicle یعنی حمل ونقل
// کلاس مادر خودش نمیتواند به هیچ وجه  کاری انجام دهد مثلا حمل ونقل و ما newنمیسازیم این کلاسها رو با abstractمیخوانیم وزیر مجموعه ها باید حتما خصوصیات انها را داشته باشند
    // abstract public $movement;
    // protected فقط داخل این کلاس مادر و کلاسهای extendشده قابل فراخوانی هست 


abstract class Vehicle {
    protected $price;       
    protected $color;
    protected $brand;
    protected $passenger_num;

    abstract public function mov();

    public function mov_forward() {
        echo "Vehicle moves forward...\n";
    }

    public function mov_backward() {
        echo "Vehicle moves backward...\n";
    }
}


    // abstract  private $engin;
        // privete فقط داخل این کلاس  مادر قابل فراخوانی هست 
    // private $type_of_use;
    // متدهای abstractبدنه ندارن و مجبورن اجرا بشن 

    // فانکشن ها هم میتوانند privet و protected داشته باشند 


// extendشدن یعنی ارث بری موارد فوق از کلاس مادر 

    // price چون protected هست فقط داخل اینجا میتواند فراخوانی شود 


class Bus extends Vehicle {
    public function mov() {
        echo "Bus is moving with many passengers...\n";
    }

    public function __construct() {
        $this->color = 'yellow';
        $this->passenger_num = 45;
        $this->brand = 'benz';
        $this->price = 25000000;
    }
}




class Train extends Vehicle {
    public function mov() {
        echo "Train is moving on rails...\n";
    }

    public function __construct() {
        $this->color = ['brown','red','green'];
        $this->passenger_num = 400;
        $this->brand = ['benz','bmw','audi'];
        $this->price = 100000000;
    }
}



class Taxi extends Vehicle {
    public function mov() {
        echo "Taxi is moving with few passengers...\n";
    }

    public function __construct() {
        $this->color = 'white';
        $this->passenger_num = 4;
        $this->brand = 'peugeot';
        $this->price = 500000;
    }
}


// تست

$bus = new Bus();
$bus->mov();
$bus->mov_forward();
var_dump($bus);

$train = new Train();
$train->mov();
var_dump($train);

$taxi = new Taxi();
$taxi->mov();
var_dump($taxi);
