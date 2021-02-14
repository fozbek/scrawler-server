<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Scrawler\Scrawler;

class Controller extends BaseController
{
    /**
     * @var Scrawler
     */
    protected $scrawler;

    /**
     * ScrawlerController constructor.
     *
     * @param Scrawler $scrawler
     */
    public function __construct(Scrawler $scrawler)
    {
        $this->scrawler = $scrawler;
    }
}
