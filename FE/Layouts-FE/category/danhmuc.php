
</div>
	<ul class="wide-nav-ul">
	<li class="wide-nav-items  tag-li">
		<a href="../../../../../project_Mon_Wed" class="tag-a">    
			<span class="wide-nav-items-span danhmuc-trangchu" style="text-transform: uppercase;">trang chủ</span>
		</a>
	</li>
	<!-- <li class="wide-nav-items  tag-li">
		<a href="../../../../../project_Mon_Wed/category/dienthoai" class="tag-a">    
			<span class="wide-nav-items-span danhmuc-dienthoai" style="text-transform: uppercase;">Loại hàng</span>
		</a>
	</li> -->
	<li class="wide-nav-items  tag-li">
		<a href="../../../../../project_Mon_Wed/category/lienhe" class="tag-a">    
			<span class="wide-nav-items-span danhmuc-lienhe" style="text-transform: uppercase;">Liên Hệ</span>
		</a>
	</li>
		<?php
			if(isset($_SESSION['TenDN'])){
				if($_SESSION['LTK']=="Admin"){
				echo '<li class="wide-nav-items  tag-li">
						<a href="../../../../../project_Mon_Wed/admin" class="tag-a">    
							<span class="wide-nav-items-span danhmuc-quanli" style="text-transform: uppercase;">Quản lí</span>
						</a>
					</li>';
				}
			}
		?>
	</ul>
</div>