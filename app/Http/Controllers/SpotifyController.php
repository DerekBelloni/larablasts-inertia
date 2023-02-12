<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use Inertia\Inertia;


class SpotifyController extends Controller
{
  
  public function index(Request $request)
  {

    $query = http_build_query([
        'client_id' => 'eb9967db27a24b4ab39ef7bbf56a8735',
        'response_type' => 'code',
        'redirect_uri' => 'http://127.0.0.1:8000/Dashboard',
        'scope' => 'user-read-private user-read-email user-read-recently-played user-library-read playlist-read-private user-top-read ',
        'show_dialog' => true
    ]);

    return redirect('https://accounts.spotify.com/authorize?' . $query);
  }

}