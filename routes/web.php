<?php

use App\Http\Controllers\Admin\TravellerController;
use App\Http\Controllers\Admin\DashboardController as DashboardControllerForAdmin;
use App\Http\Controllers\Admin\DynamicPageController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\LoginController as LoginControllerForAdmin;
use App\Http\Controllers\Admin\LogoutController as LogoutControllerForAdmin;
use App\Http\Controllers\Admin\ForgetPasswordController as ForgetPasswordControllerForAdmin;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageAboutController;
use App\Http\Controllers\Admin\PageBlogController;
use App\Http\Controllers\Admin\PageContactController;
use App\Http\Controllers\Admin\PageFaqController;
use App\Http\Controllers\Admin\PageHomeController;
use App\Http\Controllers\Admin\PageOtherController;
use App\Http\Controllers\Admin\PagePrivacyController;
use App\Http\Controllers\Admin\PageServiceController;
use App\Http\Controllers\Admin\PageTeamController;
use App\Http\Controllers\Admin\PageTestimonialController;
use App\Http\Controllers\Admin\PageDestinationController;
use App\Http\Controllers\Admin\PagePackageController;
use App\Http\Controllers\Admin\PageTermController;
use App\Http\Controllers\Admin\PhotoChangeController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ResetPasswordController as ResetPasswordControllerForAdmin;
use App\Http\Controllers\Admin\PasswordChangeController as PasswordChangeControllerForAdmin;
use App\Http\Controllers\Admin\ProfileChangeController as ProfileChangeControllerForAdmin;
use App\Http\Controllers\Admin\CategoryController as CategoryControllerForAdmin;
use App\Http\Controllers\Admin\BlogController as BlogControllerForAdmin;
use App\Http\Controllers\Admin\PackageController as PackageControllerForAdmin;
use App\Http\Controllers\Admin\ServiceController as ServiceControllerForAdmin;
use App\Http\Controllers\Admin\SocialMediaItemController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TeamMemberController as TeamMemberControllerForAdmin;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SpotlightController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FaqController as FaqControllerForAdmin;
use App\Http\Controllers\Admin\OrderController as OrderControllerForAdmin;
use App\Http\Controllers\Admin\ReviewController as ReviewController;
use App\Http\Controllers\Admin\TopNotificationController as TopNotificationController;

use App\Http\Controllers\Traveller\CheckoutController;
use App\Http\Controllers\Traveller\DashboardController as DashboardControllerForTraveller;
use App\Http\Controllers\Traveller\ForgetPasswordController as ForgetPasswordControllerForTraveller;
use App\Http\Controllers\Traveller\LoginController as LoginControllerForTraveller;
use App\Http\Controllers\Traveller\LogoutController as LogoutControllerForTraveller;
use App\Http\Controllers\Traveller\OrderController as OrderControllerForTraveller;
use App\Http\Controllers\Traveller\PasswordChangeController as PasswordChangeControllerForTraveller;
use App\Http\Controllers\Traveller\ProfileChangeController as ProfileChangeControllerForTraveller;
use App\Http\Controllers\Traveller\RegistrationController;
use App\Http\Controllers\Traveller\ResetPasswordController as ResetPasswordControllerForTraveller;

use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\DestinationController as DestinationControllerForFront;
use App\Http\Controllers\Front\PackageController as PackageControllerForFront;
use App\Http\Controllers\Front\BlogController as BlogControllerForFront;
use App\Http\Controllers\Front\CategoryController as CategoryControllerForFront;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\FaqController as FaqControllerForFront;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Front\ServiceController as ServiceControllerForFront;
use App\Http\Controllers\Front\SubscriptionController;
use App\Http\Controllers\Front\TeamMemberController as TeamMemberControllerForFront;
use App\Http\Controllers\Front\TermController;
use App\Http\Controllers\Front\TestimonialController as TestimonialControllerForFront;

use Illuminate\Support\Facades\Route;

/* --------------------------------------- */
/* Front End */
/* --------------------------------------- */
Route::get('/', [HomeController::class,'index']);
Route::get('about', [AboutController::class,'index'])->name('front.about');
Route::get('destination', [DestinationControllerForFront::class,'index'])->name('front.destination');
Route::get('destination/{slug}', [DestinationControllerForFront::class,'detail']);

