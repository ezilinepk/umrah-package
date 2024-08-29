<?php

use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Dcblogdev\Dropbox\Facades\Dropbox;
use App\Http\Controllers\hotel\HotelController;
use App\Http\Controllers\Api\UserAuthController;
use App\Http\Controllers\DropBoxFileUploadController;
use App\Http\Controllers\transport\TransportController;
use App\Http\Controllers\visa\VisaController;
use App\Http\Controllers\zirat\ZiratController;

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


Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('dropbox/connect', function () {
        // $accessToken = 'NEW_ACCESS_TOKEN';
        $accessToken = config('filesystems.disks.dropbox.authorization_token');

        // dd($accessToken);

        // Example of making a request with the new token using PHP
        $client = new GuzzleHttp\Client();
        $response = $client->post('https://content.dropboxapi.com/2/files/upload', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/octet-stream',
                'Dropbox-API-Arg' => json_encode([
                    'path' => '/your/path/here',
                    'mode' => 'add',
                    'autorename' => true,
                    'mute' => false
                ])
            ],
        ]);

        echo $response->getBody();

        // return Dropbox::connect();
    });

    Route::get('dropbox/disconnect', function () {
        return Dropbox::disconnect('app/dropbox');
    });
});

Route::get("/upload", [DropBoxFileUploadController::class, 'index'])->name("dropboxfile.index");
Route::post("/upload", [DropBoxFileUploadController::class, 'upload'])->name("dropboxfile.upload");


Route::get('ulogin', [UserAuthController::class, 'log'])->name('ulogin');
Route::get('/hoteldetails', [UserAuthController::class, 'hotelView'])->name('hoteldetails');



Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => '\App\Http\Controllers'], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        // Module Route Start
        Route::get('/module/index', ['uses' => 'ModuleController@index', 'as' => 'module.index']);
        Route::get('/module/create', ['uses' => 'ModuleController@create', 'as' => 'module.create']);
        Route::post('/module/store', ['uses' => 'ModuleController@store', 'as' => 'module.store']);
        Route::get('/module/{id}/edit', ['uses' => 'ModuleController@edit', 'as' => 'module.edit']);
        Route::post('/module/{id}/update', ['uses' => 'ModuleController@update', 'as' => 'module.update']);

        // Permission Route Start
        Route::get('/permission/index', ['uses' => 'PermissionController@index', 'as' => 'permission.index']);
        Route::get('/permission/create', ['uses' => 'PermissionController@create', 'as' => 'permission.create']);
        Route::post('/permission/store', ['uses' => 'PermissionController@store', 'as' => 'permission.store']);

        // Role Route Start
        Route::get('/role/index', ['uses' => 'RoleController@index', 'as' => 'role.index']);
        Route::get('/role/create', ['uses' => 'RoleController@create', 'as' => 'role.create']);
        Route::post('/role/store', ['uses' => 'RoleController@store', 'as' => 'role.store']);
        Route::get('/role/{id}/edit', ['uses' => 'RoleController@edit', 'as' => 'role.edit']);
        Route::post('/role/{id}/update', ['uses' => 'RoleController@update', 'as' => 'role.update']);

        // User Route Start
        Route::get('/user/index', ['uses' => 'UserController@index', 'as' => 'user.index']);
        Route::get('/user/create', ['uses' => 'UserController@create', 'as' => 'user.create']);
        Route::post('/user/store', ['uses' => 'UserController@store', 'as' => 'user.store']);
        Route::get('/user/{id}/edit', ['uses' => 'UserController@edit', 'as' => 'user.edit']);
        Route::post('/user/{id}/update', ['uses' => 'UserController@update', 'as' => 'user.update']);
        Route::post('/user/destroy', ['uses' => 'UserController@destroy', 'as' => 'user.destroy']);

        // Paper Category Route
        Route::get('/category/index', ['uses' => 'CategoryController@index', 'as' => 'category.index']);
        Route::get('/category/create', ['uses' => 'CategoryController@create', 'as' => 'category.create']);
        Route::post('/category/store', ['uses' => 'CategoryController@store', 'as' => 'category.store']);
        Route::get('/category/{id}/edit', ['uses' => 'CategoryController@edit', 'as' => 'category.edit']);
        Route::post('/category/{id}/update', ['uses' => 'CategoryController@update', 'as' => 'category.update']);
        Route::post('/category/destroy', ['uses' => 'CategoryController@destroy', 'as' => 'category.destroy']);

        // Paper Route Start
        Route::get('/paper/index', ['uses' => 'PaperController@index', 'as' => 'paper.index']);
        Route::get('/paper/create', ['uses' => 'PaperController@create', 'as' => 'paper.create']);
        Route::post('/paper/store', ['uses' => 'PaperController@store', 'as' => 'paper.store']);
        Route::get('/paper/{id}/edit', ['uses' => 'PaperController@edit', 'as' => 'paper.edit']);
        Route::post('/paper/{id}/update', ['uses' => 'PaperController@update', 'as' => 'paper.update']);
        Route::get('/paper/{id}/view', ['uses' => 'PaperController@show', 'as' => 'paper.view']);
        Route::post('/paper/destroy', ['uses' => 'PaperController@destroy', 'as' => 'paper.destroy']);
        Route::get('/paper/{id}/log', ['uses' => 'PaperController@viewLog', 'as' => 'paper.viewLog']);

        // Approval lists
        Route::get('/trg/approval/list', ['uses' => 'PaperController@trg_list', 'as' => 'approval.trg']);
        Route::get('/senior/instructor/approval/list', ['uses' => 'PaperController@senior_list', 'as' => 'senior.list']);
        Route::get('/chief/instructor/approval/list', ['uses' => 'PaperController@chief_list', 'as' => 'chief.list']);
        Route::get('/exam/paper/list', ['uses' => 'PaperController@exam_list', 'as' => 'exam.list']);

        // Approve Paper
        Route::post('/trg/paper/approved', ['uses' => 'PaperController@trg_approved', 'as' => 'trg.approved']);
        Route::post('/senior/paper/approved', ['uses' => 'PaperController@senior_approved', 'as' => 'senior.approved']);
        Route::post('/chief/paper/approved', ['uses' => 'PaperController@chief_approved', 'as' => 'chief.approved']);
        Route::post('/paper/again/submission', ['uses' => 'PaperController@againSubmission', 'as' => 'paper.againSubmission']);

        // Profile update Route
        Route::get('/profile', ['uses' => 'HomeController@profile', 'as' => 'profile']);
        Route::post('/profile/update', ['uses' => 'HomeController@updateProfile', 'as' => 'update.profile']);

        // File View
        Route::get('/file/{id}/view', ['uses' => 'PaperController@fileView', 'as' => 'file.view']);

        // Send to Exam Route
        Route::post('/paper/send-to-exam', ['uses' => 'PaperController@sendToExam', 'as' => 'paper.sendToExam']);

        // Dashboard Link List
        Route::get('/paper/{type}/list', ['uses' => 'HomeController@paperList', 'as' => 'dashboard.paperList']);
    });
});


