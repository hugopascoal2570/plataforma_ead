<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ModuleResource;
use Illuminate\Http\Request;
use App\Repositories\ModuleRepository;

class ModuleController extends Controller
{
    protected $repository;

    public function __construct(ModuleRepository $moduleRepository)
    {
        $this->repository = $moduleRepository;
    }

    public function index($courseId)
    {
        $modules =  $this->repository->getModulesByCourseById($courseId);

        return ModuleResource::collection($modules);
    }
}
