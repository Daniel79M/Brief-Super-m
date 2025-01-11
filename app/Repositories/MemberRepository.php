<?php

namespace App\Repositories;

use App\Interfaces\MemberInterface;
use App\Models\member;

class MemberRepository implements MemberInterface
{
    /**
     * Create a new class instance.
     */

    public function index()
    {
        return member::all();
    }

    public function show($id)
    {
        return member::findOrFail($id);
    }

    public function store(array $data)
    {
        return member::create($data);
    }

    public function update(array $data, $id)
    {
        return member::findOrFail($id)->update($data);
    }

    public function delete($id)
    {
        return member::destroy($id);
    }

    // public function archive($data)
    // {
    //     return archive::create($data)
    // }
}
