<?php

final class HealthySiteSEOPage {
  public static function indexPage() {
    ?>
    <div class="wrap a-form">
      <h2>Healthy Site/SEO</h2>
      <?php
      if (isset($_GET["action"]) && $_GET["action"] == "updated") {
        $content = "<p>Following changes just took place...</p>
        <p>Wordpress Permalinks - Changed the permalink pattern to ".get_option("siteurl")."/sample-post/</p>";
        if (is_plugin_active("jquery-colorbox/jquery-colorbox.php")) {
          $content .= "<p>jQuery Colorbox - Disabled red warning message that lets user know colorbox feature for all images is turned off.</p>";
        }
        if (is_plugin_active("revision-control/revision-control.php")) {
          $content .= "<p>Revision Control - Set maximum 5 revisions per post/page.</p>";
        }

        echo("<div class='updated below-h2'>$content</div>");

      }
      ?>
      <div class="postbox " style="display: block; padding: 10px;">
        <p>Pretty simply form, just click Set Defaults.</p>
        <p>Aftering clicking &#8220;Set Defaults&#8220; it will disable JQuery Colorbox red warning message, set Revision Control max revision default to 5 and change wordpress&#8217;s permalink pattern to <strong><?php echo(get_option("siteurl")); ?>"/sample-post/</strong>.</p>
        <form action="" method="post">
            <p>
              <input type="hidden" name="plugin" value="healthy-site-seo"/>
              <input type="hidden" name="controller" value="HealthySiteSEO"/>
              <input type="submit" name="action" value="Set Defaults" />
            </p>
        </form>
        <p>You can disable the plugin after you complete the recommendations.</p>
        <h3>List of Plugins we recommend</h3>

        <ul>
          <li><a href="https://en-au.wordpress.org/plugins/jetpack" target="_blank">Jet Pack</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/wp-smushit" target="_blank">WP Smush.it</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/w3-total-cache" target="_blank">W3 Total Cache</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/wp-optimize" target="_blank">WP-Optimize</a></li>
          <li><a href="https://www.gravityforms.com/" target="_blank">Gravity Forms</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/wordpress-seo" target="_blank">WordPress SEO by Yoast</a></li>
          <li><a href="https://www.marketingmix.com.au/wp-content/plugins/tmm.zip" target="_blank">TMM Login</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/advanced-custom-fields" target="_blank">Advanced Custom Fields</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/disable-comments" target="_blank">Disable Comments</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/user-switching" target="_blank">User Switching</a></li>      
          <li><a href="https://en-au.wordpress.org/plugins/custom-sidebars" target="_blank">Custom Sidebars</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/clone-posts" target="_blank">Clone Posts and Pages</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/wp-source-control" target="_blank">WP Content Source Control</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/better-wp-security" target="_blank">iThemes Security</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/wordfence" target="_blank">WordFence</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/antivirus" target="_blank">AntiVirus</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/stop-write" target="_blank">Stop Write</a></li>      
          <li><a href="https://en-au.wordpress.org/plugins/login-recaptcha" target="_blank">Login No Captcha reCAPTCHA</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/admin-block-country" target="_blank">Admin Block Country</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/wp-seo-redirect-301" target="_blank">SEO Redirect 301s</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/forminator" target="_blank">Forminator</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/search-my-theme" target="_blank">Search My Theme</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/which-template" target="_blank">Which Template</a></li>      
          <li><a href="https://en-au.wordpress.org/plugins/revision-control" target="_blank">Revision Control</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/view-wp-error-log" target="_blank">View WP Error Log</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/wp-pixpie" target="_blank">PixPie</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/jquery-colorbox" target="_blank">jQuery Colorbox</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/jquery-ui-theme" target="_blank">JQuery UI Theme</a></li>

          <!-- <li><a href="https://en-au.wordpress.org/plugins/nextgen-gallery" target="_blank">Next Gen Gallery</a></li> -->
          <!-- <li><a href="https://en-au.wordpress.org/plugins/facebook-photo-fetcher" target="_blank">Facebook Photo Fetcher</a></li> -->
    <!--       <li><a href="https://en-au.wordpress.org/plugins/addthis" target="_blank">AddThis</a></li>
          <li><a href="https://en-au.wordpress.org/pdf-version-link/" target="_blank">PDF Version</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/wp-google-map-plugin" target="_blank">Google Map Plugin</a></li>
          <li><a href="https://en-au.wordpress.org/plugins/shortcodes-ultimate" target="_blank">Shortcodes Ultimate</a></li> -->
          
          
        </ul>
      </div>
    </div>



    <?php
  }
}

?>