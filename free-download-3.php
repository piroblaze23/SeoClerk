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

    $data->layout = 'layout3';
?>

<!-- Breadcrumbs Start
    ================================================== -->

<section id="topic-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1>Your Free Download</h1>
            </div>  <!-- End of /.col-md-4 -->
            <div class="col-md-8 hidden-xs">
                <ol class="breadcrumb pull-right">
                    <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                    <li class="active">Free Downloads</li>
                </ol>
            </div>  <!-- End of /.col-md-8 -->
        </div>  <!-- End of /.row -->
    </div>  <!-- End of /.container -->
</section>  <!-- End of /#Topic-header -->

<div class="container">
    <div class="products-heading col-md-12">
        <h2>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </h2>
    </div>  <!-- End of /.Products-heading -->
</div>

<?php if ($data->layout == "layout1") { ?>
    <section id="blog" class="text-center layout1">
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
    </section>
<?php } else if ($data->layout == "layout2") { ?>
    <section id="blog" class="text-center layout2">
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
    </section>
<?php } else if ($data->layout == "layout3") { ?>
    <section id="blog" class="text-center layout2">
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
    </section>
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