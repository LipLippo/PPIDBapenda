<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\MainmenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ImagesliderController;
use App\Http\Controllers\SotkController;
use App\Http\Controllers\TautanController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PejabatController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\MainmenuppidController;
use App\Http\Controllers\ImagesliderppidController;
use App\Http\Controllers\SotkppidController;
use App\Http\Controllers\PejabatppidController;
use App\Http\Controllers\StatistikperizinanController;
use App\Http\Controllers\MainuppdController;
use App\Http\Controllers\PpidController;
use App\Http\Controllers\UppdController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PpidModalController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\PermohonanInformasiController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\PPID\KategoriController;
use App\Http\Controllers\PPID\PublicKategoriController;

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


Route::get('/', function () {
    return view('portal.index');
});
  
// Auth::routes();
Route::controller(LoginController::class)->group(function () {
    Route::get('/panel-manage', 'showLoginForm');
    Route::post('/login', 'login')->name('login');
     Route::post('/logout', 'logout')->name('logout');
});
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('main-sortable', [MainmenuController::class, 'updateOrder']);
Route::delete('main-multidel', [MainmenuController::class, 'multipledelete']);
Route::post('main-ckeditor', [MainmenuController::class, 'upload']);

Route::delete('post-multidel', [PostsController::class, 'multipledelete']);
Route::delete('category-multidel', [CategoryController::class, 'multipledelete']);

Route::post('al-sortable', [AlbumController::class, 'SortOrder']);
Route::delete('album-multidel', [AlbumController::class, 'multipledelete']);

Route::post('gal-sortable', [GaleriController::class, 'SortOrder']);
Route::delete('galeri-multidel', [GaleriController::class, 'multipledelete']);

Route::post('slider-sortable', [ImagesliderController::class, 'SortOrder']);
Route::delete('slider-multidel', [ImagesliderController::class, 'multipledelete']);

Route::post('video-sortable', [VideoController::class, 'SortOrder']);
Route::delete('video-multidel', [VideoController::class, 'multipledelete']);

Route::post('tautan-sortable', [TautanController::class, 'SortOrder']);
Route::delete('tautan-multidel', [TautanController::class, 'multipledelete']);

Route::delete('sotks-multidel', [SotkController::class, 'multipledelete']);

Route::delete('pejabats-multidel', [PejabatController::class, 'multipledelete']);

Route::delete('sejarahs-multidel', [SejarahController::class, 'multipledelete']);
// Route::post('ckeditor/upload', 'MainmenuController@upload')->name('ckeditor.upload');
Route::post('ppidmain-sortable', [MainmenuppidController::class, 'updateOrder']);
Route::delete('ppidmain-multidel', [MainmenuppidController::class, 'multipledelete']);

Route::post('ppidslider-sortable', [ImagesliderppidController::class, 'updateOrder']);
Route::delete('ppidslider-multidel', [ImagesliderppidController::class, 'multipledelete']);

Route::delete('ppidsotk-multidel', [SotkppidController::class, 'multipledelete']);

Route::delete('ppidpejabat-multidel', [PejabatppidController::class, 'multipledelete']);

Route::post('mainuppd-sortable', [MainuppdController::class, 'updateOrder']);
Route::delete('mainuppd-multidel', [MainuppdController::class, 'multipledelete']);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('post', PostsController::class);
    Route::resource('main', MainmenuController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('album', AlbumController::class);
    Route::resource('galeris', GaleriController::class);
    Route::resource('sliders', ImagesliderController::class);
    Route::resource('videos', VideoController::class);
    Route::resource('tautans', TautanController::class);
    Route::resource('sotk', SotkController::class);
    Route::resource('sotk_pejabat', PejabatController::class);
    Route::resource('sotksejarah', SejarahController::class);
    Route::resource('mainppid', MainmenuppidController::class);
    Route::resource('sliderppid', ImagesliderppidController::class);
    Route::resource('sotkppid', SotkppidController::class);
    Route::resource('pejabatppid', PejabatppidController::class);
   Route::resource('statizin', StatistikperizinanController::class);
   Route::resource('uppdmain', MainuppdController::class);
   Route::resource('modals', ModalController::class);
   Route::resource('ppidmodal', PpidModalController::class);
   Route::resource('permohonan-informasi', PermohonanInformasiController::class);
   
   

});
Route::resource('search-result', SearchController::class);
// Route::get('/page/{url}', function () {
//     return view('portal.page');
// });
Route::get('/search', function () {
    return view('portal.search');
});
// portal utama
Route::get('page/{id}', function($id){

        return View::make("portal.page",array('url' => $id));
    });

 Route::get('galeri/{id}/{album}', function($id,$album){
        if(($album == 'all') || ($album == 'video' )){
            return View::make("portal.album",array('cat' => $album));
        }else{
            return View::make("portal.galeri",array('cat' => $id ,'album' => $album));
        }

    });
// end of portal utama

 /*portal ppid*/
