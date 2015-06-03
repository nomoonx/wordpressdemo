<footer class="social-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <?php if( of_get_option('wechat',true) != '') { ?>
                        <a href="<?php echo esc_url(of_get_option('wechat','#')); ?>">
                            <div id="footer-wechat-icon" class="footer-social-icon"></div>
                            <div>
                                微信公众号
                            </div>
                        </a>

                <?php } ?>

            </div>
            <div class="col-md-2">
                <?php if( of_get_option('wechat',true) != '') { ?>
                    <span id="footer-wechat-icon" class="footer-social-icon"></span>
                    <span>
                        <a href="<?php echo esc_url(of_get_option('wechat','#')); ?>">微信公众号</a>
                    </span>
                <?php } ?>

            </div>
            <div class="col-md-2">
                <?php if( of_get_option('wechat',true) != '') { ?>
                    <span id="footer-wechat-icon" class="footer-social-icon"></span>
                    <span>
                        <a href="<?php echo esc_url(of_get_option('wechat','#')); ?>">微信公众号</a>
                    </span>
                <?php } ?>

            </div>
            <div class="col-md-2">
                <?php if( of_get_option('wechat',true) != '') { ?>
                    <span id="footer-wechat-icon" class="footer-social-icon"></span>
                    <span>
                        <a href="<?php echo esc_url(of_get_option('wechat','#')); ?>">微信公众号</a>
                    </span>
                <?php } ?>

            </div>
            <div class="col-md-2">
                <?php if( of_get_option('wechat',true) != '') { ?>
                    <span id="footer-wechat-icon" class="footer-social-icon"></span>
                    <span>
                        <a href="<?php echo esc_url(of_get_option('wechat','#')); ?>">微信公众号</a>
                    </span>
                <?php } ?>

            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</footer>
<footer class="bottom-footer">

		<div class="container">

			<div class="row">

				<div class="copyright">

					<p>&copy; <?php echo date('Y'); ?> <span class="footer-desc">| <?php _e('All Rights Reserved','vision'); ?> | <?php bloginfo('description' ); ?></span></p>

				</div> <!-- end copyright -->

				<div class="bookmark">

					<p><?php _e('Theme by','noMoon'); ?> <a href="http://demo.nomoon.me">noMoon</a> | <span><?php _e('Powered by','vision'); ?></span> <a href="http://wordpress.org">WordPress</a></p>

				</div> <!-- end bookmark -->

			</div> <!-- end row -->

		</div> <!-- end container -->

</footer> <!-- end bottom-footer -->

<?php wp_footer(); ?>

</body>
</html>