<?php
class htmltool
{
    /**
     * @param $text
     * @param $link
     * @return string
     */
    static function button($text, $type = "submit", $class = "btn btn-primary") {
        return "<button type='".$type."' class='".$class."'>" . $text . "</button>\n";
    }


    static function linkbutton($text, $link) {
        return "<a class='btn btn-primary' href='$link'>" . $text . "</a>\n";
    }



    static function linkicon($class, $link, $icon, $attr = array()) {
        return "<a class='$class' href='$link'><i class='fa fa-".$icon."'></i></a>\n";
    }


    static function date2local($date) {
        $dkmonths = array(1 => "Januar",
            "Februar", "Marts", "April", "Maj", "Juni", "Juli",
            "August", "September", "Oktober", "November", "December");
        return date("j", $date) . ". " . $dkmonths[date("n", $date)] . " " . date("Y", $date);
    }


    static function datetime2local($date) {
        return self::date2local($date) . " Kl. " . date("H:i", $date);
    }
}