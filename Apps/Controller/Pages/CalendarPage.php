<?
require_once __DIR__ . "/../../Utils/View.php";
require_once __DIR__ . "/../PageComponents/Calendar.php";

class CalendarPage{
  static function get($request = ''){
    return View::render("CalendarPage" , [
                        "navbar" => View::render("Navbar"),
                        "calendar" => Calendar::getCalendar($request),
                        "footer" => View::render("Footer")
    ]);
  }
}