<?php
if (isset($jumbotron)) {
	$this->load->view('front/components/jumbotron');
} else {
	$this->load->view('front/components/jumbotron_image');
}
if (isset($form)) {
	$this->load->view('front/components/form');
}
$this->load->view('front/lessons');