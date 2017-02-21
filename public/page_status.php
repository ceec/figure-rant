<?php

//cron to test if page is down


$test = file_get_contents('http://enstars.info');

echo $test;