<?php if ($success) : ?>
    <table class="youtube">
        <tr>
            <?php foreach ($videos as $video) : ?>
                <!-- Exibe os resultados para esta entrada -->
                <td width="<?= $width ?>%">
                    <a href="<?= $video['video_url'] ?>">
                        <?= $video['title'] ?><br />
                        <span><?= $video['length_formatted'] ?></span><br />
                        <img src="<?= $video['thumbnail_url'] ?>" />
                    </a>
                </td>
            <?php endforeach ?>
        </tr>
    </table>
<?php else : ?>
    <p>Sinto muito, nenhum vídeo foi encontrado.</p>
<?php endif ?>