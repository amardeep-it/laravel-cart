<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    /**
     * Show product list on HomePage.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('products-list');
    }
}
