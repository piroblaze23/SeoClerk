<?php require_once 'config.php'; ?>
<?php
$file = "data/home.txt";
$fileproduct = "data/product.txt";
$fileplugins = "data/plugins.txt";
$fileebooks = "data/ebooks.txt";
$fileseo = "data/seohome.txt";
$filesm = "data/smhome.txt";
$filevideo = "data/video.txt";

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

        if (isset($_FILES['home_img']) && count($_FILES['home_img']['name']) > 0) {
            $i = 1;
            foreach ($_FILES['home_img']['name'] as $k => $v) {
                $valid_file = $_FILES['home_img']['tmp_name'][$k];
                $imagesizedata = getimagesize($valid_file);
                if ($imagesizedata !== false) {
                    move_uploaded_file($_FILES['home_img']['tmp_name'][$k], 'data/images/' . $_FILES['home_img']['name'][$k]);
                    $_REQUEST['home_img'][$i] = $_FILES['home_img']['name'][$k];
                } else
                    $_REQUEST['home_img'][$i] = (isset($_REQUEST['home_img_old'][$i])) ? $_REQUEST['home_img_old'][$i] : '';
                $i++;
            }
        }
    }

    for($p = 1; $p <= 3; $p++) {
        $na = "plan_ret_" . $p;
        if (trim($_REQUEST[$na]) == "") {
            if ($p == 1)
                $_REQUEST[$na] = SITE_URL . "pdplan1892.php";
            else if ($p == 2)
                $_REQUEST[$na] = SITE_URL . "pdplan2892.php";
            else if ($p == 3)
                $_REQUEST[$na] = SITE_URL . "pdonetime3892.php";
        }        
    }

    for ($i = 1; $i < 6; $i++)
        if ($_REQUEST['testi_img'][$i] == '' && isset($_REQUEST['testi_img_old'][$i]))
            $_REQUEST['testi_img'][$i] = $_REQUEST['testi_img_old'][$i];

    if (isset($_REQUEST['remove_img'])) {
        foreach ($_REQUEST['remove_img'] as $imgrem => $val) {
            unset($_REQUEST['home_img_old'][$imgrem]);
            unset($_REQUEST['home_img'][$imgrem]);
        }
    }

     /*for ($i = 1; $i <= 6; $i++)
        if ($_REQUEST['home_img'][$i] == '' && isset($_REQUEST['home_img_old'][$i]))
            $_REQUEST['home_img'][$i] = $_REQUEST['home_img_old'][$i];  */


    $fh = fopen($file, 'w') or die("can't open file");
    fwrite($fh, json_encode($_REQUEST));
    fclose($fh);
}
if (file_exists($file)) $data = json_decode(file_get_contents($file));
if (file_exists($fileproduct)) $dataproduct = json_decode(file_get_contents($fileproduct));
if (file_exists($fileplugins)) $dataplugins = json_decode(file_get_contents($fileplugins));
if (file_exists($fileebooks)) $dataebooks = json_decode(file_get_contents($fileebooks));
if (file_exists($fileseo)) $dataseo = json_decode(file_get_contents($fileseo));
if (file_exists($filesm)) $datasm = json_decode(file_get_contents($filesm));
if (file_exists($filevideo)) $datavideo = json_decode(file_get_contents($filevideo));
?>