Route::get('package', [PackageControllerForFront::class,'index'])->name('front.package');
Route::get('package/{slug}', [PackageControllerForFront::class,'detail'])->name('front.package_detail');
Route::post('package/store/list', [PackageControllerForFront::class,'store_list'])->name('front.package_store_list');
Route::get('package/store/list', [PackageControllerForFront::class,'store_list']);

Route::get('testimonial', [TestimonialControllerForFront::class,'index'])->name('front.testimonial');
Route::get('services', [ServiceControllerForFront::class,'index'])->name('front.services');
Route::get('service/{slug}', [ServiceControllerForFront::class,'detail']);
Route::get('blog', [BlogControllerForFront::class,'index'])->name('front.blogs');
Route::get('blog/{slug}', [BlogControllerForFront::class,'detail'])->name('front.blog_detail');
Route::get('category/{slug}', [CategoryControllerForFront::class,'detail']);
Route::post('search', [SearchController::class,'index']);
Route::get('search', function() {abort(404);});
Route::get('faq', [FaqControllerForFront::class,'index'])->name('front.faq');
Route::get('team-members', [TeamMemberControllerForFront::class,'index'])->name('front.team_members');
Route::get('team-member/{slug}', [TeamMemberControllerForFront::class,'detail']);
Route::get('page/{slug}', [PageController::class,'detail']);
Route::get('contact', [ContactController::class,'index'])->name('front.contact');
Route::post('contact/store', [ContactController::class,'send_email'])->name('front.contact_form');
Route::post('subscription', [SubscriptionController::class,'index'])->name('front.subscription');
Route::get('subscriber/verify/{token}/{email}', [SubscriptionController::class,'verify']);
Route::get('terms-and-conditions', [TermController::class,'index'])->name('front.term');
Route::get('privacy-policy', [PrivacyController::class,'index'])->name('front.privacy');


/* --------------------------------------- */
/* Traveller Login and profile management */
/* --------------------------------------- */
Route::get('traveller/login', [LoginControllerForTraveller::class,'index'])->name('traveller.login');
Route::post('traveller/login/store', [LoginControllerForTraveller::class,'store'])->name('traveller.login.store');
Route::post('traveller/checkout/login/store', [CheckoutController::class,'login'])->name('traveller.login_from_checkout_page.store');
Route::get('traveller/logout', [LogoutControllerForTraveller::class,'index'])->name('traveller.logout');
Route::get('traveller/register', [RegistrationController::class,'index'])->name('traveller.registration');
Route::post('traveller/registration/store', [RegistrationController::class,'store'])->name('traveller.registration.store');
Route::get('traveller/dashboard', [DashboardControllerForTraveller::class,'index'])->name('traveller.dashboard');
Route::get('traveller/registration/verify/{token}/{email}', [RegistrationController::class,'verify']);
Route::get('traveller/forget-password', [ForgetPasswordControllerForTraveller::class,'index'])->name('traveller.forget_password');
Route::post('traveller/forget-password/store', [ForgetPasswordControllerForTraveller::class,'store'])->name('traveller.forget_password.store');
Route::get('traveller/reset-password/{token}/{email}', [ResetPasswordControllerForTraveller::class,'index']);
Route::post('traveller/reset-password/update', [ResetPasswordControllerForTraveller::class,'update']);
Route::get('traveller/password-change', [PasswordChangeControllerForTraveller::class,'index'])->name('traveller.password_change');
Route::post('traveller/password-change/update', [PasswordChangeControllerForTraveller::class,'update']);
Route::get('traveller/profile-change', [ProfileChangeControllerForTraveller::class,'index'])->name('traveller.profile_change');
Route::post('traveller/profile-change/update', [ProfileChangeControllerForTraveller::class,'update']);
Route::get('traveller/order', [OrderControllerForTraveller::class,'index'])->name('traveller.order');
Route::get('traveller/detail/{id}', [OrderControllerForTraveller::class,'detail']);

