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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::prefix('admin')->group(function () {

    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

    Route::get('medicos', 'MedicoController@index')->name('admin.medicos');
    Route::get('medicos/create', 'MedicoController@create')->name('admin.medicos.create');
    Route::post('medicos/store', 'MedicoController@store')->name('admin.medicos.store');
    Route::get('medicos/{medico}/edit','MedicoController@edit')->name('admin.medicos.edit');
    Route::post('medicos/{medico}/update','MedicoController@update')->name('admin.medicos.update');
    Route::delete('medicos/{medico}/delete','MedicoController@destroy')->name('admin.medicos.destroy');

    Route::get('pacientes', 'PacienteController@index')->name('admin.pacientes');
    Route::get('pacientes/create', 'PacienteController@create')->name('admin.pacientes.create');
    Route::post('pacientes/store', 'PacienteController@store')->name('admin.pacientes.store');
    Route::get('pacientes/{paciente}/edit','PacienteController@edit')->name('admin.pacientes.edit');
    Route::post('pacientes/{paciente}/update','PacienteController@update')->name('admin.pacientes.update');
    Route::delete('pacientes/{paciente}/delete','PacienteController@destroy')->name('admin.pacientes.destroy');

    Route::get('especialidades', 'EspecialidadeController@index')->name('admin.especialidades');
    Route::get('especialidades/create', 'EspecialidadeController@create')->name('admin.especialidades.create');
    Route::post('especialidades/store', 'EspecialidadeController@store')->name('admin.especialidades.store');
    Route::get('especialidades/{especialidade}/edit','EspecialidadeController@edit')->name('admin.especialidades.edit');
    Route::post('especialidades/{especialidade}/update','EspecialidadeController@update')->name('admin.especialidades.update');
    Route::delete('especialidades/{especialidade}/delete','EspecialidadeController@destroy')->name('admin.especialidades.destroy');


    Route::get('consultas', 'ConsultaController@index')->name('admin.consultas');

    Route::get('/compromissos', 'CompromissoController@index')->name('admin.compromissos');

    Route::get('users', 'UserController@index')->name('admin.users');
    Route::get('users/create', 'UserController@create')->name('admin.users.create');
    Route::get('users/{user}/edit', 'UserController@edit')->name('admin.users.edit');
});

Route::get('/home', 'HomeController@index')->name('home');

