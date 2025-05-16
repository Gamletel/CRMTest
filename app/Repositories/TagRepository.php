<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository
{
    public function store(array $data)
    {
        return Tag::create($data);
    }

    public function update(array $data, int $id)
    {
        $tag = Tag::findOrFail($id);
        return $tag->update($data);
    }

    public function destroy(int $id):bool
    {
        return (bool)Tag::destroy($id);
    }
}
