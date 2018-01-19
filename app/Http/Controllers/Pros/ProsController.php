<?php

namespace App\Http\Controllers\Pros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Rito\RitoConf;
use App\Rito\RitoUrl;

class ProsController extends Controller {
    
    public function index() {

        $api = new RitoConf();
        $apiUrl = new RitoUrl();
        $apiArray = $api->getApi();

        $sumMe = $apiArray['me'];
        $key = $apiArray['ritoApi'];
       //print_r($sumMe);

        $url = "https://euw1.api.riotgames.com/lol/summoner/v3/summoners/by-name/" . $sumMe . "?api_key=".$key;
        $response = file_get_contents($url);

        $data = json_decode($response, true);

      //  print_r($data);
        $summId = $data['accountId'];

        print_r($summId);

        $urlMatches = $apiUrl->urlSummonerMatchList();

        $urlMatches .= $summId."?api_key=".$key;
        $response2 = file_get_contents($urlMatches);

        $dataMatches = json_decode($response2, true);

       // var_dump($dataMatches['matches']);
       $matchesArray = array();

        //100 matches
        foreach($dataMatches['matches'] as $dm) {
          //  print_r($dm);
            if($dm['queue'] === 420) {
                array_push($matchesArray, $dm['gameId']);
            }
          
        }

       // var_dump($dataMatches);

        print_r($matchesArray);

        return view('pros.pros');
    }
}