<?php

require __DIR__ . "/lib_ext/autoload.php";

use Notification\Email;


$newMail = new Email;
$newMail->sendmail("Assunto de teste", "<p>Esse é um e-mail de <b>teste da nossa aplicação</b></p>", "cpen.ticket@gmail.com", "CP&N", "gsbassanezi@gmail.com", "Gui Bassanezi");

// var_dump($newMail);