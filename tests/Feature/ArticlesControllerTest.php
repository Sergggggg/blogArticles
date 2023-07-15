<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Providers\RouteServiceProvider;
use App\Models\Articles;
use App\Models\User;
use Tests\TestCase;

class ArticlesControllerTest extends TestCase
{

    /**
     *  Test article can be added.
     */

    public function test_article_can_be_added()
    {
        $add = Articles::factory()->create();

        $data = $this->post('/articles', [

            'title' => $add->title,
            'article' => $add->article,
            'user_id' => $add->user_id
        ]);

        $data->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * Get article to test.
     */

    public function articles()
    {
        return Articles::first();
    }

    /**
     *  User for test.
     */

    public function user()
    {
        return User::factory()->create();
    }

    /**
     *  Test article can be display.
     */

    public function test_article_can_be_display()
    {
        $articles = $this->articles();

        $this->actingAs($this->user());

        $this->withoutExceptionHandling();

        $response = $this->call('GET', route('home'));

        $response->assertViewHas('articles')
            ->assertStatus(200);
    }

    /**
     *  Test article can be updated.
     */

    public function test_article_can_be_updated()
    {
        $articles = $this->articles();

        $update = $this->patch('/articles/'.$articles->id, [

            'id' => $articles->id,
            'title' => $articles->title,
            'article' => $articles->article,
            'user_id' => $articles->user_id
        ]);

        $update->assertRedirect(RouteServiceProvider::HOME);
    }


    /**
     *  Test article can be deleted.
     */

    public function test_article_can_be_deleted()
    {
        $articles = $this->articles();

        $response = $this->call('DELETE', '/articles/'.$articles->id, ['_token' => csrf_token()]);

        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
