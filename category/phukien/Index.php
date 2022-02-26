<?php
	$title = 'Phụ Kiện';
	$baseUrl = '../../';
    include_once ($baseUrl.'FE/layouts-FE/header.php');
    require_once ($baseUrl.'utils/ulitity.php');
    require_once ($baseUrl.'database/dbhelper.php');
?>
<link rel="stylesheet" href="<?=$baseUrl?>FE/layouts-FE/css/shop.css">
<link rel="stylesheet" href="<?=$baseUrl?>FE/layouts-FE/css/chitietsanpham.css">
<style>
        .wide-nav-items-span {
            color: #777;
        }
        .danhmuc-dienthoai {
            color: #000;
        }
        .product-type {
            margin-top: 17px;
        }
        .product-type a span {
            color: #000;
            padding: 5px 20px;
            width: max-content;
            border: 1px solid #e0dede;
            border-radius: 10px;
            margin: 10px 0
        }
</style>
<div class="shop-body">
    <div class="grid wide">
        <div class="row">
            <div class="col l-3 shop-danhmuc">
                <div class="shop-danhmuc-header">
                    <span>PHỤ KIỆN</span>
                </div>
                <div class="shop-reducing-price">
                    <span class="shop-reducing-title">Loại Phụ Kiện</span>
                    <div class="shop-reducing-items-box">
                        <div class="product-type">
                        <?php
                            require_once($baseUrl.'utils/ulitity.php');
                            require_once($baseUrl.'database/dbhelper.php');
                            $sql = "SELECT * FROM tblloaisp WHERE loaiSP like 'PK%'";
                            $data = executeResult($sql);
                            foreach($data as $item) {
                                $str = $item['TenLoaiSP'];
                                $str = strtolower($str);
                                echo '
                                        <a href="'.$str.'" class= tag-a>
                                            <span>'.$item['TenLoaiSP'].'</span>
                                        </a> 
                                    ';
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l-9 shop-sanpham">
                <div class="shop-sanpham-title">
                    <?php
                        // Lấy ra số trang dựa theo số sản phẩm
                        $sql = "SELECT count(ID) as number FROM tblsanpham WHERE loaiSP LIKE 'PK%'";
                        $data = executeResult($sql);
                        $number = 0;
                        if($data != null && count($data) >0) {
                            $number = $data[0]['number'];
                        }
                        $page = ceil($number/6);
                        $current_page = 1;
                        if(isset($_GET['page'])) {
                            $current_page = $_GET['page'];
                            echo '<span class="page-now" data-title="'.$current_page.'"></span>';
                        }
                        $index = ($current_page - 1)*6;
                    ?>
                </div>
                <div class="row">
                    <?php
						$sql = "SELECT * FROM tblsanpham WHERE loaiSP like 'PK%'";
						$ex = executeResult($sql);
						foreach($ex as $sp){
                            if($sp['id_discount']==0){
                                $tien=$sp['GiaDauRa'];
                            }
                            else
                                if($sp['id_discount']==1){
                                $tien=$sp['GiaDauRa']-($sp['GiaDauRa']*10/100);
                            }
                            else
                                if($sp['id_discount']==2){
                                $tien=$sp['GiaDauRa']-($sp['GiaDauRa']*20/100);
                            }
                            else
                                if($sp['id_discount']==3){
                                $tien=$sp['GiaDauRa']-($sp['GiaDauRa']*30/100);
                            }
                            else
                                if($sp['id_discount']==4){
                                $tien=$sp['GiaDauRa']-($sp['GiaDauRa']*40/100);
                            }
						echo
							'<div class="col l-4 c-6 product-selling-items shop-cuahang-items">
								<div class="product-selling-box-img">
									<a href="../../../project_Mon_Wed/category/ctSP/sp.php?sp='.$sp['MaSP'].'"><img class="product-selling-img" src="../../admin/product/'.$sp['HinhSP'].'" alt=""></a>
								</div>
								<div class="product-selling-info">
									<div class="product-selling-name">
										<span>'.$sp['TenSP'].'</span>
									</div>
                                <div class="product-selling-price">
                                    <div class="product-selling-price-old">'.number_format($sp['GiaDauRa']).'<sup>đ</sup></div>
                                    <div class="product-selling-price-now">'.number_format($tien).'<sup>đ</sup></div>
                                </div>
									<div class="btn-add-cart-box">
										<a ';if(isset($_SESSION['TenDN'])== null) echo 'href="authen/login"';else echo'href="../../cart/add_cart.php?add_to_cart='.$sp['MaSP'].'"';echo' class="tag-a link-add-cart"><span class="btn-add-cart">THÊM VÀO GIỎ HÀNG</span></a>
									</div>
								 </div>
							</div>';
						}
                    ?>

                </div>
                <div class="shop-phantrang">
                    <?php
                        for($i=1;$i<=$page;$i++) {
                            echo '<a class="tag-a page-footer" href="?page='.$i.'" >
                                    <span class="shop-page2 " data-prog='.$i.'>'.$i.'</span>
                                </a>';
                        }
                        if($current_page<$i-1) {
                            $next_page = $current_page+1;
                        }else {
                            $next_page = $current_page;
                        }
                    ?>
                    <a href="?page=<?=$next_page?>" class="tag-a"><span><i class="fas fa-chevron-right shop-page2"></i></span> </a> 
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include_once ($baseUrl.'FE/layouts-FE/footer.php');
?>
<script src="<?=$baseUrl?>FE/js/cuahang.js"></script>
<script src="<?=$baseUrl?>FE/js/index.js"></script>