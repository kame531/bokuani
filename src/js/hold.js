'use strict';

window.addEventListener('load', function() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', './js/data/day-ent.json', true);
  xhr.onload = function(e) {
    var data = eval('(' + xhr.responseText + ')');
    //日時
    var day_html = '<table class="day-ent_table">'
    for (var i = 0; i < data.length; i++) {
      day_html += '<tr><th>日時</th>';
      day_html += '<td>' + data[i]['year'] + '年' + data[i]['manth'] + '月' + data[i]['day'] + '日(' + data[i]['week'] + ')' + '</td>';
      day_html += '</tr><tr><th>START</th>';
      day_html += '<td>' + data[i]['start'] + '</td>';
      day_html += '</tr><tr><th>CLOSE</th>';
      day_html += '<td>' + data[i]['close'] + '</td>';
      day_html += '</tr>';
    }
    day_html += '</table>';

    var day_table = document.getElementById('day_table');
    day_table.innerHTML = day_html;
    // エントランス
    var ent_html = '<table class="day-ent_table">'
    for (var i = 0; i < data.length; i++) {
      ent_html += '<tr>';
      ent_html += '<th>Door</th>';
      ent_html += '<td>&yen' + data[i]['door'] + '</td>';
      ent_html += '</tr>';
      ent_html += '<th>参加表明</th>';
      ent_html += '<td>&yen' + data[i]['assertion'] + '</td>';
      ent_html += '</tr>';
      ent_html += '<th>コスプレ参加</th>';
      ent_html += '<td>&yen' + data[i]['cosplay'] + '</td>';
      ent_html += '</tr>';
      ent_html += '</tr>';
    }
    ent_html += '</table>';

    var ent_table = document.getElementById('ent_table');
    ent_table.innerHTML = ent_html;
  }
  xhr.send();
});