<article class="content forms-page">
    <div class="title-block">
        <h3 class="title"> Home Page Content </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                <div class="card card-block sameheight-item">
                    <form class="form-horizontal" enctype="multipart/form-data" action="" method="post" role="form">
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Main Headline</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo $data->main_headline; ?>" name="main_headline">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Button Text</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo $data->sub_headline; ?>" name="sub_headline">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">SEO Title</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="seo_title" value="<?php echo $data->seo_title; ?>"
                                       placeholder="SEO Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">SEO Keywords</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="seo_key" value="<?php echo $data->seo_key; ?>"
                                       placeholder="SEO Keywords">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">SEO Description</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="seo_des" value="<?php echo $data->seo_des; ?>"
                                       placeholder="SEO Descryption">
                            </div>
                        </div>
                        <hr>
                        <?php
                            for ($s = 1; $s <= 6; $s++) {
                            ?>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Home Image <?php echo $s; ?></label>
                                    
                                    <div class="col-sm-8">
                                        <?php
                                            if (isset($data->home_img) && $data->home_img->$s != '' && file_exists('data/images/' . $data->home_img->$s)) {
                                                echo '<div class="col-sm-12"><img src="data/images/' . $data->home_img->$s . '" style="max-width:300px;" /><br /><br /></div>';
                                                echo '<input type="hidden" name="home_img_old[' . $s . ']" value="' . $data->home_img->$s . '" />';
                                                echo '<label class="col-sm-4 control-label"><input type="checkbox" name="remove_img[' . $s . ']" /> Remove Image</label>';
                                            }
                                        ?>
                                        <input class="col-sm-12" type="file" name="home_img[<?php echo $s;?>]" />
                                        <label class="col-sm-4">Size 560 x 425</label>
                                    </div>
                                </div>
                            <?php
                            }
                        ?>
                        <hr>
                         <!-- <div class="form-group row">
                            <label class="col-sm-4 control-label">Hero Title</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php //echo $data->hero_title; ?>"
                                       name="hero_title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Hero Description</label>

                            <div class="col-sm-8">
                                <textarea class="form-control"
                                       name="hero_desc"><?php //echo $data->hero_desc; ?></textarea>
                            </div>
                        </div>
                          <div class="form-group row">
                            <label class="col-sm-4 control-label">Hero Video</label>

                            <div class="col-sm-8">
                                <textarea class="form-control"
                                       name="hero_video"><?php //echo stripslashes($data->hero_video); ?></textarea>
                                       <select class="dropdown" name="hero_video_position">
                                           <option <?php //echo ($data->hero_video_position == "left"?"selected": ""); ?> value="left">Left</option>
                                           <option <?php //echo ($data->hero_video_position == "right"?"selected": ""); ?> value="right">Right</option>
                                        </select>
                            </div>
                        </div> -->

                        <!-- New Code Starts -->
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Enable Video</label>

                            <div class="col-sm-8">
                                <label>
                                <input type="checkbox" class="checkbox" value="1" name="video_enable" <?php echo $data->video_enable == "1" ? "checked" : ""; ?>>
                                <span> </span>
                              </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Video URL</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="video_url" value="<?php echo $data->video_url ? $data->video_url : '' ;?>" />
                            </div>
                        </div>
                        <hr>

                        <script>
                            function isNumber(evt) {
                                evt = (evt) ? evt : window.event;
                                var charCode = (evt.which) ? evt.which : evt.keyCode;
                                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                                    return false;
                                }
                                return true;
                            }
                        </script>
                        
                        <?php for ($usp = 1; $usp < 4; $usp++) { ?>
                            <div class="form-group row">
                                <label class="col-sm-4 control-label">USP-<?php echo $usp; ?> Title</label>
                                <div class="col-sm-8">
                                    <?php $nm = "usp_".$usp."_title"; ?>
                                    <input type="text" class="form-control" name="usp_<?php echo $usp; ?>_title" value="<?php echo $data->$nm ? $data->$nm : '' ;?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 control-label">USP-<?php echo $usp; ?> Description</label>
                                <div class="col-sm-8">
                                    <?php $mn = "usp_".$usp."_desc"; ?>
                                    <input type="text" class="form-control" name="usp_<?php echo $usp; ?>_desc" value="<?php echo $data->$mn ? $data->$mn : '' ;?>" />
                                </div>
                            </div>
                        <?php } ?>
                        <hr>

                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Buy From Us Title</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="buy_us_title" value="<?php echo $data->buy_us_title ? $data->buy_us_title : '' ;?>" />
                              </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Buy From Us Sub-Title</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="buy_us_subtitle" value="<?php echo $data->buy_us_subtitle ? $data->buy_us_subtitle : '' ;?>" />
                              </div>
                        </div>
                        <?php for ($buy = 1; $buy < 7; $buy++) { ?>
                            <div class="form-group row">
                                <label class="col-sm-4 control-label">Buy From Us Title-<?php echo $buy; ?></label>
                                <div class="col-sm-8">
                                    <?php $byt = "buy_us_title_" . $buy; ?>
                                    <input type="text" class="form-control" name="buy_us_title_<?php echo $buy; ?>" value="<?php echo $data->$byt ? $data->$byt : '' ;?>" />
                                  </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 control-label">Buy From Us Sub Title-<?php echo $buy; ?></label>
                                <div class="col-sm-8">
                                    <?php $byst = "buy_us_subtitle_" . $buy; ?>
                                    <input type="text" class="form-control" name="buy_us_subtitle_<?php echo $buy; ?>" value="<?php echo $data->$byst ? $data->$byst : '' ;?>" />
                                  </div>
                            </div>
                        <?php } ?>
                        <hr>

                        <?php for ($i = 1; $i < 6; $i++) { ?>
                            <div class="form-group row">
                                <label class="col-sm-4 control-label">Product <?php echo $i; ?></label>

                                <div class="col-sm-8">
                                   <select class="dropdown form-control" name="product[<?php echo $i; ?>]">
                                       <?php
                                       for ($j = 1; $j <= $settings->total_products; $j++) {
                                           $selected = ($dataproduct->product_name->$j == $data->product->$i?"selected": "");
                                          echo '<option '.$selected.' value="'.$dataproduct->product_name->$j.'">' .$dataproduct->product_name->$j. '</option>';
                                       }
                                       ?>
                                   </select>
                                </div>

                            </div>
                        <?php } ?>
                        <hr>

                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Pricing Title</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pricing_title" value="<?php echo $data->pricing_title ? $data->pricing_title : '' ;?>" />
                              </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Pricing Sub Title</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pricing_sub_title" value="<?php echo $data->pricing_sub_title ? $data->pricing_sub_title : '' ;?>" />
                              </div>
                        </div>
                        <?php for ($plan = 1; $plan < 4; $plan++) { ?>
                            <div class="form-group row">
                                <label class="col-sm-4 control-label">Plan <?php echo $plan; ?> Title</label>
                                <div class="col-sm-8">
                                    <?php $plan_t = "plan_title_" . $plan; ?>
                                    <input type="text" class="form-control" name="plan_title_<?php echo $plan; ?>" value="<?php echo $data->$plan_t ? $data->$plan_t : '' ;?>" />
                                  </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 control-label">Plan <?php echo $plan; ?> Price ($)</label>
                                <div class="col-sm-8">
                                    <?php $plan_p = "plan_price_" . $plan; ?>
                                    <input type="text" class="form-control" name="plan_price_<?php echo $plan; ?>" value="<?php echo $data->$plan_p ? $data->$plan_p : '' ;?>" />
                                    <p class="title-description"><?php echo $plan == 3 ? "One Time Only" : "Recurring"; ?></p>
                                  </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 control-label">Plan <?php echo $plan; ?> PayPal URL</label>
                                <div class="col-sm-8">
                                    <?php $plan_p = "plan_pay_" . $plan; ?>
                                    <input type="text" class="form-control" name="plan_pay_<?php echo $plan; ?>" value="<?php echo $data->$plan_p ? $data->$plan_p : '' ;?>" />
                                  </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 control-label">Plan <?php echo $plan; ?> Download URL</label>
                                <div class="col-sm-8">
                                    <?php 
                                        $plan_r = "plan_ret_" . $plan;
                                        if ($data->$plan_r == "") {
                                            if ($plan == 1)
                                                $data->$plan_r = SITE_URL . "pdplan1892.php";
                                            else if ($plan == 2)
                                                $data->$plan_r = SITE_URL . "pdplan2892.php";
                                            else if ($plan == 3)
                                                $data->$plan_r = SITE_URL . "pdonetime3892.php";
                                        }
                                    ?>
                                    <input type="text" class="form-control" name="plan_ret_<?php echo $plan; ?>" value="<?php echo $data->$plan_r; ?>" />
                                    <p class="title-description"><a href="<?php echo ADMIN_URL;?>edit.php?plan=<?php echo $plan; ?>" target="_blank">Edit</a></p>
                                </div>
                            </div>
                            <?php for($line = 1; $line < 5; $line++) { ?>
                                <div class="form-group row">
                                    <label class="col-sm-4 control-label">Plan <?php echo $plan; ?> Line <?php echo $line; ?></label>
                                    <div class="col-sm-8">
                                        <?php $plan_li = "plan_" . $plan . "_line_" . $line; ?>
                                        <input type="text" class="form-control" name="plan_<?php echo $plan; ?>_line_<?php echo $line; ?>" value="<?php echo $data->$plan_li ? $data->$plan_li : '' ;?>" />
                                    </div>
                                </div>
                            <?php } ?>
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