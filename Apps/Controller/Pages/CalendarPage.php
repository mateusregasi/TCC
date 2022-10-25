<?

require_once __DIR__ . "/../../View.php";
require_once __DIR__ . "/../PageComponents/Calendar.php";

class CalendarPage{
  static function get(){
    return View::render("CalendarPage" , [
                        "navbar" => View::render("Navbar"),
                        "calendar" => Calendar::getCalendar(),
                        "footer" => View::render("Footer")
    ]);
  }
}