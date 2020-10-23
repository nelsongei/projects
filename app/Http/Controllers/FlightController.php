<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlightController extends Controller
{
    //
    public function index(){
        $curl = curl_init();
        curl_setopt_array($curl,[
            CURLOPT_URL=>"https://rapidapi.p.rapidapi.com/GetPricesAPI/StartFlightSearch.aspx?lapinfant=0&child=0&city2=NYC&date1=2021-01-01&youth=0&flightType=1&adults=1&cabin=1&infant=0&city1=LAX&seniors=0&date2=2021-01-02&islive=true",
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_FOLLOWLOCATION=>true,
            CURLOPT_ENCODING=>" ",
            CURLOPT_MAXREDIRS=>10,
            CURLOPT_TIMEOUT=>30,
            CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST=>"GET",
            CURLOPT_HTTPHEADER=>[
                "x-rapidapi-host: compare-flight-prices.p.rapidapi.com",
                "x-rapidapi-key: 57d128832dmsh8917ee7a897a72fp13a4a2jsn12d6fd9f98b6"
            ]

        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err){
            echo "cURL eRROR".$err;
        }
        else{
            echo $response;
        }
    }
    public function getPrices(){
        $curl = curl_init();
        curl_setopt_array($curl,[
            CURLOPT_URL=>"https://rapidapi.p.rapidapi.com/GetPricesAPI/GetPrices.aspx?SearchID=ap-K3ishzWpPx8EQGua",
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_FOLLOWLOCATION=>true,
            CURLOPT_ENCODING=>" ",
            CURLOPT_MAXREDIRS=>10,
            CURLOPT_TIMEOUT=>30,
            CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST=>"GET",
            CURLOPT_HTTPHEADER=>[
                "x-rapidapi-host: compare-flight-prices.p.rapidapi.com",
                "x-rapidapi-key: 57d128832dmsh8917ee7a897a72fp13a4a2jsn12d6fd9f98b6"
            ]
        ]);
        $response = curl_exec($curl);
        $err=curl_error($curl);
        curl_close($curl);
        if ($err){
            echo "cURL eRRor".$err;
        }
        else{
            echo $response;
        }
    }
}
