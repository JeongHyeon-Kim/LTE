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
    // $class1 = DB::selectOne('select * from inha_sugang where subname = ?', ['객체지향프로그래밍1']);
    //$class2 = DB::selectOne('select * from inha_sugang where subname = ?', ['회로이론']);
    //$class1 = DB::table('inha_sugang')->select('subname')->where('grade', '=', '1')->where('subname','=','객체지향프로그래밍1')->get()->first();
    //$class2 =  DB::table('inha_sugang')->select('subname')->where('grade', '=', '1')->where('subname','=','정보통신입문')->get()->first();
    //$subjectsForOwnGrade = DB::table('inha_sugang')->select(DB::raw('subnum', 'subname'))->where('grade', '=', '1')->get();
    //$subjectsForOwnGrade = DB::table('inha_sugang')->select(DB::raw('subname', 'subnum'))->where('grade', '=', '1')->groupBy('subname', 'subnum')->get();
    //$we = $subjectsForOwnGrade->addSelect('subnum')->get();
    $subjectsForOneGrade = DB::table('inha_sugang')->where('grade', '1')->select('subname','subnum')->distinct()->get();
    // $abc = left($subjectsForOneGrade->subnum,7)->distinct()->get();
    // $subjectsForOneGrade = DB::table('inha_sugang')->select('subname')->where('grade', '=', '1')->distinct()->get();
    // $subnumsForOneGrade = DB::table('inha_sugang')->where('subname',".$subjectsForOneGrade.")->select('subnum')->get();
    // $subnumsForOneGrade = DB::table('inha_sugang')->select('subnum')->where('grade','1')->get();
    $subjectsForTwoGrade = DB::table('inha_sugang')->select('subname','subnum')->where('grade', '2')->distinct()->get();
    $subjectsForThreeGrade = DB::table('inha_sugang')->select('subname','subnum')->where('grade', '3')->distinct()->get();
    $subjectsForFourGrade = DB::table('inha_sugang')->select('subname','subnum')->where('grade', '4')->distinct()->get();
    return view('ltehome', 
    [
        'subjectsForOneGrade' => $subjectsForOneGrade,
        'subjectsForTwoGrade' => $subjectsForTwoGrade,
        'subjectsForThreeGrade' => $subjectsForThreeGrade,
        'subjectsForFourGrade' => $subjectsForFourGrade
    ]);
    // [
    //     'OOP1' => $class1->subname,
    //     'ICB' => $class2->subname
    // ]
    
});

Route::get('insert', 'UserController@insert');

Route::get('crawler', 'HomeController@update');

// Route::get('subject', 'TestController@showSubjects');