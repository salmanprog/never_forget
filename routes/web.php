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
Route::get('/route-clear', function() {
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    $cache = 'Route cache cleared <br /> View cache cleared <br /> Cache cleared <br /> Config cleared <br /> Config cache cleared';
    return $cache;
});


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
Route::get('/member/profile/edit', 'admin\UserController@IndividualEditProfile')->name('member.profile.edit');
Route::post('/member/profile/update', 'admin\UserController@IndividualUpdateProfile')->name('member.profile.update');
Route::post('/user/profile/update', 'admin\UserController@IndividualUpdateProfile')->name('user.profile.update');
Route::post('/admin/profile/update', 'admin\AdminController@updateProfile')->name('admin.profile.update');
Route::post('admin/logout', 'admin\AdminController@logOut')->name('admin.logout');


//Frontend

Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('get_states', [WebController::class, 'getStates'])->name('get_states'); 
Route::get('about-us', [WebController::class, 'aboutUs'])->name('about-us');
Route::get('shop', [WebController::class, 'shop'])->name('shop');
Route::get('how-it-works', [WebController::class, 'howItWorks'])->name('how-it-works');
Route::get('corporate-solutions', [WebController::class, 'corporateSolutions'])->name('corporate-solutions');
Route::get('testimonials', [WebController::class, 'testimonials'])->name('testimonials');
Route::get('blogs', [WebController::class, 'blogs'])->name('blogs');
Route::get('contact-us', [WebController::class, 'contactus'])->name('contact-us');
Route::get('faqs', [WebController::class, 'faqs'])->name('faqs');
Route::get('why-choose-us', [WebController::class, 'whyChooseUs'])->name('why-choose-us');
Route::get('career', [WebController::class, 'Career'])->name('career');
Route::get('disclaimer', [WebController::class, 'disclaimer'])->name('disclaimer');
Route::get('cookie-policy', [WebController::class, 'cookiePolicy'])->name('cookie-policy');
Route::get('privacy-policy', [WebController::class, 'privacyPolicy'])->name('privacy-policy');


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

Route::get('variations-show',[VariationsController::class, 'show'])->name('variations.show');

Route::POST('get_sub_style', [VariationsController::class, 'getSubStyle'])->name('get_sub_style');
Route::POST('get_sub_category', [ProductController::class, 'getSubCategory'])->name('get_sub_category');

Route::get('/careers/apply', [App\Http\Controllers\WebController::class, 'careerApplicationForm'])->name('careers.apply.form');
Route::post('/careers/apply', [App\Http\Controllers\admin\CareerController::class, 'applyCareer'])->name('careers.apply');
Route::get('/careers/applications', [App\Http\Controllers\admin\CareerController::class, 'applications'])->name('careers.applications');
Route::get('/careers/{id}/applications', [App\Http\Controllers\admin\CareerController::class, 'careerApplications'])->name('careers.applications.view');
Route::post('/careers/applications/{id}/respond', [App\Http\Controllers\admin\CareerController::class, 'respondToApplication'])->name('careers.applications.respond');


Route::group(['middleware' => ['auth']], function() {
    //Roles
    Route::resource('role', 'admin\RoleController');

    //users
    Route::resource('user', 'admin\UserController');

    // Company Employee Management Routes
    Route::prefix('company')->name('company.')->group(function() {
        Route::resource('employees', 'CompanyEmployeeController');
        Route::get('employees/bulk-upload', 'CompanyEmployeeController@bulkUpload')->name('employees.bulk-upload');
        Route::post('employees/process-bulk-upload', 'CompanyEmployeeController@processBulkUpload')->name('employees.process-bulk-upload');
        Route::get('employees/download-template', 'CompanyEmployeeController@downloadTemplate')->name('employees.download-template');
        Route::post('employees/{id}/resend-invitation', 'CompanyEmployeeController@resendInvitation')->name('employees.resend-invitation');
    });

    // MTS Dashboard Routes
    Route::resource('mts-dashboard', 'admin\MTSDashboardController');

    //permissions
    Route::resource('permission', 'admin\PermissionController');

    //pages settings
    Route::resource('page', 'admin\PageController');
    Route::resource('page_setting', 'admin\PageSettingController');

    //Products
    Route::resource('product', 'admin\ProductController');

    //Category
    Route::resource('category', 'admin\CategoryController');
	
	//Coupon
    Route::resource('coupon', 'admin\CouponController');
	
	//Faqs
    Route::resource('faq', 'admin\FaqController');

    //Why Choose Us
    Route::resource('why_choose_us', 'admin\WhyChooseUsController');

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


   /*  //Payment
    Route::resource('payment', 'PaymentController'); */
});

//DomPDF
Route::get('generate-invoice-pdf', array('as'=> 'generate.invoice.pdf', 'uses' => 'PDFController@generateInvoicePDF'));

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
