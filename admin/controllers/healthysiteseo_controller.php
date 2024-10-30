<?php
final class HealthySiteSEOController {
	public static function update() {

		// Set jQuery Colorbox Defaults
		if (is_plugin_active("jquery-colorbox/jquery-colorbox.php")) {
			$my_fields = get_option('jquery-colorbox_settings');
			$jQueryDefaults = array(
		    'jQueryColorboxVersion' => $my_fields["jQueryColorboxVersion"],
		    'colorboxTheme' => $my_fields["colorboxTheme"],
		    'maxWidth' => $my_fields["maxWidth"],
		    'maxWidthValue' => $my_fields["maxWidthValue"],
		    'maxWidthUnit' => $my_fields["maxWidthUnit"],
		    'maxHeight' => $my_fields["maxHeight"],
		    'maxHeightValue' => $my_fields["maxHeightValue"],
		    'maxHeightUnit' => $my_fields["maxHeightUnit"],
		    'height' => $my_fields["height"],
		    'heightValue' => $my_fields["heightValue"],
		    'heightUnit' => $my_fields["heightUnit"],
		    'width' => $my_fields["width"],
		    'widthValue' => $my_fields["widthValue"],
		    'widthUnit' => $my_fields["widthUnit"],
		    'linkHeight' => $my_fields["linkHeight"],
		    'linkHeightValue' => $my_fields["linkHeightValue"],
		    'linkHeightUnit' => $my_fields["linkHeightUnit"],
		    'linkWidth' => $my_fields["linkWidth"],
		    'linkWidthValue' => $my_fields["linkWidthValue"],
		    'linkWidthUnit' => $my_fields["linkWidthUnit"],
		    'initialWidth' => $my_fields["initialWidth"],
		    'initialHeight' => $my_fields["initialHeight"],
		    'autoColorbox' => $my_fields["autoColorbox"],
		    'autoColorboxGalleries' => $my_fields["autoColorboxGalleries"],
		    'slideshow' => $my_fields["slideshow"],
		    'slideshowAuto' => $my_fields["slideshowAuto"],
		    'scalePhotos' => $my_fields["scalePhotos"],
		    'displayScrollbar' => $my_fields["displayScrollbar"],
		    'draggable' => $my_fields["draggable"],
		    'slideshowSpeed' => $my_fields["slideshowSpeed"],
		    'opacity' => $my_fields["opacity"],
		    'preloading' => $my_fields["preloading"],
		    'transition' => $my_fields["transition"],
		    'speed' => $my_fields["speed"],
		    'overlayClose' => $my_fields["overlayClose"],
		    'disableLoop' => $my_fields["disableLoop"],
		    'disableKeys' => $my_fields["disableKeys"],
		    'autoHideFlash' => $my_fields["autoHideFlash"],
		    'colorboxWarningOff' => true,
	      'colorboxMetaLinkOff' => $my_fields["colorboxMetaLinkOff"],
	      'javascriptInFooter' => $my_fields["javascriptInFooter"],
	      'debugMode' => $my_fields["debugMode"],
	      'autoColorboxJavaScript' => $my_fields["autoColorboxJavaScript"],
	      'colorboxAddClassToLinks' => $my_fields["colorboxAddClassToLinks"],
	      'addZoomOverlay' => $my_fields["addZoomOverlay"],
	      'useGoogleJQuery' => $my_fields["useGoogleJQuery"],
	      'removeLinkFromMetaBox' => $my_fields["removeLinkFromMetaBox"]
		  );
		  update_option("jquery-colorbox_settings", $jQueryDefaults);
		}

		// Revision Control.
		if (is_plugin_active("revision-control/revision-control.php")) {
			global $revision_control;
			$revision_control->set_option("post", "5", "per-type");
			$revision_control->set_option("page", "5", "per-type");
		}

		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure("/%postname%/");


	  wp_redirect(get_option("siteurl")."/wp-admin/admin.php?page=healthy-site-seo/healthy-site-seo.php&action=updated", 301);
  	exit;
	}
}
?>