<?php

namespace App\Providers;

use App\Domain\UseCase\CreateTask;
use App\Domain\UseCase\CreateUser;
use App\Domain\UseCase\DeleteTask;
use App\Domain\UseCase\GetTask;
use App\Domain\UseCase\UpdateTask;
use App\Domain\UseCase\CompleteTask;
use App\Infra\Repositories\TaskRepositoryEloquent;
use App\Infra\Repositories\UserRepositoyEloquent;
use App\Models\TaskModel;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('App\Interfaces\CreateTaskInterface',function (){
            return new CreateTask(new TaskRepositoryEloquent(new TaskModel()) );
        });

        $this->app->bind('App\Interfaces\GetTaskInterface',function (){
            return new GetTask(new TaskRepositoryEloquent(new TaskModel()) );
        });

        $this->app->bind('App\Interfaces\DeleteTaskInterface',function (){
            return new DeleteTask(new TaskRepositoryEloquent(new TaskModel()) );
        });

        $this->app->bind('App\Interfaces\UpdateTaskInterface',function (){
            return new UpdateTask(new TaskRepositoryEloquent(new TaskModel()) );
        });

        $this->app->bind('App\Interfaces\CompleteTaskInterface',function (){
            return new CompleteTask(new TaskRepositoryEloquent(new TaskModel()) );
        });

        $this->app->bind('App\Interfaces\CreateUserInterface',function (){
            return new CreateUser(new UserRepositoyEloquent(new User()) );
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
