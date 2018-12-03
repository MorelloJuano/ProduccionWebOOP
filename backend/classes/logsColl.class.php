<?php
    require_once("logs.class.php");
    class logsColl implements IteratorAggregate{
        private $logs = array(); //Logs $logs

        public function addNewLog(Logs $log){
            $this->logs[] = new Logs($log->date, $log->type);
        }
        public function getIterator(){
            return new ArrayIterator($this->logs);
        }
    }