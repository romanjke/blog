<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Collective\Html\FormFacade;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Config datetime localization
        setlocale(LC_TIME, 'ru_RU.UTF-8');
        Carbon::setLocale(config('app.locale'));

        Schema::defaultStringLength(191);

        FormFacade::component('bsText', 'form.text', ['field', 'field_name', 'field_value' => null, 'attributes' => []]);
        FormFacade::component('bsTextArea', 'form.textarea', ['field', 'field_name', 'field_value' => null, 'attributes' => []]);
        FormFacade::component('postLink', 'form.post-link', ['route', 'method', 'text', 'attributes' => [], 'fa_icon' => false]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
