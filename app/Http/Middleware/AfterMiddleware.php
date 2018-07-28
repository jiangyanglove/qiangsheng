<?php namespace App\Http\Middleware;
use Closure;
class AfterMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        return $response
            ->header('Access-Control-Allow-Origin', request()->header('origin'))
            ->header('Access-Control-Allow-Methods', 'POST, PUT, GET, DELETE')
            ->header('Access-Control-Allow-Headers', 'Accept, Content-Type')
            ->header('Access-Control-Max-Age', 24*60*60)
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header('Access-Control-Expose-Headers', 'Content-Type')
            ;
    }
}
