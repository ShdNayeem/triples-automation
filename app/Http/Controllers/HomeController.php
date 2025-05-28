<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Slider;
use App\Models\Channel;
use App\Models\Library;
use App\Models\Landscape;
use App\Models\Threedfloor;
use Illuminate\Http\Request;
use App\Models\Chilledwatersystem;
use App\Models\Offer;

class HomeController extends Controller
{
    //

    public function video(){

        // $offers = Offer::latest()->get();

        $videos = Video::latest()->get();

        $sliders = Slider::all()->take(5);

        $channels = Channel::all()->sortBy('sort');
        // $threedfloor = Threedfloor::ordered()->get();

        // dd($threedfloor);

        // dd($channels);

        $libraries = Library::latest()->get();

        return view('pages.home', compact('videos', 'sliders', 'channels', 'libraries'));

    }

    public function threedfloor(){

        $threedfloor = Threedfloor::ordered()->get();


        return view('pages.3d-floor', compact('threedfloor'));
    }

    public function landscape(){

        $landscape = Landscape::ordered()->get();
        // dd($landscape);
        return view('pages.landscape', compact('landscape'));
    }

    public function chilledwatersystem(){

        $chilledwatersystem = Chilledwatersystem::ordered()->get();
        // dd($chilledwatersystem);
        return view('pages.chilled-water-system', compact('chilledwatersystem'));
    }

   
}
