<?php

namespace Sagmma\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer(['_frontend.web.articlesPresentation.index'],'Sagmma\Http\ViewComposers\AsideComposer');
    }

    public function register()
    {
        //
    }
}