//  Route::get('/ppid_bapenda', function () {
//     return view('portal.ppid_index');
// });
    Route::get('/ppid_bapenda',[PpidController::class, 'getIndex']);
    Route::get('ppid/page/{id}', function($id){
        return View::make("portal.ppid_page",array('url' => $id));
    });
    Route::post('pengumuman/', function(){
        return View::make("portal.pengumuman");
    });
    Route::get('ptspkabkota/', function(){
        return View::make("portal.tautan");
    });
    Route::get('testimoni/', function(){
        return View::make("portal.testimonial");
    });
    // Route::post('/profilpejabatppid', array('as' => 'doprofil', 'uses'=>'PortalController@postProfilpejabatppid'));
    /*end of ppid*/

     /* portal uppd */
    Route::get('/uppd-{id}', [UppdController::class, 'getIndex']);
    Route::get('uppd-{id}/page/{page_id}', [UppdController::class, 'getPage']);
    // Route::get('uppd/{id}/page/{page_id}', function($id){
    //     return View::make("portal.ppid_page",array('url' => $id));
    // });
    /* end of uppd */
    Route::get('categorys/{id}', function($id){
        return View::make("portal.category",array('cat' => $id));
    });
    Route::get('p/{id}/{url}', function($id,$url){
        return View::make("portal.post",array('id' => $id));
    });
     Route::get('cari/', function(){
        return View::make("portal.cari",array('like' => Request::input('cari')));
    });

    Route::get('realisasi_pendapatan/', function(){
        return View::make("portal.statistik_data");
    });
    Route::get('realisasi_pendapatan/{id}', function($id){
        if(!empty($id)){
            return View::make("portal.statistik",array('cat' => $id));
        }else{
            return View::make("portal.statistik_data");
        }

    });


    Route::get('statistik_realisasi/', function(){
        return View::make("portal.statistik_realisasi");
    });
    Route::get('statistik_realisasi/{id}', function($id){
        if(!empty($id)){
            return View::make("portal.statistik_realisasi_detail",array('cat' => $id));
        }else{
            return View::make("portal.statistik_realisasi_detail");
        }
    });

     Route::get('statistik_lpk/', function(){
        return View::make("portal.statistik_lpk");
     });

    Route::get('statistik_lpk/{id}', function($id=''){
         if($id == '')
            return View::make("portal.statistik_lpk");
        else
            return View::make("portal.statistik_lpk_detail");
    });
    
    Route::get('status_permohonan', function(){
        return View::make("portal.status_permohonan");
     });

    Route::get('statistik_potensi_smk/', function(){
        return View::make("portal.statistik_smk_data");
     });

    Route::get('statistik_potensi_smk/{id}', function($id){
        if(!empty($id)){
            return View::make("portal.statistik_smk",array('kab' => $id));
        }else{
            return View::make("portal.statistik_smk_data");
        }

    });


    // reset password 
    Route::post('reset', [UserController::class, 'reset_password'])->name('reset_password');

   // Clear application cache:
    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        return 'Application cache has been cleared';
    });

    //Clear route cache:
    Route::get('/route-cache', function() {
        Artisan::call('route:cache');
        return 'Routes cache has been cleared';
    });

    //Clear config cache:
    Route::get('/config-cache', function() {
        Artisan::call('config:cache');
        return 'Config cache has been cleared';
    }); 

    // Clear view cache:
    Route::get('/view-clear', function() {
        Artisan::call('view:clear');
        return 'View cache has been cleared';
    });
    
    Route::post('image-upload', [ImageUploadController::class, 'storeImage'])->name('image.upload');



// =============================================================
// ADMIN ROUTES (tambahkan di dalam group middleware auth/admin)
// =============================================================
// Contoh: Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () { ... });
 
Route::prefix('admin/ppid/kategori')->name('admin.ppid.kategori.')->group(function () {
 
    // Daftar semua kategori
    Route::get('/', [KategoriController::class, 'index'])->name('index');
 
    // Lihat & kelola konten per kategori
    Route::get('/{kategori}', [KategoriController::class, 'show'])->name('show');
 
    // Simpan konten baru
    Route::post('/{kategori}/konten', [KategoriController::class, 'storeKonten'])->name('konten.store');
 
    // Edit konten
    Route::get('/{kategori}/konten/{konten}/edit', [KategoriController::class, 'editKonten'])->name('konten.edit');
 
    // Update konten
    Route::put('/{kategori}/konten/{konten}', [KategoriController::class, 'updateKonten'])->name('konten.update');
 
    // Hapus konten
    Route::delete('/{kategori}/konten/{konten}', [KategoriController::class, 'destroyKonten'])->name('konten.destroy');
 
    // Hapus sub kategori
    Route::delete('/{kategori}/sub-kategori/{subKategori}', [KategoriController::class, 'destroySubKategori'])->name('sub-kategori.destroy');
 
    // AJAX: ambil sub kategori berdasarkan kategori
    Route::get('/{kategori}/sub-kategori', [KategoriController::class, 'getSubKategori'])->name('sub-kategori.get');
});
 
// =============================================================
// PUBLIC ROUTES
// URL: /ppid_bapenda/{slug}
// Contoh: /ppid_bapenda/informasi-berkala
// =============================================================
Route::get('/ppid_bapenda/{slug}', [PublicKategoriController::class, 'show'])
    ->name('ppid.kategori.show');
 
    // untuk toggle aktif atau nonaktif kategori pada ADMIN PAGE
Route::patch('admin/ppid/kategori/{id}/toggle', [KategoriController::class, 'toggle'])
     ->name('admin.ppid.kategori.toggle');