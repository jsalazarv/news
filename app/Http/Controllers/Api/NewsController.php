<?php

namespace App\Http\Controllers\Api;
use App\Repositories\NewsRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class NewsController
{
    protected $newsRepository;
    protected $userRepository;

    public function __construct(NewsRepository $newsRepository, UserRepository $userRepository)
    {
        $this->newsRepository = $newsRepository;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $news = $this->newsRepository->search($request);
        $totalNews = count($news['articles']);
        $randomUsers = $this->userRepository->generate($totalNews);
        $list = [];

        foreach ($news['articles'] as $index => $item) {
            $item['author'] = $randomUsers['results'][$index];
            $list[$index] = $item;
        }

        $news['articles'] = $list;

        return $news;
    }
}
