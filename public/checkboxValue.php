<?php
    //DB 연동
    use Illuminate\Support\Facades\DB;
    use Illuminate\Http\Request;

    $subject = $_POST['subject'];
    $subject_cnt = count($subject);
    
    for($i=0; $i < $subject_cnt; $i++){
        echo $subject[$i].", ";
        //$subject2 = DB::table('inha_sugang')->select('subname','subnum')->where('grade', '1')->distinct()->get();
        //echo $subject2;
    }
    
   

?>