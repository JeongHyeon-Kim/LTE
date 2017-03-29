<?php

    class checkedClass {
        
        public $subjectName, $subjectNum;
        public $time = array();
        
        public function setSubjectName($paraSubjectName) {
            $this->subjectName = $paraSubjectName;
        }
        
        public function getSubjectName() {
            return $this->subjectName;
        }
        
        public function setSubjectNum($paraSubjectNum) {
            $this->subjectNum = $paraSubjectNum;
        }
        
        public function getSubjectNum() {
            return $this->subjectNum;
        }
        
        public function setTime($paraTime) {
            $dayArray = array('월', '화', '수', '목', '금', '토');
            $tempTime = explode(',', $paraTime);
            for($i = 0; $i < 6; $i++) {
                for($j = 0; $j < 26; $j++) {
                    $this->time[$i][$j] = 0;
                }
            }
            for($i = 0; $i < count($tempTime); $i++) {
                for($j = 0; $j < count($dayArray); $j++) {
                    if(strpos($tempTime[$i], $dayArray[$j]) !== false) {
                        $temp = 1;
                        if($dayArray[$j]=='월') {
                            $day = 0;
                        } elseif ($dayArray[$j]=='화') {
                            $day = 1;
                        } elseif ($dayArray[$j]=='수') {
                            $day = 2;
                        } elseif ($dayArray[$j]=='목') {
                            $day = 3;
                        } elseif ($dayArray[$j]=='금') {
                            $day = 4;
                        } else {
                            $day = 5;
                        }
                        break;
                    } else {
                        $temp = 0;
                    }
                }
                if($temp==1) {
                    $tempTime[$i] = str_replace($dayArray[$j], "", $tempTime[$i]);
                    $this->time[$day][$tempTime[$i]] = $this->subjectNum;
                } else {
                    $this->time[$day][$tempTime[$i]] = $this->subjectNum;
                }
            }
        }
        
    }
    
?>