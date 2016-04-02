<?php

// Create a class called flickrAPI 

class flickrAPI {

	public function get_photos_by_search($search) {
 
		$api_key = '0182ec4e35b5532a2476688b12288470';
		// secret:  a084d202b8f1c7be
 		
		//$perPage = 25;
		$url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
		$url.= '&api_key='.$api_key;
		$url.= '&tags='.$search;
		//$url.= '&per_page='.$perPage;
		$url.= '&format=json';
		$url.= '&nojsoncallback=1';
		 
		$response = json_decode(file_get_contents($url));
		$photo_array = $response->photos->photo;
		 
		// print ("<pre>");
		// print_r($response);
		// print ("</pre>");
		

		if(!empty($response)){

			foreach($photo_array as $single_photo){
			 
				$farm_id = $single_photo->farm;
				$server_id = $single_photo->server;
				$photo_id = $single_photo->id;
				$secret_id = $single_photo->secret;
				$size = 'm'; 
				$title = $single_photo->title; 
				$photo_url = 'http://farm'.$farm_id.'.staticflickr.com/'.$server_id.'/'.$photo_id.'_'.$secret_id.'_'.$size.'.'.'jpg';
				
				$data = ["title"=>$title, "src"=>$photo_url]; 
			 
			} // closes foreach
			
		} // closes if(!empty($response))

		return $data;

	} // closes get_photos_by_search
} // closes class flickrAPI 
 
?>