<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Alienígenas Me Abduziram - Relate uma Abdução</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Aplicação WEB desenvolvido no curso de PHP com MySQL" />
        <meta name="keywords" content="aliens php mysql abdução curso">
        <meta name="autor" content="André Moura">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <h2>Alienígenas Me Abduziram - Relate uma Abdução</h2>

        <?php
            require_once 'connectvars.php';

            $fang_spotted = '';

            if ( isset ( $_POST['submit'] ) ) {
                // Conecta-se ao banco de dados
                $dbc = mysqli_connect ( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

                // Obtém os dados do relatório do POST
                $first_name = mysqli_real_escape_string ( $dbc, trim ( $_POST['firstname'] ) );
                $last_name = mysqli_real_escape_string ( $dbc, trim ( $_POST['lastname'] ) );
                $email = mysqli_real_escape_string ( $dbc, trim ( $_POST['email'] ) );
                $when_it_happened = mysqli_real_escape_string ( $dbc, trim ( $_POST['whenithappened'] ) );
                $how_long = mysqli_real_escape_string ( $dbc, trim ( $_POST['howlong'] ) );
                $how_many = mysqli_real_escape_string ( $dbc, trim ( $_POST['howmany'] ) );
                $alien_description = mysqli_real_escape_string ( $dbc, trim ( $_POST['aliendescription'] ) );
                $what_they_did = mysqli_real_escape_string ( $dbc, trim ( $_POST['whattheydid'] ) );
                $fang_spotted = mysqli_real_escape_string ( $dbc, trim ( $_POST['fangspotted'] ?? '' ) );
                $other = mysqli_real_escape_string ( $dbc, trim ( $_POST['other'] ) );

                if ( !empty ( $first_name ) && !empty ( $last_name ) && !empty ( $when_it_happened ) && 
                    !empty ( $how_long ) && !empty ( $what_they_did ) ) {
                    // Gravar os dados no banco de dados
                    $query = "INSERT INTO aliens_abduction ( first_name, last_name, email, when_it_happened,
                                how_long, how_many, alien_description, what_they_did, fang_spotted, other ) 
                            VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$when_it_happened}',
                                '{$how_long}', '{$how_many}', '{$alien_description}', '{$what_they_did}',
                                '{$fang_spotted}', '{$other}')";
                    mysqli_query ( $dbc, $query );

                    // Confirma o sucesso com o usuário
                    echo '<p>Obrigado por adicionar sua abdução.</p>';
                    echo '<p><a href="index.php">&lt;&lt; Voltar à página principal</a></p>';

                    mysqli_close ( $dbc );
                    exit();
                } else {
                    echo '<p class="error">
                            Por favor digite seu nome completo, data da abdução, quanto tempo você ficou
                            abduzido, e uma breve descrição dos alienígenas.
                        </p>';
                }
            }
        ?>

        <p>Compartilhe sua história de abdução alienígena:</p>
        <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
            <label for="firstname">Nome:</label>
            <input type="text" id="firstname" name="firstname" value="<?php if ( !empty ( $first_name ) ) 
                echo $first_name; ?>" required /> <br />
            <label for="lastname">Sobrenome:</label>
            <input type="text" id="lastname" name="lastname" value="<?php if ( !empty ( $last_name ) ) 
                echo $last_name; ?>" required /><br />
            <label for="email">Qual o seu endereço de E-mail?</label>
            <input type="email" id="email" name="email" value="<?php if ( !empty ( $email ) ) 
                echo $email; ?>" />
            <br />
            <label for="whenithappened">Quando isso aconteceu?</label>
            <input type="text" id="whenithappened" name="whenithappened" required value="<?php 
                if ( !empty ( $when_it_happened ) ) echo $when_it_happened; ?>" placeholder="YYYY-MM-DD" />
            <br />
            <label for="howlong">Quanto tempo você ficou abduzido?</label>
            <input type="text" id="howlong" name="howlong" value="<?php if ( !empty ( $how_long ) ) 
                echo $how_long; ?>" required /><br />
            <label for="howmany">Quantos você viu?</label>
            <input type="text" id="howmany" name="howmany" value="<?php if ( !empty ( $how_many ) ) 
                echo $how_many; ?>" /><br />
            <label for="aliendescription">Descreva-os:</label>
            <input type="text" id="aliendescription" name="aliendescription" size="32" value="<?php 
                if ( !empty ( $alien_description ) ) echo $alien_description; ?>" required /><br />
            <label for="whattheydid">O que eles fizeram a você?</label>
            <input type="text" id="whattheydid" name="whattheydid" size="32" value="<?php 
                if ( !empty ( $what_they_did ) ) echo $what_they_did; ?>" /><br />
            <label for="fangspotted">Você viu meu cachorro Fang?</label>
            Sim <input id="fangspotted" name="fangspotted" type="radio" value="Sim" 
                    <?php echo ( $fang_spotted == 'Sim' ? 'checked="checked"' : '' ); ?> />
            Não <input id="fangspotted" name="fangspotted" type="radio" value="Não"  
                    <?php echo ( $fang_spotted == 'Não' ? 'checked="checked"' : '' ); ?> /><br />
            <img src="image/fang.jpg" width="100" height="175" alt="Meu cachorro Fang abduzido." /><br />
            <label for="other">Existe algo mais que você deseja adicionar?</label>
            <textarea id="other" name="other"><?php if ( !empty ( $other ) ) echo $other; ?></textarea><br />
            <button name="submit">Relatar Abdução</button>
        </form>
    </body>
</html>