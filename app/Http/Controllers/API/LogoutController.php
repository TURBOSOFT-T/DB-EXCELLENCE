<?php

namespace App\Http\Controllers\API;

use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
