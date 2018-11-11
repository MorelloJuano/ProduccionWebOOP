<?php
    class logsColl implements IteratorAggregate{
        private $logs = array(); //Logs $logs

        public function addNewLog(Logs $log){
            $this->logs[] = $log;
        }
        public function getIterator(){
            return new ArrayIterator($this->logs);
        }
    }