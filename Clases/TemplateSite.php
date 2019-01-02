<?php

namespace Clases;

class TemplateSite
{

    public $title;
    public $keywords;
    public $description;
    public $favicon;
    public $canonical;

    public function themeInit()
    {
        echo '<!DOCTYPE html >';
        echo '<!--[if IE 7]><html class="ie ie7" ><![endif]--><!--[if IE 8]><html class="ie ie8" ><![endif]--><!--[if IE 9]><html class="ie ie9" ><![endif]-->';
        echo '<html lang = "en" >';
        echo '<head >';
        include("assets/inc/header.inc.php");
        echo '</head>';
        echo '<!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]--><!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]--><!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->';
        echo '<body>';
        include("assets/inc/nav.inc.php");
    }

    public function themeEnd()
    {
        include("assets/inc/footer.inc.php");
        echo "</body>";
        echo "</html>";
    }

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function get($atributo)
    {
        return $this->$atributo;
    }
}