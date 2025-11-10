<?php

require_once 'connection.php';

class  Query {
    public static function query(string $sSql) {
        $conn = Connection::getConnection();
        return pg_query($conn, $sSql);
    }

    public static function insertQueryPrepared($tabela, array $colunas, array $valores) {
        $conn = Connection::getConnection();
        $params = [];

        foreach ($colunas as $index => $coluna) {
            $params[] = '$' . ($index + 1);
        }

        $result = pg_query_params($conn, 'INSERT INTO ' . $tabela . ' (' . implode(', ', $colunas) . ') VALUES (' . implode(', ', $params) . ')', $valores);
    
        if (!$result) {
            throw new \Exception(pg_last_error($conn));
        }
    }
    public static function insertQueryPreparedReturningColumn($tabela, array $colunas, array $valores, $colunaRetorno = '') {
        $conn = Connection::getConnection();
        $params = [];

        foreach ($colunas as $index => $coluna) {
            $params[] = '$' . ($index + 1);
        }

        $result = pg_query_params($conn, 'INSERT INTO ' . $tabela . ' (' . implode(', ', $colunas) . ') VALUES (' . implode(', ', $params) . ') RETURNING ' . $colunaRetorno, $valores);
        
        if ($result) {
            $row = pg_fetch_assoc($result);
            return $row['avacodigo'];
        } else {
            throw new \Exception(pg_last_error($conn));
        }
    }

    /** Inicia uma nova transação no banco */
    public static function begin() {
        if (!Connection::getInstance()->getInTransaction()) {
            self::query('begin');
            Connection::getInstance()->setInTransaction(true);
        }
    }

    /** Executa um commit no banco */
    public static function commit() {
        if (Connection::getInstance()->getInTransaction()) { 
            self::query('commit');
            Connection::getInstance()->setInTransaction(false);
        }
    }

    /** Executa um rollback no banco */
    public static function rollback() {
        if (Connection::getInstance()->getInTransaction()) { 
            self::query('rollback');
            Connection::getInstance()->setInTransaction(false);
        }
    }
}