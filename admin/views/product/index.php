<h2>Danh sách sản phẩm</h2>
<a  class= "btn btn-success" style="width:30%"href="add_page.php">Thêm sản phẩm</a>
            <table class = "table" >
                 <thead class="thead-dark" >
                     <th>STT</th>
                     <th>Product name</th>
                     <th>Category</th>
                     <th>Brand</th>
                     <th>Picture</th>
                     <th>Price</th>
                     <th>Quantity</th>
                     <th>Description</th>
                     <th>Xóa</th>
                     <th>Sửa</th>
                 </thead>
                    <tbody>
                        <?php
                            $i=0;
                            foreach ($data['data'] as $row) { ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $row['product_title'] ?></td>
                                <td><?php echo $row['product_cat'] ?></td>
                                <td><?php echo $row['product_brand'] ?></td>
                                <td><img src="http://localhost/ecom1/ecom/public/images/<?php echo $row['product_image']?>"style="height: 100px;;width: 100px;;" alt="..."></td>
                                <td><?php echo $row['product_price'] ?></td>
                                <td><?php echo $row['product_qty'] ?></td>
                                <td style="width:500px"><?php echo $row['product_desc'] ?></td>
                                <td>
                                    <a  onclick="return cfDel('<?php echo $row['product_title']; ?>')" class= "btn btn-success" href="http://localhost/ecom1/admin.php?url=product/delete/?id=<?php echo $row['product_id']; ?>">Xóa</a>
                                </td>
                                <td>
                                    <a  class= "btn btn-success" href="http://localhost/ecom1/admin.php?url=product/edit/?id=<?php echo $row['product_id']; ?>">Sửa</a>
                                </td>
                            </tr>
                           <?php } ?>
                    </tbody>
              </div>
            </table>
            <script>
function cfDel(name){
    return confirm("Bạn có chắc muốn xóa "+ name +" ?");
}
</script>