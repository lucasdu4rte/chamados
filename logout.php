<?php 
session_start();
session_destroy();
header("Location: singlepage.html");
exit; 
