<?php 
    require_once 'config.php';
    $file = "data/social.txt";

    if (isset($_POST['Save'])) {
        $fh = fopen($file, 'w') or die("can't open file");
        fwrite($fh, json_encode($_REQUEST));
        fclose($fh);
    }
    if (file_exists($file)) $data = json_decode(file_get_contents($file));
?>

<article class="content forms-page">
    <div class="title-block">
        <h3 class="title"> Social Settings </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                <div class="card card-block sameheight-item">
                    <form class="form-horizontal" enctype="multipart/form-data" action="" method="post" role="form">
                        <div class="form-group row">
                            <label class="col-sm-4 control-label">Enable</label>

                            <div class="col-sm-8">
                                <label for"enable_none">
                                    <input class="radio" type="radio" id="enable_none" name="enable_type" value="none" <?php echo $data->enable_type == "none" ? "checked=checked" : "";?> />
                                    <span>None</span>
                                </label>
                                <label for"enable_typeroof">
                                    <input class="radio" type="radio" id="enable_proof" name="enable_type" value="proof" <?php echo $data->enable_type == "proof" ? "checked=checked" : "";?> /> 
                                    <span>Social Proof</span>
                                </label> &nbsp;&nbsp;&nbsp;
                                <label for"enable_floating">
                                    <input class="radio" type="radio" id="enable_floating" name="enable_type" value="floating" <?php echo $data->enable_type == "floating" ? "checked=checked" : "";?> />
                                    <span>Product Alerts</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 control-label">No of Customer Purchased</label>
                            <label class="col-sm-1 control-label">Min</label>
                            <input type="text" class="form-control col-sm-2" value="<?php echo $data->cust_purchased_min; ?>" name="cust_purchased_min" onkeypress="return isNumber(event)">                                   
                            <label class="col-sm-1">&nbsp;</label>
                            <label class="col-sm-1 control-label">Max</label>
                            <input type="text" class="form-control col-sm-2" value="<?php echo $data->cust_purchased_max; ?>" name="cust_purchased_max" onkeypress="return isNumber(event)">    
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 control-label">People Viewing this page</label>
                            <label class="col-sm-1">Min</label>
                            <input type="text" class="form-control col-sm-2" value="<?php echo $data->page_view_min; ?>" name="page_view_min" onkeypress="return isNumber(event)">
                            <label class="col-sm-1">&nbsp;</label>
                            <label class="col-sm-1">Max</label>
                            <input type="text" class="form-control col-sm-2" value="<?php echo $data->page_view_max; ?>" name="page_view_max" onkeypress="return isNumber(event)">   
                        </div>

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