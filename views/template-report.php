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
        <link rel="stylesheet" type="text/css" href="assets/style.css" />
    </head>
    <body>
        <h2>Alienígenas Me Abduziram - Relate uma Abdução</h2>

        <!-- Confirma o sucesso com o usuário -->
        <?php if ( $success ) : ?>
            <p>Obrigado por adicionar sua abdução.</p>
            <p><a href="index.php">&lt;&lt; Voltar à página principal</a></p>
            <?php exit ( ); ?>
        <?php endif; ?>
        <!-- Notifica o usuário de possíveis erros -->
        <?php if ( $error ) : ?>
            <p class="error">
                Por favor digite seu nome completo, data da abdução, quanto tempo você ficou
                abduzido, e uma breve descrição dos alienígenas.
            </p>
        <?php endif; ?>

        <p>Compartilhe sua história de abdução alienígena:</p>
        <form method="post" action="">
            <label for="firstname">Nome:</label>
            <input type="text" id="firstname" name="firstname" value="<?= $alien -> getFirstName ( ) ?>" required /> <br />
            <label for="lastname">Sobrenome:</label>
            <input type="text" id="lastname" name="lastname" value="<?= $alien -> getLastName ( ) ?>" required /><br />
            <label for="email">Qual o seu endereço de E-mail?</label>
            <input type="email" id="email" name="email" value="<?= $alien -> getEmail ( ) ?>" />
            <br />
            <label for="whenithappened">Quando isso aconteceu?</label>
            <input type="date" id="whenithappened" name="whenithappened" required value="<?= $alien -> getWhenItHappened ( ) ?>" />
            <br />
            <label for="howlong">Por quanto tempo você foi abduzido?</label>
            <input type="text" id="howlong" name="howlong" value="<?= $alien -> gethowLong ( ) ?>" required /><br />
            <label for="howmany">Quantos você viu?</label>
            <input type="text" id="howmany" name="howmany" value="<?= $alien -> getHowMany ( ) ?>" /><br />
            <label for="aliendescription">Descreva-os:</label>
            <input type="text" id="aliendescription" name="aliendescription" size="32" value="<?= $alien -> getAlienDescription ( ) ?>" required /><br />
            <label for="whattheydid">O que eles fizeram a você?</label>
            <input type="text" id="whattheydid" name="whattheydid" size="32" value="<?= $alien -> getWhatTheyDid ( ) ?>" /><br />
            <label for="fangspotted">Você viu meu cachorro Fang?</label>
            Sim <input id="fangspotted" name="fangspotted" type="radio" value="Sim" 
                    <?php echo ( $alien -> getFangSpotted ( ) == 'Sim' ? 'checked="checked"' : '' ); ?> />
            Não <input id="fangspotted" name="fangspotted" type="radio" value="Não"  
                    <?php echo ( $alien -> getFangSpotted ( ) == 'Não' ? 'checked="checked"' : '' ); ?> />
            <br />
            <img src="image/fang.jpg" width="100" height="175" alt="Meu cachorro Fang abduzido." /><br />
            <label for="other">Existe algo mais que você deseja adicionar?</label>
            <textarea id="other" name="other"><?= $alien -> getOther ( ) ?></textarea><br />
            <button name="submit">Relatar Abdução</button>
        </form>
    </body>
</html>