<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CastController extends Controller
{
      public function index()
    {
       return Inertia::render('Fronted/Casts/Index', [
           'casts' => Cast::orderBy('updated_at', 'desc')->paginate(4)
       ]);
    }

    public function show(Cast $cast )
    {
        # code...
    }
}
