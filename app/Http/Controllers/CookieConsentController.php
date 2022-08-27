<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;

class CookieConsentController extends Controller
{
    /**
     * Store a cookie to remember that cookies are accepted by the user.
     * Cookie lifespan is 7 days
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Cookie::queue('cookie-consent', 1, 60 * 24 * 7 * 1);

        return redirect()->back();
    }
}
