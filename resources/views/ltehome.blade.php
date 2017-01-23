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
    <link href="http://211.222.232.176/mfics2/Laravel/public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://211.222.232.176/mfics2/Laravel/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="http://211.222.232.176/mfics2/Laravel/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="http://211.222.232.176/mfics2/Laravel/public/css/creative.min.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="http://211.222.232.176/mfics2/Laravel/vendor/jquery/jquery.min.js"></script>
</head>

<body id="home">
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
    <form method="POST" action="checkList">
    <section class="bg-primary" id="lectureList">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">강의 목록</h2>
                    <hr class="light">
                    <p class="text-faded">과목 선택 후 시간표 생성</p>
                    <!--<a type="submit" href="#myTimetable" class="page-scroll btn btn-default btn-xl sr-button">생성된 시간표 보기</a>-->
                    <input type="submit" value="시간표 생성" class="page-scroll btn btn-default btn-xl sr-button" href="#myTimetable"/><!--보완 필요-->
                    <p>{{ $class }}</p>
                    <p><a href="javascript: array_chk ();"> Ajax 연동 </a></p>
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
                       <td><input type="checkbox" name="subject[]" value="ACE1313"></td>
                       <td>객체지향프로그래밍1</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE1001"></td>
                       <td>정보통신입문</td>
                     </tr>
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
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ACE2105"></td>
                       <td>선형대수</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE2002"></td>
                       <td>회로이론</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE2003"></td>
                       <td>전자기학1</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE2004"></td>
                       <td>자료구조론</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE2006"></td>
                       <td>정보통신기초설계/실습1</td>
                     </tr>
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
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE3002"></td>
                       <td>확률변수론</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE3004"></td>
                       <td>반도체소자</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE3005"></td>
                       <td>전자회로2</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE3008"></td>
                       <td>전파공학</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE3013"></td>
                       <td>시스템프로그래밍</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE3020"></td>
                       <td>알고리즘설계</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE4001"></td>
                       <td>광자공학기초</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE4005"></td>
                       <td>디지털시스템설계</td>
                     </tr>
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
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE3015"></td>
                       <td>임베디드시스템설계</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE3017"></td>
                       <td>광통신공학설계</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE4009"></td>
                       <td>디지털통신시스템설계</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE4024"></td>
                       <td>정보통신종합설계</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE4025"></td>
                       <td>인터넷프로토콜</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE4027"></td>
                       <td>디지털영상처리설계</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE4029"></td>
                       <td>모바일응용소프트웨어설계</td>
                     </tr>
                     <tr>
                       <td><input type="checkbox" name="subject[]" value="ICE4400"></td>
                       <td>기업연계형정보통신시스템</td>
                     </tr>
                   </tbody>
                 </table>
               </div>
             </div>
    </section>
    </form>


    <section class="no-padding" id="myTimetable">
        <div class="container-fluid">
            <div class="row no-gutter popup-gallery">
                <div class="col-lg-4 col-sm-6">
                    <a href="img/section1.jpg" class="portfolio-box">
                        <img src="img/section1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    My Timetable
                                </div>
                                <div class="project-name">
                                    #1
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/section2.jpg" class="portfolio-box">
                        <img src="img/section2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    My Timetable
                                </div>
                                <div class="project-name">
                                    #2
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/section3.jpg" class="portfolio-box">
                        <img src="img/section3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    My Timetable
                                </div>
                                <div class="project-name">
                                    #3
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/section4.jpg" class="portfolio-box">
                        <img src="img/section4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    My Timetable
                                </div>
                                <div class="project-name">
                                    #4
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/section5.jpg" class="portfolio-box">
                        <img src="img/section5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    My Timetable
                                </div>
                                <div class="project-name">
                                    #5
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="img/section6.jpg" class="portfolio-box">
                        <img src="img/section6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    My Timetable
                                </div>
                                <div class="project-name">
                                    #6
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2></h2>
                <a href="http://sugang.inha.ac.kr/sugang/" class="btn btn-default btn-xl sr-button">수강신청 사이트</a>
            </div>
        </div>
    </aside>

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
    <script src="http://211.222.232.176/mfics2/Laravel/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="http://211.222.232.176/mfics2/Laravel/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="http://211.222.232.176/mfics2/Laravel/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="http://211.222.232.176/mfics2/Laravel/public/js/creative.min.js"></script>

</body>

</html>

<script type="text/javascript">
    
    //Ajax 연동
    function array_chk() {
       /*global $*/
        var para2 = [];
        $("input[name='subject[]']:checked").each(function(i) {
        para2.push($(this).val());
        });
       
       
        var postData = { "para1": "para1", "chklist": para2 };
        
        $.ajax({
           type:'POST',
           url:"checkList.blade.php",
           data:postData,
           success: function(object){
               alert ($(this).value());
           }
        });
   
        // $.ajax({
        //       url:'checkList.php',
        //       type:'post',
        //       timeout:1000,
        //       data:postData,
        //       traditional: true,
        //       error:function(){
        //              alert('네트워크가 불안정합니다.');
        //       },
        //       success:function(obj){
        //              alert (obj);
        //       }
        // });
    }   
</script>