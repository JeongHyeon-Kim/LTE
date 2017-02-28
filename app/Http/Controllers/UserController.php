<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function show()
    {
        //DB 값 출력 구현
        //$users = DB::selectOne('select * from inha_sugang where subname = ?', ['회로이론']);
        $users = DB::table('inha_sugang')->where('subname', '=', '수지학개론')->get()->first();//sql injection으로부터 안전한 코드
        return  view('ltehome', ['OOP1' => $users->subname]);
    }
    
    public function insert()
    {
        //DB 입력 구현
        DB::table('inha_sugang')->insert(
            ['subnum' => 'ICE0306-001', 'subname' => '수지학개론', 'grade' => '1', 'credit' => '3', 'classification' => '교양필수', 
            'time' => 'EveryTime', 'professor' => '진수지', 'evaluation' => 'P/F', 'note' => 'PB 외 수강X']
        );
    }
}