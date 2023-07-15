<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\UpdateRequest;
use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Auth;


class ArticlesController extends Controller
{


    protected $articleRepository;
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;

        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function create()
    {
        return view('formActicle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function store(ArticleRequest $articleRequest)
    {
        $this->articleRepository
            ->addArticleToDatabase($articleRequest->except('_token'));

        return redirect()->route('home')
            ->with('success', 'Article added successfully!');
    }

    /**
     *   Show full one article.
     *
     * @return Response
     */

    public function show(int $id)
    {
        $article = $this->articleRepository
            ->editSingleArticleDatabase($id, $this->user->id);

        return view('showArticle', compact('article'));
    }

    /**
     *   Show full one article.
     *
     * @return Response
     */

    public function edit(int $id)
    {
        $article = $this->articleRepository
            ->editSingleArticleDatabase($id, $this->user->id);

        return view('editArticle', compact('article'));
    }


    /**
     * Update the specified resource in storage.
     *
     */

    public function update(UpdateRequest $updateRequest)
    {
        $this->articleRepository->updateSingleArticleDatabase(
            $updateRequest
        );

        return redirect()->route('home')
            ->with('success', 'Article edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */

    public function destroy(Request $request)
    {
        $this->articleRepository->delete($request);

        return redirect()->route('home')
            ->with('success', 'Record was deleted successfully!');
    }
}
