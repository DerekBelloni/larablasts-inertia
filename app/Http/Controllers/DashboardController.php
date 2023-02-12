<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Redis;


class DashboardController extends Controller
{
  public function index(Request $request)
  {
    // Will need, at some point, to abstract this logic to an api controllers
    // Save authorization code to a variable
    $auth_code = request()->query('code');
    // dd($auth_code);
    // hard coding client_id/client_secret for now, adjust it grab config variables later 
    $client_id = 'eb9967db27a24b4ab39ef7bbf56a8735';
    $client_secret = '5b2578ca034640ee9af477c7bf25b985';
    $redirect_uri = 'http://127.0.0.1:8000/Dashboard';
    // initialize a guzzle client to hit spotify api
    $client = new Client([
      'base_uri' => 'https://accounts.spotify.com/',
    ]);

    $options = [
      'form_params' => [
          'grant_type' => 'authorization_code',
          'code' => $auth_code,
          'redirect_uri' => $redirect_uri,
          'client_id' => $client_id,
          'client_secret' => $client_secret
      ]
    ];

    
   try {
    $response = $client->post('api/token', $options);
   } catch (ClientException $e) {
    $response = $e->getResponse();
    $responseBodyAsString= $response->getBody()->getContents();
   }
  //  dd($responseBodyAsString);
   
   $data = json_decode($response->getBody(), true);
   dd($data);
  //  dd($data['access_token']);

   $accessToken = $data['access_token'];

   $refreshToken = $data['refresh_token'];

   Redis::set('spotify_access_token', $accessToken);
   Redis::set('spotify_refresh_token', $refreshToken);

   return redirect()->action([DashboardController::class, 'show']);
  }

  public function show(Request $request)
  {
   $refreshTokenOne = Redis::get('spotify_refresh_token');
   $accessTokenOne = Redis::get('spotify_access_token');

  //  dd($accessTokenOne);

   $client = new Client(['base_uri' => 'https://api.spotify.com/v1/']);

   $response_two = $client->request('GET', 'me', [
       'headers' => [
           'Authorization' => 'Bearer ' . $accessTokenOne
       ]
       ]);
     
   $user_data = json_decode($response_two->getBody()->getContents(), true);

   dd($user_data);
  //  return redirect()->route('profile', ['user_data' => $user_data]);
  return Inertia::render('Dashboard/Index', [
      'user_data' => $user_data
  ]);
  }

}