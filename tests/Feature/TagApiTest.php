<?php

use App\Models\Post;
use App\Models\Tag;

it('lists the tags with their published post count', function () {
    $tag = Tag::factory()->create();
    $published = Post::factory()->published()->create();
    $draft = Post::factory()->create();

    $published->tags()->attach($tag);
    $draft->tags()->attach($tag);

    $this->getJson('/api/tags')
        ->assertOk()
        ->assertJsonCount(1, 'data')
        ->assertJsonStructure([
            'data' => ['*' => ['id', 'name', 'slug', 'posts_count']],
        ])
        ->assertJsonPath('data.0.slug', $tag->slug)
        ->assertJsonPath('data.0.posts_count', 1);
});

it('filters the posts by tag slug', function () {
    $tag = Tag::factory()->create();
    $matchingPost = Post::factory()->published()->create(['title' => 'Article avec tag']);
    Post::factory()->published()->create(['title' => 'Article sans tag']);

    $matchingPost->tags()->attach($tag);

    $this->getJson('/api/posts?tag='.$tag->slug)
        ->assertOk()
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.id', $matchingPost->id);
});

it('returns a JSON 404 for an unknown tag', function () {
    $this->getJson('/api/tags/999')
        ->assertNotFound()
        ->assertJsonStructure(['message']);
});
