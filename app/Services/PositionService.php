<?php

namespace App\Services;

use App\Models\Position;
use Illuminate\Support\Facades\DB;

class PositionService
{

    public function list(int $perPage = 10)
    {
        return Position::orderByDesc('id')->paginate($perPage);
    }

    public function listAll()
    {
        return Position::orderByDesc('id')->get();
    }

    /**
     * @throws \Throwable
     */
    public function create(array $data): Position
    {
        return DB::transaction(fn () => Position::create($data));
    }

    /**
     * @throws \Throwable
     */
    public function update(Position $position, array $data)
    {
        return DB::transaction(function () use ($position, $data) {
            $position->update($data);
            return $position;
        });
    }

    /**
     * @throws \Throwable
     */
    public function distroy(Position $position)
    {
        DB::transaction(function () use ($position){
            $position->delete();
        });
    }
}
