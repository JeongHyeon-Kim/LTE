<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Sunra\PhpSimple\HtmlDomParser;
use Ivory\GoogleMap\Services\Geocoding\Geocoder;
use Ivory\GoogleMap\Services\Geocoding\GeocoderProvider;
use Geocoder\HttpAdapter\CurlHttpAdapter;

class HomeController extends Controller {
    public function update()
    {
        $club_type = 3;
        
        // init the resource
        //페이지 URL
        //$url = "http://sugang.inha.ac.kr/sugang/SU_51001/Lec_Time_Search.aspx"; //chrome에서 확인 가능 : view-source:http://sugang.inha.ac.kr/sugang/SU_51001/Lec_Time_Search.aspx
        $url = "http://www.bigkinds.or.kr/search/totalSearchView.do?news_id=01500701.20170214230415001";
        //$url = "http://sugang.inha.ac.kr/sugang/SU_51001/Lec_Time_Search.htm";
        $postData = array(
            'pagesize' => '100',
            'facility' => '0',
            'gfeeoption' => '0',
            'gfeefrom' => '0',
            'gfeeto' => '250000',
            'openfrom' => '1960',
            'opento' => '2014'
        );//연관 배열(index를 문자열로 하여 값에 의미 부여)
        
        // foreach($postData as $key => $value) { //as는 배열의 인덱스($key)와 값($value)을 각각 aliasing
        //     if($key == 'opento')
        //     echo "$key : $value".'<br />';
        // }
        
        $postOutput = $this->postPage($url, $postData);//Url과 함께 배열 데이터를 넘겨줌(원본)
        //$postOutput = $this->postPage($url);
        $html = HtmlDomParser::str_get_html( $postOutput );//파싱 부분?
        //$elements = $html->find('div[class=onc_cc_data]');(원본)
        //$elements = $html->find("div[class=lstBox]");
        
        // $subjectInformations = $html->find("td[class=Center]")->plaintext;//과목 정보 추출
        // foreach ($subjectInformations as $subjectInformation) {
        //     echo $subjectInformation.'<br>';
        // }
        
        //$subjectNumbers = $html->find("font");//학수번호 추출
        $subjectNumbers = $html->find('p[id=contentArticle]');
        $idx = 0;
        foreach($subjectNumbers as $subjectNumber) {
            $idx++;
            echo $subjectNumber.'dmd'.$idx.'<br>';
        }
        echo 'idx는'.$idx;
        
        // $idx = 0;
        // foreach ($elements as $element) {
        //     $idx++;
        
        //     $club_id = sprintf("%02d%03d", $club_type, $idx);
        //     echo $club_id;
        //     echo "\n";

        //     echo $club_type;
        //     echo "\n";

        //     $href = $element->find('a', 0)->href;

        //     $pos = strripos($href, '/');
        //     $webidx = substr($href, $pos + 1);

        //     $url = 'http://gcinfo.xxx.com'.$href;
        //     $url2 = 'http://gcinfo.xxx.com/gz/ajax/html/searchcc/home/'.$webidx;
        //     $url3 = 'http://gcinfo.xxx.com/gz/ajax/html/searchcc/booking/'.$webidx;

        //     $info = trim($element->find('a', 1)->plaintext);
        //     $ret = preg_match("/\[(.+)\]\s+(\([A-Z]+\))([^|]+)\s+\|\s+(.+)/", $info, $matches);

        //     if (!$ret)
        //         dd('Fatal error. Can\'t match with the regular expression.');

        //     echo $matches[2];
        //     echo "\n";

        //     $region = $matches[1]; 
        //     echo $matches[1];
        //     echo "\n";

        //     $name = $matches[3]; 
        //     echo $matches[3];
        //     echo "\n";

        //     $holes = intval($matches[4]);
        //     echo intval($matches[4]);
        //     echo "\n";

        //     $info = trim($element->find('dd.course_name', 0)->plaintext);
        //     $info = str_replace(' ', '', $info);
        //     $courses = ($info) ?: 'n/a';
        //     echo $courses;
        //     echo "\n";

        //     $info = $element->find('dd.infophone', 0)->plaintext;
        //     $phone = trim(str_replace('문의전화 ', '', $info));
        //     echo ($phone);
        //     echo "\n";

        //     //
        //     // sub page
        //     //

        //     $getOutput = $this->getPage($url);
        //     $html2 = HtmlDomParser::str_get_html( $getOutput );

        //     $address = trim($html2->find('div.detail_gc table td', 0)->plaintext);
        //     echo ($address);
        //     echo "\n";

        //     $geocoder = new Geocoder();
        //     $geocoder->registerProviders(array(
        //         new GeocoderProvider(new CurlHttpAdapter()),
        //     ));
        //     $response = $geocoder->geocode($address);

        //     $latitude = 0;
        //     $longitude = 0;

        //     $results = $response->getResults();
        //     foreach ($results as $result) {
        //         $location = $result->getGeometry()->getLocation();
        //         $latitude = $location->getLatitude();
        //         $longitude = $location->getLongitude();
        //     }

        //     $detail = $html2->find('div.detail_gc a.btn_go_homepage', 0)->href;
        //     $webpage = ($detail) ?: 'n/a';
        //     echo $webpage;
        //     echo "\n";

        //     //
        //     // sub page
        //     //

        //     $getOutput2 = $this->getPage($url3);
        //     $html3 = HtmlDomParser::str_get_html( $getOutput2 );

        //     $weekday_fee = 0;
        //     $weekend_fee = 0;
        //     $cart_fee = 0;
        //     $caddie_fee = 0;

        //     if ($html3->find('div.greenfee_data td', 0)) {

        //         $detail = trim($html3->find('div.greenfee_data td', 0)->plaintext);
        //         $detail = trim(str_replace(',', '', $detail));
        //         $weekday_fee = intval($detail);
        //         echo $weekday_fee;
        //         echo "\n";

        //         $detail = trim($html3->find('div.greenfee_data td', 1)->plaintext);
        //         $detail = trim(str_replace(',', '', $detail));
        //         $weekend_fee = intval($detail);
        //         echo $weekend_fee;
        //         echo "\n";

        //         $detail = trim($html3->find('div.rounding_info li', 0)->plaintext);
        //         $detail = preg_replace("/\s+/", '', $detail);
        //         $detail = trim(str_replace('카트피:', '', $detail));
        //         $detail = trim(str_replace(',', '', $detail));
        //         $cart_fee = intval($detail);
        //         echo $cart_fee;
        //         echo "\n";

        //         $detail = trim($html3->find('div.rounding_info li', 1)->plaintext);
        //         $detail = preg_replace("/\s+/", '', $detail);
        //         $detail = trim(str_replace('캐디피:', '', $detail));
        //         $detail = trim(str_replace(',', '', $detail));
        //         $caddie_fee = intval($detail);
        //         echo $caddie_fee;
        //         echo "\n";

        //     } else {
        //         echo "0\n0\n0\n0\n";
        //     }

        //     // write into the DB table here
        // }
    }


    function postPage($url, $data) {//page 게시(원본)
    //public function postPage($url) {//page 게시
        // init the resource
        echo '함수 진입<br>';
        $ch = curl_init(); //cURL handle 생성 혹은 cURL session 초기화(client URL 의미, HTTP/FTP 등의 프로토콜 등에 의해 전송되는 파일들을 위한 command line tool)
        
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true, // return web page 
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data, //데이터 넘겨주는게 없으므로 필요 X
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTPHEADER => array ("Content-Type: text/xml; charset=utf-8")
        ));//옵션을 배열로 한꺼번에 설정

        
        $output = curl_exec($ch);//실행 후 결과 저장
        
        // free
        curl_close($ch);//핸들러 반환
        echo '결과 반환<br>';
        return $output;//결과 반환
    }

    public function getPage($url) {
        // init the resource
        $ch = curl_init();

        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
        ));

        $output = curl_exec($ch);

        // free
        curl_close($ch);

        return $output;
    }
}
?>