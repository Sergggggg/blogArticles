<?php

namespace App\Repositories;

use App\Models\Articles;
use Illuminate\Http\Request;

class ArticleRepository
{

    private int $perPage = 10;

    /**
     *  Save article to database
     */

    public function addArticleToDatabase(array $request)
    {
        Articles::create($request);
    }

    /**
     *  get articles from database
     */

    public function getArticlesFromDatabase(int $id): object
    {
        return Articles::where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);
    }

    /**
     *  get single article from database
     */

    public function editSingleArticleDatabase(int $id, int $userId): object
    {
        return Articles::where('id', $id)
            ->where('user_id', $userId)
            ->first();
    }


    /**
     *  get single article from database
     */

    public function updateSingleArticleDatabase(Request $request)
    {
        $this->editSingleArticleDatabase($request->id, $request->user_id)
            ->update($request->except('_token', '_method'));
    }

    /**
     *  Delete article from database.
     */

    public function delete(object $request)
    {
        Articles::where('id', $request->id)
            ->where('user_id', $request->user_id)
            ->delete();
    }
}
