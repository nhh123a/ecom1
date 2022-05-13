<?php

    Class Product extends Controlleradmin{
    
        function index(){
            $this->view('inc/header');
            $this->view('inc/footer');
        }
        function add(){
            echo 'add';
        }

    }
?>