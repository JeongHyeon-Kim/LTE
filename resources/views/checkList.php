<?php
// checklist
$list = $_POST['subject']; 

// checklist value(학수번호) 출력
for($i=0; $i<count($list); $i++){
    echo $list[$i];
    echo "<br>";
}
?>
