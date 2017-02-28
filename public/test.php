<?php
$subject =  $_POST['subject'];
$subject_cnt = count($subject);

for($i=0; $i <= $subject_cnt; $i++){
echo $subject[$i];
}

?>