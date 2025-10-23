<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercicio 1</title>
</head>
<body>
    <h2>Verifica se é divisivel por 2</h2>
    
    <form method="post">
        Valor 1: <input type="number" name="v1" required><br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if (isset($_POST["v1"]))  {
        $v1 = $_POST["v1"];

        if ($v1 % 2 == 0) {
            echo "<p style='color:blue;'>$v1 é divisível por 2</p>";
        } else {
            echo "<p style='color:red;'>$v1 Valor não é divisível por 2</p>";
        }    

    }
    ?>
</body>
</html>
