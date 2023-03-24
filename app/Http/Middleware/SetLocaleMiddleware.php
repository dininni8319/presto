<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
    //         if ($selectedLanguage == false) {
        // $lang = session('Currentlocale');
        //             $acceptLang = ['de', 'es', 'it', 'en']; 
        //             $lang = in_array($lang, $acceptLang) ? $lang : 'en';
        //         }
        
        //     }
 
        $locale = session('locale', 'it');
        App::setLocale($locale);
        
        return $next($request);
    }
            /**
             * Handle an incoming request.
             *
             * @param  \Illuminate\Http\Request  $request
             * @param  \Closure  $next
             * @return mixed
             */
}