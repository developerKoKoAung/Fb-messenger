<?php
session_start();
require 'classes/DB.php';
require 'classes/User.php';
require 'classes/Messenger.php';

$userObj = new User;

define("BASE_URL", "http://localhost/Escapse/socket/fb-messenger/");