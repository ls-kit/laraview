<?php

namespace App\Http\Controllers\Backend\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TokenCollection;
use App\Models\Review;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tokenList = Token::all();

        return new TokenCollection($tokenList);

    }
    public function reviewSearch(Request $request)
    {

        $datas = collect($request->all())->keys()->toArray();

        // $con = json_encode($datas);
        // return Review::where('tokens', $con)->get();
        $reviews = Review::all();
        $filterdData = [];

        foreach($reviews as $review){
            $tokens = json_decode($review->tokens);
            $arr1 = $tokens;
            $arr2 = $datas;
            sort($arr1);
            sort($arr2);

            if($arr1 == $arr2){
                $filterdData[] = $review;
            }
        }

        shuffle($filterdData);

        return $filterdData;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reviewList()
    {
        $reviews = Review::paginate(15);
        return $reviews;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'review_body' => ['required']
        ]);

        $review = new Review();
        $review->user_id = Auth::user()->id;
        $review->body = $request->review_body;
        $review->tokens = json_encode($request->tokens);
        $review->status = true;
        $review->save();
        return response($review);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::find($id);
        return $review->body;
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

        $request->validate([
            'review_body' => ['required']
        ]);

        $review = Review::find($id);
        $review->body = $request->review_body;
        $review->save();
        return response($review);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        $ids = explode(',', $ids);
        foreach($ids as $i){
            $review = Review::find($i);
            $review->delete();
        }
        return response(['message' => 'success']);
    }
}
