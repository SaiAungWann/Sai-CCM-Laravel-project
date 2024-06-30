<?php

// php => hypertext prossessing language
// html => hypertext markup language

// --------- What is Backend Development ---------

// Backend Development is the process of developing and maintaining the server side of a website, dealing with the data that is stored on the server, server logic and APLs.

// Server => Cloud Computer

// Client => Web Browser

// APLs => Application Programming Languages

// to use server need to have server side language to listen to request

// PHP is server side language use to listen the request from the client

// client => request => web browser(url, "/") => server => php => server response (html)=> client

// why php
// handle incoming request and give response proprely
// handle to connect the database
// high Demand
// versatility => applicabel to many type of project (application , website and Apis)

// data flow
// fontend => backend => database => server

// to run php
// terminal => php -S localhost:8000 index.php

// if writing the php code in index.php without html code no need clode tag in index.php
// but if writing the php code in index.php with html code or write the php code in index.html need clode tag in index.php

// variables => used to store data
$name = "Mohan";

echo $name; 

// echo use to display the data in the browser with result only => result => Mohan

var_dump($name);
// var_dump is a function use to display the data in the browser with result and type => result => string(5) "Mohan"

?>