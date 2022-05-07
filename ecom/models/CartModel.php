<?php

    class cartmodel extends Model {
        const table = 'cart';

        function getcart(){
            $sql = "SELECT cart.id,cart.p_id,cart.user_id,qty,products.product_title,products.product_price,products.product_image,products.product_desc from cart 
            INNER JOIN products on cart.p_id = products.product_id WHERE cart.user_id = ".$_SESSION['user_id'] ." ";
            
            $qr = $this->_query($sql);
            $data = [];
            while($row = mysqli_fetch_assoc($qr)){
                array_push($data,$row);
            }
            return $data;
        }
        function savecart($data = [],$id =0 ){
            return $this->save(self::table,$data,$id);
        }
        function deletecartbyId($id =0 ,$option = []){
            $option = [
                'where' => "id = $id"
            ];
            return $this->delete(self::table,$option);
        }
        function getcartbyP_id($p_id = 0,$option = []){
            $option = [
                'where' =>"p_id = $p_id AND user_id = ".$_SESSION['user_id']."",
            ];
            return $this->get(self::table,$option);
        }
    }