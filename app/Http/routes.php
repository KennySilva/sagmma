<?php
// #######################################################################################################################
// ####################################################  Route Presentation  ##################################################
// #######################################################################################################################
Route::group(['middleware' => []], function () {
    //-------------------------------------Página Principal------------------------------------------------------
    Route::resource('/', 'FrontController');
    Route::resource('/article', 'Web\NewsController');
    Route::resource('/promotions', 'Web\ShowPromotionsController');
    Route::resource('/informations', 'Web\InformationsController');
    Route::get('/myProfile', 'FrontController@myProfile');
    Route::get('/categories/{name}', ['uses' => 'Web\NewsController@searchCategory', 'as'   => 'front.search.category']);
    Route::get('/tags/{name}', ['uses' => 'Web\NewsController@searchTag', 'as'   => 'front.search.tag']);
    Route::get('viewArticle/{slug}', ['uses' => 'Web\NewsController@viewArticle','as'   => 'front.view.article']);
});

Route::group(['middleware' => ['auth', 'role:super-admin|admin|manager|dpel|trader', 'permission:manage-promotions']], function () {
    Route::resource('/myBusiness', 'Web\BusinessController');

});
// #######################################################################################################################
// ####################################################  Sagmma_Backend  #################################################
// #######################################################################################################################
Route::group(['middleware' => ['auth', 'role:super-admin|admin|manager|articles-manager|dpel|administrative-assistant', 'permission:backend-access']], function () {
    Route::resource('/home', 'BackendHomeController');
});
// #######################################################################################################################
// ####################################################  Authentication  #################################################
// #######################################################################################################################
Route::group(['namespace' => 'Auth'], function()
{
    Route::get('auth/login', 'AuthController@getLogin');
    Route::post('auth/login', 'AuthController@postLogin');
    Route::get('auth/logout', 'AuthController@getLogout');
    // Registration routes...
    Route::get('auth/register', 'AuthController@getRegister');
    Route::post('auth/register', 'AuthController@postRegister');
    // Password reset link request routes...
    Route::get('password/email', 'PasswordController@getEmail');
    Route::post('password/email', 'PasswordController@postEmail');
    // Password reset routes...
    Route::get('password/reset/{token}', 'PasswordController@getReset');
    Route::post('password/reset', 'PasswordController@postReset');
});
// ####################################################  Authentication Social  #################################################
Route::group(['namespace' => 'SocialControllers'], function()
{
    Route::get('social/{provider?}', 'SocialController@getSocialAuth');
    Route::get('social/callback/{provider?}', 'SocialController@getSocialAuthCallback');
});
// ###########################################################################################################################
// #####################################################  API Geral  #########################################################
// ###########################################################################################################################
Route::group(['namespace' => 'ApiControllers'], function()
{
    Route::group(['prefix' => 'api/v1', 'middleware' => ['auth', 'permission:backend-access']], function () {
        // ---------------------------------Utilizador autenticado------------------------------
        Route::get('authUser', 'ApiUsersController@authUser');
        // -------------------------------------------------------------------------------------
        // ###############################################################################################################
        // ################################################  API Sys  ####################################################
        // ###############################################################################################################
        Route::group(['middleware' => ['role:super-admin|admin|dpel', 'permission:manage-users']], function () {
            Route::resource('users', 'ApiUsersController');
            Route::get('allUsers/{row}', 'ApiUsersController@index');
            Route::get('roleuser', 'ApiUsersController@getRoleForUser');
            Route::post('estado_utilizador', 'ApiUsersController@estado_utilizador');
            // -------------------------------------------------------------------------
            Route::resource('roles', 'ApiRolesController');
            Route::get('allRoles/{row}', 'ApiRolesController@index');
            Route::get('permissionrole', 'ApiRolesController@getPermissionForRole');
            Route::resource('permissions', 'ApiPermissionsController');
            Route::get('getAllpermissions/{row}', 'ApiPermissionsController@index');
        });
        // ##################################################################################################################
        // ################################################  API Sagmma  ####################################################
        // ##################################################################################################################
        Route::group(['middleware' => ['role:admin|super-admin|dpel|manager|administrative-assistant']], function () {
            Route::group(['middleware' => ['permission:manage-resources']], function () {
                // ----------------------------------------Api-Markets----------------------------------
                Route::resource('markets', 'ApiMarketsController');
                Route::get('getAllMarkets/{row}', 'ApiMarketsController@index');
                // ----------------------------------------Api-Typeofemployees------------------------------
                Route::resource('typeofemployees', 'ApiTypeofemployeesController');
                Route::get('allTypeofemployees/{row}', 'ApiTypeofemployeesController@index');
                // ----------------------------------------Api-Typeofplaces-------------------------------
                Route::resource('typeofplaces', 'ApiTypeofplacesController');
                Route::get('allTypeofplaces/{row}', 'ApiTypeofplacesController@index');
                // ----------------------------------------Api-Materials----------------------------------
                Route::resource('materials', 'ApiMaterialsController');
                Route::get('allMaterials/{row}', 'ApiMaterialsController@index');
                // ----------------------------------------Api-employee----------------------------------
                Route::resource('employees', 'ApiEmployeesController');
                Route::resource('deleteMultEmployees', 'ApiEmployeesController@deleteAll');
                Route::get('marketEmployee', 'ApiEmployeesController@getMarketforEmployee');
                Route::get('allEmployees/{row}', 'ApiEmployeesController@index');
                Route::get('sendEmployee/{sendEmployee}', 'ApiEmployeesController@sendEmployeePerEmail');
                // Route::get('employeeMarket', 'ApiEmployeesController@getMarketforEmployee');
                Route::get('employeeType', 'ApiEmployeesController@getTypeforEmployee');
                // ----------------------------------------Api-traders----------------------------------
                Route::resource('traders', 'ApiTradersController');
                Route::get('allTraders/{row}', 'ApiTradersController@index');
            });
            // ------------------------------------Api-Control (employee_material)--------------------
            Route::resource('controls', 'ApiControlsController');
            Route::get('allControls/{row}', 'ApiControlsController@index');
            Route::get('controlEmployee', 'ApiControlsController@getEmployeeForControl');
            Route::get('controlMaterial', 'ApiControlsController@getMaterialForControl');
            Route::post('controlStatus', 'ApiControlsController@statusControlsChange');
            // ----------------------------------------Api-place----------------------------------
            Route::resource('places', 'ApiPlacesController');
            Route::get('allPlaces/{row}', 'ApiPlacesController@index');

            Route::get('placeType', 'ApiPlacesController@getTypeForPlace');
            Route::get('placeStatus', 'ApiPlacesController@placeStatusChange');
            Route::resource('taxations', 'ApiTaxationsController');
            Route::get('allTaxations/{row}/{type}', 'ApiTaxationsController@index');
            Route::get('sendTaxation/{id}/{sendTaxation}', 'ApiTaxationsController@sendTaxation');
            // -----------------------------------------------------------------------------------
            // ------------------------------------Api-Taxation (place_trader)--------------------
            Route::get('taxationEmployee', 'ApiTaxationsController@getEmployeeForTaxation');
            Route::get('taxationExtPlace', 'ApiTaxationsController@getPlaceExtForTaxation');
            Route::get('taxationIntPlace', 'ApiTaxationsController@getPlaceIntForTaxation');
            // Route::get('changePromotionStatus', 'ApiPromotionsController@updatePromotionStatus');
            // ------------------------------------Api-Contract (place_trader)--------------------Atores Dpel e Admins
            Route::group(['middleware' => ['permission:manage-contracts']], function () {
                Route::resource('contracts', 'ApiContractsController');
                Route::get('allContracts/{row}', 'ApiContractsController@index');
                // -----------------------------------------------------------------------------------------
                Route::get('contractTrader', 'ApiContractsController@getTraderForContract');
                Route::get('contractPlace', 'ApiContractsController@getPlaceForContract');
                Route::get('contractStatus', 'ApiContractsController@statusContractsChange');
            });
        });
        Route::group(['middleware' => ['role:super-admin|admin|dpel|manager|trader']], function () {
            // ----------------------------------------Api-promotions----------------------------------
            Route::resource('promotions', 'ApiPromotionsController');
            Route::get('allPromotions/{row}', 'ApiPromotionsController@index');
            Route::get('promotionTrader', 'ApiPromotionsController@getTraderForPromotion');
            Route::get('promotionProduct', 'ApiPromotionsController@getProductForPromotion');
            Route::post('promotionStatus', 'ApiPromotionsController@statusPromotionsChange');
            // ----------------------------------------Api-Products----------------------------------
            Route::resource('products', 'ApiProductsController');
            Route::get('allProducts/{row}', 'ApiProductsController@index');
            Route::post('productImageUpload', 'ApiProductsController@uploadImage');
        });
        // ###########################################################################################################
        // ##################################################  API Web  ##############################################
        // ###########################################################################################################
        Route::group(['middleware' => ['role:super-admin|admin|articles-manager', 'permission:manage-articles']], function () {
            // -----------------------------------Categories--------------------------------------
            Route::resource('categories', 'ApiCategoriesController');
            Route::get('allCategories/{row}', 'ApiCategoriesController@index');
            // --------------------------------------Tags-----------------------------------------
            Route::resource('tags', 'ApiTagsController');
            Route::get('allTags/{row}', 'ApiTagsController@index');
            // --------------------------------------Articles-----------------------------------------
            Route::resource('articles', 'ApiArticlesController');
            Route::get('allArticles/{row}', 'ApiArticlesController@index');
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
    Route::group(['prefix' => 'user', 'middleware' => ['auth', 'permission:backend-access']], function () {
        Route::group(['middleware' => ['role:super-admin|admin|dpel', 'permission:manage-users']], function () {
            Route::resource('users', 'UsersController');
            // ----------------------------------------------------------
            Route::resource('roles', 'RolesController');
            Route::resource('permissions', 'PermissionsController');
        });
        // Perfil dos Utilizador
        Route::get('profiles', 'UsersController@profile');
        Route::post('profiles', 'UsersController@update_profile');
        Route::post('editPassword', 'UsersController@updatePassword');
        Route::post('editProfile', 'UsersController@updateUserPrifile');
    });
});
// ###########################################################################################################
// ###############################################  Sagmma  ##################################################
// ###########################################################################################################
Route::group(['namespace' => 'Sagmma'], function()
{
    Route::group(['prefix' => 'sagmma', 'middleware' => 'auth',  'permission:backend-access'], function () {
        Route::group(['middleware' => ['role:admin|super-admin|dpel|manager|administrative-assistant']], function () {
            Route::group(['middleware' => ['permission:manage-resources']], function () {
                // ----------------------------------------Markets----------------------------------
                Route::resource('markets', 'MarketsController');
                // ---------------------------------------Employee----------------------------------
                Route::resource('typeofemployees', 'TypeofemployeesController');
                // -----------------------------------------palce-----------------------------------
                Route::resource('typeofplaces', 'TypeofplacesController');
                // -----------------------------------------material-----------------------------------
                Route::resource('materials', 'MaterialsController');
                // -----------------------------------------Employees-----------------------------------
                Route::resource('employees', 'EmployeesController');
                // -----------------------------------------Traders-----------------------------------
                Route::resource('traders', 'TradersController');
                // -----------------------------------------controls-----------------------------------
                // -----------------------------------------Places-----------------------------------
                Route::resource('places', 'PlacesController');
            });
            Route::resource('controls', 'ControlsController');
            // -----------------------------------------taxations-----------------------------------
            Route::resource('taxations', 'TaxationsController');
            // -----------------------------------------contracts-----------------------------------
            Route::group(['middleware' => ['permission:manage-contracts']], function () {
                Route::resource('contracts', 'ContractsController');
            });
        });
        Route::group(['middleware' => ['role:super-admin|admin|dpel|manager|trader', 'permission:manage-business|manage-resources']], function () {
            // -----------------------------------------promotions-----------------------------------
            Route::resource('promotions', 'PromotionsController');
            // -----------------------------------------products-----------------------------------
            Route::resource('products', 'ProductsController');
        });
    });
});
// #####################################################################################################################
// ######################################################  Web  ########################################################
// #####################################################################################################################
Route::group(['namespace' => 'Web'], function()
{
    Route::group(['prefix' => 'web', 'middleware' => 'auth'], function () {
        Route::group(['middleware' => ['role:super-admin|admin|articles-manager', 'permission:backend-access', 'permission:manage-articles']], function () {
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
    Route::group(['prefix' => 'export', 'middleware' => 'auth', 'permission:backend-access'], function () {
        Route::group(['middleware' => ['role:super-admin|admin|dpel|manager|administrative-assistant']], function () {
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
            //----------Impressão de Relatório por ano--------------------------------------------
            Route::get('yearRoportInformation/{year}', 'PrintController@yearReport');
            Route::get('printYearReport/{year}',['as' => 'printThisYearReport', 'uses' => 'PrintController@printThisYearReport']);
            // ------------------------------------------------------------------------------------
            Route::get('/receiptInformation/{id}', 'PrintController@receiptIndex');
            Route::get('printReceipt/{date}',['as' => 'printReceipt', 'uses' => 'PrintController@printReceipt']);
            // --------------------------------------------------------------------------------------
            Route::get('/printableEmployeeInformation', 'PrintController@indexEmployee');
            Route::get('/printEmployeePreview', 'PrintController@printEmployeePreview');
            // ---------------------------------------Excel------------------------------------------
            Route::get('/getEmployeeImport', 'ExcelController@getEmployeeImport');
            Route::post('/postEmployeeImport', 'ExcelController@postEmployeeImport');
            Route::get('/getEmployeeExport', 'ExcelController@getEmployeeExport');

        });
    });
});
// ###################################################################################################################
// #############################################  Contact teams ######################################################
// ###################################################################################################################
Route::group(['namespace' => 'ServicesControllers'], function()
{
    Route::Post('/mailSagmma',  array('as' => 'mailToSagmma', 'uses' => 'MailController@mailToSagmma'));
    Route::post('/mailDirector', array('as' => 'mailToDirector', 'uses' => 'MailController@mailToDirector'));
    Route::post('/maiManager', array('as' => 'mailToManager', 'uses' => 'MailController@mailToManager'));
    Route::post('/mailAux', array('as' => 'mailToAux', 'uses' => 'MailController@mailToAux'));
});
// ###################################################################################################################
// ###################################################  Ajax form events #############################################
// ###################################################################################################################
Route::get('showEvents{id?}','PluginsControllers\CalendareventsController@index');
Route::post('saveEvents', array('as' => 'guardaEventos','uses' => 'PluginsControllers\CalendareventsController@create'));
Route::post('updateEvents','PluginsControllers\CalendareventsController@update');
Route::post('deleteEvents','PluginsControllers\CalendareventsController@delete');
// ###################################################################################################################
// ###################################################  Google analytics #############################################
// ###################################################################################################################
Route::get('data','PluginsControllers\AnalyticsController@index');
// ###################################################################################################################
// ###################################################  Links externos #############################################
// ###################################################################################################################
Route::get('acesso_ao_recibo/{id}/{code}', 'PluginsControllers\PDFController@downloadreciboempdf');
Route::get('sagmmaEmployees/{code}', 'PluginsControllers\ExcelController@getEmployeeExport');
// ###################################################################################################################
// ###################################################  Testes ######################################################
// ###################################################################################################################


Route::get('setroles', 'ApiRolesController@superAdminPermissions');
