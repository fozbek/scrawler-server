<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ScrawlerController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function scrape(Request $request): Response
    {
        $this->validate($request, [
            'url' => ['required', 'string'],
            'template' => ['required', 'json']
        ]);

        $urlOrHtml = $request->input('url');
        $template = $request->input('template');

        $templateAsArray = json_decode($template, true, 512, JSON_THROW_ON_ERROR);
        $scrapingResult = $this->scrawler->scrape($urlOrHtml, $templateAsArray);

        return new Response($scrapingResult);
    }
}
