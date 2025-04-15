<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AIController extends Controller
{
    public function index()
    {
        $videoFeedUrl = 'http://127.0.0.1:5000/video_feed'; // URL ke Flask backend
        return view('ai-detection', compact('videoFeedUrl'));
    }
}

