<?php
echo " admin home";
$this->load->view('admin/components/header.php');
$this->load->view('admin/components/navbar');
$this->load->view($subview);

$this->load->view('admin/components/footer'); ?>
