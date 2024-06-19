<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogRequest;
use App\Http\Resources\LogResource;
use App\Repositories\Interfaces\LogRepositoryInterface;
use Illuminate\Http\JsonResponse;

class LogsController extends Controller
{
    private LogRepositoryInterface $logRepository;

    /**
     * @param LogRepositoryInterface $logRepository
     */
    public function __construct(LogRepositoryInterface $logRepository)
    {
        $this->logRepository = $logRepository;
    }

    /**
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        return response()->json(LogResource::collection($this->logRepository->list()));
    }

    /**
     * @param LogRequest $request
     * @return JsonResponse
     */
    public function add(LogRequest $request): JsonResponse
    {
        $response = $this->logRepository->add($request);

        return response()->json($response);
    }
}
