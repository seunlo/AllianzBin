<?php
error_reporting(E_ALL);

function sanitizer($evil_string)
{
  $safe_string = strip_tags($evil_string);
  $safe_string = htmlspecialchars($safe_string);
  $safe_string = trim($safe_string);

  return $safe_string;
}
?>