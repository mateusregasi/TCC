<?

require_once __DIR__ . "/../../View.php";
require_once __DIR__ . "/../PageComponents/Calendar.php";

class CalendarPage{
  static function get($request = ''){
    return View::render("CalendarPage" , [
                        "navbar" => View::render("Navbar"),
                        "calendar" => Calendar::getCalendar($request),
                        "footer" => View::render("Footer")
    ]);
  }
} /* Por algum motivo o atributo estático tá sumindo */