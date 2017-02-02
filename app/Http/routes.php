<?php

Route::get('/', function () {
    return view('_frontend.frontend');
});

Route::get('/tester', function () {
    return view('test');
});

Route::resource('controlteste', 'ApiControllers\ApiControlsController');

Route::resource('employees', 'ApiControllers\ApiEmployeesController');





//----------------Authentication---------------------------------------------------------
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
//-------------------------------------------------------------------------

//------------------------------Authentication Social----------------------
Route::get('social/{provider?}', 'SocialControllers\SocialController@getSocialAuth');
Route::get('social/callback/{provider?}', 'SocialControllers\SocialController@getSocialAuthCallback');
//----------------------------------------------------------------------------------------------------

// -----------------------------------------------------------------------------------------------
Route::group(['middleware' => ['permission:adddmin']], function() {
    Route::resource('/testrole', 'AdminController');
});

// 'middleware' => ['role:owner', 'role:writer'] forma de atribuir multiplos apermições tem di tem um tudo dos função pe tem acesso
// 'middleware' => ['role:admin|root'] orma de atribuir multiplos apermições tem di tem pelo menus um função pe tem acesso

// Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
//     Route::get('/home-test', function () {
//         return view('_backend.home');
//     });
//     // Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
// });

// Route::get('/home', ['middleware' => ['role:owener'], function () {
//     return view('_backend.home');
// }]);
// ----------------------------------------------------------------------------------------------


//Route de homo do backend
Route::group(['middleware' => ['auth', 'permission:admin|test']], function () {
    Route::resource('/home', 'BackendHomeController');
});

Entrust::routeNeedsRole('/home*', 'admin');
Route::get('/criar', ['middleware' => 'auth', function () {
    return view('_backend.users.create');
}]);


//Route de users e os seus API---------------------------------------------------------------
//-----------------------------------------API-----------------------------------------------
Route::group(['namespace' => 'ApiControllers'], function()
{
    Route::group(['prefix' => 'api/v1', 'middleware' => ['auth']], function () {
        // ----------------------------------------Api-users------------------------------------
        // Route::group(['middleware' => ['permission:admin']], function () {
        //
        // });
        //Permissoes de acesso para utilizadores (Atores Admin, Super Admin e Dpel)
        Route::group(['middleware' => ['permission:admin']], function () {
            Route::resource('users', 'ApiUsersController');
            // Route::resource('showThisUser/', 'ApiUsersController@showThisUser');
            Route::get('roleuser', 'ApiUsersController@getRoleForUser');

            Route::get('showThisUser/{id}', function ($id) {
                return 'User '.$id;
            });

            Route::post('estado_utilizador', 'ApiUsersController@estado_utilizador');
            // -------------------------------------------------------------------------
            Route::resource('roles', 'ApiRolesController');
            Route::get('permissionrole', 'ApiRolesController@getPermissionForRole');
            Route::resource('permissions', 'ApiPermissionsController');
        });
        Route::group(['middleware' => ['role:admin']], function () {
            // ----------------------------------------Api-Markets----------------------------------
            Route::resource('markets', 'ApiMarketsController');

            // ----------------------------------------Api-Typeoftraders---------------------------
            Route::resource('typeoftraders', 'ApiTypeoftradersController');

            // ----------------------------------------Api-Typeofemployees------------------------------
            Route::resource('typeofemployees', 'ApiTypeofemployeesController');

            // ----------------------------------------Api-Typeofplaces-------------------------------
            Route::resource('typeofplaces', 'ApiTypeofplacesController');

            // ----------------------------------------Api-Materials----------------------------------
            Route::resource('materials', 'ApiMaterialsController');

            // ----------------------------------------Api-Products----------------------------------
            Route::resource('products', 'ApiProductsController');

            // ----------------------------------------Api-employee----------------------------------
            Route::resource('employees', 'ApiEmployeesController');
            Route::get('employeeMarket', 'ApiEmployeesController@getMarketforEmployee');
            Route::get('employeeType', 'ApiEmployeesController@getTypeforEmployee');

            // ----------------------------------------Api-traders----------------------------------
            Route::resource('traders', 'ApiTradersController');
            Route::get('traderProduct', 'ApiTradersController@getProductforTrader');
            Route::get('traderType', 'ApiTradersController@getTypeforTrader');

            // ------------------------------------Api-Control (employee_material)--------------------
            Route::resource('controls', 'ApiControlsController');
            Route::get('controlEmployee', 'ApiControlsController@getEmployeeForControl');
            Route::get('controlMaterial', 'ApiControlsController@getMaterialForControl');
            Route::post('controlStatus', 'ApiControlsController@statusControlsChange');

            // ------------------------------------Api-Contract (place_trader)--------------------Atores Dpel e Admins
            Route::group(['middleware' => ['role:admin']], function () {
                Route::resource('contracts', 'ApiContractsController');
                Route::get('contractTrader', 'ApiContractsController@getTraderForContract');
                Route::get('contractPlace', 'ApiContractsController@getPlaceForContract');
                // Route::post('contractStatus', 'ApiControlsController@statusControlsChange');
            });

            // ------------------------------------Api-Taxation (place_trader)--------------------
            Route::resource('taxations', 'ApiTaxationsController');
            Route::get('taxationEmployee', 'ApiTaxationsController@getEmployeeForTaxation');
            Route::get('taxationPlace', 'ApiTaxationsController@getPlaceForTaxation');

        });
    });
});


