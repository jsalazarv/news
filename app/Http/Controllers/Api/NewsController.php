<?php

namespace App\Http\Controllers\Api;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;

class NewsController
{
    protected $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function index(Request $request)
    {
        $news = $this->newsRepository->search($request);
       //$randomUserServices->generated($request->get('pageSize'));

        return $news;
    }
}
