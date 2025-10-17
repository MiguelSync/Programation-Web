<?php 
$connectionString = "host=localhost port=5432 dbname=postgres user=miguel password=";
$connection = pg_connect($connectionString);

$result = pg_query($connection, "SELECT * FROM TBPESSOA");

if ($result) {
    echo "<table>
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>Email</th>
          <th>Password</th>
          <th>Cidade</th>
          <th>Estado</th>
         ";

    while ($row = pg_fetch_assoc($result)) {
        echo "<tr>
                <td>".$row['pesnome']."</td>
                <td>".$row['pessobrenome']."</td>
                <td>".$row['pesemail']."</td>
                <td>".$row['pespassword']."</td>
                <td>".$row['pescidade']."</td>
                <td>".$row['pesestado']."</td>
             </tr>";
    }
    "</table>";
}
?>

<style>
    th, td {
        border: 1px solid black;
        padding: 2px;
        text-align: center;
    }
</style>