Route::get('traveller/payment', [CheckoutController::class,'payment'])->name('traveller.payment');
Route::post('traveller/payment/stripe', [CheckoutController::class,'stripe'])->name('traveller.stripe');
Route::get('traveller/execute-payment', [CheckoutController::class,'paypal']);


/* --------------------------------------- */
/* Admin Login and profile management */
/* --------------------------------------- */
Route::get('admin/dashboard', [DashboardControllerForAdmin::class,'index'])->name('admin.dashboard');
Route::get('admin', function () {return redirect('admin/login');});
Route::get('admin/login', [LoginControllerForAdmin::class,'index'])->name('admin.login');
Route::post('admin/login/store', [LoginControllerForAdmin::class,'store'])->name('admin.login.store');
Route::get('admin/logout', [LogoutControllerForAdmin::class,'index'])->name('admin.logout');
Route::get('admin/forget-password', [ForgetPasswordControllerForAdmin::class,'index'])->name('admin.forget_password');
Route::post('admin/forget-password/store', [ForgetPasswordControllerForAdmin::class,'store'])->name('admin.forget_password.store');
Route::get('admin/reset-password/{token}/{email}', [ResetPasswordControllerForAdmin::class,'index']);
Route::post('admin/reset-password/update', [ResetPasswordControllerForAdmin::class,'update']);
Route::get('admin/password-change', [PasswordChangeControllerForAdmin::class,'index'])->name('admin.password_change');
Route::post('admin/password-change/update', [PasswordChangeControllerForAdmin::class,'update']);
Route::get('admin/profile-change', [ProfileChangeControllerForAdmin::class,'index'])->name('admin.profile_change');
Route::post('admin/profile-change/update', [ProfileChangeControllerForAdmin::class,'update']);
Route::get('admin/photo-change', [PhotoChangeController::class,'index'])->name('admin.photo_change');
Route::post('admin/photo-change/update', [PhotoChangeController::class,'update']);



/* --------------------------------------- */
/* Payment - Admin */
/* --------------------------------------- */
Route::get('admin/payment/view', [GeneralSettingController::class,'payment_edit'])->name('admin.payment');
Route::post('admin/payment/update', [GeneralSettingController::class,'payment_update']);
Route::get('admin/currency/view', [GeneralSettingController::class,'currency_edit'])->name('admin.currency');
Route::post('admin/currency/update', [GeneralSettingController::class,'currency_update']);


/* --------------------------------------- */
/* Category - Admin */
/* --------------------------------------- */
Route::get('admin/category/view', [CategoryControllerForAdmin::class,'index'])->name('admin.category.index');
Route::get('admin/category/create', [CategoryControllerForAdmin::class,'create'])->name('admin.category.create');
Route::post('admin/category/store', [CategoryControllerForAdmin::class,'store'])->name('admin.category.store');
Route::get('admin/category/delete/{id}', [CategoryControllerForAdmin::class,'destroy']);
Route::get('admin/category/edit/{id}', [CategoryControllerForAdmin::class,'edit']);
Route::post('admin/category/update/{id}', [CategoryControllerForAdmin::class,'update']);


/* --------------------------------------- */
/* Blog - Admin */
/* --------------------------------------- */
Route::get('admin/blog/view', [BlogControllerForAdmin::class,'index'])->name('admin.blog.index');
Route::get('admin/blog/create', [BlogControllerForAdmin::class,'create'])->name('admin.blog.create');
Route::post('admin/blog/store', [BlogControllerForAdmin::class,'store'])->name('admin.blog.store');
Route::get('admin/blog/delete/{id}', [BlogControllerForAdmin::class,'destroy']);
Route::get('admin/blog/edit/{id}', [BlogControllerForAdmin::class,'edit']);
Route::post('admin/blog/update/{id}', [BlogControllerForAdmin::class,'update']);


/* --------------------------------------- */
/* Slider - Admin */
/* --------------------------------------- */
Route::get('admin/slider/view', [SliderController::class,'index'])->name('admin.slider.index');
Route::get('admin/slider/create', [SliderController::class,'create'])->name('admin.slider.create');
Route::post('admin/slider/store', [SliderController::class,'store'])->name('admin.slider.store');
Route::get('admin/slider/delete/{id}', [SliderController::class,'destroy']);
Route::get('admin/slider/edit/{id}', [SliderController::class,'edit']);
Route::post('admin/slider/update/{id}', [SliderController::class,'update']);

