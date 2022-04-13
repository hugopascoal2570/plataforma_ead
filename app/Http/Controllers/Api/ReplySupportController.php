<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupport;
use App\Http\Resources\ReplySupportResource;
use App\Models\ReplySupport;
use Illuminate\Http\Request;

class ReplySupportController extends Controller
{
    protected $repository;

    public function __construct(ReplySupport $supportRepository)
    {
        $this->repository = $supportRepository;
    }
    public function createReply(StoreReplySupport $request, $supportId)
    {
        $reply = $this->repository->createReplyToSupport($request->validated());

        return new ReplySupportResource($reply);
    }
}
