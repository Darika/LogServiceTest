<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\LogRequest;
use Illuminate\Database\Eloquent\Collection;

interface LogRepositoryInterface
{
    /**
     * @return Collection<LogRequest>
     */
    public function list() : Collection;

    /**
     * @param LogRequest $log
     * @return array|null
     */
    public function add(LogRequest $log) : ?array;
}
