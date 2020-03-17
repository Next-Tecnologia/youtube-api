# Youtube API Data v3

> Adaptação da api do youtube para pesquisa de vídeos

## Instalação

Você poderá usar o composer

> composer require google/apiclient:"^2.0"

## Setup
---
* Mova o diretório YoutubeAPI para alguma área do seu projeto
* Ajuste o namespace
* Crie um projeto no console Google
* Crie as credenciais no projeto
* Crie no ambiente de variáveis (.env) como DEVELOPER_KEY
* Chame o YoutubeService, crie o objeto e use

## Exemplo

> YoutubeService
```
<?php

use Google_Client;
use Google_Service_YouTube;

final class YoutubeService
{
	public function searchVideo(string $query)
	{
		$DEVELOPER_KEY = env('DEVELOPER_KEY');

		$client = new Google_Client();
		$client->setDeveloperKey($DEVELOPER_KEY);

		$youtube = new Google_Service_YouTube($client);

		$searchResponse = $youtube->search->listSearch('id,snippet', array(
			'q' => 'video',
			'maxResults' => 25,
			'relevanceLanguage' => 'pt,
		));
		foreach ($searchResponse['items'] as $searchResult) {
			$linkVideo =  $searchResult['id']['videoId'];
		}

		return $linkVideo;
	}
}
```

> Chamando classe

```
<?php

use \YoutubeAPI\YoutubeService;

public function testVideo()
	{
		$query = 'video';
		$response = (new YoutubeService)->searchVideo($query);

		return $response;
	}
```

