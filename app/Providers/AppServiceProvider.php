<?php

namespace App\Providers;

use App\Interfaces\EvaluationInterface;
use App\Interfaces\GroupInterface;
use App\Interfaces\GroupToStudentInterface;
use App\Interfaces\LessonInterface;
use App\Interfaces\StudentInterface;
use App\Interfaces\SubjectInterface;
use App\Interfaces\TeacherInterface;
use App\Repositories\EvaluationRepository;
use App\Repositories\GroupRepository;
use App\Repositories\GroupToStudentRepository;
use App\Repositories\LessonRepository;
use App\Repositories\StudentRepository;
use App\Repositories\SubjectRepository;
use App\Repositories\TeacherRepository;
use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(SubjectInterface::class, SubjectRepository::class);
        $this->app->singleton(StudentInterface::class, StudentRepository::class);
        $this->app->singleton(TeacherInterface::class, TeacherRepository::class);
        $this->app->singleton(GroupInterface::class, GroupRepository::class);
        $this->app->singleton(GroupToStudentInterface::class, GroupToStudentRepository::class);
        $this->app->singleton(LessonInterface::class, LessonRepository::class);
        $this->app->singleton(EvaluationInterface::class, EvaluationRepository::class);
    }
}
