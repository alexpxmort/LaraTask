<?php

namespace App\Providers;

use App\Domain\UseCase\CreateTask;
use App\Domain\UseCase\CreateUser;
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
        // $this->app->bind('App\Interfaces\TaskRepositoryInterface','App\Infra\Repositories\TaskRepositoryEloquent');
        // $this->app->bind('App\Interfaces\TaskRepositoryInterface',function (){
        //     return new TaskRepositoryEloquent(new TaskModel());
        // });

        $this->app->bind('App\Interfaces\CreateTaskInterface',function (){
            return new CreateTask(new TaskRepositoryEloquent(new TaskModel()) );
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
