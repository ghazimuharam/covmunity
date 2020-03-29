<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function showSummary()
    {
        $urls = array(
                        'confirmed' => 'https://api.kawalcorona.com/positif',
                        'recovered' => 'https://api.kawalcorona.com/sembuh',
                        'deaths' => 'https://api.kawalcorona.com/meninggal'
                        );

        $data = array();
        foreach($urls as $url){
            $json = json_decode(file_get_contents($url), true);
            array_push($data, $json['value']);
        }

        return json_encode($data);
    }

    public function bingAPI()
    {
        $json = json_decode(file_get_contents('https://ghzmhrm.dev/coronaTime.php'), true);
        $date = [];
        $confirmed = [];
        foreach($json['world'] as $data){
            array_push($confirmed, $data['confirmed']);
            array_push($date, $data['date']);
        }
        return json_encode(array_merge(['confirmed' => $confirmed],['date' => $date]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
