<?php
    Class productmodel extends Model{
        const table = 'products';
        function getproduct($option = []){

            return $this->get(self::table,$option);
        }
    }
?>