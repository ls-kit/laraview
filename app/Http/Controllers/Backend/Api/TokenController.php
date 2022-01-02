<?php

namespace App\Http\Controllers\Backend\Api;

use App\Http\Controllers\Controller;
use App\Models\Token;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JeroenNoten\LaravelAdminLte\Components\Tool\Datatable;
use Yajra\DataTables\Facades\DataTables;

use function PHPSTORM_META\map;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tokens = Token::with('user')->paginate(5);
        return response($tokens);
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
            'token_name' => 'required'
        ]);
        $token = new Token();
        $token->token_name = $request->token_name;
        $token->user_id = Auth::user()->id;
        $token->save();
        return $token;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $token = Token::findOrFail($id);
        return response($token);
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
        $tokenUpdate = Token::find($id);
        $tokenUpdate->token_name = $request->token_name;
        $tokenUpdate->save();
        return response($tokenUpdate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $deleteToken = Token::findOrFail($id);
        $deleteToken->delete();
        return response(['status' => 200]);
    }
}
