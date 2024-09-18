
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    public function index()
    {
        $links = Link::all()->sortDesc();
        return view('index', compact('links'));
    }
}