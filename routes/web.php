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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//         return view('content.dashboard');
//     });

Route::get('/', function () {
    return redirect(route('login'));
});
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('auth.logout');
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@check_login')->name('login.check_login');
Route::get('/login/get_company', 'LoginController@get_company')->name('login.get_company');
Route::get('/login/fetch', 'LoginController@fetch')->name('login.fetch');
Route::get('/login/final', 'LoginController@final')->name('login.final');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::get('/change', 'DashboardController@change')->name('dashboard.change');

    Route::resource('/Customer', 'CustomerController')->names([
        'index' => 'customer.index',
        'store' => 'customer.store',
        'show' => 'customer.show',
        'edit' => 'customer.edit',
        'delete' => 'customer.destroy',
        'create' => 'customer.create',
    ]);
    Route::resource('/Bank', 'BankController')->names([
        'index' => 'bank.index',
        'store' => 'bank.store',
        'edit' => 'bank.edit',
        'delete' => 'bank.destroy',
    ]);
    Route::resource('/Cabang', 'CabangController');
    Route::resource('/Produk', 'ProdukController')->names([
        'index' => 'produk.index',
        'store' => 'produk.store',
        'edit' => 'produk.edit',
        'delete' => 'produk.destroy',
    ]);
    Route::resource('/Supplier', 'SupplierController')->names([
        'index' => 'supplier.index',
        'store' => 'supplier.store',
        'edit' => 'supplier.edit',
        'delete' => 'supplier.destroy',
    ]);
    Route::resource('/Trans', 'TransController')->names([
        'index' => 'trans.index',
        'store' => 'trans.store',
        'edit' => 'trans.edit',
        'delete' => 'trans.destroy',
    ]);
    Route::resource('/Unit', 'UnitController')->names([
        'index' => 'unit.index',
        'store' => 'unit.store',
        'edit' => 'unit.edit',
        'delete' => 'unit.destroy',
    ]);

    Route::resource('/Menu', 'MenuController')->names([
        'index' => 'menu.index',
        'store' => 'menu.store',
        'edit' => 'menu.edit',
        'delete' => 'menu.destroy',
    ]);

    Route::resource('/AccountReceivablePesanan', 'ArPesananHdrController')->names([
        'index' => 'accountreceivablepesanan.index',
        'store' => 'accountreceivablepesanan.store',
        'edit' => 'accountreceivablepesanan.edit',
        'delete' => 'accountreceivablepesanan.destroy',
        'create' => 'accountreceivablepesanan.create',
    ]);
    Route::resource('PesanDetail', 'ArPesananDtlController');
});

    //     Route::get('/home', 'HomeController@index')->name('home');

    //     Route::resource('karyawan', 'KaryawanController');
