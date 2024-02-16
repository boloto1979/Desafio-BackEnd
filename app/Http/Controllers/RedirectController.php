<?php

namespace App\Http\Controllers;

use App\Models\Redirect;
use App\Models\RedirectLog;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class RedirectController extends Controller
{
    public function handleRedirect($code, Request $request)
    {
        $id = Hashids::decode($code)[0] ?? null;
        $redirect = Redirect::findOrFail($id);

        $this->logAccess($redirect, $request);

        $finalUrl = $this->buildFinalUrl($redirect->url, $request->query());

        return redirect()->to($finalUrl);
    }

    protected function logAccess($redirect, Request $request)
    {
        RedirectLog::create([
            'redirect_id' => $redirect->id,
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'referer' => $request->header('Referer'),
            'query_params' => json_encode($request->query()),
        ]);
    }

    protected function buildFinalUrl($url, $queryParams)
    {
        $originalQueryParams = [];
        if (parse_url($url, PHP_URL_QUERY)) {
            parse_str(parse_url($url, PHP_URL_QUERY), $originalQueryParams);
        }

        $finalQueryParams = array_merge($originalQueryParams, $queryParams);

        $queryString = http_build_query($finalQueryParams);

        $url = strtok($url, '?');

        $url .= '?' . $queryString;

        return $url;
    }
}