//----------------------------------------Users----------------------------------------------

Route::group(['namespace' => 'Admin'], function()
{
    Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
        Route::group(['middleware' => ['role:admin']], function () { //Papel de Admin, Superadimin, Dpel
            Route::resource('users', 'UsersController');
            // ----------------------------------------------------------
            Route::resource('roles', 'RolesController');
            Route::resource('permissions', 'PermissionsController');
            Route::get('showThisUser/{id}', function ($id) {
                return 'User '.$id;
            });
        });
        // Perfil dos usuarios
        Route::get('profiles', 'UsersController@profile');
        Route::post('profiles', 'UsersController@update_profile');

    });
});

// -------------------------------------Sagmma-----------------------------------------------
Route::group(['namespace' => 'Sagmma'], function()
{
    Route::group(['prefix' => 'sagmma', 'middleware' => 'auth'], function () {
        Route::group(['middleware' => ['permission:admin']], function () {//Adicionar os restantes papeis
            // ----------------------------------------Markets----------------------------------
            Route::resource('markets', 'MarketsController');
            // ----------------------------------------Markets----------------------------------
            Route::resource('typeoftraders', 'TypeoftradersController');
            // ---------------------------------------Employee----------------------------------
            Route::resource('typeofemployees', 'TypeofemployeesController');
            // -----------------------------------------palce-----------------------------------
            Route::resource('typeofplaces', 'TypeofplacesController');
            // -----------------------------------------material-----------------------------------
            Route::resource('materials', 'MaterialsController');
            // -----------------------------------------products-----------------------------------
            Route::resource('products', 'ProductsController');
            // -----------------------------------------products-----------------------------------
            Route::resource('employees', 'EmployeesController');
            // -----------------------------------------Employees-----------------------------------
            Route::resource('traders', 'TradersController');
            // -----------------------------------------controls-----------------------------------
            Route::resource('controls', 'ControlsController');
            // -----------------------------------------taxations-----------------------------------
            Route::resource('taxations', 'TaxationsController');
            // -----------------------------------------contracts-----------------------------------
            Route::group(['middleware' => ['permission:admin']], function () {//Adicionar os restantes papeis
                Route::resource('contracts', 'ContractsController');
            });
        });
    });
});

//--------------------------------------Download and PDF-----------------------------------------
Route::group(['namespace' => 'PluginsControllers'], function()
{
    Route::group(['prefix' => 'export', 'middleware' => 'auth'], function () {
        Route::group(['middleware' => ['permission:admin']], function () {
            // -----------------------------PDF-Download---------------------------------------------
            Route::resource('/getPDF', 'PluginsControllers\PDFController@getPDF');
            //-------------------------------Impressão-----------------------------------------------
            Route::get('/testprint', 'PluginsControllers\PrintController@index');
            Route::get('/printPreview', 'PluginsControllers\PrintController@printPreview');
            // -----------------------------Exportation----------------------------------------------
            Route::get('/getImport', 'PluginsControllers\ExcelController@getImport');
            Route::post('/postImport', 'PluginsControllers\ExcelController@postImport');
        });
    });
});

//Apresentar dados do tipo de espaço para teste
Route::get('/typetest', 'Test\TypeController@index');

Route::get('/calendar', 'Test\CalendarController@index');


//------------------------------------Services Routes---------------------------------------
