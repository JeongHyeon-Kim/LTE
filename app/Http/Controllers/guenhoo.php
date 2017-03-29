<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    include "inputmidbuf.php";
    include "inputdata.php";
    
    //$subject= $_POST['subject'];
    //echo $subject;
    
    //값 넣어주는 부분
    $checkedSubject = array();
    $subjectName0 = "root";
    $subjectNum0 = "root";
    $time0 = "토5,6,7";
    $checkedSubject[0] = inputData($subjectName0, $subjectNum0, $time0);
    //for($i = 0; $i < $numOfAllClass-1; $i++) {
    //    $checkedSubject[$i] = inputData($subjectName1, $subjectNum1, $time1);
    //}
    /*$checkedSubject[1] = inputData($subjectName1, $subjectNum1, $time1);
    $checkedSubject[2] = inputData($subjectName2, $subjectNum2, $time2);
    $checkedSubject[3] = inputData($subjectName3, $subjectNum3, $time3);
    $checkedSubject[4] = inputData($subjectName4, $subjectNum4, $time4);
    $checkedSubject[5] = inputData($subjectName5, $subjectNum5, $time5);*/
    
    // 모든 분반을 과목별로 분리해서 담을 배열
    $entireSubjectArray = array();
    //들어온 모든 분반수
    $numOfAllClass = count($checkedSubject); 
    
    $countSubjectNum = 0; // 과목 수
    $countClassNum = 0; // 분반 수
    $entireSubjectArray[$countSubjectNum][$countClassNum] = $checkedSubject[0];
    //Config::get('entireSubjectArray') = $checkedSubject[0];
    for($i = 0; $i < $numOfAllClass-1; $i++) {
        if($checkedSubject[$i+1]->getSubjectName()==$checkedSubject[$i]->getSubjectName()) {
            $countClassNum++;
            $entireSubjectArray[$countSubjectNum][$countClassNum] = $checkedSubject[$i+1];
        } else {
            $countSubjectNum++; 
            $countClassNum = 0;
            $entireSubjectArray[$countSubjectNum][$countClassNum] = $checkedSubject[$i+1];
        }
    }
    
    $test = 0;
    $timetableNum = 0;
    
    
    
    
    $mid = array();
    initMidbuf($mid, 0);
    echo "<style>table td { width: 120px; text-align: center; }</style>";
    echo "Start<br>";
    
    /*function initMidbuf(&$midbuf, $timetableNum) {
        for($j = 0; $j < $GLOBALS['dayCount']; $j++) {
            for($k = 0; $k < $GLOBALS['periodCount']; $k++) {
                $midbuf[$timetableNum][$j][$k] = 0;
            }
        }
    }*/
    
    function initMidbuf(&$midbuf, $timetableNum) {
        for($j = 0; $j < Config::get('constants.dayCount'); $j++) {
            for($k = 0; $k < Config::get('constants.periodCount'); $k++) {
                $midbuf[$timetableNum][$j][$k] = 0;
            }
        }
    }
    
    function checkInsertMidbuf(&$midbuf, $subjectNum, $classNum) {
        // 겹치는 부분이 있는지 확인
        for($i = 0; $i < Config::get('constants.dayCount'); $i++) {
            for($j = 0; $j < Config::get('constants.periodCount'); $j++) {
                if ($GLOBALS['entireSubjectArray'][$subjectNum][$classNum]->time[$i][$j]!='0') {
                    if($midbuf[$i][$j]!='0') {
                        echo "break point : " . $midbuf[$i][$j] . "<br>";
                        echo "crash point : " . $GLOBALS['entireSubjectArray'][$subjectNum][$classNum]->time[$i][$j] . "<br>";
                        return -1;
                    }
                }
            }
        }
        // 겹치는 부분이 없으므로 입력
        for($i = 0; $i < Config::get('constants.dayCount'); $i++) {
            for($j = 0; $j < Config::get('constants.periodCount'); $j++) {
                if ($GLOBALS['entireSubjectArray'][$subjectNum][$classNum]->time[$i][$j]!='0') {
                    $midbuf[$i][$j] = $GLOBALS['entireSubjectArray'][$subjectNum][$classNum]->time[$i][$j];
                }
            }
        }
        return 1;
    }

    function generateTimetable(&$midbuf, $subjectNum) {
        $subjectNum++;
        echo "subjectNum : " . $subjectNum . "<br>";
        if($subjectNum == count($GLOBALS['entireSubjectArray'])) {
            echo "Finish Here<br>";
            return -1;
        }
        
        echo "repeat: " . count($GLOBALS['entireSubjectArray'][$subjectNum]) . "<br>";
        for($i = 0; $i < count($GLOBALS['entireSubjectArray'][$subjectNum]); $i++) {
            echo "timetableNum: " . $GLOBALS['timetableNum'] . ", subjectNum: " . $subjectNum . ", classNum: " . $i . "<br>";
            if(empty($midbuf[$GLOBALS['timetableNum']])) {
                echo "init!! <br>";
                initMidbuf($midbuf, $GLOBALS['timetableNum']);
            }
            if(checkInsertMidbuf($midbuf[$GLOBALS['timetableNum']], $subjectNum, $i) < 0) {
                echo "continue<br>";
                continue;
            }
            printMidbuf($midbuf);
            generateTimetable($midbuf, $subjectNum);
            // printMidbuf($midbuf);
            echo "<br><br>";
            $GLOBALS['timetableNum']++;
        }
    }
    
    generateTimetable($mid, 0);
    
    function printMidbuf($midbuf) {
        echo "midbuf Count : " . count($midbuf) . "<br>";
        for($i = 0; $i < count($midbuf); $i++) {
            echo "print table!<br>";
            $temp = $midbuf[$i];
            
            $reverse = array();
            for($l = 0; $l < Config::get('constants.periodCount'); $l++) {
                for($j = 0; $j < Config::get('constants.dayCount'); $j++) {
                    $reverse[$l][$j] = $temp[$j][$l];
                }
            }
            echo "<table>";
            for($j = 0; $j < Config::get('constants.periodCount'); $j++) {
                echo "<tr>";
                for($k = 0; $k < Config::get('constants.dayCount'); $k++) {
                    echo "<td>" . $reverse[$j][$k] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            echo "<br><br>";
        }
    }
    // printMidbuf($mid);
?>