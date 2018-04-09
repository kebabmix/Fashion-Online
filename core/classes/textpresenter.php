<?php
class textPresenter {

    static function presentpanel($strModuleName = "Modul", $strModuleMode = "Oversigt", $arrButtonPanel = array()) {
        $accHtml = ""; /* Accumulated html string */
        /* Indsætter titler */
        $accHtml .= '<div class="mainheader">' .
            '<h2 class="d-inline-block">' . $strModuleMode . '</h2>';
        /* Bygger knap panel */
        if(count($arrButtonPanel) > 0) {
            $accHtml .= '<div class="pull-right">';
            foreach ($arrButtonPanel as $button) {
                $accHtml .= $button;
            }
            $accHtml .= '</div>';
        }
        '</div>';
        return $accHtml;
    }
}