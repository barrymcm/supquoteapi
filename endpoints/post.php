<?php 

require_once "../bootstrap.php";

use Blog\Controller\PostController as PostController;

$post = new PostController();

$post->doGet();