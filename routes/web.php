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




/* Route::domain('admin.127.0.0.1:9089/')->group(function () {
    Route::get('/', function () {
        return "Hello";
    });
}); */



#Unathenticated user

Route::get('/',[App\Http\Controllers\HomeController::class,'index'])->name('home');
//Route::get('/',[App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/view-advert/{slug}', [App\Http\Controllers\HomeController::class, 'viewAdvert'])->name('view-advert');
Route::get('/contact-vendor/{slug}', [App\Http\Controllers\HomeController::class, 'contactVendor'])->name('contact-vendor');

Auth::routes();
Route::get('/logout',  [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
#Authenticated user
Route::get('/marketplace', [App\Http\Controllers\MarketplaceController::class, 'index'])->name('marketplace');

#Ads routes
Route::get('/post-your-ad', [App\Http\Controllers\AdsController::class, 'showPostAdsForm'])->name('post-your-ad');
Route::post('/post-your-ad', [App\Http\Controllers\AdsController::class, 'postAds']);
Route::post('/initialize-defaults', [App\Http\Controllers\AdsController::class, 'initializeDefaults']);
Route::post('/get-subcategories', [App\Http\Controllers\AdsController::class, 'getSubcategories']);
Route::post('/get-areas', [App\Http\Controllers\AdsController::class, 'getAreas']);

#Customer routes
Route::get('/my-adverts', [App\Http\Controllers\AdsController::class, 'myAdverts'])->name('my-adverts');
Route::get('/advert/view/{slug}', [App\Http\Controllers\AdsController::class, 'advertDetail'])->name('advert-detail');
Route::post('/leave-comment', [App\Http\Controllers\AdsController::class, 'leaveComment'])->name('leave-comment');
Route::post('/add-to-wishlist', [App\Http\Controllers\AdsController::class, 'addToWishlist']);

Route::post('/drop-review', [App\Http\Controllers\AdsController::class, 'dropReview'])->name('drop-review');

Route::get('/wishlist', [App\Http\Controllers\CustomerController::class, 'wishlist'])->name('wishlist');
Route::get('/profile', [App\Http\Controllers\CustomerController::class, 'profile'])->name('profile');
Route::get('/settings', [App\Http\Controllers\CustomerController::class, 'settings'])->name('settings');
Route::post('/save-changes', [App\Http\Controllers\CustomerController::class, 'saveChanges'])->name('save-changes');
Route::get('/my-adverts', [App\Http\Controllers\CustomerController::class, 'myAdverts'])->name('my-adverts');
Route::get('/my-advert/{slug}', [App\Http\Controllers\CustomerController::class, 'myAdvertDetail'])->name('my-advert-detail');
Route::post('/message-seller', [App\Http\Controllers\CustomerController::class, 'messageSeller'])->name('message-seller');
Route::get('/my-messages', [App\Http\Controllers\CustomerController::class, 'myMessages'])->name('my-messages');
Route::get('/message/read/{slug}', [App\Http\Controllers\CustomerController::class, 'readMessage'])->name('read-message');
Route::post('/message/reply', [App\Http\Controllers\CustomerController::class, 'replyMessage'])->name('reply-message');
Route::get('/notifications', [App\Http\Controllers\CustomerController::class, 'notifications'])->name('notifications');



//Route::post('/initialize-subcategories', [App\Http\Controllers\AdsController::class, 'initializeSubcategories']);

#Marketplace routes
Route::get('/marketplace', [App\Http\Controllers\MarketplaceController::class, 'marketplace'])->name('marketplace');





#Admin routes

#Admin routes
Route::get('/admin', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin-login');
Route::post('/admin', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);


Route::get('/all-employees', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('all-employees');
Route::get('/add-new-employee', [App\Http\Controllers\Admin\AdminController::class, 'addNewEmployee'])->name('add-new-employee');
Route::post('/add-new-employee', [App\Http\Controllers\Admin\AdminController::class, 'storeNewEmployee']);
Route::get('/view-employee-profile/{slug}', [App\Http\Controllers\Admin\AdminController::class, 'viewEmployeeProfile'])->name('view-employee-profile');

#Role routes
Route::get('/roles', [App\Http\Controllers\Admin\AdminController::class, 'roles'])->name('roles');
Route::post('/roles', [App\Http\Controllers\Admin\AdminController::class, 'storeRole']);

#Permission routes
Route::get('/permissions', [App\Http\Controllers\Admin\AdminController::class, 'permissions'])->name('permissions');
Route::post('/permissions', [App\Http\Controllers\Admin\AdminController::class, 'storePermission']);

#Category routes
Route::get('/categories', [App\Http\Controllers\Admin\AdsManagementController::class, 'categories'])->name('categories');
Route::post('/categories', [App\Http\Controllers\Admin\AdsManagementController::class, 'storeCategory']);

#Sub-category routes
Route::get('/sub-categories', [App\Http\Controllers\Admin\AdsManagementController::class, 'subCategories'])->name('sub-categories');
Route::post('/sub-categories', [App\Http\Controllers\Admin\AdsManagementController::class, 'storeSubCategory']);
Route::post('/get-product-subcategories', [App\Http\Controllers\Admin\AdsManagementController::class, 'getSubcategories']);
Route::post('/get-product-location', [App\Http\Controllers\Admin\AdsManagementController::class, 'getLocations']);

#Package routes
Route::get('/packages', [App\Http\Controllers\Admin\AdsManagementController::class, 'showPackages'])->name('packages');
Route::post('/packages', [App\Http\Controllers\Admin\AdsManagementController::class, 'storePackage']);
Route::get('/package/edit/{id}', [App\Http\Controllers\Admin\AdsManagementController::class, 'showEditPackage'])->name('package-edit');
Route::post('/package/edit', [App\Http\Controllers\Admin\AdsManagementController::class, 'editPackage'])->name('save-package-changes');

#Location routes
Route::get('/locations', [App\Http\Controllers\Admin\LocationAreaController::class, 'locations'])->name('locations');
Route::post('/locations', [App\Http\Controllers\Admin\LocationAreaController::class, 'storeLocation']);

#Area routes
Route::get('/areas', [App\Http\Controllers\Admin\LocationAreaController::class, 'areas'])->name('areas');
Route::post('/areas', [App\Http\Controllers\Admin\LocationAreaController::class, 'storeArea']);

#Manage adverts routes
Route::get('/manage-adverts', [App\Http\Controllers\Admin\AdsManagementController::class,'manageAdverts'])->name('manage-adverts');
Route::get('/manage-advert/view/{slug}', [App\Http\Controllers\Admin\AdsManagementController::class, 'viewAdvert'])->name('view-advert');

#Manage customer routes
Route::get('/manage-customers', [App\Http\Controllers\Admin\CustomerController::class, 'manageCustomers'])->name('manage-customers');
Route::get('/customer-profile/{slug}', [App\Http\Controllers\Admin\CustomerController::class, 'getCustomerProfile'])->name('customer-profile');

#My account employee routes
Route::get('/manage/my-adverts', [App\Http\Controllers\Admin\EmployeeController::class, 'myAdverts'] )->name('manage-my-adverts');
Route::get('/manage/my-customers', [App\Http\Controllers\Admin\EmployeeController::class, 'manageMyCustomers'] )->name('manage-my-customers');
Route::get('/post-advert', [App\Http\Controllers\Admin\EmployeeController::class, 'postAdvert'])->name('post-advert');
//Route::post('/post-advert', [App\Http\Controllers\Admin\EmployeeController::class, 'storeAdvert']);
Route::post('/proceed-to-pay', [App\Http\Controllers\Admin\EmployeeController::class, 'proceedToPay'])->name('proceed-to-pay');

Route::post('/update-advert-status', [App\Http\Controllers\Admin\EmployeeController::class, 'updateAdvertStatus'])->name('update-advert-status');
Route::get('/add-new-customer', [App\Http\Controllers\Admin\EmployeeController::class, 'showAddNewCustomerForm'])->name('add-new-customer');
Route::post('/add-new-customer', [App\Http\Controllers\Admin\EmployeeController::class, 'addNewCustomer']);
