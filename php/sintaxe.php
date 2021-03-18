<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sintaxe PHP</title>
</head>
<body>
    <?php
        $varA = "Uma variável";
        $VarA = "outra variável"; //este é um comentário de linha
        $comp = ($varA == $VarA) ? " é igual a " : " é diferente de ";
    ?>
    <p><?php echo $varA . $comp . $VarA; ?>.</p>
    <?php 
        EcHo "<p>Variáveis são case-senstive, enquanto palavras-chave,
        classes e funções não são.</p>"; 
    ?>
    <p>
        <?php
            $hora = date("H");
            if ($hora < "12") {
                echo "Bom dia!";
            } elseif ($hora < "20") {
                echo "Boa tarde!";
            } else {
                echo "Boa noite!";
            }
        ?>
    </p>
    <ul>
        <?php
            for ($x = 1; $x <= 5; $x++) {
                echo "<li>Item $x</li>";
            }
        ?>
    </ul>
    <?php
        $data = array("Luke" => 53, "Leia" => 54, "Han" => 66);
        echo "<table>";
        foreach ($data as $key => $value) {
            echo "<tr><td style='border: 1px solid black;'>$key</td>";
            echo "<td style='border: 1px solid black;'>$value</td></tr>";
        }
        echo "</table>";
    ?>
    <?php
        function fibonacci($n) {
            if ($n <= 2) {
                return 1;
            } else {
                return fibonacci($n-1) + fibonacci($n-2);
            }
        }
        echo "<p>Fibonacci: " . fibonacci(8) . "</p>";
    ?>
</body>
</html>