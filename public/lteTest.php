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
                    <!--<p>{{ $OOP1 }}</p>-->
                </div>
            </div>
        </div>
    </section>
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
                     <tr>
                       <td><input type="checkbox" name="subject" value="ACE1313"/></td>
                       <td>객체지향프로그래밍1</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject" value="ICE1001"/></td>
                       <td>정보통신입문</td>
                     </tr>
                   </tbody>
                 </table>
               </div>
             </div>
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
        error:function(jqXHR, textStatus, errorThrown){
            alert("에러 발생~~ \n" + textStatus + " : " + errorThrown);
            window.self.close();
        }
    });
}
</script>