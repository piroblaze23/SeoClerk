<?php 
	$data = json_decode(file_get_contents('admin/data/free.txt'));
	$settings = json_decode(file_get_contents('admin/data/settings.txt'));

    if (isset($_POST) && count($_POST) > 0) {
        $txt = $_POST['name'] . ', ' . $_POST['email'];
        file_put_contents('admin/data/CustomerList.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
        header("Location: " . $data->course_url);
        die();
    }

	include('includes/header.php');
?>

<style type="text/css">.navbar-area.absolute { background-color: #fff; }</style>

<!-- breadcrumb area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
           <div class="col-lg-12">
                <div class="breadcrumb-inner"><!-- breadcrumb inner -->
                    <div class="row">
                        <div class="col-sm-9">
                            <h1 class="page-title">Your Free Gift</h1>
                        </div>
                        <div class="col-sm-3">
                            <ul class="page-list">
                                <li><a href="<?php echo SITE_URL;?>">Home</a></li>
                                <li class="active">Free Gifts</li>
                            </ul>
                        </div>
                    </div>
                    <p class="padding-top-50"> </p>
                </div><!-- breadcrumb inner -->
           </div>
        </div>
    </div>
</div>
<!-- breadcrumb area -->

<?php if ($data->layout == "layout1") { ?>
    <div class="blog-page-content-area padding-50 text-center layout1">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo ADMIN_URL;?>data/images/<?php echo $data->image; ?>" style="max-width: 100%;" />
                </div>
                <div class="col-md-8">
        			<h4><?php echo stripslashes($data->main_heading); ?></h4>
                    <p><?php echo stripslashes($data->sub_heading); ?></p>

                    <form class="form-horizontal" enctype="multipart/form-data" action="" onsubmit="return checkField();" method="post" role="form">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="name"  id="name" placeholder="Enter Your Name" >
                            </div>
                            <label class="col-sm-2 control-label"></label>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="email"  id="email" placeholder="Enter Your Email" >
                            </div>
                            <label class="col-sm-2 control-label"></label>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <p style="font-size: 11px;"><?php echo stripslashes($data->disc); ?></p>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success btn-lg" value="<?php echo $data->btn_text; ?>" name="Save" />
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } else if ($data->layout == "layout2") { ?>
    <div id="blog" class="text-center layout2 blog-page-content-area padding-50">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12">

                    <div class="col-md-4 img">
                        <img src="<?php echo ADMIN_URL;?>data/images/<?php echo $data->image; ?>" style="max-width: 100%;" />
                    </div>

                    <h4><?php echo stripslashes($data->main_heading); ?></h4>
                    <p><?php echo stripslashes($data->sub_heading); ?></p>

                    <form class="form-horizontal" enctype="multipart/form-data" action="" onsubmit="return checkField();" method="post" role="form">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="name"  id="name" placeholder="Enter Your Name" >
                            </div>
                            <label class="col-sm-2 control-label"></label>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="email"  id="email" placeholder="Enter Your Email" >
                            </div>
                            <label class="col-sm-2 control-label"></label>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <p style="font-size: 11px;"><?php echo stripslashes($data->disc); ?></p>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success btn-lg" value="<?php echo $data->btn_text; ?>" name="Save" />
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } else if ($data->layout == "layout3") { ?>
    <div id="blog" class="text-center layout2 blog-page-content-area padding-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4><?php echo stripslashes($data->main_heading); ?></h4>
                    <p><?php echo stripslashes($data->sub_heading); ?></p>

                    <div class="col-md-4 img">
                        <img src="<?php echo ADMIN_URL;?>data/images/<?php echo $data->image; ?>" style="max-width: 100%;" />
                    </div>

                    <form class="form-horizontal" enctype="multipart/form-data" action="" onsubmit="return checkField();" method="post" role="form">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="name"  id="name" placeholder="Enter Your Name" >
                            </div>
                            <label class="col-sm-2 control-label"></label>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="email"  id="email" placeholder="Enter Your Email" >
                            </div>
                            <label class="col-sm-2 control-label"></label>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <p style="font-size: 11px;"><?php echo stripslashes($data->disc); ?></p>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success btn-lg" value="<?php echo $data->btn_text; ?>" name="Save" />
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<style type="text/css">
    .layout1 .form-horizontal .form-group { text-align: center; width: 50%; margin: 15px auto; }
    .layout1 .products-heading { padding-left: 0; }

    .layout2 form { margin: 3% auto; text-align: center; width: 50%; }
    .layout2 .img { float: none; margin: 0 auto; }

    .layout3 .img { float: none; margin: 0 auto; }
</style>

<script type="text/javascript">
    function checkField() {
        if (jQuery('#name').val() == "") {
            alert('Name can not be empty!');
            return false;
        }

        if (jQuery('#email').val() == "") {
            alert('Email can not be empty!');
            return false;
        }
        return true;
    }
</script>

<?php include('includes/footer.php'); ?>