/* --------------------------------------- */
/* Spotlight - Admin */
/* --------------------------------------- */
Route::get('admin/spotlight/view', [SpotlightController::class,'index'])->name('admin.spotlight.index');
Route::post('admin/spotlight/store', [SpotlightController::class,'store'])->name('admin.spotlight.store');

/* --------------------------------------- */
/* Logo - Admin */
/* --------------------------------------- */
Route::get('admin/setting/general/logo/edit', [GeneralSettingController::class,'logo_edit'])->name('admin.general_setting.logo');
Route::post('admin/setting/general/logo/update', [GeneralSettingController::class,'logo_update']);


/* --------------------------------------- */
/* Favicon - Admin */
/* --------------------------------------- */
Route::get('admin/setting/general/favicon/edit', [GeneralSettingController::class,'favicon_edit'])->name('admin.general_setting.favicon');
Route::post('admin/setting/general/favicon/update', [GeneralSettingController::class,'favicon_update']);


/* --------------------------------------- */
/* Login Background - Admin */
/* --------------------------------------- */
Route::get('admin/setting/general/loginbg/edit', [GeneralSettingController::class,'loginbg_edit'])->name('admin.general_setting.loginbg');
Route::post('admin/setting/general/loginbg/update', [GeneralSettingController::class,'loginbg_update']);


/* --------------------------------------- */
/* TopBar - Admin */
/* --------------------------------------- */
Route::get('admin/setting/general/topbar/edit', [GeneralSettingController::class,'topbar_edit'])->name('admin.general_setting.topbar');
Route::post('admin/setting/general/topbar/update', [GeneralSettingController::class,'topbar_update']);


/* --------------------------------------- */
/* Banner - Admin */
/* --------------------------------------- */
Route::get('admin/setting/general/banner/edit', [GeneralSettingController::class,'banner_edit'])->name('admin.general_setting.banner');
Route::post('admin/setting/general/banner/update', [GeneralSettingController::class,'banner_update']);


/* --------------------------------------- */
/* Footer - Admin */
/* --------------------------------------- */
Route::get('admin/setting/general/footer/edit', [GeneralSettingController::class,'footer_edit'])->name('admin.general_setting.footer');
Route::post('admin/setting/general/footer/update', [GeneralSettingController::class,'footer_update']);


/* --------------------------------------- */
/* Sidebar - Admin */
/* --------------------------------------- */
Route::get('admin/setting/general/sidebar/edit', [GeneralSettingController::class,'sidebar_edit'])->name('admin.general_setting.sidebar');
Route::post('admin/setting/general/sidebar/update', [GeneralSettingController::class,'sidebar_update']);


/* --------------------------------------- */
/* Color - Admin */
/* --------------------------------------- */
Route::get('admin/setting/general/color/edit', [GeneralSettingController::class,'color_edit'])->name('admin.general_setting.color');
Route::post('admin/setting/general/color/update', [GeneralSettingController::class,'color_update']);


/* --------------------------------------- */
/* Preloader - Admin */
/* --------------------------------------- */
Route::get('admin/setting/general/preloader/edit', [GeneralSettingController::class,'preloader_edit'])->name('admin.general_setting.preloader');
Route::post('admin/setting/general/preloader/update', [GeneralSettingController::class,'preloader_update']);


/* --------------------------------------- */
/* Sticky Header - Admin */
/* --------------------------------------- */
Route::get('admin/setting/general/stickyheader/edit', [GeneralSettingController::class,'stickyheader_edit'])->name('admin.general_setting.stickyheader');
Route::post('admin/setting/general/stickyheader/update', [GeneralSettingController::class,'stickyheader_update']);


/* --------------------------------------- */
/* Google Analytic - Admin */
/* --------------------------------------- */
Route::get('admin/setting/general/googleanalytic/edit', [GeneralSettingController::class,'googleanalytic_edit'])->name('admin.general_setting.googleanalytic');
Route::post('admin/setting/general/googleanalytic/update', [GeneralSettingController::class,'googleanalytic_update']);


