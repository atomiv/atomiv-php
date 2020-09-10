<?php
declare(strict_types=1);

namespace App\Http\Repository\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepository
{
    public function find(int $id): ?Model;
    public function all(): ?Collection;
    public function save(array $attributes): ?Model;
    public function update(int $id,array $attributes): ?bool;
    public function delete(int $id): ?bool;
}
