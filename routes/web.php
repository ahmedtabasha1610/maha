<?php

use App\Mail\MyDemoMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\PayBookController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\FinancesController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ConsultingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\BookkingReportController;
use App\Http\Controllers\DashboardAdvisorController;
use App\Http\Controllers\DashBoardNotifacitionController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




Route::any('/', function () {
   return redirect()->route('homepage');
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        ],function () {
        require __DIR__ . '/auth.php';
        Route::get('/homepage', [FrontController::class, 'index'])->name('homepage');
        Route::get('/page/content/{id}', [FrontController::class, 'page'])->name('page');
        Route::get('/All-services/details/{id}', [FrontController::class, 'services'])->name('services');
        Route::get('/All-blog', [FrontController::class, 'blog'])->name('blog');
        Route::get('contactus', [FrontController::class, 'contact'])->name('contact');
        Route::post('send/mail', [FrontController::class, 'contactus'])->name('contactus');
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        //log in user
        Route::get('auth/social/google', [GoogleController::class, 'show'])->name('social.login');
        Route::get('oauth/{driver}/google', [GoogleController::class, 'redirectToProvider'])->name('social.oauth');
        Route::get('oauth/{driver}/callback', [GoogleController::class, 'handleProviderCallback'])->name('social.callback');

        //log in user
        Route::get('auth/social/facebook', [FacebookController::class, 'showface'])->name('socialface.login');
        Route::get('oauth/{driver}', [FacebookController::class, 'redirectToProvider'])->name('socialface.oauth');
        Route::get('oauth/{driver}/callback', [FacebookController::class, 'handleProviderCallback'])->name('socialface.callback');
        Route::get('filter/advisor/', [DashboardUserController::class, 'filteradvisor'])->name('filteradvisor');


        Route::group(['middleware' => ['auth','verified']], function () {

            Route::resource('roles', RoleController::class);
            Route::resource('users', UserController::class);
            Route::get('/users/all/advisor/just', [UserController::class, 'alladvisor'])->name('all.advisor');
            Route::get('/users/all/user/just', [UserController::class, 'alluser'])->name('all.user');
            Route::resource('category', CategoryController::class);
            Route::resource('language', LanguageController::class);
            Route::resource('post', PostController::class);
            Route::resource('permissions', PermissionController::class);
            Route::get('profile', [HomeController::class, 'profileget'])->name('profilegetadmin');
            Route::patch('profile', [HomeController::class, 'profile'])->name('profileadmin');
            Route::resource('configuration', ConfigurationController::class);
            Route::resource('content', ContentController::class);
            Route::resource('Services', ServicesController::class);
            Route::resource('ordernotifiy', DashBoardNotifacitionController::class);
            Route::resource('booking',BookkingReportController::class)->middleware('check');
            Route::get('booking/statics/profits',[BookkingReportController::class,'statics_profits'])->name('staticsprofits');
            Route::delete('order/notifydestroy/{id}', [DashBoardNotifacitionController::class, 'notifydestroy'])->name('order.notifydestroy');
            Route::get('/marks/read/new/user/register/{id}/{user_id}', [HomeController::class, 'show'])->name('marksreadnewuserregister.show');
            Route::get('/marks/read/all/new/user/register/', [HomeController::class, 'showall'])->name('marksallreadnewuserregister.showall');
            Route::resource('finances',FinancesController::class);
        });

        Route::group(['middleware' => ['auth', 'role:User']], function () {
            Route::get('/Dashboard/User', [DashboardUserController::class, 'index'])->name('homeuser');
            Route::get('/Dashboard/User/changePassword', [DashboardUserController::class, 'showChangePasswordGet'])->name('changePasswordGetuser');
            Route::post('/Dashboard/User/changePassword', [DashboardUserController::class, 'changePassword'])->name('changePassworduser');
            Route::get('/Dashboard/User/profile', [DashboardUserController::class, 'profilegetuser'])->name('profilegetuser');
            Route::patch('/Dashboard/User/profile', [DashboardUserController::class, 'profileuser'])->name('profileuser');
            Route::get('/Dashboard/User/files/{id}/{key}', [DashboardUserController::class, 'deleteFile'])->name('contacts.files.destroy');
            Route::get('notifiy/send/details/show/{id}/', [DashboardUserController::class, 'showuser'])->name('marksreadnotifiyfromadmin.showuser');
          //  Route::get('filter/advisor/', [DashboardUserController::class, 'filteradvisor'])->name('filteradvisor');
            Route::get('/Dashboard/User/calendar/index/{id}', [CalendarController::class, 'indexbook'])->name('calendaruser.index');
            Route::get('/Dashboard/User/calendar/update/{id}', [CalendarController::class, 'updatebook'])->name('calendaruser.update');
            Route::get('notifiy/all/details/show/', [DashboardUserController::class, 'showuserallnotifiy'])->name('showuserallnotifiy');
            
            Route::get('/Dashboard/User/details/advisor/{advisor_id}/{id}/{notifiy_id?}', [CalendarController::class, 'detailsadvisor'])->name('details.advisor');

            Route::any('/order', [PaypalController::class, 'getPaymentStatus'])->name('status');
            Route::resource('myconsulting',ConsultingController::class);
            Route::resource('paybook',PayBookController::class);
        });

        Route::group(['middleware' => ['auth', 'role:Employee']], function () {
            Route::get('/Dashboard/Advisor', [DashboardAdvisorController::class, 'index'])->name('homeadvisor');
            Route::get('/Dashboard/Advisor/balance', [DashboardAdvisorController::class, 'balance'])->name('balance');
            Route::get('/Dashboard/Advisor/changePassword', [DashboardAdvisorController::class, 'showChangePasswordGet'])->name('changePasswordGet');
            Route::post('/Dashboard/Advisor/changePassword', [DashboardAdvisorController::class, 'changePassword'])->name('changePassword');
            Route::get('/Dashboard/Advisor/profile', [DashboardAdvisorController::class, 'profileget'])->name('profileget');
            Route::patch('/Dashboard/Advisor/profile', [DashboardAdvisorController::class, 'profile'])->name('profile');
            Route::get('/Dashboard/Advisor/Career/info', [DashboardAdvisorController::class, 'careerinfoadvisor'])->name('careerinfoadvisor');
            Route::patch('/Dashboard/Advisor/Career/info', [DashboardAdvisorController::class, 'careerinfo'])->name('careerinfo');
            Route::get('/Dashboard/Advisor/files/{id}/{key}', [DashboardAdvisorController::class, 'deleteFile'])->name('contacts.files.destroy');
            Route::get('notifiy/send/details/{id}/', [DashboardAdvisorController::class, 'showadvisor'])->name('marksreadnotifiyfromadmin.showadvisor');
            Route::get('notifiy/all/details/', [DashboardAdvisorController::class, 'showadvisorallnotifiy'])->name('showadvisorallnotifiy');
            Route::resource('purchase',PurchaseController::class);
   
            Route::get('Dashboard/Advisor/calendar/index', [CalendarController::class, 'index'])->name('calendar.index');
            Route::get('Dashboard/Advisor/calendar/allbooking/details', [CalendarController::class, 'details'])->name('calendar.details');
            Route::post('Dashboard/Advisor/calendar', [CalendarController::class, 'store'])->name('calendar.store');
            Route::patch('Dashboard/Advisor/calendar/update/{id}', [CalendarController::class, 'update'])->name('calendar.update');
            Route::delete('Dashboard/Advisor/calendar/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');
        });
    }
);
