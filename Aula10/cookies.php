<?php
    setcookie("usuario", "nome_user",  time() + (60 * 5), "/");
    setcookie("dataHoraInicio", date('d-m-Y h:i:s'),  time() + (60 * 5), "/");
?>

<html>
<body>
    <?php
        if (!isset($_COOKIE["usuario"]) || !isset($_COOKIE["dataHoraInicio"])) {
            echo 'O Cookie não foi definido!';
        } else {
            echo 'Cookie "usuario" definido!<br>';
            echo "O valor é: " . $_COOKIE["usuario"];

            echo 'Cookie "dataHoraInicio" definido!<br>';
            echo "O valor é: " . $_COOKIE["dataHoraInicio"];
        }   
    ?>
</body>
</html>
