<?php
    
    include "checkedClass.php";
    
    //넘겨온 값 순서대로 $checkedSubject에 넣어주기
    function inputData($paraSubjectName, $paraSubjectNum, $paraTime) {
        $checkedSubject = new CheckedClass();
        $checkedSubject->setSubjectName($paraSubjectName);
        $checkedSubject->setSubjectNum($paraSubjectNum);
        $checkedSubject->setTime($paraTime);
        return $checkedSubject;
    }
    
?>
