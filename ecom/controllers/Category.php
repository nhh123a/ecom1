<?php

    Class Category extends Controller{
        
        function __construct(){
            $this->ctg = $this->model('CategoryModel');
            $this->brand= $this->model('BrandModel');
            $this->prd = $this->model('ProductModel');
        }
        function index($id){
            $currentpage = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 4;
            $basepath = 'http://localhost/ecom1/product/index';
            $totalrecords = count($this->prd->getproductbyCatid($id));
            
            $offset = ($currentpage - 1) * $limit;
            $paging = new paging($basepath,$totalrecords,$limit,$offset,$currentpage);
            $page = $paging->createlink();

            $option =[
                'where' => "product_id = $id",
                'limit'=>$limit,
                'offset'=>$offset
            ];

            $datactg = $this->ctg->getcategory();
            $databrand = $this->brand->getbrand();
            $dataprd = $this->prd->getproductbyCatid($id);
            $this->view('inc/header',[
                'data' => $datactg,
                'databrand' => $databrand,
                'title' => 'Category'
            ]);

            $this->view('product/index',[
                'dataprd' => $dataprd,
                'page' =>$page
            ]);

            $this->view('inc/footer');
        }

    }
?>