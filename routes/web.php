<?php
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
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//FrontEnd
Route::get('/trangchu', 'Frontend\FrontendController@index')->name('Frontend.index');
Route::get('/trangchu1', 'Frontend\FrontendController@index_category')->name('Frontend.index_category');

Route::get('/trangchu/{the_loai}.html', 'Frontend\FrontendController@show')->name('Frontend.show');
Route::get('/trangchu/{the_loai}/{loaitin}.html', 'Frontend\FrontendController@loaitin')->name('Frontend.loaitin');
Route::get('/trangchu/{the_loai}/{loaitin}/{tintuc}', 'Frontend\FrontendController@tintuc')->name('Frontend.tintuc');

Route::post('/timkiem', 'Frontend\FrontendController@timkiem')->name('timkiem');


Route::get('/test', 'Frontend\FrontendController@test');

// Backend
Route::group(['middleware' => ['AdminLogin']], function () {
Route::group(['middleware' => ['CheckQuyen7']], function(){    
    Route::get('/admin', function(){
        return view("Backend.layout.master");
    })->name("admin");
    
    Route::group(['middleware' => ['Quyen5']], function () {
        Route::get('admin/theloai/index', 'Backend\TheLoaiController@index')->name('Backend.theloai.index');
        Route::get('admin/theloai/create', 'Backend\TheLoaiController@create')->name('Backend.theloai.create');
        Route::post('admin/theloai/store', 'Backend\TheLoaiController@store')->name('Backend.theloai.store');
        Route::get('admin/theloai/edit/{id}', 'Backend\TheLoaiController@edit')->name('Backend.theloai.edit');
        Route::put('admin/theloai/update/{id}', 'Backend\TheLoaiController@update')->name('Backend.theloai.update');
        Route::delete('admin/theloai/delete/{id}', 'Backend\TheLoaiController@destroy')->name('Backend.theloai.delete');
        
        Route::get('admin/loaitin/index', 'Backend\LoaiTinController@index')->name('Backend.loaitin.index');
        Route::get('admin/loaitin/create', 'Backend\LoaiTinController@create')->name('Backend.loaitin.create');
        Route::post('admin/loaitin/store', 'Backend\LoaiTinController@store')->name('Backend.loaitin.store');
        Route::get('admin/loaitin/edit/{id}', 'Backend\LoaiTinController@edit')->name('Backend.loaitin.edit');
        Route::put('admin/loaitin/update/{id}', 'Backend\LoaiTinController@update')->name('Backend.loaitin.update');
        Route::delete('admin/loaitin/delete/{id}', 'Backend\LoaiTinController@destroy')->name('Backend.loaitin.delete');
    });
    
    Route::get('admin/quyen/index', 'Backend\QuyenController@index')->name('Backend.quyen.index');
    Route::get('admin/quyen/create', 'Backend\QuyenController@create')->name('Backend.quyen.create');
    Route::post('admin/quyen/store', 'Backend\QuyenController@store')->name('Backend.quyen.store');
    Route::get('admin/quyen/edit/{id}', 'Backend\QuyenController@edit')->name('Backend.quyen.edit');
    Route::put('admin/quyen/update/{id}', 'Backend\QuyenController@update')->name('Backend.quyen.update');
    Route::delete('admin/quyen/delete/{id}', 'Backend\QuyenController@destroy')->name('Backend.quyen.delete');
    
    Route::group(['middleware' => ['Quyen8']], function () {
        Route::get('admin/nhomnguoidung/index', 'Backend\NhomNguoiDungController@index')->name('Backend.nhomnguoidung.index');
        Route::get('admin/nhomnguoidung/create', 'Backend\NhomNguoiDungController@create')->name('Backend.nhomnguoidung.create');
        Route::post('admin/nhomnguoidung/store', 'Backend\NhomNguoiDungController@store')->name('Backend.nhomnguoidung.store');
        Route::get('admin/nhomnguoidung/edit/{id}', 'Backend\NhomNguoiDungController@edit')->name('Backend.nhomnguoidung.edit');
        Route::put('admin/nhomnguoidung/update/{id}', 'Backend\NhomNguoiDungController@update')->name('Backend.nhomnguoidung.update');
        Route::delete('admin/nhomnguoidung/delete/{id}', 'Backend\NhomNguoiDungController@destroy')->name('Backend.nhomnguoidung.delete');
    });
    
    
    Route::group(['middleware' => ['Quyen6']], function () {
        Route::get('admin/nguoidung/index', 'Backend\NguoiDungController@index')->name('Backend.nguoidung.index');
        Route::get('admin/nguoidung/create', 'Backend\NguoiDungController@create')->name('Backend.nguoidung.create');
        Route::post('admin/nguoidung/store', 'Backend\NguoiDungController@store')->name('Backend.nguoidung.store');
        Route::get('admin/nguoidung/edit/{id}', 'Backend\NguoiDungController@edit')->name('Backend.nguoidung.edit');
        Route::put('admin/nguoidung/update/{id}', 'Backend\NguoiDungController@update')->name('Backend.nguoidung.update');
        Route::delete('admin/nguoidung/delete/{id}', 'Backend\NguoiDungController@destroy')->name('Backend.nguoidung.delete');
    });   
    
    // Route::get('admin/tintuc/index_private/{id}', 'Backend\TinTucController@index_private')->name('Backend.tintuc.index_private');
    Route::group(['middleware' => ['Quyen1']], function () {
        Route::get('admin/tintuc/create', 'Backend\TinTucController@create')->name('Backend.tintuc.create');
    });

    Route::group(['middleware' => ['Quyen3']], function () {
        Route::get('admin/tintuc/edit/{id}', 'Backend\TinTucController@edit')->name('Backend.tintuc.edit');
    });

    Route::group(['middleware' => ['Quyen4']], function () {
        Route::get('admin/tintuc/index', 'Backend\TinTucController@index')->name('Backend.tintuc.index');        
    });
    Route::post('admin/tintuc/store', 'Backend\TinTucController@store')->name('Backend.tintuc.store');
    Route::delete('admin/tintuc/delete/{id}', 'Backend\TinTucController@destroy')->name('Backend.tintuc.delete');
    Route::put('admin/tintuc/update/{id}', 'Backend\TinTucController@update')->name('Backend.tintuc.update');

    Route::delete('admin/binhluan/delete/{id_tt}/{id_bl}', 'Backend\BinhLuanController@destroy')->name('Backend.binhluan.delete');
    Route::post('binhluan','Backend\BinhLuanController@store')->name('Backend.binhluan.store');
}); //CheckQuyen7


    Route::get('admin/error',function(){
        return view('Backend.layout.error');
    })->name('Backend.layout.error');
    
    //Ajax Backend
    Route::get('admin/ajax/loaitin/{id}', 'Backend\AjaxController@getTheLoai')->name('Backend.ajax.loaitin');
    Route::get('admin/ajax/nguoidung/{id}', 'Backend\AjaxController@getnguoiDung')->name('Backend.ajax.nguoidung');
    Route::get('admin/ajax/tintuc/{id}', 'Backend\AjaxController@getloaiTin')->name('Backend.ajax.tintuc');
    Route::get('admin/ajax/confirmedpassword/{user}','Backend\AjaxController@checkpassword')->name('Backend.ajax.checkpassword');
    Route::get('admin/ajax/binhluan','Backend\AjaxController@store_comment');
    Route::get('admin/ajax/binhluancon','Backend\AjaxController@test');
});

Route::group(['middleware' => ['ChangePassword']], function () {
    Route::get('changepassword', 'Auth\ChangePasswordController@formchangepassword');
    Route::post('changepassword', 'Auth\ChangePasswordController@changepassword')->name('password.changepassword');
});

Route::get('ckeditor', 'CkeditorController@index');
Route::post('ckeditor/upload', 'Backend\TinTucController@upload')->name('ckeditor.upload');
