<?php header ( 'Content-Type: text/xml' ); ?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<rss version="2.0">
    <channel>
        <title>Alienígenas Me Abduziram - Feed de Notícias</title>
        <link>http://aliensabductedme.com/</link>
        <description>
            Relatórios de abdução alienígena do mundo todo, cortesia de Owen e seu cachorro abduzido Fang.
        </description>
        <language>pt-br</language>

        <?php
            require_once 'connectvars.php';

            // Conecta-se ao banco de dados
            $dbc = mysqli_connect ( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
            mysqli_set_charset ( $dbc, 'utf8');

            // Recupera os dados de aparições alienígenas do MySQL
            $query = "SELECT abduction_id, first_name, last_name, DATE_FORMAT( when_it_happened, 
                        '%a, %d %b %Y %T') AS when_it_happened_rfc, alien_description, what_they_did 
                    FROM aliens_abduction ORDER BY when_it_happened DESC";
            $data = mysqli_query ( $dbc, $query );

            // Busca através do vetor dos dados de aparições alienígenas, formatando eles como RSS
            while ( $row = mysqli_fetch_assoc ( $data ) ) {
                // Exibe cada linha como um item RSS
                echo "<item>
                    <title>
                        {$row['first_name']} {$row['last_name']} - " . 
                            substr ( $row['alien_description'], 0, 32 ) . "...
                    </title>
                    <link>http://www.aliensabductedme.com/index.php?abduction_id={$row['abduction_id']}</link>
                    <pubDate>{$row['when_it_happened_rfc']} " . date ( 'T' ) . "</pubDate>
                    <description>{$row['what_they_did']}</description>
                    </item>";
            }
        ?>

    </channel>
</rss>