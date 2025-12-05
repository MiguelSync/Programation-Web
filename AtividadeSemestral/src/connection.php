<?php

class Connection {

    private $inTransaction;

    public function getInTransaction(){
        return $this->inTransaction;
    }

    public function setInTransaction($inTransaction){
        $this->inTransaction = $inTransaction;
    }

    public static function getInstance() {
        static $oConexao = null;

        if (!isset($oConexao)) {
            $oConexao = new Connection();
        }

        return $oConexao;
    }

    public static function getConnection () {
        static $conn = null;

        if (!isset($conn)) {
            $conn = "host=localhost 
                     port=5432 
                     dbname=FeedbackUnidavi 
                     user=miguel 
                     password=";

            $conn = pg_connect($conn);
        }
    return $conn;    
    }
}



