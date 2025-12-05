<?php

require_once "query.php";

/* BUSCAR DISPOSITIVOS E SETORES */
$dispositivos = [];

$sSql = "
    SELECT 
        D.DISCODIGO,
        S.SETNOME
    FROM TBDISPOSITIVO D
    INNER JOIN TBSETOR S ON S.SETCODIGO = D.SETCODIGO
    WHERE D.DISSTATUS = 'ATIVO'
    ORDER BY D.DISCODIGO
";

$result = Query::query($sSql);

if ($result) {
    while ($dispositivo = pg_fetch_assoc($result)) {
    $dispositivos[] = [
        'discodigo' => $dispositivo['discodigo'],
        'setnome' => $dispositivo['setnome']
    ];
}

}
echo json_encode($dispositivos);