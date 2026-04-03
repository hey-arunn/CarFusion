<?php  
$url = $_SERVER['REQUEST_URI']; 
$path = parse_url($url, PHP_URL_PATH);
$segments = explode('/', rtrim($path, '/'));
$current_url = end($segments);
?>
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
            <a href="dashboard.php" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="Midone - HTML Admin Template" class="w-12" src="dist/images/CarFusion.jpg">
                    <span class="hidden xl:block text-white text-lg ml-3"> CarFusion  </span> 
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                    <li>
                        <a href="dashboard.php" class="side-menu  <?php echo ($current_url == 'dashboard.php') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                Dashboard  
                            </div>
                        </a> 
                    </li>
					<li>
                        <a href="javascript:;" class="side-menu <?php echo ($current_url == 'Admin_Form.php' || $current_url == 'Admin.php') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <i data-lucide="book"></i> </div>
                            <div class="side-menu__title">
                                Admin 
                                <div class="side-menu__sub-icon"> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="submenu <?php echo ($current_url == 'Admin_Form.php' || $current_url == 'Admin.php') ? 'side-menu__sub-open' : ''; ?>">
                            
                            <li>
                                <a href="Admin_Form.php" class="side-menu <?php echo ($current_url == 'Admin_Form.php') ? 'side-menu--active' : ''; ?>">
                                    <div class="side-menu__icon"> <i data-lucide="clipboard"></i> </div>
                                    <div class="side-menu__title">Add New Admin</div>
                                </a>
                            </li> 
                            <li>
                                <a href="Admin.php" class="side-menu <?php echo ($current_url == 'Admin.php') ? 'side-menu--active' : ''; ?>">
									<div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                                    <div class="side-menu__title">View Admin</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="side-menu  <?php echo ($current_url == 'users.php' || $current_url == 'user_form.php') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                            <div class="side-menu__title">
                                Users 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="submenu  <?php echo ($current_url == 'users.php' || $current_url == 'user_form.php') ? 'side-menu__sub-open' : ''; ?>">
                            <li>
                                <a href="user_form.php" class="side-menu <?php echo ($current_url == 'user_form.php') ? 'side-menu--active' : ''; ?>">
                                    <div class="side-menu__icon"> <i data-lucide="clipboard"></i> </div>
                                    <div class="side-menu__title">Add User</div>
                                </a>
                            </li>
                            <li>
                                <a href="users.php" class="side-menu <?php echo ($current_url == 'users.php') ? 'side-menu--active' : ''; ?>">
                                    <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                                    <div class="side-menu__title">All Users</div>
                                </a>
                            </li> 
                        </ul>
                    </li>
					<li>
                        <a href="javascript:;" class="side-menu <?php echo ($current_url == 'cars.php' || $current_url == 'add_new_car_form.php') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <i data-lucide="car"></i> </div>
                            <div class="side-menu__title">
                                Cars 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="submenu  <?php echo ($current_url == 'cars.php' || $current_url == 'add_new_car_form.php') ? 'side-menu__sub-open' : ''; ?>">
                            <li>
								 <a href="add_new_car_form.php" class="side-menu <?php echo ($current_url == 'add_new_car_form.php') ? 'side-menu--active' : ''; ?>">
                                    <div class="side-menu__icon"> <i data-lucide="clipboard"></i> </div>
                                    <div class="side-menu__title">Add New Car</div>
                                </a>
                                <a href="cars.php" class="side-menu <?php echo ($current_url == 'cars.php') ? 'side-menu--active' : ''; ?>">
                                    <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                                    <div class="side-menu__title">All Cars</div>
                                </a>
                            </li> 
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="side-menu <?php echo ($current_url == 'orders.php' || $current_url == 'add_new_order_form.php') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <i data-lucide="archive"></i> </div>
                            <div class="side-menu__title">
                                Orders 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="submenu  <?php echo ($current_url == 'orders.php' || $current_url == 'add_new_order_form.php') ? 'side-menu__sub-open' : ''; ?>">
                            <li>
                                <a href="orders.php" class="side-menu <?php echo ($current_url == 'orders.php') ? 'side-menu--active' : ''; ?>">
                                    <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                                    <div class="side-menu__title">All Orders</div>
                                </a>
								 
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="javascript:;" class="side-menu <?php echo ($current_url == 'payments.php' || $current_url == 'add_new_payment_form.php') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
                            <div class="side-menu__title">
                                Payment 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="submenu  <?php echo ($current_url == 'payments.php' || $current_url == 'add_new_payment_form.php') ? 'side-menu__sub-open' : ''; ?>">
                            <li>
                                <a href="payments.php" class="side-menu <?php echo ($current_url == 'payments.php') ? 'side-menu--active' : ''; ?>">
                                    <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                                    <div class="side-menu__title">All Payments</div>
                                </a>
								 <!-- <a href="add_new_payment_form.php" class="side-menu <?php echo ($current_url == 'add_new_payment_form.php') ? 'side-menu--active' : ''; ?>"> -->
                                    <!-- <div class="side-menu__icon"> <i data-lucide="clipboard"></i> </div>
                                    <div class="side-menu__title">Add New payment</div> -->
                                <!-- </a> -->
                            </li>
                        </ul>
                    </li>
					<!-- <li>
                        <a href="javascript:;" class="side-menu <?php echo ($current_url == 'page.php' || $current_url == 'slider.php') ? 'side-menu--active' : ''; ?>">
                            <div class="side-menu__icon"> <i data-lucide="bookmark"></i> </div>
                            <div class="side-menu__title">
                                Landing Page 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="submenu  <?php echo ($current_url == 'page.php' || $current_url == 'slider.php') ? 'side-menu__sub-open' : ''; ?>">
                            <li>
                                <a href="slider.php" class="side-menu <?php echo ($current_url == 'slider.php') ? 'side-menu--active' : ''; ?>">
                                    <div class="side-menu__icon"> <i data-lucide="airplay"></i> </div>
                                    <div class="side-menu__title">Slider</div>
                                </a>
                            </li>
                        </ul>
                    </li> -->
				</ul>
            </nav>
            <!-- END: Side Menu -->
			
			