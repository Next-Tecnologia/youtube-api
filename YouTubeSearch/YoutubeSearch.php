<?php

// namespace

use YoutubeService;

final class YoutubeSearch
{
    public function recomendarConteudo()
    {
        $query = 'videoSearch';
        return (new YoutubeService)->searchVideo($query);
    }
}
