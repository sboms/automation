<?php

namespace Laravel\Fortify\Http\Responses;

use App\Providers\RouteServiceProvider;
use Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Fortify;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        // return $request->wantsJson()
        //     ? response()->json(['two_factor' => false])
        //     : redirect()->intended(Fortify::redirects('login'));

        if ($request->wantsJson()) {
            return response()->json(['two_factor' => false]);
        }
        if (Auth::user()->hasAnyRole([
            'مدير العام',
            'مدير إداري',
            'عضو مجلس إدارة',
            'رئيس دائرة الامتحانات',
            'مسؤول امتحانات',
            'رئيس مجلس علمي',
            'عضو مجلس علمي',
            'مسؤول تقني',
            'سكرتاريا',
            'مقيم',
            'Super Admin'
        ])) {
            return redirect(RouteServiceProvider::ADMIN);
        }
        return redirect()->intended(Fortify::redirects('login'));
    }
}