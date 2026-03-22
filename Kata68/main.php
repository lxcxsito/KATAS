<?php

include "Agenda.php";
include "Contacte.php";


$contacte1 = new Contacte(1,"Lucas", "Martinez", "123456789", "Carrer Falsa 123");
$contacte2 = new Contacte(2,"Ana", "Gomez", "987654321", "Avinguda Verda 456");
$contacte3 = new Contacte(3,"Lucrfegeras", "Marregewrtinez", "123456789", "Carrer Falsa 123");
$contacte4 = new Contacte(4,"defefe", "Gogremez", "987654321", "Avinguda Verda 456");


//ANADIR CONTACTES
$agenda = new Agenda();
$agenda -> addContact($contacte1);
$agenda -> addContact($contacte2);
$agenda -> addContact($contacte3);
$agenda -> addContact($contacte4);

//BORRAR CONTACTE
//$agenda -> deleteContact($contacte1);

//MOSTRAR CONTACTES
print_r ($agenda -> getContacts());

//CREAR FICHERO 
$agenda -> sendFileContacte();


?>