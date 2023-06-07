<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'App\Http\Controllers\testController@showtest')->name('showtest');
Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@postLogin')->name('login');
        Route::post('/', 'LoginController@postLogin')->name('login');
        // Admin Password Reset
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('password/reset', 'ForgotPasswordController@sendResetLinkEmail');
        Route::post('password/verify-code', 'ForgotPasswordController@verifyCode')->name('password.verify-code');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.change-link');
        Route::post('password/reset/change', 'ResetPasswordController@reset')->name('password.change');
    });

    Route::middleware('admin')->group(function () {
        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');

        Route::get('articles', 'AdminController@articles')->name('articles.view');
        Route::get('articles/add', 'AdminController@articlesAdd')->name('articles.add');
        Route::post('articles/store', 'AdminController@articlesStore')->name('articles.Store');
        Route::get('articles/edit/{id}', 'AdminController@articlesEdit')->name('articles.edit');
        Route::post('articles/Update/{id}', 'AdminController@articlesUpdate')->name('articles.update');
        Route::get('articles/Remove/{id}', 'AdminController@articlesRemove')->name('articles.remove');

        Route::get('specialties', 'AdminController@specialties')->name('specialties.view');
        Route::get('specialties/add', 'AdminController@specialtiesAdd')->name('specialties.add');
        Route::post('specialties/store', 'AdminController@specialtiesStore')->name('specialties.Store');
        Route::get('specialties/edit/{id}', 'AdminController@specialtiesEdit')->name('specialties.edit');
        Route::post('specialties/Update/{id}', 'AdminController@specialtiesUpdate')->name('specialties.update');
        Route::get('specialties/Remove/{id}', 'AdminController@specialtiesRemove')->name('specialties.remove');

        Route::get('doctors', 'AdminController@doctors')->name('doctors.view');
        Route::get('doctors/add', 'AdminController@doctorsAdd')->name('doctors.add');
        Route::post('doctors/store', 'AdminController@doctorsStore')->name('doctors.Store');
        Route::get('doctors/edit/{id}', 'AdminController@doctorsEdit')->name('doctors.edit');
        Route::post('doctors/Update/{id}', 'AdminController@doctorsUpdate')->name('doctors.update');
        Route::get('doctors/Remove/{id}', 'AdminController@doctorsRemove')->name('doctors.remove');

        Route::get('packages', 'AdminController@packages')->name('packages.view');
        Route::get('packages/add', 'AdminController@packagesAdd')->name('packages.add');
        Route::post('packages/store', 'AdminController@packagesStore')->name('packages.Store');
        Route::get('packages/edit/{id}', 'AdminController@packagesEdit')->name('packages.edit');
        Route::post('packages/Update/{id}', 'AdminController@packagesUpdate')->name('packages.update');
        Route::get('packages/Remove/{id}', 'AdminController@packagesRemove')->name('packages.remove');

        Route::get('users', 'AdminController@users')->name('users.view');



        Route::get('profile', 'AdminController@profile')->name('profile');
        Route::post('profile', 'AdminController@profileUpdate')->name('profile.update');
        Route::get('password', 'AdminController@password')->name('password');
        Route::post('password', 'AdminController@passwordUpdate')->name('password.update');

        Route::get('notification/read/{id}','AdminController@notificationRead')->name('notification.read');
        Route::get('notifications','AdminController@notifications')->name('notifications');
        Route::get('notifications/read-all','AdminController@readAll')->name('notifications.readAll');


        //Report Bugs
        Route::get('request-report','AdminController@requestReport')->name('request.report');
        Route::post('request-report','AdminController@reportSubmit');

        Route::get('system-info','AdminController@systemInfo')->name('system.info');



        // Users Manager
//        Route::get('users', 'ManageUsersController@allUsers')->name('users.all');
        Route::get('users/active', 'ManageUsersController@activeUsers')->name('users.active');
        Route::get('users/banned', 'ManageUsersController@bannedUsers')->name('users.banned');
        Route::get('users/email-verified', 'ManageUsersController@emailVerifiedUsers')->name('users.emailVerified');
        Route::get('users/email-unverified', 'ManageUsersController@emailUnverifiedUsers')->name('users.emailUnverified');
        Route::get('users/sms-unverified', 'ManageUsersController@smsUnverifiedUsers')->name('users.smsUnverified');
        Route::get('users/sms-verified', 'ManageUsersController@smsVerifiedUsers')->name('users.smsVerified');

        Route::get('users/{scope}/search', 'ManageUsersController@search')->name('users.search');
        Route::get('user/detail/{id}', 'ManageUsersController@detail')->name('users.detail');
        Route::post('user/update/{id}', 'ManageUsersController@update')->name('users.update');
        Route::post('user/add-sub-balance/{id}', 'ManageUsersController@addSubBalance')->name('users.addSubBalance');
        Route::get('user/send-email/{id}', 'ManageUsersController@showEmailSingleForm')->name('users.email.single');
        Route::post('user/send-email/{id}', 'ManageUsersController@sendEmailSingle')->name('users.email.single');
        Route::get('user/transactions/{id}', 'ManageUsersController@transactions')->name('users.transactions');
        Route::get('user/deposits/{id}', 'ManageUsersController@deposits')->name('users.deposits');
        Route::get('user/deposits/via/{method}/{type?}/{userId}', 'ManageUsersController@depViaMethod')->name('users.deposits.method');
        // Login History
        Route::get('users/login/history/{id}', 'ManageUsersController@userLoginHistory')->name('users.login.history.single');

        Route::get('users/send-email', 'ManageUsersController@showEmailAllForm')->name('users.email.all');
        Route::post('users/send-email', 'ManageUsersController@sendEmailAll')->name('users.email.send');

        Route::get('referrals/{id}','ManageUsersController@referrals')->name('users.referrals');


        //Bids and wins
        Route::get('user/bids/{user}', 'ManageUsersController@bidsList')->name('users.bids.list');
        Route::get('user/wins/{user}', 'ManageUsersController@allWins')->name('users.wins.all');


        // Category
        Route::get('categories', 'CategoryController@index')->name('category.index');
        Route::post('categories', 'CategoryController@store')->name('category.store');
        Route::post('categories/{category}', 'CategoryController@update')->name('category.update');
        Route::post('categories/status/{category}', 'CategoryController@status')->name('category.status');

        // MainCategory
        Route::get('mainCategories', 'MainCategoryController@index')->name('mainCategories.index');
        Route::post('mainCategories', 'MainCategoryController@store')->name('mainCategories.store');
        Route::post('mainCategories/{category}', 'MainCategoryController@update')->name('mainCategories.update');
        Route::post('mainCategories/status/{category}', 'MainCategoryController@status')->name('mainCategories.status');

        // Products
        Route::get('products', 'ProductController@allProducts')->name('products.all');
        Route::get('products/search', 'ProductController@productSearch')->name('products.search');
        Route::get('products/bid/completed', 'ProductController@bidCompletedProducts')->name('products.bid.completed');
        Route::get('products/running', 'ProductController@runningProducts')->name('products.running');
        Route::get('products/upcoming', 'ProductController@upcomingProducts')->name('products.upcoming');
        Route::get('products/expired', 'ProductController@expiredProducts')->name('products.expired');
        Route::get('product/add', 'ProductController@addProduct')->name('products.add');
        Route::post('products/store', 'ProductController@storeProduct')->name('products.store');
        Route::get('products/{product}', 'ProductController@editProduct')->name('products.edit');
        Route::post('products/update/{product}', 'ProductController@updateProduct')->name('products.update');
        Route::get('products/image/remove/{product}/{image}', 'ProductController@deleteProductImage')->name('products.image.delete');
        Route::post('products/{product}/status', 'ProductController@productStatus')->name('products.status');
        Route::post('products/fetch', 'ProductController@fetchProduct')->name('products.fetch');
        Route::get('addProduct/{product}', 'ProductController@addExProduct')->name('products.addExProduct');

        //Bids
        Route::get('bids', 'WinnerController@bidsList')->name('bids.list');
        Route::get('winners', 'WinnerController@allWinners')->name('winners.all');
        Route::get('winners/pending', 'WinnerController@pendingWinners')->name('winners.pending');
        Route::get('winners/processing', 'WinnerController@processingWinners')->name('winners.processing');
        Route::get('winners/shipped', 'WinnerController@shippedWinners')->name('winners.shipped');
        Route::get('winners/{id}', 'WinnerController@statusUpdate')->name('winners.status.update');

        //Bids
        Route::get('winnersTransaction', 'TransactionWinnerController@allWinners')->name('transaction.winners');
//        Route::get('winnerProductsTransaction/{id}', 'TransactionWinnerController@pindingProducts')->name('transaction.winner.products');
        Route::get('ProductsTransaction/{id}', 'TransactionWinnerController@pindingProducts')->name('transaction.winner.products');
        Route::get('storeProductsTransaction/{id}', 'TransactionWinnerController@storeTransaction')->name('store.transaction.products');


        // pallet
        Route::get('pallet/allPallet', 'SchedulingController@allPallet')->name('pallet.allPallet');
        Route::get('pallet/AllScheduling/{palletID}', 'SchedulingController@allScheduling')->name('pallet.allScheduling');
        Route::get('pallet/AddScheduling/{id}', 'SchedulingController@addSchedule')->name('pallet.Scheduling.add');
        Route::post('pallet/storeSchedule', 'SchedulingController@storeSchedule')->name('pallet.Scheduling.store');
        Route::get('pallet/Products/add/{id}', 'SchedulingController@addSchedulingProducts')->name('pallet.products.Scheduling.add');
        Route::get('pallet/Products/view/{id}', 'SchedulingController@viewSchedulingProducts')->name('pallet.products.Scheduling.view');
        Route::get('pallet/Product/viewLabel/{id}', 'SchedulingController@viewProductLabel')->name('pallet.product.label.view');
        Route::post('pallet/Products/add', 'SchedulingController@storeSchedulingProducts')->name('pallet.products.Scheduling.add.dally');

//        Route::get('pallet/login/history', 'ReportController@loginHistory')->name('report.login.history');
//        Route::get('pallet/login/ipHistory/{ip}', 'ReportController@loginIpHistory')->name('report.login.ipHistory');


        // Deposit Gateway
        Route::name('gateway.')->prefix('gateway')->group(function(){
            // Automatic Gateway
            Route::get('automatic', 'GatewayController@index')->name('automatic.index');
            Route::get('automatic/edit/{alias}', 'GatewayController@edit')->name('automatic.edit');
            Route::post('automatic/update/{code}', 'GatewayController@update')->name('automatic.update');
            Route::post('automatic/remove/{code}', 'GatewayController@remove')->name('automatic.remove');
            Route::post('automatic/activate', 'GatewayController@activate')->name('automatic.activate');
            Route::post('automatic/deactivate', 'GatewayController@deactivate')->name('automatic.deactivate');



            // Manual Methods
            Route::get('manual', 'ManualGatewayController@index')->name('manual.index');
            Route::get('manual/new', 'ManualGatewayController@create')->name('manual.create');
            Route::post('manual/new', 'ManualGatewayController@store')->name('manual.store');
            Route::get('manual/edit/{alias}', 'ManualGatewayController@edit')->name('manual.edit');
            Route::post('manual/update/{id}', 'ManualGatewayController@update')->name('manual.update');
            Route::post('manual/activate', 'ManualGatewayController@activate')->name('manual.activate');
            Route::post('manual/deactivate', 'ManualGatewayController@deactivate')->name('manual.deactivate');
        });


        // DEPOSIT SYSTEM
        Route::name('deposit.')->prefix('deposit')->group(function(){
            Route::get('/', 'DepositController@deposit')->name('list');
            Route::get('pending', 'DepositController@pending')->name('pending');
            Route::get('rejected', 'DepositController@rejected')->name('rejected');
            Route::get('approved', 'DepositController@approved')->name('approved');
            Route::get('successful', 'DepositController@successful')->name('successful');
            Route::get('details/{id}', 'DepositController@details')->name('details');

            Route::post('reject', 'DepositController@reject')->name('reject');
            Route::post('approve', 'DepositController@approve')->name('approve');
            Route::get('via/{method}/{type?}', 'DepositController@depViaMethod')->name('method');
            Route::get('/{scope}/search', 'DepositController@search')->name('search');
            Route::get('date-search/{scope}', 'DepositController@dateSearch')->name('dateSearch');

        });

        // Report
        Route::get('report/transaction', 'ReportController@transaction')->name('report.transaction');
        Route::get('report/transaction/search', 'ReportController@transactionSearch')->name('report.transaction.search');
        Route::get('report/login/history', 'ReportController@loginHistory')->name('report.login.history');
        Route::get('report/login/ipHistory/{ip}', 'ReportController@loginIpHistory')->name('report.login.ipHistory');


        // Admin Support
        Route::get('tickets', 'SupportTicketController@tickets')->name('ticket');
        Route::get('tickets/pending', 'SupportTicketController@pendingTicket')->name('ticket.pending');
        Route::get('tickets/closed', 'SupportTicketController@closedTicket')->name('ticket.closed');
        Route::get('tickets/answered', 'SupportTicketController@answeredTicket')->name('ticket.answered');
        Route::get('tickets/view/{id}', 'SupportTicketController@ticketReply')->name('ticket.view');
        Route::post('ticket/reply/{id}', 'SupportTicketController@ticketReplySend')->name('ticket.reply');
        Route::get('ticket/download/{ticket}', 'SupportTicketController@ticketDownload')->name('ticket.download');
        Route::post('ticket/delete', 'SupportTicketController@ticketDelete')->name('ticket.delete');


        // Language Manager
        Route::get('/language', 'LanguageController@langManage')->name('language.manage');
        Route::post('/language', 'LanguageController@langStore')->name('language.manage.store');
        Route::post('/language/delete/{id}', 'LanguageController@langDel')->name('language.manage.del');
        Route::post('/language/update/{id}', 'LanguageController@langUpdatepp')->name('language.manage.update');
        Route::get('/language/edit/{id}', 'LanguageController@langEdit')->name('language.key');
        Route::post('/language/import', 'LanguageController@langImport')->name('language.import_lang');



        Route::post('language/store/key/{id}', 'LanguageController@storeLanguageJson')->name('language.store.key');
        Route::post('language/delete/key/{id}', 'LanguageController@deleteLanguageJson')->name('language.delete.key');
        Route::post('language/update/key/{id}', 'LanguageController@updateLanguageJson')->name('language.update.key');



        // General Setting
        Route::get('general-setting', 'GeneralSettingController@index')->name('setting.index');
        Route::post('general-setting', 'GeneralSettingController@update')->name('setting.update');
        Route::get('optimize', 'GeneralSettingController@optimize')->name('setting.optimize');

        // Logo-Icon
        Route::get('setting/logo-icon', 'GeneralSettingController@logoIcon')->name('setting.logo_icon');
        Route::post('setting/logo-icon', 'GeneralSettingController@logoIconUpdate')->name('setting.logo_icon');

        //Custom CSS
        Route::get('custom-css','GeneralSettingController@customCss')->name('setting.custom.css');
        Route::post('custom-css','GeneralSettingController@customCssSubmit');


        //Cookie
        Route::get('cookie','GeneralSettingController@cookie')->name('setting.cookie');
        Route::post('cookie','GeneralSettingController@cookieSubmit');

        // Plugin
        Route::get('extensions', 'ExtensionController@index')->name('extensions.index');
        Route::post('extensions/update/{id}', 'ExtensionController@update')->name('extensions.update');
        Route::post('extensions/activate', 'ExtensionController@activate')->name('extensions.activate');
        Route::post('extensions/deactivate', 'ExtensionController@deactivate')->name('extensions.deactivate');


        // Email Setting
        Route::get('email-template/global', 'EmailTemplateController@emailTemplate')->name('email.template.global');
        Route::post('email-template/global', 'EmailTemplateController@emailTemplateUpdate')->name('email.template.global');
        Route::get('email-template/setting', 'EmailTemplateController@emailSetting')->name('email.template.setting');
        Route::post('email-template/setting', 'EmailTemplateController@emailSettingUpdate')->name('email.template.setting');
        Route::get('email-template/index', 'EmailTemplateController@index')->name('email.template.index');
        Route::get('email-template/{id}/edit', 'EmailTemplateController@edit')->name('email.template.edit');
        Route::post('email-template/{id}/update', 'EmailTemplateController@update')->name('email.template.update');
        Route::post('email-template/send-test-mail', 'EmailTemplateController@sendTestMail')->name('email.template.sendTestMail');


        // SMS Setting
        Route::get('sms-template/global', 'SmsTemplateController@smsSetting')->name('sms.template.global');
        Route::post('sms-template/global', 'SmsTemplateController@smsSettingUpdate')->name('sms.template.global');
        Route::get('sms-template/index', 'SmsTemplateController@index')->name('sms.template.index');
        Route::get('sms-template/edit/{id}', 'SmsTemplateController@edit')->name('sms.template.edit');
        Route::post('sms-template/update/{id}', 'SmsTemplateController@update')->name('sms.template.update');
        Route::post('email-template/send-test-sms', 'SmsTemplateController@sendTestSMS')->name('sms.template.sendTestSMS');

        // SEO
        Route::get('seo', 'FrontendController@seoEdit')->name('seo');


        // Frontend
        Route::name('frontend.')->prefix('frontend')->group(function () {


            Route::get('templates', 'FrontendController@templates')->name('templates');
            Route::post('templates', 'FrontendController@templatesActive')->name('templates.active');



            Route::get('frontend-sections/{key}', 'FrontendController@frontendSections')->name('sections');
            Route::post('frontend-content/{key}', 'FrontendController@frontendContent')->name('sections.content');
            Route::get('frontend-element/{key}/{id?}', 'FrontendController@frontendElement')->name('sections.element');
            Route::post('remove', 'FrontendController@remove')->name('remove');

            // Page Builder
            Route::get('manage-pages', 'PageBuilderController@managePages')->name('manage.pages');
            Route::post('manage-pages', 'PageBuilderController@managePagesSave')->name('manage.pages.save');
            Route::post('manage-pages/update', 'PageBuilderController@managePagesUpdate')->name('manage.pages.update');
            Route::post('manage-pages/delete', 'PageBuilderController@managePagesDelete')->name('manage.pages.delete');
            Route::get('manage-section/{id}', 'PageBuilderController@manageSection')->name('manage.section');
            Route::post('manage-section/{id}', 'PageBuilderController@manageSectionUpdate')->name('manage.section.update');
        });
    });
});
