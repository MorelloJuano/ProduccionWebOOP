<?php
class Logs{
    public $date;
    public $type;

    public function __construct($date, $type){
        $this->date = $date;
        $this->type = $type;
    }

    public function getDate(){
        return $this->date;
    }

    public function getType(){
        return $this->type;
    }
}