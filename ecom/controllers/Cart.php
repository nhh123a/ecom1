<?php

class Cart extends Controller
{
    function __construct()
    {
        $this->ctg = $this->model('CategoryModel');
        $this->brand = $this->model('BrandModel');
        $this->prd = $this->model('ProductModel');
        $this->cart = $this->model('CartModel');
    }

    function index()
    {
        if ($_SESSION['user_id']) {
            $datactg   = $this->ctg->getcategory();
            $databrand = $this->brand->getbrand();
            $datacart  = $this->cart->getcart();
            $this->view('inc/header', [
                'data' => $datactg,
                'databrand' => $databrand
            ]);
            $this->view('cart/cart', [
                'datacart' => $datacart
            ]);

            $this->view('inc/footer');
        } else {
            $_SESSION['notifyinfo'] = "Vui lòng đăng nhập";
            header("Location: http://localhost/ecom1/user/login");
        }
    }

    function addtocart($id)
    {
        if ($_SESSION['user_id']) {
            $data = [
                'p_id'      => $id,
                'user_id'   => $_SESSION['user_id'],
                'ip_add'    => $_SERVER['REMOTE_ADDR'],
                'qty'       => '1',
            ];
            $checkp_id = $this->cart->getcartbyP_id($id);
            //var_dump($checkp_id);

            if (empty($checkp_id)) {
                $save = $this->cart->savecart($data);
                if ($save) {
                    header("Location: http://localhost/ecom1/cart/cart");
                } else {
                    echo "Thêm thất bại";
                }
            } else {
                $data['qty'] = $checkp_id[0]['qty'] + 1;
                echo $data['qty'];
                $save = $this->cart->savecart($data, $checkp_id[0]['id']);
                if ($save) {
                    header("Location: http://localhost/ecom1/cart/cart");
                } else {
                    echo "Thêm thất bại";
                }
            }
        } else {
            $_SESSION['notifyinfo'] = "Vui lòng đăng nhập";
            header("Location: http://localhost/ecom1/user/login");
        }
    }
    function delete($id)
    {
        $delete = $this->cart->deletecartbyId($id);
        if ($delete) {
            header('Location: http://localhost/ecom1/cart/cart');
        } else {
            echo 'Xóa thất bại';
        }
    }
}
