<script src="Laravel/public/js/bootstrap.min.js"></script>
/*global $*/

// 임의로 과목 추가하는 함수
function addWanted(no, name, score, time, dayTimeRoom, prof, etc) {
  $('<tr />').append(
    $('<td />').text(no),           // 학수번호
    $('<td />').append(name),       // 과목명
    $('<td />').text(score),        // 학점
    $('<td />').text(time),         // 연강
    $('<td />').text(dayTimeRoom),  // 요일 교시 강의실
    $('<td />').text(prof),         // 교수명
    $('<td />').text(etc)           // 비고
  ).appendTo($('#wanted'));
}

// 
function addLayer(col, row, len, color, text) { // col=요일 row=교시 len=연강 color=색깔 text=학수번호+과목명+강의실
  //console.log(col,row,len,color,text);
  if (col < 0 || col > 5) return false; //요일 [월=0 화=1 수=2 목=3 금=4 토=5]
  if (row < 1 || row + len - 1 > 24) return false;  // 1교시 ~ 24교시
  if (color == null || color == '') return false;
  if (text == null || text == '') return false; // 학수번호+과목명+강의실
  var colTdQry = '#timeTable tr:not(:first) td:nth-child(' + (col + 2) + ')'; // 해당 요일의 첫번째 행을 제외한 셀
  var colTd = $(colTdQry);  // 해당 요일의 첫번째 행을 제외한 셀
  if (colTd.find('.layer:contains(' + text + ')').size() > 0) return false; // 이미 추가된 항목이면 return false

  var tdHeight = $('#timeTable tr:eq(1) td:eq(1)').height() + 2;  // tdHeight = (1행1열 셀의 높이) + 2
  var layerHeight = tdHeight * len - 1; // 연강
  var trgTd = $('#timeTable tr:eq(' + (row + 1) + ') td:eq(' + (col + 1) + ')');  // 해당 요일/교시의 셀
  var maxLen = 0; // 잉?

  var layer = $('<div class="layer" />')  // var layer는 css갖다붙이는거
    .css('position', 'absolute')  // 가장 가까운 곳에 위치한 조상 element에 상대적으로 위치가 지정된다
    .css('background-color', color) // 색깔 표시되고
    .css('height', layerHeight + 'px')  // 연강
    .css('width', '100%') // width는 꽉 채움
    .text(text) // 학수번호+과목명+강의실 
    .appendTo(trgTd)  // 해당 교시/요일의 셀에 갖다붙임
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

function showResult() {
  $('table#resultTable tr:not(:first,:last)').remove();
  var totalScr = 0;
  $('#wanted tr:not(:first) td:nth-child(1):contains("보임")').parent().each(function (i, r) {
    var tds = $('td', r);
    //console.log(window.td = tds);
    var name = tds.eq(2).text();
    var no = tds.eq(1).text();
    if (Number($(r).css('opacity')) > 0.5 && $('table#resultTable tr:not(:first,:last) td:nth-child(1):contains(' + no + ')').size() == 0) {
      var scr = Number(tds.eq(3).text());
      $('table#resultTable tr:last').before(
        $('<tr />').append(
          $('<td />').text(no),
          $('<td />').text(name),
          $('<td />').text(scr)
        )
      );
      totalScr += scr;
    }
  });
  $('table#resultTable td:last').text(totalScr);
}

var colorArr = [];
// onload 함수
$(document).ready(function () {
    $("button#addButt").click(function () { //manual add
        var form = $(this).parent();
        var no = form.find("#no").val();
        var find = $("#wanted td:nth-child(2):contains(" + no + ")").parent();
        var name = form.find("#name").val();
        var room = form.find("#room").val();
        var week = form.find("#week").val();
        var time = Number(form.find("#time").val());
        var cls=Number(form.find("#class").val());
        var weekClassRoom = week + cls + "-" + (time + cls) + (room == "" ? "" : "(" + room + ")");

        if (find.size() > 0) {
            name = find.find("td:eq(2)").text();
            time = Number(find.find("td:eq(4)").text());
            find.find("td:eq(5)").append(", " + weekClassRoom);
        }
        if (false == addLayer(
            ["월", "화", "수", "목", "금"].indexOf(week),
            cls,
            time,
            no+" "+name+" "+room
        ))
        //else {
            if (find.size() == 0)
                addWanted(no, name, form.find("#score").val(), time,
                    weekClassRoom, form.find("#prof").val(), form.find("#etc").val());
            showResult();
        //}
        form.find("input").val("")
            [0].focus();
        return false;
    });
    //setTimeout(loadTest, 500);
});
