<?php

// namespace

use Google_Client;
use Google_Service_YouTube;

final class YoutubeService
{	
	/**
	 * searchVideo
	 *
	 * @param  mixed $query
	 * @return array
	 */
	public function searchVideo(string $query): array
	{
		$DEVELOPER_KEY = env('DEVELOPER_KEY');

		$client = new Google_Client();
		$client->setDeveloperKey($DEVELOPER_KEY);

		$youtube = new Google_Service_YouTube($client);

		$searchResponse = $youtube->search->listSearch('id,snippet', array(
			'q' => $query, // video name
			'maxResults' => 25, // number of videos
			'relevanceLanguage' => 'pt', // your preference language
		));
		foreach ($searchResponse['items'] as $searchResult) {
			$linkVideo =  $searchResult['id']['videoId'];
		}

		return $linkVideo;
	}
}