//Add Hotels

Route::get('/hotel/index' , [HotelController::class ,  'index'])->name('hotel.index');
Route::get('/hotel/create' , [HotelController::class ,  'create'])->name('hotel.create');
Route::post('/hotel/store', [HotelController::class, 'store'])->name('hotel.store');
Route::get('/get-hotels-by-location', [HotelController::class, 'getHotelsByLocationid'])->name('getHotelsByLocationid');
Route::get('/get-Room-Prices' , [HotelController::class , 'getRoomPrices'])->name('getRoomPrices');
Route::get('/edit-form/{id}' , [HotelController::class, 'edit'])->name('visa.edit');
Route::get('/get-hotels', [HotelController::class, 'getHotels'])->name('hotels.byLocation');
Route::get('/get-hotel-details', [HotelController::class, 'getHotelDetailsById'])->name('getHotelDetailsById');



Route::get('/visa/index' , [VisaController::class ,'index'])->name('visa.index');
Route::get('/visa/create' , [VisaController::class , 'create'])->name('visa.create');
Route::get('/visa/edit/{id}' , [VisaController::class , 'edit'])->name('visa.edit');
Route::post('/visas', [VisaController::class, 'store'])->name('visa.store');
Route::get('/get-visa-price', [VisaController::class ,'VisaPrice'])->name('getVisaPrice');


Route::get('transport/index' , [TransportController::class , 'index'])->name('transport.index');
Route::get('transport/create', [TransportController::class , 'create'])->name('transport.create');
Route::post('/transports', [TransportController::class, 'store'])->name('transports.store');
Route::get('/get-transport-price', [TransportController::class, 'getTransportPrice'])->name('get.transport.price');
Route::get('/get-hotel-distance', 'HotelController@getHotelDistance');



Route::get('/index' ,  [ZiratController::class , 'index'])->name('ziarat.index');
Route::get('/create' ,  [ZiratController::class , 'create'])->name('ziarat.create');
// Route::get('/edit' ,  [ZiratController::class , 'edit'])->name('ziarat.edit');

Route::Post('/create' ,  [ZiratController::class , 'store'])->name('ziarat.store');
Route::get('/ziarat-price/{name}', [ZiratController::class, 'getZiaratPrice'])->name('ziarat.price');
Route::get('/store-form-data', [FormdataController::class, 'storeFormData'])->name('storeFormData');









