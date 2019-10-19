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
        <link rel="stylesheet" type="text/css" href="assets/style.css" />
    </head>
    <body>
        <h2>Alienígenas Me Abduziram</h2>
        <p>
            Bem vindo, você já teve um encontro com extraterrestres? Você já foi abduzido? Você viu o meu
            cachorro abduzido, Fang? <a href="?rota=report">Relate isso aqui!</a>
        </p>

        <?php if ( is_object ( $data ) ) : ?>
            <!-- Revela os detalhes para esta única abdução -->
            <p>
                <strong>Nome:</strong> <?= $data -> getFirstName ( ) . ' ' . $data -> getLastName ( ) ?>
                <br />
                <strong>Data:</strong> <?= date_to_br ( $data -> getWhenItHappened ( ) ) ?><br />
                <strong>Email:</strong> <?= $data -> getEmail ( ) ?><br />
                <strong>Abduzido por:</strong> <?= $data -> getHowLong ( ) ?><br />
                <strong>Número de alienígenas:</strong> <?= $data -> getHowMany ( ) ?><br />
                <strong>Descrição alienígena:</strong> <?= $data -> getAlienDescription ( ) ?><br />
                <strong>O que aconteceu:</strong> <?= $data -> getWhatTheyDid ( ) ?><br />
                <strong>Outra informação:</strong> <?= $data -> getOther ( ) ?><br />
                <strong>Viu Fang:</strong> <?= $data -> getFangSpotted ( ) ?>
            </p>
            <p><a href="index.php">&lt;&lt; Voltar à página principal</a></p>
        <?php else : ?>
            <h4>Relatório das abduções mais recentes:</h4>
            <!-- Busca através do vetor das abduções alienígenas, formatando elas em HTML -->

            <table width="100%">
                <?php foreach ( $data as $row ) : ?>
                    <!-- Exibe cada linha como uma linha da tabela -->
                    <tr class='heading'>
                        <td colspan='3'>
                            <a href='index.php?abduction_id=<?= $row -> getAbductionId ( ) ?>'>
                                <?= date_to_br ( $row -> getWhenItHappened ( ) ) . ' : ' . 
                                $row -> getFirstName ( ) . ' ' . $row -> getLastName ( ) ?>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Abduzido por:</strong><br /> <?= $row -> getHowLong ( ) ?></td>
                        <td>
                            <strong>Descrição alienígena:</strong><br />
                            <?= $row -> getAlienDescription ( ) ?>
                        </td>
                        <td><strong>Viu Fang:</strong><br /> <?= $row -> getFangSpotted ( ) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <p>
                <a href="?rota=newsfeed"><img style="vertical-align:top; border:none" 
                    src="image/rssicon.png" alt="Sindicato das abduções alienígenas"> Clique para
                    sindicalizar o feed de notícas de abduções.
                </a>
            </p>

            <h4>Vídeos de abduções mais recentes:</h4>

            <?php require_once 'views/youtube.php'; ?>

        <?php endif; ?>

    </body>
</html>