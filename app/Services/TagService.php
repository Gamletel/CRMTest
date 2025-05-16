<?php

namespace App\Services;

use App\Repositories\TagRepository;

class TagService
{
    public function __construct(private TagRepository $tagRepository)
    {
    }

    public function store(array $data)
    {
        return $this->tagRepository->store($data);
    }

    public function update(array $data, $id)
    {
        return $this->tagRepository->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->tagRepository->destroy($id);
    }
}
