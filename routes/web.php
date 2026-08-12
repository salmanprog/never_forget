<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\BillingAddressController;
use App\Http\Controllers\admin\VariationsController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\BalloonController;
use App\Http\Controllers\admin\EnquiresController;

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

Route::get('/route-clear', function () {
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    $cache = 'Route cache cleared <br /> View cache cleared <br /> Cache cleared <br /> Config cleared <br /> Config cache cleared';
    return $cache;
});


// Twilio webhook for incoming SMS replies (must be public, no auth/CSRF)


Route::post('user-authenticate', 'WebController@authenticate')->name('user-authenticate');
Route::get('signup', 'WebController@signUp')->name('signup');
Route::get('cart-login', 'WebController@cartLogin')->name('cart-login');
Route::post('new-register/store', 'WebController@store')->name('new-register');
Route::post('update-profile', 'WebController@updateProfile')->name('update-profile');
Route::get('email-verification/{token}', 'WebController@verifyEmail')->name('email-verification');
Route::post('custom-dashboard', 'WebController@customDashboard')->name('custom-dashboard');

//customer reset password
Route::get('forgot_password', 'WebController@forgotPassword')->name('forgot_password');
Route::get('send-password-reset-link', 'WebController@passwordResetLink')->name('send-password-reset-link');
Route::get('reset-password/{token}', 'WebController@resetPassword')->name('reset-password');

// Occasions Management Routes
Route::resource('occasions', 'OccasionsController');
Route::post('change_password', 'WebController@changePassword')->name('change_password');

//admin reset password
Route::get('admin/login', 'admin\AdminController@login')->name('admin.login');
Route::get('admin/forgot_password', 'admin\AdminController@forgotPassword')->name('admin.forgot_password');
Route::get('admin/send-password-reset-link', 'admin\AdminController@passwordResetLink')->name('admin.send-password-reset-link');
Route::get('admin/reset-password/{token}', 'admin\AdminController@resetPassword')->name('admin.reset-password');
Route::post('admin/change_password', 'admin\AdminController@changePassword')->name('admin.change_password');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/admin/profile/edit', 'admin\AdminController@editProfile')->name('admin.profile.edit');
Route::get('/member/profile', 'admin\UserController@IndividualProfileShow')->name('member.profile');
Route::get('/member/profile/edit', 'admin\UserController@IndividualEditProfile')->name('member.profile.edit');
Route::get('/company/profile', 'admin\UserController@CompanyProfileShow')->name('company.profile');
Route::get('/company/profile/edit', 'admin\UserController@CompanyEditProfile')->name('company.profile.edit');
Route::post('/member/profile/update', 'admin\UserController@IndividualUpdateProfile')->name('member.profile.update');
Route::get('/salesperson/profile/edit', 'admin\UserController@SalesPersonEditProfile')->name('salesperson.profile.edit');
Route::post('/salesperson/profile/update', 'admin\UserController@SalesPersonUpdateProfile')->name('salesperson.profile.update');
Route::post('/user/profile/update', 'admin\UserController@IndividualUpdateProfile')->name('user.profile.update');
Route::post('/admin/profile/update', 'admin\AdminController@updateProfile')->name('admin.profile.update');
Route::post('admin/logout', 'admin\AdminController@logOut')->name('admin.logout');




// individual account dashboard
Route::get('/my-profile', function () {
    return view('admin.myprofile.index');
})->name('myprofile.index');


Route::get('/gift-history', function () {
    return view('admin.gift-history.index');
})->name('gift-history.index');

Route::get('/notifications', function () {
    return view('admin.notifications.index');
})->name('notifications.index');

Route::get('/settings', function () {
    return view('admin.settings.index');
})->name('settings.index');

// Company account dashboard routes
Route::get('/company-profile', function () {
    return view('admin.company-profile.index');
})->name('company-profile.index');

Route::get('/bulk-orders', function () {
    return view('admin.bulk-orders.index');
})->name('bulk-orders.index');

Route::get('/order-history-invoices', function () {
    return view('admin.order-history-invoices.index');
})->name('order-history-invoices.index');

Route::get('/employee-gifting', 'admin\CompanyEmployeeController@giftingIndex')->name('employee-gifting.index');

Route::get('/account-settings-support', function () {
    return view('admin.account-settings-support.index');
})->name('account-settings-support.index');

