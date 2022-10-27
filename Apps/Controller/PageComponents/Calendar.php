<?php

require_once __DIR__ . "/../../View.php";
require_once __DIR__ . "/../../Valida.php";

class Calendar{
  private static $month;
  # Verifica todos os dias que vão aparecer naquela tela do calendário
  private function verifyMonth(){
    # Verifica todos os dias que vão aparecer na página do calendário:
    #  Se algum dia do mês tiver aula marcada, adiciona classMonth;
    #  Se algum dia do mês for um dia atual, adicione no atributo atualDay;
  }
  static private function constructRows(){
    $dateCount = strtotime("last sunday", strtotime(self::$month));
    $linhas = "";
    for($l = 0; $l < 6; $l++){
      $linhas .= '<tr>';
      for($c = 0; $c < 7; $c++){
        $linhas .= '<th';
        if(date("Y\-m\-d", strtotime("now -3 hours")) == date("Y\-m\-d", $dateCount)) $linhas .= ' class="today"';
        if(date("Y/-m", $dateCount) != date("Y/-m", strtotime(self::$month))) $linhas .= ' class="outMonthDay"';
        $linhas .= '>' . date("d", $dateCount);
        # if(tiver com aula marcada no dia) $linhas .= '<div class="Mark"></div>';
        $linhas .= '</p></th>';
        $dateCount = strtotime("+1 day", $dateCount);
      }
      $linhas .= '</tr>';
    }
    return $linhas;
  }
  static private function prevMonth(){
    return date("Y\-m\-d", strtotime("-1 month", strtotime(self::$month)));
  }
  static private function nextMonth(){
    return date("Y\-m\-d", strtotime("+1 month", strtotime(self::$month)));
  }
  static private function setDate($request){
    if($request == ''){
      self::$month = Date("Y\-m\-01");
    } else{
      if(isset($request->getPostVars()["prev"])) self::$month = $request->getPostVars()["prev"];
      if(isset($request->getPostVars()["next"])) self::$month = $request->getPostVars()["next"];
    }
  }
  static private function replaceName(){
    $names = ['December' => 'Dezembro', 'November' => 'Novembro', 'October' => 'Outubro', 'September' => 'Setembro', 'August' => 'Agosto', 'July' => 'Julho', 'June' => 'Junho', 'March' => 'Março', 'May' => 'Maio', 'April' => 'Abril', 'February' => 'Fevereiro', 'January' => 'Janeiro'];
    return str_replace(array_keys($names), array_values($names), date("F Y", strtotime(self::$month)));
  }
  static function getCalendar($request){
    self::setDate($request);
    return View::render("Calendar", [
      "next" => self::nextMonth(),
      "prev" => self::prevMonth(),
      "month" => self::replaceName(),
      "dias" => self::constructRows()
    ]);
  }
}

/**/