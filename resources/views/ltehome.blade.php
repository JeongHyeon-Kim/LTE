<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LTE HOME</title>

    <!-- Bootstrap Core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet"><!--부트스트랩 코어-->

    <!-- Plugin CSS -->
    <link href="./css/magnific-popup.css" rel="stylesheet"><!--이미지 팝업 플러그인-->
    
    <!-- Theme CSS -->
    <link href="./css/creative.min.css" rel="stylesheet"><!--테마 코어-->
    
    <!-- jQuery -->
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js' type='text/javascript'></script><!--AJAX 코어-->
    
</head>

<body id="home">
    <!--메뉴-->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!--모바일 페이지에 메뉴버튼-->
            <div class="navbar-header">                                     
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                
                <a class="navbar-brand page-scroll" href="#home">LTE</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#lectureList">강의목록</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#myTimetable">결과 확인</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <!--시작 페이지-->
    
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">LTE HOME</h1>
                <hr>
                <p>Lecture Timetable for Everyone</p>
                <a href="#lectureList" class="btn btn-primary btn-xl page-scroll">강의목록</a>
            </div>
        </div>
    </header>
    
    <!--시간표 생성 버튼-->
    <section class="bg-primary" id="lectureList">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">강의 목록</h2>
                    
                    <hr class="light">
                    <p class="text-faded">과목 선택 후 시간표 생성</p>
                    <!--<a type="submit" href="#myTimetable" class="page-scroll btn btn-default btn-xl sr-button">생성된 시간표 보기</a>-->
                    <!--<input type="submit" value="시간표 생성" class="page-scroll btn btn-default btn-xl sr-button" href="#myTimetable"/><!--보완 필요-->
                    <input type="button" value="시간표 생성" class="page-scroll btn btn-default btn-xl sr-button" onclick="checkedSubject();"/>
                    <span id="show"></span>
                    <!--<p> {{-- $OOP1 --}} </p>-->
                </div>
            </div>
        </div>
    </section>
    
    <!--정현이 test-->
    <section id="test">
        <?php
            //dump 찍기
            //echo var_dump($newSubjectsForOneGrade).'<br><br>';
            //echo var_dump($subjectsForOneGrade).'<br><br>';
            // $subjectsForOneGrade = objectToArray($subjectsForOneGrade);
            // echo '<br>'.var_dump($subjectsForOneGrade).'<br>';
            //$length = count($asdf);
            //echo var_dump($asdf).'<br><br>';
            
            
            //$newSubjectsForOneGrade = array();//배열 선언
            /*
            foreach ($subjectsForOneGrade as $key=>$anotherValue){
                $newSubjectsForOneGrade = array();//배열 선언
                //echo var_dump($anotherValue->subname);
                
                if($key == 0){
                    array_push($newSubjectsForOneGrade, $anotherValue->subname);//값을 배열에 넣기
                    var_dump($newSubjectsForOneGrade);
                    echo '<br>';
                }
                else if($key == 5){
                    array_push($newSubjectsForOneGrade, $anotherValue->subname);//값을 배열에 넣기
                    var_dump($newSubjectsForOneGrade);
                    echo '<br>';
                }
                else if($key == 6){
                    array_push($newSubjectsForOneGrade, $anotherValue->subname);//값을 배열에 넣기
                    var_dump($newSubjectsForOneGrade);
                    echo '<br>';
                }
            }*/
        ?>
    </section>
    
    <!--강의목록-->
    <section id="services">
        <div class="container">
            <div class="row">
               <div class="col-md-3">
                 <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Tooltip on top">1학년</button>
                 <table class="table">
                   <thead>
                      <tr>
                       <th>선택</th>
                       <th>과목명</th>
                     </tr>
                   </thead>
                   <tbody>
                    <?php
                    function left($string, $count){
                      return substr($string, 0, $count);
                    }
                    // function returnSubnum($subjectsForOwnGrade){
                    //     foreach ($subjectsForOwnGrade as $subjectForOwnGrade){
                    //         $subjectForOwnGrade = left($subjectForOwnGrade->subnum, 7);
                    //         echo $subjectForOwnGrade."<br>";
                    //     }
                        // for($i = 0; $i < count($subjectsForOwnGrade); $i++)
                        // {
                        //     echo $subjectsForOwnGrade[$i];
                        // }
                    // }
                    // returnSubnum($subjectsForOwnGrade);
                        
                    /*foreach ($subjectsForOneGrade as $subjectForOneGrade) {
                        echo "<tr>";
                            echo "<td><input type='checkbox' name='subject' value='".left($subjectForOneGrade->subnum, 7)."'/></td>";
                            echo "<td>".$subjectForOneGrade->subname."</td>";
                        echo "</tr>";
                    }*/
                    
                    foreach ($subjectsForOneGrade as $key=>$subjectForOneGrade){
                        $newSubjectsForOneGrade = array();//배열 선언
                        //echo var_dump($anotherValue->subname);
                        //결국 모든걸 포기하였다.
                        if($key == 0){
                            echo "<tr>";
                                echo "<td><input type='checkbox' name='subject' value='".left($subjectForOneGrade->subnum, 7)."'/></td>";
                                echo "<td>".$subjectForOneGrade->subname."</td>";
                            echo "</tr>";
                            //array_push($newSubjectsForOneGrade, $anotherValue->subname);//값을 배열에 넣기
                            //var_dump($newSubjectsForOneGrade);
                            //echo '<br>';
                        }
                        else if($key == 5){
                            echo "<tr>";
                                    echo "<td><input type='checkbox' name='subject' value='".left($subjectForOneGrade->subnum, 7)."'/></td>";
                                    echo "<td>".$subjectForOneGrade->subname."</td>";
                            echo "</tr>";
                            //array_push($newSubjectsForOneGrade, $anotherValue->subname);//값을 배열에 넣기
                            //var_dump($newSubjectsForOneGrade);
                            //echo '<br>';
                        }
                        else if($key == 6){
                            echo "<tr>";
                                    echo "<td><input type='checkbox' name='subject' value='".left($subjectForOneGrade->subnum, 7)."'/></td>";
                                    echo "<td>".$subjectForOneGrade->subname."</td>";
                            echo "</tr>";
                            //array_push($newSubjectsForOneGrade, $anotherValue->subname);//값을 배열에 넣기
                            //var_dump($newSubjectsForOneGrade);
                            //echo '<br>';
                        }
                    }
                    // foreach($subjectsForOneGrade as $subjectForOneGrade) {
                    //     echo "<td>".$subjectForOneGrade->subname."</td>";
                    // }
                    // foreach($subnumsForOneGrade as $subnumForOneGrade) {
                    //     echo "<td>".$subnumForOneGrade->subnum."</td>";
                    // }
                    ?>
                    
                   </tbody>
                 </table>
               </div>
               <div class="col-md-3">
                 <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Tooltip on top">2학년</button>
                 <table class="table">
                   <thead>
                     <tr>
                       <th>선택</th>
                       <th>과목명</th>
                     </tr>
                   </thead>
                   <tbody>
                    <?php
                    foreach ($subjectsForTwoGrade as $subjectForTwoGrade) {
                        echo "<tr>";
                            echo "<td><input type='checkbox' name='subject' value='".left($subjectForTwoGrade->subnum, 7)."'/></td>";
                            echo "<td>".$subjectForTwoGrade->subname."</td>";
                        echo "</tr>";
                    }
                    ?>
                   </tbody>
                 </table>
               </div>
               <div class="col-md-3">
                 <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Tooltip on top">3학년</button>
                 <table class="table">
                   <thead>
                     <tr>
                       <th>선택</th>
                       <th>과목명</th>
                     </tr>
                   </thead>
                   <tbody>
                    <?php
                    foreach ($subjectsForThreeGrade as $subjectForThreeGrade) {
                        echo "<tr>";
                            echo "<td><input type='checkbox' name='subject' value='".left($subjectForThreeGrade->subnum, 7)."'/></td>";
                            echo "<td>".$subjectForThreeGrade->subname."</td>";
                        echo "</tr>";
                    }
                    ?>
                   </tbody>
                 </table>
               </div>
               <div class="col-md-3">
                 <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Tooltip on top">4학년</button>
                 <table class="table">
                   <thead>
                     <tr>
                       <th>선택</th>
                       <th>과목명</th>
                     </tr>
                   </thead>
                   <tbody>
                    <?php
                    foreach ($subjectsForFourGrade as $subjectForFourGrade) {
                        echo "<tr>";
                            echo "<td><input type='checkbox' name='subject' value='".left($subjectForFourGrade->subnum, 7)."'/></td>";
                            echo "<td>".$subjectForFourGrade->subname."</td>";
                        echo "</tr>";
                    }
                    ?>
                   </tbody>
                 </table>
               </div>
            </div>
        </div>
    </section>
    
    <!--#timeTable css-->
    <style type="text/css">
        table td, table th {
            border:1px solid black;
            text-align:center;
        }
        table tr:not(:first-child){
            height:10px;
        }
        table#timeTable {
            font-size:10pt;
            font-family:"Malgun Gothic";
            background-color: #fefefe;
            width:100%;
            margin:0;padding:0;
        }
        table#timeTable tr {
            margin:0;
            padding:0;
        }
        table#timeTable tr td {
            margin:0;
            padding:0;
        }
        table#timeTable tr td:first-child {
            width:50px;
        }
        div.layer {
            top:0;
            color:black;
            font-size:12px;
            background-image:linear-gradient(45deg, rgba(255, 255, 255, .5) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .5) 50%, rgba(255, 255, 255, .5) 75%, transparent 75%, transparent);
            background-size:8px 8px;
        }
        table {
            border-collapse:collapse;
            width:100%;
        }
    </style>
    
    <!--Test-->
    <div>
    <!--<form id="addForm">-->
        과목번호*:<input id="no" size="3" />
        과목명 :<input id="name" size="10" />
        학점 :<input id="score" size="1" />
        시간 :<input id="time" size="1" />
        요일*:<input id="week" size="1" />
        교시*:<input id="class" size="1" />
        (강의실)*:<input id="room" size="6" />
        (담당교수) :<input id="prof" size="4" />
        (비고) :<input id="etc" size="1" />
        (색) :<input id="color" size="1" />
        <button id="addButt">추가</button>
    <!--</form>-->
    <table id="wanted" style="font-size:12px; width:100%;">
        <tr><th width="8%">과목번호</th><th width="25%">교과목명</th><th width="3%">학점</th><th width="3%">시간</th><th width="30%">강의교시/강의실</th><th width="5%">담당교수</th><th width="20%">비고</th></tr>
    </table>
    </div>
    
    <!--생성된 시간표-->
    <section class="no-padding" id="myTimetable">
        <div class="container-fluid">
            <div class="col-lg-4 col-sm-6">
                    <table class="table" id="timeTable">
                       <thead>
                          <tr>
                           <th></th><th>월</th><th>화</th><th>수</th><th>목</th><th>금</th><th>토</th>
                         </tr>
                       </thead>
                       <tbody>
                         <?php
                         for($i=1; $i<=24; $i++){
                           echo "<tr>";
                           echo "<td>".$i."</td>";
                           echo "<td></td>";    //월
                           echo "<td></td>";    //화
                           echo "<td></td>";    //수
                           echo "<td></td>";    //목
                           echo "<td></td>";    //금
                           echo "<td></td>";    //토
                           echo "</tr>";
                         }
                         ?>
                       </tbody>
                     </table>
                </div>
            </div>
        </div>
    </section>

    <!--수강신청 사이트 바로가기-->
    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2></h2>
                <a href="http://sugang.inha.ac.kr/sugang/" class="btn btn-default btn-xl sr-button">수강신청 사이트</a>
            </div>
        </div>
    </aside>

    <!--#contact 불필요시 삭제해도됨-->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">INHA UNIVERSITY</h2>
                    <hr class="primary">
                    <p>MFICS</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
                </div>
            </div>
        </div>
        </from>
    </section>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="./js/bootstrap.min.js"></script>
    
    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script><!--AJAX 관련?-->
    <script src="./js/scrollreveal.min.js"></script>
    <script src="./js/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="./js/creative.min.js"></script>