//Frontend

Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('get_states', [WebController::class, 'getStates'])->name('get_states');
Route::get('about-us', [WebController::class, 'aboutUs'])->name('about-us');
Route::get('shop', [WebController::class, 'shop'])->name('shop');
Route::get('how-it-works', [WebController::class, 'howItWorks'])->name('how-it-works');
Route::get('corporate-solutions', [WebController::class, 'corporateSolutions'])->name('corporate-solutions');
Route::get('collaborators/{slug}', [WebController::class, 'collaboratorShow'])->name('collaborators.show');
Route::get('testimonials', [WebController::class, 'testimonials'])->name('testimonials');
Route::get('blogs', [WebController::class, 'blogs'])->name('blogs');
Route::get('/load-more-blogs', [WebController::class, 'loadMoreBlogs'])->name('load.more.blogs');
Route::get('view-blog/{slug}', [WebController::class, 'blogDetail'])->name('blog-detail');
Route::get('contact-us', [WebController::class, 'contactus'])->name('contact-us');
Route::get('customize-your-solution', [WebController::class, 'customizeYourSolution'])->name('customize-your-solution');
Route::get('customize-your-solution/{service}', [WebController::class, 'customizeYourSolutionForm'])->name('customize-your-solution.form');
Route::post('customize-your-solution', [WebController::class, 'storeCustomizeSolution'])->name('customize-your-solution.store');
Route::get('faqs', [WebController::class, 'faqs'])->name('faqs');
Route::get('why-choose-us', [WebController::class, 'whyChooseUs'])->name('why-choose-us');
Route::get('career', [WebController::class, 'Career'])->name('career');
Route::get('disclaimer', [WebController::class, 'disclaimer'])->name('disclaimer');
Route::get('cookie-policy', [WebController::class, 'cookiePolicy'])->name('cookie-policy');
Route::get('privacy-policy', [WebController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('founder', [WebController::class, 'founder'])->name('founder');


/* Route::get('our-menu', [WebController::class, 'ourMenu'])->name('our-menu');
Route::get('special-offers', [WebController::class, 'specialOffers'])->name('special-offers');
Route::get('reviews', [WebController::class, 'reviews'])->name('reviews');
Route::get('catering', [WebController::class, 'catering'])->name('catering');
 */

Route::get('order-details/{id}', [WebController::class, 'orderDetail'])->name('order-details');
Route::get('order/invoice/{id}', 'OrderController@invoice')->name('order.invoice');

Route::get('get-billing-address', [BillingAddressController::class, 'getBillingAddres'])->name('get-billing-address');


Route::get('login', [WebController::class, 'userlogin'])->name('login');
Route::get('lost-password', [WebController::class, 'lostPassword'])->name('lost-password');

//Newsletter
Route::resource('newsletter', 'NewsletterController');

//Google Map
// Route::get('/show-map', 'MapController@showMap')->name('show-map');


//Contact Us
Route::resource('contactus', 'admin\ContactUsController');
Route::get('search', 'WebController@searchProducts')->name('search-products');
Route::get('category/products', 'WebController@categoryProducts')->name('category/products');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('share-email', [WebController::class, 'shareEmail'])->name('share-email');

Route::get('single-product/{slug}', 'WebController@singleProduct')->name('single-product');


Route::get('ajax/get-sizes-price/{id}', 'WebController@getSizesPrice')->name('ajax/get-sizes-price');

Route::get('get_product_ids', 'WebController@getProductId')->name('get_product_ids');

Route::post('newsletter/store', 'NewsletterController@store')->name('newsletter.store');

Route::get('apply_coupon', [CartController::class, 'applyCoupon'])->name('apply_coupon');
Route::get('remove-coupon', [CartController::class, 'removeCoupon'])->name('remove-coupon');
Route::get('check-out', [CartController::class, 'checkOut'])->name('check-out');
// Route::get('payment/edit/{id}', [PaymentController::class, 'edit'])->name('payment.edit');

Route::get('variations-show', [VariationsController::class, 'show'])->name('variations.show');

Route::POST('get_sub_style', [VariationsController::class, 'getSubStyle'])->name('get_sub_style');
Route::POST('get_sub_category', [ProductController::class, 'getSubCategory'])->name('get_sub_category');

Route::get('/careers/apply', [App\Http\Controllers\WebController::class, 'careerApplicationForm'])->name('careers.apply.form');
Route::post('/careers/apply', [App\Http\Controllers\admin\CareerController::class, 'applyCareer'])->name('careers.apply');
Route::get('/careers/applications', [App\Http\Controllers\admin\CareerController::class, 'applications'])->name('careers.applications');
Route::get('/careers/{id}/applications', [App\Http\Controllers\admin\CareerController::class, 'careerApplications'])->name('careers.applications.view');
Route::post('/careers/applications/{id}/respond', [App\Http\Controllers\admin\CareerController::class, 'respondToApplication'])->name('careers.applications.respond');

Route::post('/create-balloon-enquiry-item', [WebController::class, 'createBalloonEnquiryItem'])->name('create-balloon-enquiry-item');
Route::post('/balloon-items/update-quantity', [WebController::class, 'updateQuantity'])->name('balloon-items.update-quantity');

Route::post('/balloon-enquiry', [WebController::class, 'storeBalloonEnquiry'])->name('balloon.enquiry');
Route::get('/balloon-items', [WebController::class, 'balloonItems'])->name('balloon-items');
Route::post('/balloon-items/{id}', [WebController::class, 'destroyBalloonEnquiry'])->name('balloon-items-delete');
Route::post('/submit-balloon-enquiry', [WebController::class, 'submitBalloonEnquiry'])->name('submit-balloon-enquiry');

Route::post('/create-perfect-gift-enquiry-item', [WebController::class, 'createPerfectGiftEnquiryItem'])->name('create-perfect-gift-enquiry-item');
Route::post('/perfect-gift-items/update-quantity', [WebController::class, 'updatePerfectGiftQuantity'])->name('perfect-gift-items.update-quantity');
Route::post('/perfect-gift-enquiry', [WebController::class, 'storePerfectGiftEnquiry'])->name('perfect-gift.enquiry');
Route::get('/perfect-gift-items', [WebController::class, 'perfectGiftItems'])->name('perfect-gift-items');
Route::post('/perfect-gift-items/{id}', [WebController::class, 'destroyPerfectGiftEnquiry'])->name('perfect-gift-items-delete');

Route::post('/create-greetings-appreciation-enquiry-item', [WebController::class, 'createGreetingsAppreciationEnquiryItem'])->name('create-greetings-appreciation-enquiry-item');
Route::get('/greetings-appreciation-items', [WebController::class, 'greetingsAppreciationItems'])->name('greetings-appreciation-items');
Route::post('/greetings-appreciation-items/update-quantity', [WebController::class, 'updateGreetingsAppreciationQuantity'])->name('greetings-appreciation-items.update-quantity');
Route::post('/greetings-appreciation-enquiry', [WebController::class, 'storeGreetingsAppreciationEnquiry'])->name('greetings-appreciation.enquiry');
Route::post('/greetings-appreciation-items/{id}', [WebController::class, 'destroyGreetingsAppreciationEnquiryItem'])->name('greetings-appreciation-items-delete');

Route::get('/create-e-card', [WebController::class, 'createEcard'])->name('create-e-card');
Route::post('/store-e-card', [WebController::class, 'storeEcard'])->name('store-e-card');
Route::get('/create-tango', [WebController::class, 'createTango'])->name('create-tango');
Route::post('/store-tango', [WebController::class, 'storeTango'])->name('store-tango');

Route::group(['middleware' => ['auth']], function () {
    Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');


    //Roles
    Route::resource('role', 'admin\RoleController');

    //users
    Route::get('user/{user}/resources', 'admin\UserController@viewResources')->name('user.resources');
    Route::patch('user/{user}/resources/{employee}/delivery-status', 'admin\UserController@updateDeliveryStatus')->name('user.resources.delivery-status');
    Route::get('user/{user}/friends-family', 'admin\UserController@viewFriendsFamily')->name('user.friends_family');
    Route::patch('user/{user}/friends-family/{id}/delivery-status', 'admin\UserController@updateFriendFamilyDeliveryStatus')->name('user.friends_family.delivery-status');
    Route::resource('user', 'admin\UserController');

    // Company Management Routes
    Route::prefix('company')->name('admin.company.')->group(function () {
        Route::get('create', 'admin\CompanyController@create')->name('create');
        Route::post('create', 'admin\CompanyController@store')->name('store');
        Route::get('edit', 'admin\CompanyController@edit')->name('edit');
        Route::put('update', 'admin\CompanyController@update')->name('update');
    });

    // Company Resources Management Routes (URL: company/resources)
    Route::prefix('company')->name('admin.company_employee.')->group(function () {
        Route::get('resources', 'admin\CompanyEmployeeController@index')->name('index');
        Route::get('resources/create', 'admin\CompanyEmployeeController@create')->name('create');
        Route::post('resources', 'admin\CompanyEmployeeController@store')->name('store');
        Route::get('resources/{id}/edit', 'admin\CompanyEmployeeController@edit')->name('edit');
        Route::put('resources/{id}', 'admin\CompanyEmployeeController@update')->name('update');
        Route::delete('resources/{id}', 'admin\CompanyEmployeeController@destroy')->name('destroy');
        Route::get('resources/bulk-upload', 'admin\CompanyEmployeeController@bulkUpload')->name('bulk-upload');
        Route::post('resources/process-bulk-upload', 'admin\CompanyEmployeeController@processBulkUpload')->name('process-bulk-upload');
        Route::get('resources/download-template', 'admin\CompanyEmployeeController@downloadTemplate')->name('download-template');
        Route::get('resources/{id}/resend-invitation', 'admin\CompanyEmployeeController@resendInvitation')->name('resend-invitation');
    });

    // Company package upgrade (dashboard) – payment in modal, no separate checkout page
    Route::get('company/package-upgrade', [App\Http\Controllers\CompanyPackageController::class, 'packageUpgrade'])->name('company.package-upgrade');
    Route::get('company/checkout', function () { return redirect()->route('company.package-upgrade'); })->name('company.checkout'); // legacy: redirect to package page (payment is in modal)
    Route::post('company/package-upgrade/paypal', [App\Http\Controllers\CompanyPackageController::class, 'initPayPal'])->name('company.package-upgrade.paypal');
    Route::post('company/package-upgrade/charge', [App\Http\Controllers\CompanyPackageController::class, 'charge'])->name('company.package-upgrade.charge');

    // MTS Dashboard Routes
    Route::resource('mts-dashboard', 'admin\MTSDashboardController');
    Route::post('mts-dashboard/{id}/update-assigned-salesperson', 'admin\MTSDashboardController@updateAssignedSalesperson')->name('mts-dashboard.update-assigned-salesperson');
    Route::post('mts-dashboard-send-email', [\App\Http\Controllers\admin\MTSDashboardController::class, 'sendEmail'])->name('mts-dashboard.send-email');

    Route::post('send-sms', [\App\Http\Controllers\SmsController::class, 'send'])->name('send-sms');
    Route::post('initiate-call', [\App\Http\Controllers\SmsController::class, 'initiateCall'])->name('initiate-call');
    Route::get('sms/conversation', [\App\Http\Controllers\SmsController::class, 'conversationHistory'])->name('sms.conversation');
    Route::get('sms-replies', [\App\Http\Controllers\admin\MTSDashboardController::class, 'smsReplies'])->name('sms-replies');
    
    //permissions
    Route::resource('permission', 'admin\PermissionController');

    //pages settings
    Route::resource('page', 'admin\PageController');
    Route::resource('page_setting', 'admin\PageSettingController');
    Route::get('package-settings', [App\Http\Controllers\admin\PackageSettingController::class, 'index'])->name('admin.package_setting.index');
    Route::post('package-settings', [App\Http\Controllers\admin\PackageSettingController::class, 'update'])->name('admin.package_setting.update');

    //Products
    Route::resource('product', 'admin\ProductController');

    //Category
    Route::resource('category', 'admin\CategoryController');

    //Coupon
    Route::resource('coupon', 'admin\CouponController');

    //Faqs
    Route::resource('faq', 'admin\FaqController');

    //Blogs
    Route::resource('blog', 'admin\BlogController');

    //Why Choose Us
    Route::resource('why_choose_us', 'admin\WhyChooseUsController');

    //Notifications
    Route::resource('notification', 'admin\NotificationController');

    // All Sizes
    Route::resource('sizes', 'admin\SizesController');

    // All Sizes
    Route::resource('variations', 'admin\VariationsController');

    //About Us
    Route::resource('about_us', 'admin\AboutUsController');

    //Collaborators
    Route::resource('collaborator', 'admin\CollaboratorController');

    //Catering
    Route::resource('catering_service', 'admin\CateringController');

    //careers
    Route::resource('careers', 'admin\CareerController');

    //Testimonial
    Route::resource('testimonial', 'admin\TestimonialController');

    //BallonEnquiry
    Route::resource('balloon_enquiry', 'admin\BalloonEnquiryController');
    Route::resource('perfect_gift_enquiry', 'admin\PerfectGiftEnquiryController');
    Route::resource('greetings_appreciation_enquiry', 'admin\GreetingsAppreciationEnquiryController')->only(['index', 'show']);
    Route::get('e_card_enquiry', [\App\Http\Controllers\admin\ECardEnquiryController::class, 'index'])->name('e_card_enquiry.index');
    Route::get('e_card_enquiry/{id}', [\App\Http\Controllers\admin\ECardEnquiryController::class, 'show'])->name('e_card_enquiry.show');
    Route::post('e_card_enquiry/{id}/update-status', [\App\Http\Controllers\admin\ECardEnquiryController::class, 'updateStatus'])->name('e_card_enquiry.update-status');
    Route::get('tango_enquiry', [\App\Http\Controllers\admin\TangoEnquiryController::class, 'index'])->name('tango_enquiry.index');
    Route::get('tango_enquiry/{id}', [\App\Http\Controllers\admin\TangoEnquiryController::class, 'show'])->name('tango_enquiry.show');
    Route::post('tango_enquiry/{id}/update-status', [\App\Http\Controllers\admin\TangoEnquiryController::class, 'updateStatus'])->name('tango_enquiry.update-status');
    Route::resource('tango_category', 'admin\TangoCategoryController');
    Route::resource('balloons_category', 'admin\BalloonsCategoryController');
    Route::resource('perfect_gift_category', 'admin\PerfectGiftCategoryController');
    Route::resource('e_card_category', 'admin\ECardCategoryController');
    Route::resource('custom_solution_service', 'admin\CustomSolutionServiceController');
    Route::resource('gusto_service', 'admin\GustoServiceController');

    //Enquires
    Route::resource('enquires-detail', 'admin\EnquiresController')->except(['index', 'create', 'edit', 'delete']);
    Route::get('enquires/{identifier}', [EnquiresController::class, 'allEnquires'])->name('enquires.show');

    //CareerCategory
    Route::resource('career_category', 'admin\CareerCategoryController');
    //CareerCategory
    Route::resource('business_card_categories', 'admin\BusinessCardCategoriesController');

    //Business Card Templates
    Route::resource('business_card_templates', 'admin\BusinessCardTemplateController');
    Route::post('business_card_templates/{businessCardTemplate}/toggle-active', 'admin\BusinessCardTemplateController@toggleActive')->name('business_card_templates.toggle_active');
    Route::post('business_card_templates/{businessCardTemplate}/duplicate', 'admin\BusinessCardTemplateController@duplicate')->name('business_card_templates.duplicate');

    //Business Card Options Management
    Route::resource('business-card-options', 'admin\BusinessCardOptionController');
    Route::post('business-card-options/{businessCardOption}/toggle-active', 'admin\BusinessCardOptionController@toggleActive')->name('business-card-options.toggle_active');
    Route::get('business-card-options/type/{type}', 'admin\BusinessCardOptionController@getByType')->name('business-card-options.by_type');

    Route::get('templates', [\App\Http\Controllers\admin\TemplatesController::class, 'index'])->name('templates.index');
    Route::get('templates/text-messages', function () { return redirect()->route('text-message-templates.index'); })->name('templates.text-messages');
    Route::get('templates/phone-scripts', function () { return redirect()->route('phone-script-templates.index'); })->name('templates.phone-scripts');
    Route::get('text-message-templates', [\App\Http\Controllers\admin\TextMessageTemplateController::class, 'index'])->name('text-message-templates.index');
    Route::get('phone-script-templates', [\App\Http\Controllers\admin\PhoneScriptTemplateController::class, 'index'])->name('phone-script-templates.index');
    Route::get('phone-script-templates/{day}', [\App\Http\Controllers\admin\PhoneScriptTemplateController::class, 'show'])->name('phone-script-templates.show');
    Route::get('text-message-templates/{day}', [\App\Http\Controllers\admin\TextMessageTemplateController::class, 'show'])->name('text-message-templates.show');
    Route::get('email-templates', [\App\Http\Controllers\admin\EmailTemplateController::class, 'index'])->name('email-templates.index');
    Route::get('email-templates/{day}', [\App\Http\Controllers\admin\EmailTemplateController::class, 'show'])->name('email-templates.show');

    /*  //Payment
    Route::resource('payment', 'PaymentController'); */
});

Route::post('/twilio/sms', [\App\Http\Controllers\SmsController::class, 'handleReply'])->name('twilio.sms');
Route::get('/twilio/voice/dial', [\App\Http\Controllers\SmsController::class, 'dialTwiml'])->name('twilio.voice.dial');




//DomPDF
Route::get('generate-invoice-pdf', array('as' => 'generate.invoice.pdf', 'uses' => 'PDFController@generateInvoicePDF'));

// User's E-Card Enquiries (Individual & Company dashboard)
Route::get('my-e-card-enquiries', [WebController::class, 'myEcardEnquiries'])->name('my-e-card-enquiries')->middleware('auth');
// Individual's Balloon Enquiries (own records only, no Action/Contacts)
Route::get('member/balloon-enquiries', [WebController::class, 'myBalloonEnquiries'])->name('member.balloon-enquiries')->middleware('auth');
// Individual's Perfect Gift Enquiries (own records only, no Action/Contacts)
Route::get('member/perfect-gift-enquiries', [WebController::class, 'myPerfectGiftEnquiries'])->name('member.perfect-gift-enquiries')->middleware('auth');
Route::get('member/business-card-orders', [WebController::class, 'myBusinessCardOrders'])->name('member.business-card-orders')->middleware('auth');
Route::get('member/quality-logo-enquiries', [WebController::class, 'myQualityLogoEnquiries'])->name('member.quality-logo-enquiries')->middleware('auth');
Route::get('member/journey-expert-enquiries', [WebController::class, 'myJourneyExpertEnquiries'])->name('member.journey-expert-enquiries')->middleware('auth');
Route::get('member/gusto-enquiries', [WebController::class, 'myGustoEnquiries'])->name('member.gusto-enquiries')->middleware('auth');

// Individual: Friends/Family Management
Route::get('member/friends-family', [App\Http\Controllers\FriendsFamilyController::class, 'index'])->name('member.friends_family.index')->middleware('auth');
Route::get('member/friends-family/create', [App\Http\Controllers\FriendsFamilyController::class, 'create'])->name('member.friends_family.create')->middleware('auth');
Route::post('member/friends-family', [App\Http\Controllers\FriendsFamilyController::class, 'store'])->name('member.friends_family.store')->middleware('auth');
Route::get('member/friends-family/{id}/edit', [App\Http\Controllers\FriendsFamilyController::class, 'edit'])->name('member.friends_family.edit')->middleware('auth');
Route::put('member/friends-family/{id}', [App\Http\Controllers\FriendsFamilyController::class, 'update'])->name('member.friends_family.update')->middleware('auth');
Route::delete('member/friends-family/{id}', [App\Http\Controllers\FriendsFamilyController::class, 'destroy'])->name('member.friends_family.destroy')->middleware('auth');
Route::get('member/friends-family/bulk-upload', [App\Http\Controllers\FriendsFamilyController::class, 'bulkUpload'])->name('member.friends_family.bulk-upload')->middleware('auth');
Route::get('member/friends-family-gifting', [App\Http\Controllers\FriendsFamilyController::class, 'giftingIndex'])->name('member.friends_family.gifting')->middleware('auth');
Route::get('member/friends-family/download-template', function () {
    $filePath = public_path('csvs/individual-gifting-csv.xlsx');
    if (!file_exists($filePath)) {
        abort(404, 'Template file not found.');
    }
    return response()->download($filePath, 'individual-gifting-csv.xlsx');
})->name('member.friends_family.download-template')->middleware('auth');
Route::post('member/friends-family/process-bulk-upload', [App\Http\Controllers\FriendsFamilyController::class, 'processBulkUpload'])->name('member.friends_family.process-bulk-upload')->middleware('auth');

// Individual: Friends/Family package upgrade (same flow as company package upgrade)
Route::get('member/package-upgrade', [App\Http\Controllers\IndividualPackageController::class, 'packageUpgrade'])->name('member.package-upgrade')->middleware('auth');
Route::post('member/package-upgrade/paypal', [App\Http\Controllers\IndividualPackageController::class, 'initPayPal'])->name('member.package-upgrade.paypal')->middleware('auth');
Route::post('member/package-upgrade/charge', [App\Http\Controllers\IndividualPackageController::class, 'charge'])->name('member.package-upgrade.charge')->middleware('auth');

// Company's own enquiries (same as Individual - read-only, filtered by company users)
Route::get('company/balloon-enquiries', [WebController::class, 'companyBalloonEnquiries'])->name('company.balloon-enquiries')->middleware('auth');
Route::get('company/perfect-gift-enquiries', [WebController::class, 'companyPerfectGiftEnquiries'])->name('company.perfect-gift-enquiries')->middleware('auth');
Route::get('company/business-card-orders', [WebController::class, 'companyBusinessCardOrders'])->name('company.business-card-orders')->middleware('auth');
Route::get('company/quality-logo-enquiries', [WebController::class, 'companyQualityLogoEnquiries'])->name('company.quality-logo-enquiries')->middleware('auth');
Route::get('company/journey-expert-enquiries', [WebController::class, 'companyJourneyExpertEnquiries'])->name('company.journey-expert-enquiries')->middleware('auth');
Route::get('company/gusto-enquiries', [WebController::class, 'companyGustoEnquiries'])->name('company.gusto-enquiries')->middleware('auth');

//order
Route::resource('order', 'OrderController');
Route::get('order-success', [OrderController::class, 'success'])->name('order.success');
Route::get('website.order-success', [OrderController::class, 'success'])->name('website.order-success');

//Newsletter
Route::resource('newsletter', 'NewsletterController');

//Billing-Address
Route::resource('billing_address', 'BillingAddressController');

//Business Cards
Route::get('business-cards', [App\Http\Controllers\BusinessCardController::class, 'index'])->name('business-cards.index');
Route::get('business-card-orders', [App\Http\Controllers\BusinessCardController::class, 'businessCardOrders'])->name('business-card.orders');
Route::get('business-card/{businessCard}', [App\Http\Controllers\BusinessCardController::class, 'businessCardShow'])->name('business-card-orders.ordersshow');
Route::get('business-cards/create', [App\Http\Controllers\BusinessCardController::class, 'create'])->name('business-cards.create');
Route::post('business-cards', [App\Http\Controllers\BusinessCardController::class, 'store'])->name('business-cards.store');
Route::get('business-cards/{businessCard}', [App\Http\Controllers\BusinessCardController::class, 'show'])->name('business-cards.show');
Route::get('business-cards/{businessCard}/edit', [App\Http\Controllers\BusinessCardController::class, 'edit'])->name('business-cards.edit');
Route::put('business-cards/{businessCard}', [App\Http\Controllers\BusinessCardController::class, 'update'])->name('business-cards.update');
Route::delete('business-cards/{businessCard}', [App\Http\Controllers\BusinessCardController::class, 'destroy'])->name('business-cards.destroy');
Route::post('business-cards/save-design', [App\Http\Controllers\BusinessCardController::class, 'saveDesign'])->name('business-cards.save-design');
Route::get('business-cards/{businessCard}/export/pdf', [App\Http\Controllers\BusinessCardController::class, 'exportPdf'])->name('business-cards.export.pdf');
Route::get('business-cards/{businessCard}/export/png', [App\Http\Controllers\BusinessCardController::class, 'exportPng'])->name('business-cards.export.png');
Route::get('business-cards/templates/{category}', [App\Http\Controllers\BusinessCardController::class, 'getTemplatesByCategory'])->name('business-cards.templates.category');
Route::get('business-cards/user/designs', [App\Http\Controllers\BusinessCardController::class, 'getUserDesigns'])->name('business-cards.user.designs');

//Business Cards Order System
Route::get('business-card-order', [App\Http\Controllers\BusinessCardOrderController::class, 'index'])->name('business-cards.order');
Route::post('business-card-order', [App\Http\Controllers\BusinessCardOrderController::class, 'store'])->name('business-cards.order.store');
Route::get('business-card-order/{order}', [App\Http\Controllers\BusinessCardOrderController::class, 'show'])->name('business-cards.order.show');
Route::get('business-card-order/{order}/pdf', [App\Http\Controllers\BusinessCardOrderController::class, 'downloadPdf'])->name('business-cards.order.pdf');
Route::post('business-cards/create-payment-intent', [App\Http\Controllers\BusinessCardOrderController::class, 'createPaymentIntent'])->name('business-cards.create-payment-intent');
Route::post('business-card-order/preview-file', [App\Http\Controllers\BusinessCardOrderController::class, 'previewFile'])->name('business-cards.preview-file');

//Shipping-Address
Route::resource('shipping_address', 'ShippingAddressController');

//Favorites
Route::get('favorite', [FavoriteController::class, 'favoriteList'])->name('favorite.list');
Route::get('favorite/{slug}', [FavoriteController::class, 'addToFavorite'])->name('favorite.store');
Route::get('remove-favorite/{slug}', [FavoriteController::class, 'removeFavorite'])->name('favorite.remove');

//Cart
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::get('cart-page', [WebController::class, 'cart'])->name('cart');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

Route::get('success_purchase', [CartController::class, 'successPurchase'])->name('success_purchase');
Route::get('failed_purchase', [CartController::class, 'failedPurchase'])->name('failed_purchase');
Route::get('ipn_success_purchase', [CartController::class, 'ipnSuccessPurchase'])->name('ipn_success_purchase');
Route::get('ipn_failed_purchase', [CartController::class, 'ipnFailedPurchase'])->name('ipn_failed_purchase');

Route::post('test-attempt', [CartController::class, 'testAttempt'])->name('test-attempt');

Route::get('/load-more-products', [WebController::class, 'loadMoreProducts'])->name('load.more.products');
Route::get('/load-more-category-products/{categoryId}', [WebController::class, 'loadMoreCategoryProducts'])->name('load.more.category.products');

Route::get('/load-more-careers', [WebController::class, 'loadMoreCareers'])->name('load.more.careers');
Route::get('/load-more-category-careers/{categoryId}', [WebController::class, 'loadMoreCategoryCareers'])->name('load.more.category.careers');

// Employee invitation acceptance (public route)
Route::get('employee/accept-invitation/{token}', 'EmployeeInvitationController@showAcceptForm')->name('employee.accept-invitation');
Route::post('employee/accept-invitation/{token}', 'EmployeeInvitationController@acceptInvitation')->name('employee.accept-invitation.store');

// Language switcher
Route::get('language/{locale}', [App\Http\Controllers\LanguageController::class, 'switchLang'])->name('language.switch');

Route::post('/send-inquiry', [WebController::class, 'send_inquiry'])->name('send.inquiry');
Route::post('/send-collaborate-quote', [WebController::class, 'sendCollaborateQuote'])->name('send.collaborate.quote');

// Notification routes for current user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/notifications/count', 'admin\NotificationController@getCount')->name('notifications.count');
    Route::get('/notifications/list', 'admin\NotificationController@getList')->name('notifications.list');
    Route::post('/notifications/{id}/mark-read', 'admin\NotificationController@markAsRead')->name('notifications.mark-read');
});
// Localized routes
Route::prefix('{locale?}')
    ->where(['locale' => '[a-zA-Z]{2}'])
    ->middleware('web')
    ->group(function () {
        // Your existing routes here
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        // Add other routes...
    });

