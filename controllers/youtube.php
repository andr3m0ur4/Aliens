<?php

    define('YOUTUBE_URL', 'https://www.youtube.com/feeds/videos.xml?playlist_id=FLL8mk53VPSk5tKXixJq-FTA');
    define('NUM_VIDEOS', 5);
    $success = false;

    // Ler os dados XML em um objeto
    $xml = simplexml_load_file(YOUTUBE_URL);

    $num_videos_found = count($xml->entry);

    if ($num_videos_found > 0) {
        $videos = [];
        
        for ($i = 0; $i < min($num_videos_found, NUM_VIDEOS); $i++) {
            // Obtém o título
            $entry = $xml->entry[$i];
            $media = $entry;
            $title = $media->title;
            //print($title); exit;

            // Obtém a duração em minutos e segundos, e então formata-o
            $yt = $media;
            $attrs = $yt->id->attributes();
            $length_min = floor($attrs['seconds'] / 60);
            $length_sec = $attrs['seconds'] % 60;
            $length_formatted = $length_min .(( $length_min != 1) ? ' minutes, ':' minute, ') .
            $length_sec .(( $length_sec != 1) ? ' seconds':' second');

            // Obtém o URL do vídeo
            $attrs = $media->link->attributes();
            $video_url = $attrs['href'];

            // Obtém a imagem miniatura da URL
            $media = $entry->children('http://search.yahoo.com/mrss/');
            $attrs = $media->group->thumbnail[0]->attributes();
            $thumbnail_url = $attrs['url'];

            $videos[$i] = [
                'title' => $title,
                'length_formatted' => $length_formatted,
                'video_url' => $video_url,
                'thumbnail_url' => $thumbnail_url
            ];
        }

        $width = (100 / NUM_VIDEOS);
        $success = true;
        /* echo '<pre>';
        var_dump($videos); exit; */
    }

    require_once 'views/youtube.php';