/* --------------------------------------- */
/* Google Recaptcha - Admin */
/* --------------------------------------- */
Route::get('admin/setting/general/googlerecaptcha/edit', [GeneralSettingController::class,'googlerecaptcha_edit'])->name('admin.general_setting.googlerecaptcha');
Route::post('admin/setting/general/googlerecaptcha/update', [GeneralSettingController::class,'googlerecaptcha_update']);


/* --------------------------------------- */
/* Tawk Live Chat - Admin */
/* --------------------------------------- */
Route::get('admin/setting/general/tawklivechat/edit', [GeneralSettingController::class,'tawklivechat_edit'])->name('admin.general_setting.tawklivechat');
Route::post('admin/setting/general/tawklivechat/update', [GeneralSettingController::class,'tawklivechat_update']);


/* --------------------------------------- */
/* Layout - Admin */
/* --------------------------------------- */
Route::get('admin/setting/general/layout/edit', [GeneralSettingController::class,'layout_edit'])->name('admin.general_setting.layout');
Route::post('admin/setting/general/layout/update', [GeneralSettingController::class,'layout_update']);


/* --------------------------------------- */
/* Cookie Consent - Admin */
/* --------------------------------------- */
Route::get('admin/setting/general/cookieconsent/edit', [GeneralSettingController::class,'cookieconsent_edit'])->name('admin.general_setting.cookieconsent');
Route::post('admin/setting/general/cookieconsent/update', [GeneralSettingController::class,'cookieconsent_update']);


/* --------------------------------------- */
/* Page Settings - Admin */
/* --------------------------------------- */
Route::group(['prefix'=>'admin/page_home_update'], function() {

    Route::get('/edit', [PageHomeController::class,'edit'])->name('admin.page_home.edit');
    Route::post('/meta', [PageHomeController::class,'update_meta']);
    Route::post('/service', [PageHomeController::class,'update_service']);
    Route::post('/package', [PageHomeController::class,'update_featured_package']);
    Route::post('/counter', [PageHomeController::class,'update_counter']);
    Route::post('/destination', [PageHomeController::class,'update_destination']);
    Route::post('/testimonial', [PageHomeController::class,'update_testimonial']);
    Route::post('/team', [PageHomeController::class,'update_team']);
    Route::post('/blog', [PageHomeController::class,'update_blog']);
    Route::post('/client', [PageHomeController::class,'update_client']);
    Route::post('/newsletter', [PageHomeController::class,'update_newsletter']);
});

Route::group(['prefix'=>'admin/page'], function() {
    Route::get('/about/edit', [PageAboutController::class,'edit'])->name('admin.page_about.edit');
    Route::post('/about/update', [PageAboutController::class,'update']);

    Route::get('/service/edit', [PageServiceController::class,'edit'])->name('admin.page_service.edit');
    Route::post('/service/update', [PageServiceController::class,'update']);

    Route::get('/blog/edit', [PageBlogController::class,'edit'])->name('admin.page_blog.edit');
    Route::post('/blog/update', [PageBlogController::class,'update']);

    Route::get('/faq/edit', [PageFaqController::class,'edit'])->name('admin.page_faq.edit');
    Route::post('/faq/update', [PageFaqController::class,'update']);

    Route::get('/team/edit', [PageTeamController::class,'edit'])->name('admin.page_team.edit');
    Route::post('/team/update', [PageTeamController::class,'update']);

    Route::get('/testimonial/edit', [PageTestimonialController::class,'edit'])->name('admin.page_testimonial.edit');
    Route::post('/testimonial/update', [PageTestimonialController::class,'update']);

    Route::get('/destination/edit', [PageDestinationController::class,'edit'])->name('admin.page_destination.edit');
    Route::post('/destination/update', [PageDestinationController::class,'update']);

    Route::get('/package/edit', [PagePackageController::class,'edit'])->name('admin.page_package.edit');
    Route::post('/package/update', [PagePackageController::class,'update']);

        
    Route::get('/contact/edit', [PageContactController::class,'edit'])->name('admin.page_contact.edit');
    Route::post('/contact/update', [PageContactController::class,'update']);


    Route::get('/term/edit', [PageTermController::class,'edit'])->name('admin.page_term.edit');
    Route::post('/term/update', [PageTermController::class,'update']);

    Route::get('/privacy/edit', [PagePrivacyController::class,'edit'])->name('admin.page_privacy.edit');
    Route::post('/privacy/update', [PagePrivacyController::class,'update']);
});

