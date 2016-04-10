<?php

/* OBSERVER START
abstract class Observer implements SplObserver{
    public function alert($text){
        echo $text . '<br>';
    }
}

abstract class Observable implements SplSubject
{

    private $observers;

    public function attach(SplObserver $observer)
    {
        $this->observers[spl_object_hash($observer)] = $observer;
    }

    public function detach(SplObserver $observer)
    {
        unset($this->observers[spl_object_hash($observer)]);
    }

    public function notify()
    {
        foreach($this->observers as $observer){
            $observer->update($this);
        }
    }
}


class Mailer extends Observer
{
    public function update(SplSubject $observable)
    {
        $this->alert('Sending E-mail. Order: ' . $observable->id);
    }
}

class Cache extends Observer{
    public function update(SplSubject $observable)
    {
       $this->alert('CACHE:CLEARING. new ID: ' . $observable->id);
    }
}

class Order extends Observable{
    public $id;
    public function add($id){
        $this->id = $id;
        $this->alert('New order ' . $id . ' added!');
        $this->notify();
    }

    public function alert($text){
        echo $text . '<br>';
    }
}

$mailer = new Mailer();
$cache  = new Cache();

$order = new Order();

$order->attach($cache);
$order->attach($mailer);

$order->add(12);

$order->detach($mailer);
$order->add(15);

OBSERVER KONIEC */


/*  abstract factory
interface File{

    public function structure();
}

abstract class FileFactory implements File
{
    public $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function display(){
        echo 'Jestem plikiem ' . $this->type;
    }

}

class XMLFactory extends FileFactory
{
    public function structure()
    {
        echo 'Robię znaczniki XML<br>';
    }
}

class CSVFactory extends FileFactory
{
    public function structure()
    {
        echo 'Dołączam średniki<br>';
    }
}

class Factory
{
    const TYPE_XML = 'XML';
    const TYPE_CSV = 'CSV';
    public static function getFactory($type)
    {
        switch($type){
            case self::TYPE_CSV:
                return new CSVFactory($type);
                break;
            case self::TYPE_XML:
                return new XMLFactory($type);
                break;
        }
    }
}


$CSV = Factory::getFactory('CSV');
$XML = Factory::getFactory('XML');

$CSV->structure();
$CSV->display();


$XML->structure();
$XML->display();

abstract factory koniec */

/* proxy

class Products
{
    public static function productsList()
    {
        echo 'lista produktow';
    }
}

class ProductsProxy
{
    public static function get($pass)
    {
        if($pass=='haslo'){
             Products::productsList();
        } else {
            echo 'zle haslo';
        }
    }
}


$products = ProductsProxy::get('haslo');
proxy koniec */


class Singleton
{ 
    private static $instance;
    public $name;

    private function __construct(){}

    public static function getInstance()
    {
       if(!self::$instance)
           self::$instance = new Singleton();

        return self::$instance;
    }

    public function __destruct()
    {
        echo 'Bye';
    }
}

abstract class Toy
{
    abstract function play();
}

class Car extends Toy
{
    function play(){}
}