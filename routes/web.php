<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchLiveController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\Home\TodasNoticiasController;
use App\Http\Controllers\Home\VideosController;
use App\Http\Controllers\HomeNoticiaController;
use App\Http\Controllers\MessagesController;

//Home
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/todas_las_noticias', [TodasNoticiasController::class, 'index'])
    ->name('todas.las.noticias');

Route::get('/videos', [VideosController::class, 'index'])
    ->name('videos');

//Contacto

Route::get('/contacto', [HomeController::class, 'contacto'])->name('contacto');

Route::post('/contacto/enviar', [HomeController::class, 'enviarContacto'])->name('home.contacto.enviar');

//Categorias
Route::get('/categoria/{categoria}', [HomeController::class, 'categorias']);

//Noticia
Route::get('/noticia/{noticia}', [HomeNoticiaController::class, 'mirarNoticia']);

Route::post('/loadmore/load_data/{noticia}',  [HomeNoticiaController::class, 'cargarMasCometarios'])
    ->name('loadmore.load_data');

//Comentarios
Route::post('/delete/comment', [ComentariosController::class, 'eliminarComentario'])
    ->name('delete.notice.comment');

Route::post('/noticia/coment/publish', [ComentariosController::class, 'comentarNoticia'])
    ->name('noticia.coment.publish');

//Search Live
Route::get('/home/search/news', [SearchLiveController::class, 'buscadorNoticias'])
    ->name('home.serch.news');

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login');

//Registro
Route::get('/signup', function () {
    return view('signUp');
});
Route::post('signup', [RegistroController::class, 'index'])->name('signup');


//Recuperar contraseña desde Home
Route::get('/password', [RPasswordController::class, 'index'])
    ->name('recover.password');

Route::post('/password/send/email', [RPasswordController::class, 'reciveEmail'])
    ->name('resive.user.mail');

Route::get('/password/send/email', [RPasswordController::class, 'cambiarPassword']);

Route::post('/password/send/email/validate', [RPasswordController::class, 'cambiarPasswordSave'])
    ->name('cambiar.password.save');

//Dashboard opciones
Route::middleware('auth')->group(function () {

    //Perfil
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/dashboard', [DashboardController::class, 'logout'])
        ->name('dashboard.logout');

    Route::post('/dashboard/upload', [DashboardController::class, 'uploadImage'])
        ->name('dashboard.upload.image');

    //Settings
    Route::patch('/dashboard/password', [SettingsController::class, 'cambiarContraseña'])
        ->name('dashboard.recover.password');

    //Noticias
    Route::post('/dashboard/public_new', [NoticiasController::class, 'crearNoticia'])
        ->name('dashboard.create.new');

    Route::delete('/dashboard/delete/news/{noticia?}', [NoticiasController::class, 'eliminarNoticia'])
        ->name('dashboard.delete.news');

    Route::post('/dashboard/obtener/noticia/edit/{noticia?}', [NoticiasController::class, 'obtenerNoticiaEditar'])
        ->name('dashboard.obtener.noticia.edit');

    Route::post('/dashboard/editar/news', [NoticiasController::class, 'editarNoticia'])
        ->name('dashboard.edit.news');

    //Search Live
    Route::get('/noticias/serch/categorias', [SearchLiveController::class, 'buscadorCategorias'])
        ->name('dashboard.search.categorias');

    Route::get('/dashboard/serch/news', [SearchLiveController::class, 'buscadorNoticiasEliminar'])
        ->name('dashboard.search.news');

    Route::get('/dashboard/edit/news/search', [SearchLiveController::class, 'buscadorNoticiasEditar'])
        ->name('dashboard.search.news.edit');

    //Categorias
    Route::post('/categorias', [CategoriaController::class, 'crearCategoria'])
        ->name('dashboard.create.categori');

    // Route::get('/categorias', [CategoriaController::class, 'deleteCategoria']); // ->devuelve todas las categorias
    // Route::get('/categorias/{id}', [CategoriaController::class, 'deleteCategoria']);  // ->devuelve una categoria
    // Route::post('/categorias', [CategoriaController::class, 'deleteCategoria']);  // -> crea una categoria
    // Route::patch('/categorias/{id}', [CategoriaController::class, 'deleteCategoria']);  // ->Actualiza una categoria
    // Route::delete('/categorias/{id}', [CategoriaController::class, 'deleteCategoria']); // ->elimina una categoria

    Route::delete('/categorias/{categoria?}', [CategoriaController::class, 'deleteCategoria'])
        ->name('dashboard.delete.categoria');

    Route::patch('/categorias/{categoria?}', [CategoriaController::class, 'updateCategoria'])
        ->name('dashboard.update.categoria');


    //Mensajes
    Route::get('/dashboard/mensajes', [MessagesController::class, 'index'])
        ->name('dashboard.cargar.mensajes');

    Route::delete('/dashboard/mensaje/delete/{contacto?}', [MessagesController::class, 'delete'])
        ->name('dashboard.delete.mensaje');

    Route::post('/dashboard/mensaje/view/{contacto?}', [MessagesController::class, 'view'])
        ->name('dashboard.view.mensaje');

    Route::post('/dashboard/mensaje/responder/{contacto?}', [MessagesController::class, 'responder'])
        ->name('dashboard.responder.mensaje');

    Route::post('/dashboard/mesaje/send', [MessagesController::class, 'send'])
        ->name('dashboard.send.contact.email');
});
