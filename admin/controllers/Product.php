<?php

    Class Product extends Controlleradmin{
        function __construct()
        {
            $this->prd = $this->model('ProductModel');
        }
        function index(){
            $dataprd = $this->prd->getproduct();
            $this->view('inc/header');
            $this->view('product/index',[
                'data' => $dataprd
            ]);
            $this->view('inc/footer');
        }
        function add(){
            echo 'add';
        }

    }
?>