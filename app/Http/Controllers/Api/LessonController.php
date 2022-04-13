<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Http\Resources\ModuleResource;
use App\Repositories\LessonRepository;
use Illuminate\Http\Request;

class LessonController extends Controller
{

    protected $repository;

    public function __construct(LessonRepository $lessonRepository)
    {
        $this->repository = $lessonRepository;
    }

    public function index($courseId)
    {
        $modules = $this->repository->getLessonsByModuleId($courseId);

        return ModuleResource::collection($modules);
    }

    public function show($moduleId)
    {


        return new LessonResource($this->repository->getLessonsById($moduleId));
    }
}