<?php

$pageask = explode("/", $_SERVER["REQUEST_URI"]);
array_splice($pageask, 1, 1);


print_r($pageask);