<?php
declare(strict_types=1);

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepository
{
    public function find(int $id): ?Model;
    public function all(): ?Collection;
    public function insert($attributes): ?Model;
    public function update(int $id, $attributes): ?bool;
    public function delete(int $id): ?bool;
}