</body>
</html>

<script type="text/javascript">
/*global $*/

// Ajax 통신 방식 적용
function checkedSubject(){
    // name이 같은 체크박스의 값들을 배열에 담는다.
    var checkboxValues = [];
    $("input[name='subject']:checked").each(function(i) {
        checkboxValues.push($(this).val());
    });

    $.ajax({
        url:"test.php",
        type:'POST',
        data: ({
            subject: checkboxValues
        }),
        success:function(data){
            $("#show").text("선택한 과목: "+data)
        },
        error:function(jqXHR, textStatus, errorThrOne){
            alert("에러 발생 \n" + textStatus + " : " + errorThrOne);
            window.self.close();
        }
    });
}

function addWanted(no, name, score, time, dayTimeRoom, prof, etc) {
  $('<tr />').append(
    $('<td />').text(no),           // 학수번호
    $('<td />').append(name),       // 과목명
    $('<td />').text(score),        // 학점
    $('<td />').text(time),         // 시간
    $('<td />').text(dayTimeRoom),  // 요일 교시 강의실
    $('<td />').text(prof),         // 교수
    $('<td />').text(etc)           // 비고
  ).appendTo($('#wanted'));
}

function addLayer(col, row, len, color, text) {
  //console.log(col,row,len,color,text);
  if (col < 0 || col > 5) return false; // 월=0 화=1 수=2 목=3 금=4 토=5
  if (row < 1 || row + len - 1 > 24) return false;  // 1교시 - 24교시
  if (color == null || color == '') return false;
  if (text == null || text == '') return false;
  var colTdQry = '#timeTable tr:not(:first) td:nth-child(' + (col + 2) + ')';
  var colTd = $(colTdQry);
  if (colTd.find('.layer:contains(' + text + ')').size() > 0) return false;

  var tdHeight = $('#timeTable tr:eq(1) td:eq(1)').height() + 2;
  var layerHeight = tdHeight * len - 1;
  var trgTd = $('#timeTable tr:eq(' + (row + 1) + ') td:eq(' + (col + 1) + ')');
  var maxLen = 0;

  var layer = $('<div class="layer" />')
    .css('position', 'absolute')
    .css('background-color', color)
    .css('height', layerHeight + 'px')
    .css('width', '100%')
    .text(text)
    .appendTo(trgTd)
    .parent().css('position', 'relative').end();

  resizeDupLayer(layer,colTdQry);
  return true;
}

