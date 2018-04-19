<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php // echo link_tag('public_html/images/dv8_web_icon.png', 'icon', 'image/png'); ?>

<?php foreach ($title as $key) { ?>
 <title><?php echo $key['content']; ?></title>
<?php } ?>
<?php  foreach ($meta as $value) { ?>
<meta name="<?php echo $value['name']; ?>" content="<?php echo $value['content'];?>" >
<?php } ?>

<!-- Bootstrap -->
<!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
<!-- <link rel="shortcut icon" href="img/dv8-web-icon.png" type="image/x-icon" /> -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="<?= base_url('stylesheets/screen.css'); ?>" rel="stylesheet">
<script src="<?= base_url('public_html/javascript/site.js'); ?>"></script>
</head>