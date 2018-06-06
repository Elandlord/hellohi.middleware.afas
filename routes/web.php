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


/*
|--------------------------------------------------------------------------
| AFAS Routes
|--------------------------------------------------------------------------
|
| Here is where the AFAS routes are registered. If you want to sync a
| single entity, you have to send a tenant_id as a parameter. This Tenant
| should be an existing tenant in the middleware Tenant table. A seeder
| for the middleware Tenant table already exists.
|
| Calling the initial sync doesn't require a tenant.
|
*/
Route::get('/afas/organisations', 'AfasController@organisations')->name('afas-organisations');
Route::get('/afas/persons', 'AfasController@persons')->name('afas-persons');

Route::get('/afas/customers/sync/{tenant}', 'CustomerController@syncAfas')->name('sync-organisations');
Route::get('/afas/persons/sync/{tenant}', 'PersonController@syncAfas')->name('sync-persons');
Route::get('/afas/sync', 'AfasController@initialSyncAfas')->name('sync-afas');

/*
|--------------------------------------------------------------------------
| HelloHi / MKA Routes
|--------------------------------------------------------------------------
|
| Here is where the HelloHi / MKA routes are registered.
|
*/
Route::get('/hellohi/customers', 'HelloHiController@customers')->name('hellohi-customers');
Route::get('/hellohi/persons', 'HelloHiController@persons')->name('hellohi-persons');