Route::group(['prefix'=>'admin/page/other'], function() {
    Route::get('/edit', [PageOtherController::class,'edit'])->name('admin.page_other.edit');
    Route::post('/1', [PageOtherController::class,'update1']);
    Route::post('/2', [PageOtherController::class,'update2']);
    Route::post('/3', [PageOtherController::class,'update3']);
    Route::post('/4', [PageOtherController::class,'update4']);
    Route::post('/5', [PageOtherController::class,'update5']);
    Route::post('/6', [PageOtherController::class,'update6']);
    Route::post('/7', [PageOtherController::class,'update7']);
    Route::post('/8', [PageOtherController::class,'update8']);
});



/* --------------------------------------- */
/* Destinations - Admin */
/* --------------------------------------- */
Route::get('admin/destination/view', [DestinationController::class,'index'])->name('admin.destination.index');
Route::get('admin/destination/create', [DestinationController::class,'create'])->name('admin.destination.create');
Route::post('admin/destination/store', [DestinationController::class,'store'])->name('admin.destination.store');
Route::get('admin/destination/delete/{id}', [DestinationController::class,'destroy']);
Route::get('admin/destination/edit/{id}', [DestinationController::class,'edit']);
Route::post('admin/destination/update/{id}', [DestinationController::class,'update']);



/* --------------------------------------- */
/* Dynamic Pages - Admin */
/* --------------------------------------- */
Route::get('admin/dynamic-page/view', [DynamicPageController::class,'index'])->name('admin.dynamic_page.index');
Route::get('admin/dynamic-page/create', [DynamicPageController::class,'create'])->name('admin.dynamic_page.create');
Route::post('admin/dynamic-page/store', [DynamicPageController::class,'store'])->name('admin.dynamic_page.store');
Route::get('admin/dynamic-page/delete/{id}', [DynamicPageController::class,'destroy']);
Route::get('admin/dynamic-page/edit/{id}', [DynamicPageController::class,'edit']);
Route::post('admin/dynamic-page/update/{id}', [DynamicPageController::class,'update']);


/* --------------------------------------- */
/* Language - Admin */
/* --------------------------------------- */
Route::get('admin/language/view', [LanguageController::class,'index'])->name('admin.language.index');
Route::post('admin/language/update', [LanguageController::class,'update'])->name('admin.language.update');


/* --------------------------------------- */
/* Package - Admin */
/* --------------------------------------- */
Route::get('admin/package/view', [PackageControllerForAdmin::class,'index'])->name('admin.package.index');
Route::get('admin/package/create', [PackageControllerForAdmin::class,'create'])->name('admin.package.create');
Route::post('admin/package/store', [PackageControllerForAdmin::class,'store'])->name('admin.package.store');
Route::get('admin/package/delete/{id}', [PackageControllerForAdmin::class,'destroy']);
Route::get('admin/package/edit/{id}', [PackageControllerForAdmin::class,'edit']);
Route::post('admin/package/update/{id}', [PackageControllerForAdmin::class,'update']);
Route::get('admin/package/photo/{id}', [PackageControllerForAdmin::class,'photo']);
Route::post('admin/package/photo-store', [PackageControllerForAdmin::class,'photostore'])->name('admin.package.photo-store');
Route::get('admin/package/photo-delete/{id}', [PackageControllerForAdmin::class,'photodelete']);
Route::get('admin/package/schedule/{id}', [PackageControllerForAdmin::class,'schedule']);
Route::post('admin/package/schedule-store', [PackageControllerForAdmin::class,'schedulestore'])->name('admin.package.schedule-store');
Route::get('admin/package/schedule-delete/{id}', [PackageControllerForAdmin::class,'scheduledelete']);

