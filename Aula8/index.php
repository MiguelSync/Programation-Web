<?php
    $SALARIO1;
    $SALARIO2;

    $SALARIO1 = 1000;
    $SALARIO2 = 2000;

    $SALARIO2 = $SALARIO1;
    $SALARIO2++;

    $SALARIO1 += $SALARIO1 * 0.10;
    echo "Valor Salário 1: $SALARIO1 Valor Salário: $SALARIO2";

    if ($SALARIO1 > $SALARIO2) {
        echo "O valor da variavel 1 é maior que o valor da variavel 2";
    } elseif ($SALARIO2 > $SALARIO1) {
        echo "O valor da variavel 2 é maior que o valor da variavel 1";
    } else {
        echo "Os valores são iguais";
    }

    $SALARIO1 = 100;
    for ($i = 0; $i < 100; $i++) {
        if ($i < 50) {
            $SALARIO1++;
        } else {
            break;
        }
    }
    if ($SALARIO1 < $SALARIO2) {
        echo "Valor depois do for: $SALARIO1";
    }

    $disciplina = array("Estrut. de Dados II"=>"Fernandius", 
                        "Engenharia de Software"=>"Juju",
                        "Sis. de Info. e Admin."=>"Maziel",
                        "Program. Web"=>"Clebinhu",
                        "Banco de Dados II"=>"Marcao");

    foreach ($disciplina as $key => $value) {
        echo "Disciplica: ". $key .", Professor: ". $value;
        echo "<br>";
    }
    

    $boletim = array(array("Disciplina" => "Matematica", "Faltas" => "5", "Média" => "7"),
                     array("Disciplina" => "Matematica", "Faltas" => "5", "Média" => "7"),
                     array("Disciplina" => "Matematica", "Faltas" => "5", "Média" => "7"),
                     array("Disciplina" => "Matematica", "Faltas" => "5", "Média" => "7"),
                     array("Disciplina" => "Matematica", "Faltas" => "5", "Média" => "7"));

                    foreach ($boletim as $disciplina) {
                    
                    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        
    </body>
    </html>