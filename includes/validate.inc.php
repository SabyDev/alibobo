<?php 

session_start();
if (isset($_POST['captcha'])) {
  if ($_POST['captcha'] == $_SESSION['code'] && $_POST['captcha'] !== NULL) {
    echo "Code correct";
    } else {
    echo "Code incorrect";
    $_POST['captcha'] = NULL;
  }
}