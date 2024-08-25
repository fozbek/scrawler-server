<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Scrawler\Scrawler;

class PlaygroundController extends Controller
{
    public function index()
    {
        return view('playground', [
            'content' => null,
            'schema' => null,
        ]);
    }

    public function play(Request $request, Scrawler  $scrawler)
    {
        $content = $request->input("content");
        $schema = json_decode($request->input("schema"), true);

        $result = $scrawler->scrape($content, $schema, true);

        return view('playground', [
            'result' => json_encode($result, JSON_PRETTY_PRINT),
            'content' => $content,
            'schema' => $request->input("schema"),
        ]);
    }
}
