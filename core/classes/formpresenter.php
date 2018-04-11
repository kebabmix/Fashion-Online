<?php
/**
 * Created by PhpStorm.
 * user: chri798x
 * Date: 09-04-2018
 * Time: 12:55
 */

class formpresenter
{
    /* Class Properties */

    public $arrFormElms;
    public $arrValues;

    public $accHtml;

    public $formId;
    public $formMethod;
    public $formAction;
    public $formClass;
    public $iUseEnctype;
    public $arrButtons;


    public function __construct($arrFormElms, $arrValues)
    {
        $this->arrFormElms = $arrFormElms;
        $this->arrValues = $arrValues;

        $this->formId = "adminform";
        $this->formMethod = "POST";
        $this->formAction = "save";
        $this->formClass = "";
        $this->arrButtons = "";

        $this->accHtml = "";
    }


    public function presentForm()
    {

        $this->accHtml = "<form method=\"" . $this->formMethod . "\" class=\"" . $this->formClass . " form-horizontal\" \" id=\"" . $this->formId . "\">\n";
        $this->accHtml .= "<input type=\"hidden\" name=\"mode\" value=\"" . $this->formAction . "\">\n";


        foreach ($this->arrFormElms as $name => $formelements) {

            switch (strtoupper($formelements[0])) {
                case "HIDDEN":
                    $this->accHtml .= $this->inputHidden($name, $this->arrValues[$name]);
                    break;
                case "TEXT":
                    $strInputHtml = $this->inputText($name, $this->arrValues[$name], $formelements[2]);
                    $this->accHtml .= $this->setInputGroup($name, $formelements[1], $strInputHtml, $formelements[2]);
                    break;
                case "EMAIL":
                    $strInputHtml = $this->inputEmail($name, $this->arrValues[$name], $formelements[2]);
                    $this->accHtml .= $this->setInputGroup($name, $formelements[1], $strInputHtml, $formelements[2]);
                    break;
                case "SELECT":
                    $strInputHtml = $this->arrValues[$name];
                    $this->accHtml .= $this->setInputGroup($name, $formelements[1], $strInputHtml, $formelements[2]);
                    break;
                case "CHECKBOX":
                    $strInputHtml = $this->inputCheckbox($name, $this->arrValues[$name]);
                    $this->accHtml .= $this->setInputGroup($name, $formelements[1], $strInputHtml);
                    break;
                case "DATE":
                    $stamp = ($this->arrValues[$name] > 0) ? $this->arrValues[$name] : time();
                    $d = new DateSelector($stamp);
                    $strInputHtml = "<div class=\"form-inline\">";
                    $strInputHtml .= $d->dateselect("day", $name);
                    $strInputHtml .= $d->dateselect("month", $name);
                    $strInputHtml .= $d->dateselect("year", $name);
                    $strInputHtml .= "</div>";
                    $this->accHtml .= $this->setInputGroup($name, $formelements[1], $strInputHtml, $formelements[2]);
                    break;
                case "DATETIME":
                    $stamp = ($this->arrValues[$name] > 0) ? $this->arrValues[$name] : time();
                    $d = new DateSelector($stamp);
                    $strInputHtml = "<div class=\"form-inline\">";
                    $strInputHtml .= $d->dateselect("day", $name);
                    $strInputHtml .= $d->dateselect("month", $name);
                    $strInputHtml .= $d->dateselect("year", $name);
                    $strInputHtml .= $d->dateselect("hours", $name);
                    $strInputHtml .= $d->dateselect("minutes", $name);
                    $strInputHtml .= "</div>";
                    $this->accHtml .= $this->setInputGroup($name, $formelements[1], $strInputHtml, $formelements[2]);
                    break;
            }
        }

        $this->accHtml .= "<div class=\"buttonpanel\">\n\t";
        if (empty($this->arrButtons)) {
            $this->accHtml .= htmltool::button("Annuller", "button") . "\t";
            $this->accHtml .= htmltool::button("Gem");
        } else {
            foreach ($this->arrButtons as $key => $value) {
                $this->accHtml .= $value;
            }
        }

        $this->accHtml .= "</form>\n";
        return $this->accHtml;
    }


    public function inputHidden($name, $value){
        return "<input type=\"hidden\" name=\"" . $name . "\" id=\"" . $name . "\" value=\"" . $value . "\">\n";
    }

    public function inputText($name, $value, $required){
        return "<input type=\"text\" name=\"" . $name . "\" id=\"" . $name . "\" class=\"form-control\" value=\"" . $value . "\" " . $required . ">\n";
    }

    public function inputEmail($name, $value, $required){
        return "<input type=\"email\" name=\"" . $name . "\" id=\"" . $name . "\" class=\"form-control\" value=\"" . $value . "\" " . $required . ">\n";
    }

    public function inputCheckbox($id, $value){
        $checked = ($id === $value) ? "checked" : "";
        return "<input type=\"checkbox\" name=\"" . $id . "\" id=\"" . $id . "\" value=\"1\"   " . $checked . ">\n";
    }

    static function inputSelect($name, $options, $value){
        $strHtml = "<select class=\"form-control\" id=\"" . $name . "\" name=\"" . $name . "\">\n";
        foreach ($options as $option_value => $option_text) {
            /* Define if option should be selected */
            $selected = ($option_value === $value) ? "selected" : "";
            /* Accumulate html string with option */
            $strHtml .= "<option value=\"" . $option_value . "\" " . $selected . ">" . $option_text . "</option>\n";
        }
        $strHtml .= "</select>\n";
        return $strHtml;
    }

    public function setInputGroup($fieldname, $labeltext, $strInputHtml){
        $str = "<div class=\"form-group\" data-group=\"" . $fieldname . "\">\n";
        $str .= "  <label class=\"col-sm-2 control-label\"  for=\"" . $fieldname . "\">" . $labeltext . ":</label>\n";
        $str .= "  <div class=\"col-sm-10\">\n\t" . $strInputHtml . "  </div>\n";
        $str .= "</div>\n\n";
        return $str;
    }
}

