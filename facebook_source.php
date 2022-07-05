<?php
include 'Facebook/autoload.php';
include('fbconfig.php');
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/thuctapnghenghiep/fb-callback.php', $permissions);
?>