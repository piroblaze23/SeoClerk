<!-- footer area start -->
<footer class="footer-area footer-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer-widget widget about_widget"><!-- footer widget -->
                    <a href="#" class="footer-logo"><img src="<?php echo ADMIN_URL.'data/images/'.$settings->logo; ?>" alt="logo"></a>
                  
                    <div class="copyright-text margin-top-30"><?php echo $settings->copyright; ?></div>
                </div><!-- //. footer widget -->
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer-widget widget"><!-- footer widget -->
                    
                  


                </div><!-- //. footer widget -->
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer-widget widget"><!-- footer widget -->
                     <h4>GET IN TOUCH</h4>
                    <ul>
 <li><a href="http://customerhelpdesk.in">Support Desk</a></li>
 </ul>
                </div><!-- //. footer widget -->
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<div class="back-to-top base-color-2">
    <i class="fas fa-rocket"></i>
</div>

<div class="col-sm-4 col-xs-11" id="cookie">
    <div class="">
        <p><a>We use cookies to ensure that we give you the best experience on our website. If you continue to use this site we will assume that you are happy with it.</a></p>
        <p class="text-right">
            <a class="btn btn-success" id="cookieOk" href="javascript: void(0);">Ok</a>
            <a class="btn btn-success" href="<?php echo SITE_URL;?>cookie.php">Read More</a>
        </p>
    </div>
</div>

<style type="text/css">
    #cookie { display: none; position: fixed; bottom: 2%; right: 2%; padding: 1%; z-index: 99; background: #fff; border: 1px solid <?php echo $settings->dark_color; ?>; border-radius: 40px; height: auto; }
    #cookie p { margin: 0; }
</style>

    <script type="text/javascript">
    	var isCookieSet = getCookie("cookie");
    	if (isCookieSet == null) {
            jQuery('#cookie').show();
        }

        jQuery('#cookieOk').click(function(){
            jQuery('#cookie').remove();
            setCookie('cookie', 1, 5);
        });

        function setCookie(name,value,days) {
	        var expires = "";
	        if (days) {
	            var date = new Date();
	            date.setTime(date.getTime() + (days*24*60*60*1000));
	            expires = "; expires=" + date.toUTCString();
	        }
	        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
	    }
	    function getCookie(name) {
	        var nameEQ = name + "=";
	        var ca = document.cookie.split(';');
	        for(var i=0;i < ca.length;i++) {
	            var c = ca[i];
	            while (c.charAt(0)==' ') c = c.substring(1,c.length);
	            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	        }
	        return null;
	    }
    </script>

</body>
</html>