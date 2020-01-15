<?php

namespace App;
class Calendar
{
    private $holidays; 
    private $html; 
    function __construct($holidays) {
        $this->holidays = $holidays;
    }
   
    public function showCalendarTag($m, $y)
    {
        $year = $y;
        $month = $m;
        if ($year == null) {
            // システム日付を取得する。 
            $year = date("Y");
            $month = date("m");
        }
        $firstWeekDay = date("w", mktime(0, 0, 0, $month, 1, $year)); // 1日の曜日(0:日曜日、6:土曜日)
        $lastDay = date("t", mktime(0, 0, 0, $month, 1, $year)); // 指定した月の最終日
         // 前月
	$prev = strtotime('-1 month',mktime(0, 0, 0, $month, 1, $year));
        $prev_year = date("Y",$prev);
        $prev_month = date("m",$prev);
        // 翌月
	$next = strtotime('+1 month',mktime(0, 0, 0, $month, 1, $year));
        $next_year = date("Y",$next);
        $next_month = date("m",$next);
        // 日曜日からカレンダーを表示するため前月の余った日付をループの初期値にする
        $day = 1 - $firstWeekDay;
        $this->html = <<< EOS

<h1>{$year}年{$month}月</h1>
<h2>
<a class="btn btn-primary" href="/calendar?year={$prev_year}&month={$prev_month}" role="button">&lt;前月</a>
{$year}年{$month}月
<a class="btn btn-primary" href="/calendar?year={$next_year}&month={$next_month}" role="button">翌月&gt;</a>
</h2>
<table class="table table-bordered" style="table-layout:fixed;">
<tr>
  <th scope="col">日</th>
  <th scope="col">月</th>
  <th scope="col">火</th>
  <th scope="col">水</th>
  <th scope="col">木</th>
  <th scope="col">金</th>
  <th scope="col">土</th>
</tr>
EOS;
        // カレンダーの日付部分を生成する
        while ($day <= $lastDay) {
            $this->html .= "<tr>";
            // 各週を描画するHTMLソースを生成する
            for ($i = 0; $i < 7; $i++) {
                if ($day <= 0 || $day > $lastDay) {
                    // 先月・来月の日付の場合
                    $this->html .= "<td>&nbsp;</td>";
                } else {
                   //$this->html .= "<td>" . $day . "</td>"; 
                   $this->html .= "<td>" . $day ."&nbsp"; 
                   $target = date("Y-m-d", mktime(0, 0, 0, $month, $day, $year)); 
                   foreach($this->holidays as $val) {
                       if ($val->day == $target) {
                           $this->html .= $val->description; 
                           break;
                       }
                   }
                   $this->html .= "</td>"; 
                }
               $day++;
            }

            $this->html .= "</tr>";
        }
        $this->html .='</table>';

        return $this->html;
    }
}
