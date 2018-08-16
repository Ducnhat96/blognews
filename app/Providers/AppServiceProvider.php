<?php

namespace App\Providers;

use App\Repositories\Catagory\CatagoryRepositoryInterface;
use App\Repositories\Catagory\DbCatagoryRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Catagory\CatagoryRepositoryInterface',
            'App\Repositories\Catagory\DbCatagoryRepository'
        );
        $this->app->bind(
            'App\Repositories\News\NewsRepositoryInterface',
            'App\Repositories\News\DbNewsRepository'
        );
        $this->app->bind(
            'App\Repositories\Tags\TagsRepositoryInterface',
            'App\Repositories\Tags\DbTagsRepository'
        );
        $this->app->bind(
            'App\Repositories\Post_tags\PostTagsRepositoryInterface',
            'App\Repositories\Post_tags\DbPostTagsRepository'
        );

    }
}
