<?php 
    require_once 'config.php';
    $file = "data/testi.txt";

    if (isset($_POST['Save'])) {
        if (count($_FILES) > 0) {

            if (isset($_FILES['testi_img']) && count($_FILES['testi_img']['name']) > 0) {
                $i = 1;
                foreach ($_FILES['testi_img']['name'] as $k => $v) {
                    if ($_FILES['testi_img']['tmp_name'][$k] != '') {
                        $valid_file = $_FILES['testi_img']['tmp_name'][$k];
                        $imagesizedata = getimagesize($valid_file);
                        if ($imagesizedata !== false) {
                            move_uploaded_file($_FILES['testi_img']['tmp_name'][$k], 'data/images/' . $_FILES['testi_img']['name'][$k]);
                            $_REQUEST['testi_img'][$i] = $_FILES['testi_img']['name'][$k];
                        } else
                            $_REQUEST['testi_img'][$i] = (isset($_REQUEST['testi_img_old'][$i])) ? $_REQUEST['testi_img_old'][$i] : '';
                    }
                    $i++;
                }
            }
        }

        for ($i = 1; $i < 6; $i++)
            if ($_REQUEST['testi_img'][$i] == '' && isset($_REQUEST['testi_img_old'][$i]))
                $_REQUEST['testi_img'][$i] = $_REQUEST['testi_img_old'][$i];

        $fh = fopen($file, 'w') or die("can't open file");
        fwrite($fh, json_encode($_REQUEST));
        fclose($fh);
    }
    if (file_exists($file)) $data = json_decode(file_get_contents($file));
?>

<article class="content forms-page">
    <div class="title-block">
        <h3 class="title"> Testimonial Content </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                <div class="card card-block sameheight-item">
                    <form class="form-horizontal" enctype="multipart/form-data" action="" method="post" role="form">
                        <?php for ($i = 1; $i < 6; $i++) { ?>
                            <div class="form-group row">
                                <label class="col-sm-4 control-label">Testimonial <?php echo $i; ?></label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="testi_auth[<?php echo $i; ?>]" value="<?php echo $data->testi_auth->$i; ?>" placeholder="Author">
                                </div>
                                <div class="col-sm-12">&nbsp;</div>
                                <div class="col-sm-4 control-label">&nbsp;</div>

                                <div class="col-sm-2"><label class="control-label">Photo</label><br/>(max 100 x 100)</div>
                                <div class="col-sm-4">
                                    <?php
                                    if ($data->testi_img->$i != '' && file_exists('data/images/' . $data->testi_img->$i)) {
                                        echo '<div class="col-xs-2"><img src="data/images/' . $data->testi_img->$i . '" /></div>';
                                        echo '<input type="hidden" name="testi_img_old[' . $i . ']" value="' . $data->testi_img->$i . '" />';
                                    }
                                    ?>
                                    <div class="col-xs-6"><input type="file" name="testi_img[<?php echo $i; ?>]"></div>
                                </div>
                                <div class="col-sm-12">&nbsp;</div>
                                <label class="col-sm-4 control-label">Testimonial <?php echo $i; ?> Content</label>

                                <div class="col-sm-6" style="margin-top: 1%;">
                                    <textarea class="form-control" rows="3"
                                              name="testi_msg[<?php echo $i; ?>]"><?php echo stripslashes($data->testi_msg->$i); ?></textarea>
                                </div>
                            </div>
                            <hr>
                        <?php } ?>
                        <div class="col-xs-2"></div>
                        <input type="submit" class="btn btn-primary" value="Save" name="Save"/>
                        <div style="float: left; width: 100%; margin-top: 4%;"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</article>

</div>
</div>
</body>
</html>