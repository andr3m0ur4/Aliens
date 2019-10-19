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

        <!-- Busca através do vetor dos dados de aparições alienígenas, formatando eles como RSS -->
        <?php foreach ( $data as $row ) : ?>
        	<!-- Exibe cada linha como um item RSS -->
        	<item>
                <title>
                    <?= $row -> getFirstName ( ) . ' ' . $row -> getLastName ( ) . ' - ' . 
                        substr ( $row -> getAlienDescription ( ), 0, 32 ) . '...' ?>
                </title>
                <link>
                	http://www.aliensabductedme.com/index.php?abduction_id=<?= $row -> getAbductionId ( ) ?>
                </link>
                <pubDate><?= date_to_br ( $row -> getWhenItHappened ( ) ) ?></pubDate>
                <description><?= $row -> getWhatTheyDid ( )?></description>
            </item>
        <?php endforeach; ?>
    </channel>
</rss>