// Admin translation routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/translations', [App\Http\Controllers\Admin\TranslationController::class, 'index'])->name('admin.translations.index');
    Route::post('/translations', [App\Http\Controllers\Admin\TranslationController::class, 'translate'])->name('admin.translations.translate');
    Route::get('/translations/manage', [App\Http\Controllers\Admin\TranslationController::class, 'manageTranslations'])->name('admin.translations.manage');
});

Route::get('/orders/{order}', [OrderController::class, 'show'])
    ->name('order.show')
    ->middleware('auth');

// Route::post('/checkout/tax', [OrderController::class, 'calculateTax'])->name('checkout.calculateTax');
Route::post('/calculate-tax', [OrderController::class, 'calculateTax'])->name('calculateTax');

Route::get('paypal/checkout', 'PaypalController@checkout')->name('paypal.checkout');
Route::get('paypal/complete', 'PaypalController@complete')->name('paypal.complete');
Route::get('paypal/cancel', 'PaypalController@cancel')->name('paypal.cancel');


// Route::get('/product/{slug}', [ProductController::class, 'show'])
//     ->name('product.show');

// Route::get('/test-mail', function () {

//     $details = [
//         'from'         => 'verify',
//         'title'        => 'Test Order Email with Images',
//         'body'         => 'this is testing',
//         'front_images' => ['business_cards/card_front1760757102.png'],
//         'back_images'  => ['business_cards/card_back1760757102.png'],
//         'regard' => 'We look forward to seeing you soon.',
//         'account_type' => 'Individual',
//     ];

//     Mail::to('test@gmail.com')->send(new \App\Mail\Email($details));

//     return '✅ Test mail sent! Check your inbox (or spam folder).';
// });

Route::get('/dev/email-preview', function () {

    return view('emails.verify-email', [
        'details' => [
            'title' => 'Hello John 👋',
            'body' => 'Thank you for joining our platform. We are excited to have you onboard.',
            'account_type' => 'premium',
            'verify_token' => 'dummy-token-123'
        ]
    ]);

});
