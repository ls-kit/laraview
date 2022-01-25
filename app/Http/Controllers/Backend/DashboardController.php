<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Token;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.pages.dashboard.index');
    }
    public function getDashboardData()
    {
        $tokens = Token::count();
        $reviews = Review::count();
        return response([
            'reviews' => $reviews,
            'tokens' => $tokens
        ]);
    }

}
