<?php $settings = json_decode(file_get_contents('data/settings.txt')); ?>
<aside class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-header">
            <div class="brand">
               <!-- <div class="logo">
                    <img src="<?php //echo ADMIN_URL; ?>data/images/<?php //echo $settings->logo; ?>" />
                </div> -->
            </div>
        </div>
        <nav class="menu">
            <ul class="sidebar-menu metismenu" id="sidebar-menu">
            	<?php
                    $exploded = explode('/', $_SERVER['REQUEST_URI']);
                    $pg = end($exploded);                                   
                ?>
                <li class="<?php echo $pg == '' || $pg == 'index.php' ? "active": ""; ?>"><a href="<?php echo ADMIN_URL; ?>index.php"><i class="fa fa-home"></i> Dashboard </a></li>  
                <li class="<?php echo $pg == 'home.php' ? "active": ""; ?>"><a href="<?php echo ADMIN_URL; ?>home.php"><i class="fa fa-pencil-square-o"></i> Edit Home Page</a></li>
                <li class="<?php echo $pg == 'about.php' ? "active": ""; ?>"><a href="<?php echo ADMIN_URL; ?>about.php"><i class="fa fa-file-text-o"></i> Edit About Page</a></li>
				<li class="<?php echo $pg == 'product.php' ? "active": ""; ?>"><a href="<?php echo ADMIN_URL; ?>product.php"><i class="fa fa-file-text-o"></i> Edit Products Page</a></li>
				<li class="<?php echo $pg == 'ebooks.php' ? "active": ""; ?>"><a href="<?php echo ADMIN_URL; ?>ebooks.php"><i class="fa fa-file-text-o"></i> Edit Ebooks Page</a></li>
                <li class="<?php echo $pg == 'service.php' ? "active": ""; ?>"><a href="<?php echo ADMIN_URL; ?>service.php"><i class="fa fa-file-text-o"></i> Edit Services Page</a></li>
                <li class="<?php echo $pg == 'faq.php' ? "active": ""; ?>"><a href="<?php echo ADMIN_URL; ?>faq.php"><i class="fa fa-file-text-o"></i> Edit FAQs Page</a></li>
				<li class="<?php echo $pg == 'free-downloads.php' ? "active": ""; ?>"><a href="<?php echo ADMIN_URL; ?>free-downloads.php"><i class="fa fa-file-text-o"></i> Free Gifts</a></li>
                <li class="<?php echo $pg == 'testimonials.php' ? "active": ""; ?>"><a href="<?php echo ADMIN_URL; ?>testimonials.php"><i class="fa fa-file-text-o"></i> Testimonials</a></li>
				<li class="<?php echo $pg == 'contact.php' ? "active": ""; ?>"><a href="<?php echo ADMIN_URL; ?>contact.php"><i class="fa fa-file-text-o"></i> Edit Contact Page</a></li>
                <li class="<?php echo $pg == 'legal.php' ? "active": ""; ?>"><a href="<?php echo ADMIN_URL; ?>legal.php"><i class="fa fa-file-text-o"></i> Legal</a></li>
                
				<li class="<?php echo $pg == 'settings.php' ? "active": ""; ?>"><a href="<?php echo ADMIN_URL; ?>settings.php"><i class="fa fa-file-text-o"></i> Edit Settings</a></li>
            </ul>
        </nav>
    </div>
    <style>
    	.sidebar-header .brand { padding-left: 0; }
    	.logo { height: auto; width: 100%; margin-bottom: 15px; }
    	.sidebar .sidebar-container { bottom: 0; }
    </style>
</aside>
<div class="sidebar-overlay" id="sidebar-overlay"></div>
<div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
<div class="mobile-menu-handle"></div>

<script src="<?php echo ADMIN_THEME_URL; ?>js/vendor.js"></script>
<script src="<?php echo ADMIN_THEME_URL; ?>js/app.js?rand=1234"></script>