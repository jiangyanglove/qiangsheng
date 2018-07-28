<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

//设置语言中间件 add by robert 20180729
class Language
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('lang') AND in_array($request->session()->get('lang'), Config::get('app.locales'))) {
            App::setLocale($request->session()->get('lang'));
        }
        else { // This is optional as Laravel will automatically set the fallback language if there is none specified
            App::setLocale(Config::get('app.locale'));
        }
        return $next($request);
    }
}

