<?php
namespace App\Repositories;

use App\Http\Requests\LogRequest;
use App\Models\Log;
use App\Models\Services\LogService;
use App\Repositories\Interfaces\LogRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class LogRepository implements LogRepositoryInterface
{
    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return Log::all();
    }

    /**
     * @param LogRequest $log
     * @return array|null
     */
    public function add(LogRequest $log): ?array
    {
        return app(LogService::class)->add($log);
    }

}
