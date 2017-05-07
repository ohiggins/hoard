<?php
$to = "adam@amazorize.com";
$subject = "My subject :)";
$txt = "Hello world! This is an email test from Postfix.";
$headers = "From: hello@amazorize.com";

mail($to,$subject,$txt,$headers);
?>