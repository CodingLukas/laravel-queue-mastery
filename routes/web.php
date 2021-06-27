<?php

use App\Jobs\Deploy;
use Illuminate\Support\Facades\Route;

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

    \Illuminate\Support\Facades\Bus::chain([
        new Deploy('laracasts/project1'),
        function () {
            \Illuminate\Support\Facades\Bus::batch([...])->dispatch();
        }
    ])->dispatch();


//    $batch = [
//        [ // array in batch represents chain
//            new PullRepo('laracasts/project1'),
//            new RunTests('laracasts/project1'),
//            new Deploy('laracasts/project1'),
//        ],
//        [
//            new PullRepo('laracasts/project2'),
//            new RunTests('laracasts/project2'),
//            new Deploy('laracasts/project2'),
//        ] // both chains will run in parallel
//    ];


//    \Illuminate\Support\Facades\Bus::chain($chain)->dispatch(); // works like chain of responsibility pattern
//    $batch
//        ->allowFailures()
//        ->catch(function ($batch, $e) {
//            // when failed
//        })
//        ->then(function ($batch) {
//            // when whole batch completed succesfully
//        })
//        ->finally(function () {
//            // run even if job failed
//        })
//        ->onQueue('deployments')
//        ->onConnection('database')
//        ->dispatch(); // multiple workers will run in parallel

//    \App\Jobs\SendWelcomeEmail::dispatch();

//    \App\Jobs\ProcessPayment::dispatch()->onQueue('payments');

    return view('welcome');
});
