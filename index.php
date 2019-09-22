<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Alienígenas Me Abduziram</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Aplicação WEB desenvolvido no curso de PHP com MySQL" />
        <meta name="keywords" content="aliens php mysql abdução curso">
        <meta name="autor" content="André Moura">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <h2>Alienígenas Me Abduziram</h2>
        <p>
            Bem vindo, você já teve um encontro com extraterrestres? Você já foi abduzido? Você viu o meu
            cachorro abduzido, Fang? <a href="report.php">Relate isso aqui!</a>
        </p>

        <?php
            require_once 'connectvars.php';

            // Conecta-se ao banco de dados 
            $dbc = mysqli_connect ( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME ); 

            // Verificar se estamos visualizando um relatório único ou todos os relatórios mais recentes
            if ( isset ( $_GET['abduction_id'] ) ) {
                $query = "SELECT * FROM aliens_abduction WHERE abduction_id = '{$_GET['abduction_id']}'";
            } else {
                $query = "SELECT * FROM aliens_abduction ORDER BY when_it_happened DESC LIMIT 5";
            }
            $data = mysqli_query ( $dbc, $query );

            if ( mysqli_num_rows ( $data ) == 1) {
                // Revela os detalhes para esta única abdução
                $row = mysqli_fetch_assoc ( $data );
                echo "<p><strong>Nome: </strong> {$row['first_name']} {$row['last_name']}<br />";
                echo "<strong>Data:</strong> {$row['when_it_happened']}<br />";
                echo "<strong>Email:</strong> {$row['email']}<br />";
                echo "<strong>Abduzido por:</strong> {$row['how_long']}<br />";
                echo "<strong>Número de alienígenas:</strong> {$row['how_many']}<br />";
                echo "<strong>Descrição alienígena:</strong> {$row['alien_description']}<br />";
                echo "<strong>O que aconteceu:</strong> {$row['what_they_did']}<br />";
                echo "<strong>Outra informação:</strong> {$row['other']}<br />";
                echo "<strong>Viu Fang:</strong> {$row['fang_spotted']}</p>";
                echo '<p><a href="index.php">&lt;&lt; Voltar à página principal</a></p>';
            } else {
                echo '<h4>Relatório das abduções mais recentes:</h4>';

                // Busca através do vetor das abduções alienígenas, formatando elas em HTML
                echo '<table width="100%">';
                while ( $row = mysqli_fetch_assoc ( $data ) ) { 
                // Exibe cada linha como uma linha da tabela
                echo "<tr class='heading'>
                        <td colspan='3'>
                            <a href='index.php?abduction_id={$row['abduction_id']}'>
                                {$row['when_it_happened']} : {$row['first_name']} {$row['last_name']}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Abduzido por:</strong><br /> {$row['how_long']}</td>
                        <td><strong>Descrição alienígena:</strong><br /> {$row['alien_description']}</td>
                        <td><strong>Viu Fang:</strong><br /> {$row['fang_spotted']}</td>
                    </tr>";
                }
                echo '</table>';

                echo '<p>
                        <a href="newsfeed.php"><img style="vertical-align:top; border:none" 
                            src="image/rssicon.png" alt="Sindicato das abduções alienígenas"> Clique para
                            sindicalizar o feed de notícas de abduções.
                        </a>
                    </p>';

                echo '<h4>Vídeos de abduções mais recentes:</h4>';
                require_once 'youtube.php';
            }

            mysqli_close ( $dbc );
        ?>

    </body> 
</html>