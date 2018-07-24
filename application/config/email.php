<?php
$sender_email = 'pineknobskischooltest@gmail.com';
$user_password = 'itchyMoon10';

// The mail sending protocol.
$config['protocol'] = 'smtp';
// SMTP Server Address for Gmail.
$config['smtp_host'] = 'ssl://smtp.googlemail.com';
// SMTP Port - the port that you is required
$config['smtp_port'] = 465;
// SMTP Username like. (abc@gmail.com)
$config['smtp_user'] = $sender_email;
// SMTP Password like (abc***##)
$config['smtp_pass'] = $user_password;

$config['mailtype'] = 'html';

$config['charset'] = 'utf-8';

$config['smtp_crypto'] = 'ssl';
// $this->email->initialize($config);