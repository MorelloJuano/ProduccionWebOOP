<?php
class Logs{
    private $date;
    private $type;

    public function __construct($date, $type){
        $this->date = $date;
        $this->type = $type;
    }
}