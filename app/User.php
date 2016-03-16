<?php

use League\Fractal;

$fractal = new Fractal\Manager();

if (isset($_GET['include'])) {
    $fractal->parseIncludes($_GET['include']);
}
