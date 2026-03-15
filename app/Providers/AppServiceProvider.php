<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Mainmenu;
use Illuminate\Support\Facades\DB;
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
    public function boot($id='0')
    {
        
        $mainmenu = DB::table('main_menu')->where('status', 1)->where('id_parent',$id)->orderBy('order','asc');
        view()->share('mainmenu',$mainmenu);
        // dd($mainmenu);
        $mainmenuppid = DB::table('ppid_main_menu')->where('status', 1)->where('id_parent',$id)->orderBy('order','asc');
        view()->share('mainmenuppid',$mainmenuppid);

        $mainmenuppd = DB::table('uppd_main_menu')->where('status', 1)->where('id_parent',$id)->orderBy('order','asc');
        view()->share('mainmenuppd',$mainmenuppd);
        Paginator::useBootstrap(); // Tambahkan ini
    }

    
}
