<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private $articleRepository;
    private $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->middleware(['auth', 'verified']);

        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });

        $this->articleRepository = $articleRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $articles = $this->articleRepository->getArticlesFromDatabase($this->user->id);

        return view('home', compact('articles'));
    }


}
