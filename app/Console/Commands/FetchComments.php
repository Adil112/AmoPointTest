<?php

namespace App\Console\Commands;

use App\Models\Comment;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

#[Signature('sync:comment')]
#[Description('Fetch comments from API')]
class FetchComments extends Command
{
    public function handle()
    {
        $randomId = rand(1, 500);
        $response = Http::get("https://jsonplaceholder.typicode.com/comments/{$randomId}");

        if(!$response->ok()) {
            $this->error('API error');
            return;
        }

        $data = $response->json();

        $comment = Comment::updateOrCreate(
            ['external_id' => $data['id']],
            [
                'post_id' => $data['postId'],
                'name' => $data['name'],
                'email' => $data['email'],
                'body' => $data['body'],
            ]
        );

        $this->info('Comment synced');
    }
}
