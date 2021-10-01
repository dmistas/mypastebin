<?php

namespace Tests\Feature;

use App\Models\Paste;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class GetPagesTest extends TestCase
{
    use WithFaker;

    public function test_redirect_from_home_page()
    {
        $response = $this->get('/');
        $response->assertStatus(Response::HTTP_FOUND);
    }

    public function test_get_pastes_page()
    {
        $response = $this->get(route('index.paste'));
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_get_paste_page()
    {
        $this->seed();
        $paste = Paste::first();
        $paste->access = Paste::ACCESS_PUBLIC;
        $paste->save();
        $response = $this->get(route('show.paste', $paste->hash));
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_add_paste()
    {
        $response = $this->post(route('store.paste'), [
            'title' => $this->faker->word,
            'content' => $this->faker->text,
            'access' => $this->faker->randomElement(Paste::ACCESSES),
            'expiration_time' => $this->faker->randomElement(Paste::EXPIRATION_TIME_ARRAY),
        ]);
        $paste = Paste::latest()->first();
        $response->assertRedirect(route('show.paste', $paste->hash));
    }
}
