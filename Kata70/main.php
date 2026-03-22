<?php
require "CalendariAdvent.php";

$calendari = new CalendariAdvent();

$calendari -> createCalendari(30);

$calendari -> openDay(2);
$calendari -> openDay(60);



?>