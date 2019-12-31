<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<?php
        	define('ADMIN_THEME_URL', SITE_URL . '/admin/theme/');
        ?>
		<meta charset="UTF-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo ADMIN_THEME_URL; ?>css/vendor.css">
        
		<!-- Theme initialization -->
        <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) : {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
                document.write('<link rel="stylesheet" id="theme-style" href="<?php echo ADMIN_THEME_URL; ?>css/app-' + themeName + '.css">');
            else
                document.write('<link rel="stylesheet" id="theme-style" href="<?php echo ADMIN_THEME_URL; ?>css/app.css">');
        </script>
	</head>
	<body>
		<input type="hidden" name="sess_id" id="sess_id" value="<?php echo session_id(); ?>" />
		<div id="main-wrapper">
			<div class="app" id="app">
				<header class="header">
                    <div class="header-block header-block-collapse d-lg-none d-xl-none">
                        <button class="collapse-btn" id="sidebar-collapse-btn">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    
                    <div class="header-block header-block-search">
                        &nbsp;
                    </div>

                    <div class="header-block header-block-buttons">
                    	<a href="<?php echo SITE_URL; ?>admin/" class="btn btn-sm header-btn"><i class="fa fa-th-large"></i> <span>Admin Control Panel</span></a>
						<a href="<?php echo SITE_URL; ?>" class="btn btn-sm header-btn" target="_blank"><i class="fa fa-star"></i> View Your Website <i class="icon-circle-arrow-right"></i> </a> 
						<a href="<?php echo ADMIN_URL; ?>logout.php" class="btn btn-sm header-btn" ><i class="fa fa-power-off icon"></i> Logout</a>
                    </div>

                    <div class="header-block header-block-nav">&nbsp;</div>
                </header>

				<?php require_once 'left.php'; ?>