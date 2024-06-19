<?php

namespace App\Models\Services;

use App\Http\Requests\LogRequest;
use App\Models\Errors\Errors;
use App\Models\Log;
use Illuminate\Database\QueryException;

class LogService extends Service
{
    public function add(LogRequest $log): ?array
    {
        try {
            Log::create(self::prepareFields($log));
        } catch (QueryException $exception) {
            return $this->setError(Errors::error($exception->getMessage()))->response();
        }

        return $this->response();

    }

    private function prepareFields(LogRequest $log): array
    {
        return [
            'client' => $log['client'],
            'message' => $log['message'],
            'level' => $log['level'],
            'user_id' => $log['user_id'],
            'created_at' => $log['created_at']
        ];
    }
}
