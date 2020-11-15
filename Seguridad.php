<?php
    session_start();
    if(isset($_SESSION["login"])){
        exit(0);
    }
    if($_SESSION["login"]=="no"){
        exit(0);
    }