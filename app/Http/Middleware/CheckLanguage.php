<?php

namespace App\Http\Middleware;

use App\language;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::exists('locale')) {
            $lan = Language::all();
            $locale = "";
            if (!is_null($lan)) {
                if (Auth::guest()) {
                    $locale = $this->get_language();
                } else {
                    $index = auth::user()->lang;
                    $locale = $lan[$index - 1]->short_name;
                }
            }
            App::setLocale($locale);
            Session::put('locale', $locale);
            return $next($request);
        }
        App::setLocale(Session::get('locale'));
        return $next($request);
    }

    private function getUserIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    private function get_language()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://ip-api.com/json/94.183.153.237",//. $this->getUserIpAddr(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                "Cache-Control: no-cache",
                "Connection: keep-alive",
                "Cookie: sessionid=omuxrmt33mnetsfirxi2sdsfh4j1c2kv",
                "Host: ip-api.com",
                "Postman-Token: 63f66647-c93c-49bd-a3e1-9f841d7f528e,bf70b1db-6657-48cd-8990-25354b5de523",
                "User-Agent: PostmanRuntime/7.15.0",
                "accept-encoding: gzip, deflate",
                "cache-control: no-cache"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        ///////////////////////////////////////////
        $status = 0;
        $r = [];
        if ($err) {
            $status = 0;
//            return "cURL Error #:" . $err;
            return 'fa';
        } else {
            $status = 1;
            $r = json_decode($response);
        }
        if (empty($r))
            return 'fa';
        /////////////////////////////
        if ($status == 1) {
            $language = language::where('country_code', $r->countryCode)->get();
            if ($language->isEmpty()) {
                return 'fa';
            } else {
                return $language[0]->short_name;
            }
        } else {
            return 'fa';
        }

    }
}
