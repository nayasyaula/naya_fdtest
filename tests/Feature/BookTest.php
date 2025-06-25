<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_add_book()
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/books', [
            'title' => 'Judul Buku',
            'author' => 'Penulis',
            'description' => 'Isi deskripsi',
            'rating' => 5,
            'thumbnail' => UploadedFile::fake()->image('cover.jpg'),
        ]);

        $response->assertRedirect('/books');
        $this->assertDatabaseHas('books', [
            'title' => 'Judul Buku',
            'author' => 'Penulis',
        ]);

        Storage::disk('public')->assertExists('thumbnails/' . basename(Book::first()->thumbnail));
    }
}