function resizeDupLayer(layer, colTdQry) {
  if (colTdQry == null)
    colTdQry = '#timeTable tr:not(:first) td:nth-child(' + (1 + layer.parent().index()) + ')';
  var ind = $(colTdQry).find('.layer').index(layer);
  layer.css('width', '100%').css('left','0%');
  var hit = layer.collision(colTdQry + ' .layer:not(:eq(' + ind + '))');
  var twidth = 0;
  for (var i = 0; i < hit.length; i++) {
    var width = Number(hit[i].style.width.replace('%', ''));
    twidth += width;
  }
  if (hit.length == 0) return;
  var firstWidth = Number(hit[0].style.width.replace('%', ''));
  if (twidth < 100) { //there's a hole to fit in
    layer.css('width', firstWidth + '%');
    for (var i = 0; i <= hit.length; i++) {//find hole
      layer.css('left', firstWidth *i + '%');
      hit = layer.collision(colTdQry + ' .layer:not(:eq(' + ind + '))');
      if (!hit) break;
      else if (hit.length == 1)
        if (Math.abs(Number(hit[0].style.left.replace('%', '')) - Number(layer.get(0).style.width.replace('%', '')) - Number(layer.get(0).style.left.replace('%', ''))) < 1)
          break;
      }
  } else { //no hole. resize all
    var len = hit.length; //1 / firstWidth * 100;
    var width = 100 / (len + 1);
    for (var i = 0; i < hit.length; i++) {
      var o = $(hit[i]);
      $(o).css('width', width + '%')
        .css('left', width * (i + 1) + '%');
    }
    layer.css('width', width + '%')
      .css('left', '0%');
  }
}

