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
```php
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

```php
<?php

use \YoutubeAPI\YoutubeService;

public function testVideo()
	{
		$query = 'video';
		$response = (new YoutubeService)->searchVideo($query);

		return $response;
	}
```

---

## Referências

[Youtube API DATA v3](https://developers.google.com/youtube/v3/docs/search/list)

[Google APIs](https://googleapis.github.io/)

[Google API Github](https://github.com/googleapis)

---

## Author

* Gabriel Modesto - gabriel.modesto@nexttecnologiadainformacao.com.br

## Colaboradores

* Felipe Renan Vieira - felipe.vieira@nexttecnologiadainformacao.com.br
* Gabriel Fonseca - gabriel.fonseca@nexttecnologiadainformacao.com.br
* André Toledo Gama - andre.gama@nexttecnologiadainformacao.com.br
