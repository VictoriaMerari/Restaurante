<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaisesController;
use App\Http\Controllers\EntidadesController;
use App\Http\Controllers\MunicipiosController;
use App\Http\Controllers\Tipos_usuarioController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Metodos_pagoController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\Fotos_menuController;
use App\Http\Controllers\Detalles_ventaController;
use App\Http\Controllers\CorreoController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PdfController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('bienvenida');
});


Route::get('bienvenida', function () {
    return view('bienvenida');
});

Route::get('infPersonal', [AuthController::class, 'obtenerUser'])
->name('infPersonal');

Route::get('master', function () {
    return view('template.master');
});

Route::get('bienvenidaAdmin', [AuthController::class, 'getUser'])
->name('adminWelcome');

Route::get('bienvenidaCliente', [AuthController::class, 'getUser'])
->name('clientWelcome');

Route::get('bienvenidaMesero', [AuthController::class, 'getUser'])
->name('waiterWelcome');

Route::get('bienvenidaChef', [AuthController::class, 'getUser'])
->name('chefWelcome');



//CORREO ELECTRONICO
Route::get('form_enviar_correo', [CorreoController::class, 'formulario_correo']);
Route::post('enviar_correo',[CorreoController::class, 'enviar']);
Route::get('correos', [CorreoController::class, 'index'])->name('correos.index');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::post('login',[LoginController::class,'postLogin']);


Route::resource('paises', PaisesController::class)
    ->middleware('auth.custom')
    ->names([
        'index' => 'paises.index',
        'create' => 'paises.create',
        'read' => 'paises.read',
        'edit' => 'paises.edit',
        'destroy' => 'paises.destroy',
    ]);

Route::resource('entidades', EntidadesController::class)
    ->middleware('auth.custom')
    ->names([
        'index' => 'entidades.index',
        'create' => 'entidades.create',
        'read' => 'entidades.read',
        'edit' => 'entidades.edit',
        'destroy' => 'entidades.destroy',
    ]);
Route::resource('municipios', MunicipiosController::class)
    ->middleware('auth.custom')
    ->names([
        'index' => 'municipios.index',
        'create' => 'municipios.create',
        'read' => 'municipios.read',
        'edit' => 'municipios.edit',
        'destroy' => 'municipios.destroy',
    ]);

Route::resource('tipos_usuario', Tipos_usuarioController::class)
        ->middleware('auth.custom')
        ->names([
            'index' => 'tipos_usuario.index',
            'create' => 'tipos_usuario.create',
            'read' => 'tipos_usuario.read',
            'edit' => 'tipos_usuario.edit',
            'destroy' => 'tipos_usuario.destroy',
]);

/* Route::resource('users', UsersController::class); */
Route::resource('users', UsersController::class)
    ->middleware('auth.custom')
    ->names([
        'index' => 'users.index',
        'create' => 'users.create',
        'read' => 'users.read',
        'edit' => 'users.edit',
        'destroy' => 'users.destroy',
    ]);

Route::resource('metodos_pago', Metodos_pagoController::class)
    ->middleware('auth.custom')
    ->names([
        'index' => 'metodos_pago.index',
        'create' => 'metodos_pago.create',
        'read' => 'metodos_pago.read',
        'edit' => 'metodos_pago.edit',
        'destroy' => 'metodos_pago.destroy',
    ]);

Route::resource('ventas', VentasController::class)
    ->middleware('auth.custom')
    ->names([
        'index' => 'ventas.index',
        'create' => 'ventas.create',
        'read' => 'ventas.read',
        'edit' => 'ventas.edit',
        'destroy' => 'ventas.destroy',
    ]);


Route::resource('categorias', CategoriasController::class)
    ->middleware('auth.custom')
    ->names([
        'index' => 'categorias.index',
        'create' => 'categorias.create',
        'read' => 'categorias.read',
        'edit' => 'categorias.edit',
        'destroy' => 'categorias.destroy',
    ]);

Route::resource('menus', MenusController::class)
->middleware('auth.custom')
    ->names([
        'index' => 'menus.index',
        'create' => 'menus.create',
        'read' => 'menus.read',
        'edit' => 'menus.edit',
        'destroy' => 'menus.destroy',
    ]);

Route::resource('fotos_menu', Fotos_menuController::class)
    ->middleware('auth.custom')
    ->names([
        'index' => 'fotos_menu.index',
        'create' => 'fotos_menu.create',
        'read' => 'fotos_menu.read',
        'edit' => 'fotos_menu.edit',
        'destroy' => 'fotos_menu.destroy',
    ]);

Route::resource('detalles_venta', Detalles_ventaController::class)
    ->middleware('auth.custom')
    ->names([
        'index' => 'detalles_venta.index',
        'create' => 'detalles_venta.create',
        'read' => 'detalles_venta.read',
        'edit' => 'detalles_venta.edit',
        'destroy' => 'detalles_venta.destroy',
    ]);

 //Combo para municipios
Route::get('combo_entidad_muni/{id_pais}', [MunicipiosController::class, 'cambia_combo']);
Route::get('combo_municipio/{id_entidad}', [MunicipiosController::class, 'cambia_combo_2']);

//AJAX
Route::get('ajax',[AjaxController::class,'ver_productos'])->name('ajax');


Route::get('ver_carrito',[AjaxController::class,'ver_carrito']);
Route::get('agregar_carrito/{id_menu}',[AjaxController::class,'agregar_carrito']);
Route::get('add_del_producto/{tipo}/{id_menu}',[AjaxController::class,'add_del_producto']);
Route::get('add_de_venta/{id_venta}', [AjaxController::class,'add_de_venta'])->name('add_de_venta');

Route::prefix('auth')->group(function()
    {
    // -> Auth - LogIn
    Route::get('/login', [AuthController::class, 'loginindex'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'loginstore'])->name('auth.login');

    // -> Auth - LogOut
    Route::post('/logOut', [AuthController::class, 'logOutDestroy'])->name('auth.logOut');

    }
);

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//PDF
Route::get('genera_pdf',[PdfController::class,'genera_pdf']);

Route::get('menus_nombre/{tipo}',[PdfController::class,'menus_nombre']);

Route::get('ticket/{tipo}',[PdfController::class,'ticket']);
