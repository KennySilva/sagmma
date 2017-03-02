<?php


// #######################################################################################################################
// ####################################################  Route Directs  ##################################################
// #######################################################################################################################
Route::get('/', function () {
    return view('_frontend.frontend');
});

Route::get('/tester', function () {
    return view('test');
});

Route::resource('controlteste', 'ApiControllers\ApiControlsController');

Route::resource('employees', 'ApiControllers\ApiEmployeesController');

// #######################################################################################################################
// ####################################################  Authentication  #################################################
// #######################################################################################################################
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

// ##############################################################################################################################
// ####################################################  Authentication Social  #################################################
// ##############################################################################################################################
Route::get('social/{provider?}', 'SocialControllers\SocialController@getSocialAuth');
Route::get('social/callback/{provider?}', 'SocialControllers\SocialController@getSocialAuthCallback');
// ##############################################################################################################################



// ###########################################################################################################################
// #####################################################  API Geral  #########################################################
// ###########################################################################################################################
Route::group(['namespace' => 'ApiControllers'], function()
{
    Route::group(['prefix' => 'api/v1', 'middleware' => ['auth']], function () {

        // ###############################################################################################################
        // ################################################  API Sys  ####################################################
        // ###############################################################################################################
        Route::group(['middleware' => ['permission:admin']], function () {
            Route::resource('users', 'ApiUsersController');
            Route::resource('authUser', 'ApiUsersController@authUser');
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
        // ##################################################################################################################
        // ################################################  API Sagmma  ####################################################
        // ##################################################################################################################
        Route::group(['middleware' => ['role:admin']], function () {
            // ----------------------------------------Api-Markets----------------------------------
            Route::resource('markets', 'ApiMarketsController');

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
            Route::get('marketEmployee', 'ApiEmployeesController@getMarketforEmployee');

            // Route::get('employeeMarket', 'ApiEmployeesController@getMarketforEmployee');
            Route::get('employeeType', 'ApiEmployeesController@getTypeforEmployee');

            // ----------------------------------------Api-traders----------------------------------
            Route::resource('traders', 'ApiTradersController');

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
            Route::get('taxationExtPlace', 'ApiTaxationsController@getPlaceExtForTaxation');
            Route::get('taxationIntPlace', 'ApiTaxationsController@getPlaceIntForTaxation');

            // ----------------------------------------Api-place----------------------------------
            Route::resource('places', 'ApiPlacesController');
            Route::get('placeType', 'ApiPlacesController@getTypeForPlace');
            Route::post('placeStatus', 'ApiPlacesController@placeStatus');

            // ----------------------------------------Api-promotions----------------------------------
            Route::resource('promotions', 'ApiPromotionsController');
            Route::get('promotionTrader', 'ApiPromotionsController@getTraderForPromotion');
            Route::get('promotionProduct', 'ApiPromotionsController@getProductForPromotion');
            Route::post('promotionStatus', 'ApiPromotionsController@statusPromotionsChange');

        });
        // ###########################################################################################################
        // ##################################################  API Web  ##############################################
        // ###########################################################################################################
        Route::group(['middleware' => ['role:admin']], function () {
            // -----------------------------------Categories--------------------------------------
            Route::resource('categories', 'ApiCategoriesController');
            // Route::get('setPaginate\{entries}', 'ApiCategoriesController@index');
            // --------------------------------------Tags-----------------------------------------
            Route::resource('tags', 'ApiTagsController');
            // --------------------------------------Articles-----------------------------------------
            Route::resource('articles', 'ApiArticlesController');
            Route::post('articleStatus', 'ApiArticlesController@articleStatus');
            Route::post('articleFeatures', 'ApiArticlesController@articleFeatures');
            Route::get('articleTag', 'ApiArticlesController@getTagforArticle');
            Route::get('articleCategory', 'ApiArticlesController@getCategoryForArticle');
            Route::get('articleUser', 'ApiArticlesController@getUserforArticle');
            Route::post('articleImageUpload', 'ApiArticlesController@uploadImage');

        });
    });
});

// ###############################################################################################################
// ###############################################  Sys  #########################################################
// ###############################################################################################################
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

// ###########################################################################################################
// ###############################################  Sagmma  ##################################################
// ###########################################################################################################
Route::group(['namespace' => 'Sagmma'], function()
{
    Route::group(['prefix' => 'sagmma', 'middleware' => 'auth'], function () {
        Route::group(['middleware' => ['permission:admin']], function () {//Adicionar os restantes papeis
            // ----------------------------------------Markets----------------------------------
            Route::resource('markets', 'MarketsController');
            // ---------------------------------------Employee----------------------------------
            Route::resource('typeofemployees', 'TypeofemployeesController');
            // -----------------------------------------palce-----------------------------------
            Route::resource('typeofplaces', 'TypeofplacesController');
            // -----------------------------------------material-----------------------------------
            Route::resource('materials', 'MaterialsController');
            // -----------------------------------------products-----------------------------------
            Route::resource('products', 'ProductsController');
            // -----------------------------------------Employees-----------------------------------
            Route::resource('employees', 'EmployeesController');
            // -----------------------------------------Traders-----------------------------------
            Route::resource('traders', 'TradersController');
            // -----------------------------------------controls-----------------------------------
            Route::resource('controls', 'ControlsController');
            // -----------------------------------------taxations-----------------------------------
            Route::resource('taxations', 'TaxationsController');
            // -----------------------------------------contracts-----------------------------------
            Route::group(['middleware' => ['permission:admin']], function () {//Adicionar os restantes papeis
                Route::resource('contracts', 'ContractsController');
            });
            // -----------------------------------------Places-----------------------------------
            Route::resource('places', 'PlacesController');

            // -----------------------------------------promotions-----------------------------------
            Route::resource('promotions', 'PromotionsController');
        });
    });
});

// #####################################################################################################################
// ######################################################  Web  ########################################################
// #####################################################################################################################
Route::group(['namespace' => 'Web'], function()
{
    Route::group(['prefix' => 'web', 'middleware' => 'auth'], function () {
        Route::group(['middleware' => ['permission:admin']], function () {//Adicionar os restantes papeis
            // ----------------------------------------Categories----------------------------------
            Route::resource('categories', 'CategoriesController');
            // -------------------------------------------Tags-------------------------------------
            Route::resource('tags', 'TagsController');
            // -------------------------------------------articles-------------------------------------
            Route::resource('articles', 'ArticlesController');
            // --------------------------------------Images-----------------------------------------
            Route::resource('images', 'ImagesController');

        });
    });
});

// #########################################################################################################################
// ######################################################  Plugins  ########################################################
// #########################################################################################################################
Route::group(['namespace' => 'PluginsControllers'], function()
{
    Route::group(['prefix' => 'export', 'middleware' => 'auth'], function () {
        Route::group(['middleware' => ['permission:admin']], function () {
            // -----------------------------PDF-Download---------------------------------------------
            Route::resource('/getPDF', 'PDFController@getPDF');
            Route::resource('/taxationsPDF', 'PDFController@TaxationsPDF');
            //-------------------------------Impressão-----------------------------------------------
            Route::get('/printableUserInformation', 'PrintController@indexUser');
            Route::get('/printUserPreview', 'PrintController@printUserPreview');
            //----------Impressão de Relatório por data--------------------------------------------
            Route::get('/dateRoportInformation/{date}', 'PrintController@dateReport');
            Route::get('printThisReport/{date}',['as' => 'printThisReport', 'uses' => 'PrintController@printThisReport']);
            // Route::get('/printThisReport/{date}', 'PrintController@printThisReport');
            // --------------------------------------------------------------------------------------
            //----------Impressão de Relatório por mês--------------------------------------------
            Route::get('monthRoportInformation/{monh}/{year}', 'PrintController@monthReport');
            Route::get('printMonthReport/{month}/{year}',['as' => 'printThisMonthReport', 'uses' => 'PrintController@printThisMonthReport']);
            //----------Impressão de Relatório por mês--------------------------------------------
            Route::get('yearRoportInformation/{year}', 'PrintController@yearReport');
            Route::get('printYearReport/{year}',['as' => 'printThisYearReport', 'uses' => 'PrintController@printThisYearReport']);

            Route::get('/receiptInformation/{id}', 'PrintController@receiptIndex');
            Route::get('printReceipt/{date}',['as' => 'printReceipt', 'uses' => 'PrintController@printReceipt']);



            // --------------------------------------------------------------------------------------
            Route::get('/printableEmployeeInformation', 'PrintController@indexEmployee');
            Route::get('/printEmployeePreview', 'PrintController@printEmployeePreview');
            // -----------------------------Exportation----------------------------------------------
            Route::get('/getImport', 'PluginsControllers\ExcelController@getImport');
            Route::post('/postImport', 'PluginsControllers\ExcelController@postImport');
        });
    });
});


Route::group(['namespace' => 'Web'], function()
{
    Route::group(['prefix' => 'front'], function () {
        //-------------------------------Impressão-----------------------------------------------
        Route::get('/traderinfo', 'FrontTraderController@index');

    });
});


//Apresentar dados do tipo de espaço para teste
Route::get('/typetest', 'Test\TypeController@index');

Route::get('/calendar', 'Test\CalendarController@index');
Route::get('/chart', 'ServicesControllers\ChartsController@TestChart');



// ###################################################################################################################
// ###################################################  Testes  ######################################################
// ###################################################################################################################
Route::group(['middleware' => ['permission:adddmin']], function() {
    Route::resource('/testrole', 'AdminController');
});

//Route de homo do backend
Route::group(['middleware' => ['auth', 'permission:admin|test']], function () {
    Route::resource('/home', 'BackendHomeController');
});

Entrust::routeNeedsRole('/home*', 'admin');
Route::get('/criar', ['middleware' => 'auth', function () {
    return view('_backend.users.create');
}]);

Route::get('/art', ['middleware' => 'auth', function () {
    return view('_frontend.web.index');
}]);

Route::get('/news', function () {
    return view('newscaroucel');
});





Route::get('testevariavel', 'ApiControllers\ApiArticlesController@test2');

// ###################################################################################################################

//------------------------------------Services Routes---------------------------------------
