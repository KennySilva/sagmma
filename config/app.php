<?php

return [

    'debug' => env('APP_DEBUG', false),

    'url' => 'http://localhost',

    'timezone' => 'UTC',

    'locale' => 'pt',

    'fallback_locale' => 'en',

    'key' => env('APP_KEY', 'SomeRandomString'),

    'cipher' => 'AES-256-CBC',

    'log' => env('APP_LOG', 'single'),

    'providers' => [

        /*
        * Laravel Framework Service Providers...
        */
        Illuminate\Foundation\Providers\ArtisanServiceProvider::class,
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Routing\ControllerServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
        * Application Service Providers...
        */

        Sagmma\Providers\AppServiceProvider::class,
        Sagmma\Providers\AuthServiceProvider::class,
        Sagmma\Providers\EventServiceProvider::class,
        Sagmma\Providers\RouteServiceProvider::class,

        Sagmma\Providers\ComposerServiceProvider::class,
        Spatie\LaravelAnalytics\LaravelAnalyticsServiceProvider::class,

        /*
        * Providers instalado e personalizados para SAGMMA...
        */

        Acacha\AdminLTETemplateLaravel\app\Providers\AdminLTETemplateServiceProvider::class,
        //dia 12/10  3:33
        Intervention\Image\ImageServiceProvider::class,
        //dia 02/11  22:16
        Laravel\Socialite\SocialiteServiceProvider::class,
        //dia 17/12/2016
        Zizaco\Entrust\EntrustServiceProvider::class,
        //dia 27/12/2016
        Collective\Html\HtmlServiceProvider::class,
        //dia 31/12/2016----- generate password_get_info
        Barryvdh\DomPDF\ServiceProvider::class,
        //dia 03/01/2017
        Maatwebsite\Excel\ExcelServiceProvider::class,
        //dia 04/01/2017
        MaddHatter\LaravelFullcalendar\ServiceProvider::class,
        //12/01/2016
        // Greggilbert\Recaptcha\RecaptchaServiceProvider::class,
        // Anhskohbo\NoCaptcha\NoCaptchaServiceProvider::class,
        //Gráficos
        ConsoleTVs\Charts\ChartsServiceProvider::class,

        Caffeinated\Flash\FlashServiceProvider::class,

        Cviebrock\EloquentSluggable\ServiceProvider::class,

        Krucas\Settings\Providers\SettingsServiceProvider::class,



    ],


    'aliases' => [

        'App'       => Illuminate\Support\Facades\App::class,
        'Artisan'   => Illuminate\Support\Facades\Artisan::class,
        'Auth'      => Illuminate\Support\Facades\Auth::class,
        'Blade'     => Illuminate\Support\Facades\Blade::class,
        'Bus'       => Illuminate\Support\Facades\Bus::class,
        'Cache'     => Illuminate\Support\Facades\Cache::class,
        'Config'    => Illuminate\Support\Facades\Config::class,
        'Cookie'    => Illuminate\Support\Facades\Cookie::class,
        'Crypt'     => Illuminate\Support\Facades\Crypt::class,
        'DB'        => Illuminate\Support\Facades\DB::class,
        'Eloquent'  => Illuminate\Database\Eloquent\Model::class,
        'Event'     => Illuminate\Support\Facades\Event::class,
        'File'      => Illuminate\Support\Facades\File::class,
        'Gate'      => Illuminate\Support\Facades\Gate::class,
        'Hash'      => Illuminate\Support\Facades\Hash::class,
        'Input'     => Illuminate\Support\Facades\Input::class,
        'Lang'      => Illuminate\Support\Facades\Lang::class,
        'Log'       => Illuminate\Support\Facades\Log::class,
        'Mail'      => Illuminate\Support\Facades\Mail::class,
        'Password'  => Illuminate\Support\Facades\Password::class,
        'Queue'     => Illuminate\Support\Facades\Queue::class,
        'Redirect'  => Illuminate\Support\Facades\Redirect::class,
        'Redis'     => Illuminate\Support\Facades\Redis::class,
        'Request'   => Illuminate\Support\Facades\Request::class,
        'Response'  => Illuminate\Support\Facades\Response::class,
        'Route'     => Illuminate\Support\Facades\Route::class,
        'Schema'    => Illuminate\Support\Facades\Schema::class,
        'Session'   => Illuminate\Support\Facades\Session::class,
        'Storage'   => Illuminate\Support\Facades\Storage::class,
        'URL'       => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View'      => Illuminate\Support\Facades\View::class,
        
        //Meus Alias
        'Analytics' => Spatie\LaravelAnalytics\LaravelAnalyticsFacade::class,
        'Image'        => Intervention\Image\Facades\Image               ::class,

        'Socialite'    => Laravel\Socialite\Facades\Socialite            ::class,

        'Entrust'      => Zizaco\Entrust\EntrustFacade                   ::class,

        'Form'         => Collective\Html\FormFacade                     ::class,
        'Html'         => Collective\Html\HtmlFacade                     ::class,

        'PDF'          => Barryvdh\DomPDF\Facade                         ::class,

        'Excel'        => Maatwebsite\Excel\Facades\Excel                ::class,

        'Calendar'     => MaddHatter\LaravelFullcalendar\Facades\Calendar::class,

        // 'Recaptcha' => Greggilbert\Recaptcha\Facades\Recaptcha        ::class,

        'Charts'       => ConsoleTVs\Charts\Facades\Charts               ::class,

        'Flash' => Caffeinated\Flash\Facades\Flash::class,

        'Settings' => Krucas\Settings\Facades\Settings::class,




        /*
        *Alias para os modelos;
        */
        'Article'        => Sagmma\Models\Web\Article          ::class,
        'Category'       => Sagmma\Models\Web\Category         ::class,
        'Icon'           => Sagmma\Models\Web\Icon             ::class,
        'Menu'           => Sagmma\Models\Web\Menu             ::class,
        'Image'          => Sagmma\Models\Web\Image            ::class,
        'Tag'            => Sagmma\Models\Web\Tag              ::class,
        'Task'           => Sagmma\Models\Web\Task             ::class,
        'Market'         => Sagmma\Models\Sagmma\Market        ::class,
        'Material'       => Sagmma\Models\Sagmma\Material      ::class,
        'Place'          => Sagmma\Models\Sagmma\Place         ::class,
        'Product'        => Sagmma\Models\Sagmma\Product       ::class,
        'Trader'         => Sagmma\Models\Sagmma\Trader        ::class,
        'User'           => Sagmma\Models\Admin\User           ::class,
        'Role'           => Sagmma\Models\Admin\Role           ::class,
        'Permission'     => Sagmma\Models\Admin\Permission     ::class,
        'Typeofemployee' => Sagmma\Models\Sagmma\Typeofemployee::class,
        'Typeoftrader'   => Sagmma\Models\Sagmma\Typeoftrader  ::class,
        'Typeofplace'    => Sagmma\Models\Sagmma\Typeofplace   ::class,
        'Employee'       => Sagmma\Models\Sagmma\Employee      ::class,
        'Control'        => Sagmma\Models\Sagmma\Control       ::class,
        'Taxation'       => Sagmma\Models\Sagmma\Taxation       ::class,
        'Contract'       => Sagmma\Models\Sagmma\Contract      ::class,
        'Promotion'      => Sagmma\Models\Sagmma\Promotion     ::class,
        'Occupation'     => Sagmma\Models\Sys\Occupation       ::class,
        'Charge'         => Sagmma\Models\Sys\Charge           ::class,
        'Calendarevent'  => Sagmma\Models\Plugins\Calendarevent::class,
        'Social'         => Sagmma\Models\Plugins\Social::class,

    ],

];