var colorArr = [];
$(document).ready(function () {
    for (var i = 3; i >= 0; i--)
        for (var j = 0; j < 9; j++)
            colorArr.push('hsla(' + (j * 36) + ',' + (100 - i * 20) + '%,' + (50 - i * 20) + '%,.25)');
    
    $("button#addButt").click(function () { //manual add
        var form = $(this).parent();
        var no = form.find("#no").val();
        var find = $("#wanted td:nth-child(2):contains(" + no + ")").parent();
        var color = form.find("#color").val();
        var name = form.find("#name").val();
        var room = form.find("#room").val();
        var week = form.find("#week").val();
        var time = Number(form.find("#time").val());
        var cls=Number(form.find("#class").val());
        var weekClassRoom = week + cls + "-" + (time + cls) + (room == "" ? "" : "(" + room + ")");
        
        // var no = 'ICE1001-001';
        // var color = '';
        // var name = '정보통신입문';
        // var room = '하-232';
        // var week = '수';
        // var time = '3';
        // var cls = '하-232';
        // var weekClassRoom = week + cls + "-" + (time + cls) + (room == "" ? "" : "(" + room + ")");

        if (find.size() > 0) {
            color = $("#timeTable .layer:contains(" + no + "):first").css("background-color");
            name = find.find("td:eq(2)").text();
            time = Number(find.find("td:eq(4)").text());
            find.find("td:eq(5)").append(", " + weekClassRoom);
        } else if (color == "")
            color = colorArr.pop();
        if (false == addLayer(
            ["월", "화", "수", "목", "금"].indexOf(week),
            cls,
            time,
            color,
            no+" "+name+" "+room
        ))
            colorArr.push(color);
        //else {
            if (find.size() == 0)
                addWanted(no, name, form.find("#score").val(), time,
                    weekClassRoom, form.find("#prof").val(), form.find("#etc").val());
        //}
        form.find("input").val("")
            [0].focus();
        return false;
    });
    //setTimeout(loadTest, 500);
});

</script>