Route::get('admin/package/itinerary/{id}', [PackageControllerForAdmin::class,'itinerary']);
Route::post('admin/package/itinerary-store', [PackageControllerForAdmin::class,'itinerarystore'])->name('admin.package.itineray-store');
Route::get('admin/package/itinerary-delete/{id}', [PackageControllerForAdmin::class,'itinerarydelete']);

Route::get('admin/package/video/{id}', [PackageControllerForAdmin::class,'video']);
Route::post('admin/package/video-store', [PackageControllerForAdmin::class,'videostore'])->name('admin.package.video-store');
Route::get('admin/package/video-delete/{id}', [PackageControllerForAdmin::class,'videodelete']);



/* --------------------------------------- */
/* Client - Admin */
/* --------------------------------------- */
Route::get('admin/client/view', [ClientController::class,'index'])->name('admin.client.index');
Route::get('admin/client/create', [ClientController::class,'create'])->name('admin.client.create');
Route::post('admin/client/store', [ClientController::class,'store'])->name('admin.client.store');
Route::get('admin/client/delete/{id}', [ClientController::class,'destroy']);
Route::get('admin/client/edit/{id}', [ClientController::class,'edit']);
Route::post('admin/client/update/{id}', [ClientController::class,'update']);



/* --------------------------------------- */
/* Service - Admin */
/* --------------------------------------- */
Route::get('admin/service/view', [ServiceControllerForAdmin::class,'index'])->name('admin.service.index');
Route::get('admin/service/create', [ServiceControllerForAdmin::class,'create'])->name('admin.service.create');
Route::post('admin/service/store', [ServiceControllerForAdmin::class,'store'])->name('admin.service.store');
Route::get('admin/service/delete/{id}', [ServiceControllerForAdmin::class,'destroy']);
Route::get('admin/service/edit/{id}', [ServiceControllerForAdmin::class,'edit']);
Route::post('admin/service/update/{id}', [ServiceControllerForAdmin::class,'update']);


/* --------------------------------------- */
/* Testimonial - Admin */
/* --------------------------------------- */
Route::get('admin/testimonial/view', [TestimonialController::class,'index'])->name('admin.testimonial.index');
Route::get('admin/testimonial/create', [TestimonialController::class,'create'])->name('admin.testimonial.create');
Route::post('admin/testimonial/store', [TestimonialController::class,'store'])->name('admin.testimonial.store');
Route::get('admin/testimonial/delete/{id}', [TestimonialController::class,'destroy']);
Route::get('admin/testimonial/edit/{id}', [TestimonialController::class,'edit']);
Route::post('admin/testimonial/update/{id}', [TestimonialController::class,'update']);


/* --------------------------------------- */
/* Team Member - Admin */
/* --------------------------------------- */
Route::get('admin/team-member/view', [TeamMemberControllerForAdmin::class,'index'])->name('admin.team_member.index');
Route::get('admin/team-member/create', [TeamMemberControllerForAdmin::class,'create'])->name('admin.team_member.create');
Route::post('admin/team-member/store', [TeamMemberControllerForAdmin::class,'store'])->name('admin.team_member.store');
Route::get('admin/team-member/delete/{id}', [TeamMemberControllerForAdmin::class,'destroy']);
Route::get('admin/team-member/edit/{id}', [TeamMemberControllerForAdmin::class,'edit']);
Route::post('admin/team-member/update/{id}', [TeamMemberControllerForAdmin::class,'update']);


/* --------------------------------------- */
/* FAQ - Admin */
/* --------------------------------------- */
Route::get('admin/faq/view', [FaqControllerForAdmin::class,'index'])->name('admin.faq.index');
Route::get('admin/faq/create', [FaqControllerForAdmin::class,'create'])->name('admin.faq.create');
Route::post('admin/faq/store', [FaqControllerForAdmin::class,'store'])->name('admin.faq.store');
Route::get('admin/faq/delete/{id}', [FaqControllerForAdmin::class,'destroy']);
Route::get('admin/faq/edit/{id}', [FaqControllerForAdmin::class,'edit']);
Route::post('admin/faq/update/{id}', [FaqControllerForAdmin::class,'update']);


