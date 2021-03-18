<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manipulando formulários com php</title>
</head>

<body>
    <h1>Manipulando formulários com PHP</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <fieldset> 
            <legend>Novo Usuário</legend>
            Nome: *<br />
            <input type="text" name="nome" /><br />
            E-mail: *<br />
            <input type="text" name="email"><br />
            Senha: *<br />
            <input type="password" name="senha"><br />
            Confirmar senha: *<br />
            <input type="password" name="conf_senha"><br />
            Cidade:<br />
            <select name="cidade">
                <option value="-1" selected>--Selcione</option>
                <option value="1">Florianópolis</option>
                <option value="99">Outro</option>
            </select><br />
            Idade:<br />
            <input type="text" name="idade"><br />
            comentários:<br />
            <textarea name="comentarios" cols="30" rows="4"></textarea><br />
            Sexo:<br />
            <input type="radio" name="sexo" value="m">Masculino</input>
            <input type="radio" name="sexo" value="m">Feminino</input>
            <input type="radio" name="sexo" value="m">Outro</input>
            <br />
            <input type="checkbox" name="termos"> Concordo com os termos de uso *
            <br />
            <hr />
            <input type="submit" value="Enviar">
            <input type="reset" value="Limpar">
            * Campos Obrigatórios
        </fieldset>
    </form>
    <?php 
            function preprocessa($entrada) {
                $entrada = trim($entrada);
                $entrada =  stripslashes($entrada);
                $entrada = htmlspecialchars($entrada);
                return $entrada;
            }

            $nome = "";
            $email = "";
            $senha = "";
            $conf_senha = "";
            $cidade = "";
            $idade = "";
            $comentarios = "";
            $sexo = "";
            $termos = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nome = preprocessa($_POST["nome"]);
                $email = preprocessa($_POST["email"]);
                $senha = preprocessa($_POST["senha"]);
                $conf_senha = preprocessa($_POST["conf_senha"]);
                $cidade = preprocessa($_POST["cidade"]);
                $idade = preprocessa($_POST["idade"]);
                $comentarios = preprocessa($_POST["comentarios"]);
                $sexo = preprocessa($_POST["sexo"]);
                $termos = preprocessa($_POST["termos"]);

                $erros = array();

                if(empty($nome)) {
                    array_push($erros, "Nome é campo obrigatório.");
                }
                if(empty($email)) {
                    array_push($erros, "Nome é campo obrigatório.");
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($erros, "E-mail inválido");
                }
                if(empty($senha)) {
                    array_push($erros, "Nome é campo obrigatório.");
                }
                if(empty($conf_senha)) {
                    array_push($erros, "Nome é campo obrigatório.");
                } else if ($conf_senha != $senha) {
                    array_push($erros, "Senhas não conferem.");
                }

                $idade_opt = array("options" => array("min_range" => 0));
                if (!empty($idade) && !filter_var($idade, FILTER_VALIDATE_INT, $idade_opt)) {
                    array_push($erros, "Idade deve ser um inteiro maior ou igual a 0.");
                }
                if (empty($termos)) {
                    array_push($erros, "Você precisa concordar com os termos de uso.");
                }
                if (count($erros) > 0) {
                    echo "<ul>";
                foreach ($erros as $erro) {
                    echo "<li>$erro</li>";
                }
                    echo "</ul>";
                }

                echo "<h2>Dados recebidos:</h2>";
                echo "<ul>";
                echo "<li><b>Nome:</b> $nome</li>";
                echo "<li><b>E-mail:</b> $email</li>";
                echo "<li><b>Senha:</b> $senha</li>";
                echo "<li><b>Confirmar senha:</b> $conf_senha</li>";
                echo "<li><b>Cidade:</b> $cidade</li>";
                echo "<li><b>Idade:</b> $idade</li>";
                echo "<li><b>Comentários:</b> $comentarios</li>";
                echo "<li><b>Sexo:</b> $sexo</li>";
                echo "<li><b>Termos:</b> $termos</li>";
                echo "<ul>";
            }
        ?>
</body>

</html>