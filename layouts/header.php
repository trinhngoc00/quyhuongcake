<?php if(!isset($_SESSION)) { 
	session_start(); 
}  ?>
<div class="container">
	
	<?php if (isset($_SESSION['username']) && $_SESSION['username']): ?>
		<p align="right" style="margin-bottom: 0;">
			Tên người dùng: <?php echo $_SESSION['username'] ?> 
			<a class="" href="logout.php" style="margin-left: 20px;">Đăng xuất</a> 
		</p>

		<?php else: ?>
			<p align="right" style="margin-bottom: 0;">Bạn chưa đăng nhập.</p>
		<?php endif; ?>

		<?php 
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = null;
		$db = "quyhuong_cake2";
		$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Không thể kết nối database");

		$get_type = " select * from type";
		$result_type = mysqli_query($conn,$get_type);
		?>

	</div>
	<header>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light  " style="">
				<div>
					<a class="link-head" href="index.php" style="display: flex;">
						<img src="img/quyhuong.png" width="50px;" style="height: fit-content;" >
						<div style="padding: 5px 10px;" class="name-title">
							Bakery Quý Hương
						</div>
					</a>
				</div>

				<div style=""><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					MENU
				</button></div>

				<div class="collapse navbar-collapse" id="navbarNav" style="justify-content: flex-end;">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Trang chủ<span class="sr-only">(current)</span></a>
						</li>

						<li class="nav-item li-parent">
							<a class="nav-link" href="product.php">sản phẩm</a>
							<div class="wrapper-submenu">
								<ul>
									<?php foreach ($result_type as $type ): ?>
										<li class="nav-item" >
											<a class="item_type_pr" href="type_product.php?id=<?php echo $type['id'];?>"><?php echo $type['name'];?></a>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="type_product.php?id=1" >Bánh gato</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link" href="type_product.php?id=5">Bánh ngọt</a>
						</li> -->
						<li class="nav-item">
							<a class="nav-link" href="type_product.php?id=7">Bánh miếng nhỏ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="type_product.php?id=9" >Bánh sự kiện</a>
						</li>

						<?php if (isset($_SESSION['username']) && $_SESSION['username']): ?>
							<?php else: ?>
								<li class="nav-item">
									<a class="nav-link" href="login.php">Đăng nhập</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="resgister.php">Đăng kí</a>
								</li>
							<?php endif;?>

						<?php if (isset($_SESSION['permission']) && $_SESSION['permission'] == 10) { ?>
							<li class="nav-item">
								<a class="nav-link" href="admin.php">Trang quản trị</a>
							</li>
						<?php } ?>

							<li class="nav-item nav-item-icon" id="icon-search">
								<a class="nav-link" type="button"><i class="fa fa-search"></i></a>
							</li>

							<li class="nav-item nav-item-icon li-parent">

								<a href="shopping_cart.php" class="nav-link"><span class="fa fa-cart-arrow-down"></span><span class="badge badge-dark"></span></a>
								
								<!-- <div class="wrapper-submenu " style="width: 300px; right: 0;">
									<div id="change-item-cart">
										<div>Tổng tiền: <span>0 VND</span> </div>
									</div>
								</div> -->
							</li>
						</ul>

						<div class="form-search">
							<form method="post" action="search.php">
								<input type="text" name="search" placeholder="Search" value="socola">
								<input type="submit" name="submit_search" value="Tìm"><i class="fa fa-search"></i>
							</form>
						</div>
					</div>
				</nav>
			</div>
		</header>