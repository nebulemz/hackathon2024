<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function __invoke(Request $request)
    {
        if(($user = $request->user()) !== null ) {
            if($user->isJunkshopOwner() && $user->junkshop === null) {
                return redirect()
                    ->route('register.junkshop')
                    ->with('info', 'Please register a junkshop.');
            }

            if($user->isJunkshopOwner()) {
                return redirect()
                    ->route('junkshop.pages.index');
            }

            if($user->isNotJunkshopOwner()) {
                return redirect()->route('user.pages.index');
            }
        }

        return redirect()->route('login');
    }
}
