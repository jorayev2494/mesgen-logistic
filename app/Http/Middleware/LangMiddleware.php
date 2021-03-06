<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class LangMiddleware
{
    /** @var string $defaultLang */
    private string $defaultLang = 'en';

    /** @var string $defaultAdminLang */
    private string $defaultAdminLang = 'ru';

    public const LANG = ['en', 'ru', 'tk'];

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        Lang::setLocale($this->getLang($request));

        return $next($request);
    }

    /**
     * @param Request $request
     * @return string
     */
    private function getLang(Request $request): string
    {
        return str_contains($request->route()->getPrefix(), 'admin')    ? $this->getAdminLang($request)
                                                                        : $this->getClientLang($request);
    }

    /**
     * @param Request $request
     * @return string
     */
    private function getAdminLang(Request $request): string
    {
        return $this->defaultAdminLang;
    }

    /**
     * @param Request $request
     * @return string
     */
    private function getClientLang(Request $request): string
    {
        return $request->headers->has('Accept-Language') && in_array($request->headers->get('Accept-Language'), self::LANG)
            ? $request->headers->get('Accept-Language')
            : $this->defaultLang;
    }
}
