<?php
ob_start();
session_start();
error_reporting(0);
if($_SESSION['username']==''){
    exit;
}
