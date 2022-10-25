<?php

require_once __DIR__ . "/../../View.php";
require_once __DIR__ . "/../../Valida.php";

class Calendar{
  # Verifica todos os dias que vão aparecer naquela tela do calendário
  private function verifyMonth(){
    # Verifica todos os dias que vão aparecer na página do calendário:
    #  Se algum dia do mês tiver aula marcada, adiciona classMonth;
    #  Se algum dia do mês for um dia atual, adicione no atributo atualDay;
  }
  static private function constructRows($date){
    $dateCount = strtotime("last sunday", $date);
    $linhas = "";
    for($l = 0; $l < 6; $l++){
      $linhas .= '<tr>';
      for($c = 0; $c < 7; $c++){
        $linhas .= '<th';
        if(date("Y\-m\-d", strtotime("now -3 hours")) == date("Y\-m\-d", $dateCount)) $linhas .= ' class="today"';
        if(date("Y/-m", $dateCount) != date("Y/-m", $date)) $linhas .= ' class="outMonthDay"';
        $linhas .= '>' . date("d", $dateCount);
        # if(tiver com aula marcada no dia) $linhas .= '<div class="Mark"></div>';
        $linhas .= '</p></th>';
        $dateCount = strtotime("+1 day", $dateCount);
      }
      $linhas .= '</tr>';
    }
    return $linhas;
  }
  static private function prevMonth($date){
    return date("Y\-m\-d", strtotime("-1 month", $date));
  }
  static private function nextMonth($date){
    return date("Y\-m\-d", strtotime("+1 month", $date));
  }
  static private function setDate(){
    $date = get("month") ?? "";
    if(validateDate($date) == 1) $date = Date("Y\-m\-01");
    return strtotime($date);
  }
  static private function replaceName($month){
    $names = ['December' => 'Dezembro', 'November' => 'Novembro', 'October' => 'Outubro', 'September' => 'Setembro', 'August' => 'Agosto', 'July' => 'Julho', 'June' => 'Junho', 'March' => 'Março', 'May' => 'Maio', 'April' => 'Abril', 'February' => 'Fevereiro', 'January' => 'Janeiro'];
    return str_replace(array_keys($names), array_values($names), $month);
  }
  static function getCalendar(){
    $date = self::setDate();
    
    return View::render("Calendar", [
      "next" => '?month=' . self::nextMonth($date) . '',
      "prev" => '?month=' . self::prevMonth($date) . '',
      "month" => self::replaceName(date("F Y", $date)),
      "dias" => self::constructRows($date)
    ]);
}
}

/**/