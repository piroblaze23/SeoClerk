<?php 
    $file = "admin/data/home.txt";
    if (file_exists($file)) $data = json_decode(file_get_contents($file));
    include('includes/header.php'); 
    $data = json_decode(file_get_contents('admin/data/legal.txt'));
?>
<style type="text/css">.navbar-area.absolute { background-color: #fff; }</style>
<!-- breadcrumb area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
           <div class="col-lg-12">
                <div class="breadcrumb-inner"><!-- breadcrumb inner -->
                    <h1 class="page-title">Privacy Policy</h1>
                    <ul class="page-list">
                        <li><a href="<?php echo SITE_URL;?>">Home</a></li>
                        <li class="active">Privacy Policy</li>
                    </ul>
                </div><!-- breadcrumb inner -->
           </div>
        </div>
    </div>
</div>
<!-- breadcrumb area -->

<section id="topic-header">
    <!-- About Us Text -->
    <div class="about-us container padding-50">
        <div class="row">
            <p><?php echo nl2br($data->privacy); ?></p>
        </div>
    </div>
</section>

<section>&nbsp;</section>

<?php include('includes/footer.php'); ?>