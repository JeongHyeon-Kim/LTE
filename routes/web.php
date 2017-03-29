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
    $timeTable[0][0][0] = 'ICE3001-001';
    $timeTable[0][0][1] = 'ICE3001-001';
    $timeTable[0][0][2] = 'ICE3001-001';
    
    $subjectsForOneGrade = DB::table('inha_sugang')->select('subname','subnum')->where('grade', '1')->distinct()->get();
    $subjectsForTwoGrade = DB::table('inha_sugang')->select('subname','subnum')->where('grade', '2')->distinct()->get();
    $subjectsForThreeGrade = DB::table('inha_sugang')->select('subname','subnum')->where('grade', '3')->distinct()->get();
    $subjectsForFourGrade = DB::table('inha_sugang')->select('subname','subnum')->where('grade', '4')->distinct()->get();
    
    $firstSubject = DB::table('inha_sugang')->where('subnum',$timeTable[0][0][0])->distinct()->get();
    
    
    return view('ltehome', 
    [
        'subjectsForOneGrade' => $subjectsForOneGrade,
        'subjectsForTwoGrade' => $subjectsForTwoGrade,
        'subjectsForThreeGrade' => $subjectsForThreeGrade,
        'subjectsForFourGrade' => $subjectsForFourGrade
    ]);
    
});

Route::get('insert', 'UserController@insert');

//Route::get('crawler', 'HomeController@update');
Route::get('crawler', 'HomeController@update');
//Route::get('/test', 'guenhoo');
// Route::get('subject', 'TestController@showSubjects');