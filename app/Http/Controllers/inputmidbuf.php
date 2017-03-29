<?php
    
    function checkMidbuf($paraCheck, $paraNumOfTimetable, $paraMidbuf, $paraSubject) {
        for($i = 0; $i < 6; $i++) {
            for($j = 0; $j < 26; $j++) {
                if ($paraSubject->time[$i][$j]!='0') {
                    if($paraMidbuf[$paraNumOfTimetable][$i][$j]!='0') {
                        $paraCheck++;
                    }
                }
            }
        }
        return $paraCheck;
    }
    
    function inputMidbuf($paraNumOfTimetable, $paraMidbuf, $paraSubject) {
        for($i = 0; $i < 6; $i++) {
            for($j = 0; $j < 26; $j++) {
                if($paraSubject->time[$i][$j]!='0') {
                    $paraMidbuf[$paraNumOfTimetable][$i][$j] = $paraSubject->getSubjectNum();
                }
            }
        }
        return $paraMidbuf;
    }
    
?>