/* --------------------------------------- */
/* Email Template - Admin */
/* --------------------------------------- */
Route::get('admin/email-template/view', [EmailTemplateController::class,'index'])->name('admin.email_template.index');
Route::get('admin/email-template/edit/{id}', [EmailTemplateController::class,'edit']);
Route::post('admin/email-template/update/{id}', [EmailTemplateController::class,'update']);


/* --------------------------------------- */
/* Social Media - Admin */
/* --------------------------------------- */
Route::get('admin/social-media/view', [SocialMediaItemController::class,'index'])->name('admin.social_media.index');
Route::get('admin/social-media/create', [SocialMediaItemController::class,'create'])->name('admin.social_media.create');
Route::post('admin/social-media/store', [SocialMediaItemController::class,'store'])->name('admin.social_media.store');
Route::get('admin/social-media/delete/{id}', [SocialMediaItemController::class,'destroy']);
Route::get('admin/social-media/edit/{id}', [SocialMediaItemController::class,'edit']);
Route::post('admin/social-media/update/{id}', [SocialMediaItemController::class,'update']);


/* --------------------------------------- */
/* Subscriber - Admin */
/* --------------------------------------- */
Route::get('admin/subscriber/view', [SubscriberController::class,'index'])->name('admin.subscriber.index');
Route::get('admin/subscriber/create', [SubscriberController::class,'create'])->name('admin.subscriber.create');
Route::post('admin/subscriber/store', [SubscriberController::class,'store'])->name('admin.subscriber.store');
Route::get('admin/subscriber/delete/{id}', [SubscriberController::class,'destroy']);
Route::get('admin/subscriber/send-email', [SubscriberController::class,'send_email'])->name('admin.subscriber.send_email');
Route::post('admin/subscriber/send-email-action', [SubscriberController::class,'send_email_action'])->name('admin.subscriber.send_email_action');



/* --------------------------------------- */
/* Order - Admin */
/* --------------------------------------- */
Route::get('admin/order/view', [OrderControllerForAdmin::class,'index'])->name('admin.order.index');
Route::get('admin/order/create', [OrderControllerForAdmin::class,'create'])->name('admin.order.create');
Route::post('admin/order/store', [OrderControllerForAdmin::class,'store'])->name('admin.order.store');
Route::get('admin/order/detail/{id}', [OrderControllerForAdmin::class,'detail']);
Route::get('admin/order/invoice/{id}', [OrderControllerForAdmin::class,'invoice']);
Route::get('admin/order/delete/{id}', [OrderControllerForAdmin::class,'destroy']);


/* --------------------------------------- */
/* Traveller - Admin */
/* --------------------------------------- */
Route::get('admin/traveller/view', [TravellerController::class,'index'])->name('admin.traveller.index');
Route::get('admin/traveller/detail/{id}', [TravellerController::class,'detail']);
Route::get('admin/traveller/make-active/{id}', [TravellerController::class,'make_active']);
Route::get('admin/traveller/make-pending/{id}', [TravellerController::class,'make_pending']);
Route::get('admin/traveller/delete/{id}', [TravellerController::class,'destroy']);


/* --------------------------------------- */
/* Menu - Admin */
/* --------------------------------------- */
Route::get('admin/menu/view', [MenuController::class,'index'])->name('admin.menu.index');
Route::post('admin/menu/update', [MenuController::class,'update']);


/* --------------------------------------- */
/* Review - Admin */
/* --------------------------------------- */
Route::get('admin/review/view', [ReviewController::class,'index'])->name('admin.review.index');
Route::get('admin/review/status/{id}', [ReviewController::class,'updateStatus'])->name('admin.review.status');
Route::get('admin/review/delete/{id}', [ReviewController::class,'destroy']);

/* --------------------------------------- */
/* Notification - Admin */
/* --------------------------------------- */
Route::get('admin/top-notification/view', [TopNotificationController::class,'index'])->name('admin.notification.index');
Route::post('admin/top-notification/store', [TopNotificationController::class,'store'])->name('admin.notification.store');