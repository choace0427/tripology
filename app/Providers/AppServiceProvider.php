<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View;
use App\Models\Admin\GeneralSetting;
use App\Models\Admin\SocialMediaItem;
use App\Models\Admin\PageHomeItem;
use App\Models\Admin\PageTermItem;
use App\Models\Admin\PagePrivacyItem;
use App\Models\Admin\Package;
use App\Models\Admin\Blog;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $general_setting = GeneralSetting::where('id',1)->first();
        $social_media_items = SocialMediaItem::orderby('social_order', 'asc')->get();
        $page_home_items = PageHomeItem::where('id', 1)->first();
        $term_page_data = PageTermItem::where('id', 1)->first();
        $privacy_page_data = PagePrivacyItem::where('id', 1)->first();
        $featured_packages = Package::where('p_is_featured', 'Yes')->get();
        $recent_packages = Package::orderby('id', 'desc')->get();
        $recent_posts = Blog::orderby('id', 'desc')->get();

        view()->share('g_setting', $general_setting);
        view()->share('social_media_items', $social_media_items);
        view()->share('page_home_items', $page_home_items);
        view()->share('term_page_data', $term_page_data);
        view()->share('privacy_page_data', $privacy_page_data);
        view()->share('featured_packages', $featured_packages);
        view()->share('recent_packages', $recent_packages);
        view()->share('recent_posts', $recent_posts);

        $json_data = json_decode(file_get_contents(resource_path('lang/main.json')));
        foreach($json_data as $key=>$value) {
            define($key,$value);
        }

    }
}
