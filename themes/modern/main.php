<?php
 osc_register_script('fancybox', osc_current_web_theme_js_url('fancybox/jquery.fancybox.js'), array('jquery'));

    osc_enqueue_script('fancybox');
    osc_enqueue_script('jquery-validate');

    osc_enqueue_style('fancybox', osc_current_web_theme_js_url('fancybox/jquery.fancybox.css'));
    /*
     *      OSCLass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2010 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
	
        <?php osc_current_web_theme_path('head.php') ; ?>
		    <script type="text/javascript">
            $(document).ready(function(){
                $("a[rel=image_group]").fancybox({
                    openEffect : 'none',
                    closeEffect : 'none',
                    nextEffect : 'fade',
                    prevEffect : 'fade',
                    loop : false,
                    helpers : {
                            title : {
                                    type : 'inside'
                            }
                    }
                });
            });
        </script>
        <meta name="robots" content="index, follow" />
        <meta name="googlebot" content="index, follow" />
    </head>
    <body>
	<br>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=597809313586669";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div align="right">
<div class="fb-like" data-href="http://www.swaleads.co.uk" data-send="true" data-width="450" data-show-faces="true" data-font="arial" data-action="recommend"></div>
</div>
<br>
	<BR>
	<BR>
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=597809313586669";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        <div class="container">
		<br>
		 <?php add_this(); ?>
            <?php osc_current_web_theme_path('header.php') ; ?>
            <script>
            jQuery(document).ready(function($){$(".slider").jCarouselLite({btnNext: ".next",btnPrev: ".prev",visible: 6,scroll: 2,auto: 2500 ,speed: 1800 });});
            </script>
            <div id="form_publish">
                <?php osc_current_web_theme_path('inc.search.php') ; ?>
            </div>
            <div class="content home">
			<?php osc_slider(); ?>	
              <?php twitter_show_flash_message();?>
                <div id="main">
				<?php if (function_exists('carousel')) {carousel();} ?>
				<BR>
				<BR>
				<BR>
				<BR>
				<BR>
					<BR>
				<BR>
				<BR>
				<BR>
				<BR>
					<BR>
				<BR>
				<BR>
				<BR>
                <br><BR>
                <marquee onmouseout="this.start();" onmouseover="this.stop();">Dear <?php if (osc_is_web_user_logged_in()) {echo osc_logged_user_name() . "!";}else {echo "Visitor";}?> You can now use our refferal program. Login to your Dashboard and reffer friends and earn Premium Classifieds <?php echo osc_page_title();?>.</marquee>
                <?php if (function_exists('carousel_item_detail')) { carousel_item_detail(); }?>
                <?php
                        $total_categories   = osc_count_categories() ;
                        $col1_max_cat       = ceil($total_categories/3);
                        $col2_max_cat       = ceil(($total_categories-$col1_max_cat)/2);
                        $col3_max_cat       = $total_categories-($col1_max_cat+$col2_max_cat);
                    ?>
                    <div class="categories <?php echo 'c' . $total_categories ; ?>">
                        <?php osc_goto_first_category() ; ?>
                        <?php
                            $i      = 1;
                            $x      = 1;
                            $col    = 1;
                            if(osc_count_categories () > 0) {
                                echo '<div class="col c1">';
                            }
                        ?>
                       <?php while ( osc_has_categories() ) { ?>
                                <div class="category">
                                    <h1><strong><span class="category <?php echo osc_category_slug() ; ?>"></span><a href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?></a> <span><!--(<?php echo osc_category_total_items() ; ?>)--></span></strong></h1>
                                    <?php if ( osc_count_subcategories() > 0 ) { ?>
                                        <ul>
                                            <?php while ( osc_has_subcategories() ) {
                                                 if(osc_category_total_items() > 0 ) { ?>
                                                <li><a class="category <?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?></a> <span><!--(<?php echo osc_category_total_items() ; ?>)--></span></li>
                                            <?php } }?>
                                        </ul>
                                    <?php } ?>
                                </div>
                                <?php
                                if (($col==1 && $i==$col1_max_cat) || ($col==2 && $i==$col2_max_cat) || ($col==3 && $i==$col3_max_cat)) {
                                    $i = 1;
                                    $col++;
                                    echo '</div>';
                                    if($x < $total_categories) {
                                        echo '<div class="col c'.$col.'">';
                                    }
                                } else {
                                    $i++ ;
                                }
                                $x++ ;
                            ?>
                        <?php } ?>
                   </div>
                   <div class="latest_ads">
                        <h1><strong><?php _e('Latest Items', 'modern') ; ?></strong></h1>
                        <?php if( osc_count_latest_items() == 0) { ?>
                            <p class="empty"><?php _e('No Latest Items', 'modern') ; ?></p>
                        <?php } else { ?>
                            <table border="0" cellspacing="0">
                                 <tbody>
                                    <?php $class = "even"; ?>
                                    <?php while ( osc_has_latest_items() ) { ?>
                                     <tr class="<?php echo $class. (osc_item_is_premium()?" premium":"") ; ?>">
                                            <?php if( osc_images_enabled_at_items() ) { ?>
                                             <td class="photo">
                                                <?php if( osc_count_item_resources() ) { ?>
                                                    <a href="<?php echo osc_item_url() ; ?>">
                                                        <img src="<?php echo osc_resource_thumbnail_url() ; ?>" width="75px" height="56px" title="" alt="" />
                                                    </a>
                                                <?php } else { ?>
                                                    <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt="" title=""/>
                                                <?php } ?>
                                             </td>
                                            <?php } ?>
                                             <td class="text">
                                             <p class="price"><?php if (osc_price_enabled_at_items()) {echo osc_item_formated_price();?></p>
                                             <h3><a href="<?php echo osc_item_url();?>"><?php echo osc_item_title();}?></a></h3>
                                             <p><strong><?php if (osc_item_city() != '') {echo osc_item_city();}if (osc_item_region() != '') {echo '(' . osc_item_region() . ')';}echo ' - ' . osc_format_date(osc_item_pub_date());?> </strong></p>
                                             <p><?php echo osc_highlight(strip_tags(osc_item_description()));?></p>
											 <?php voting_item_detail(); ?>
                                            </td>
                                         </tr>
                                        <?php $class = ($class == 'even') ? 'odd' : 'even' ; ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php if( osc_count_latest_items() == osc_max_latest_items() ) { ?>
							
                                <p class="see_more_link"><a href="<?php echo osc_search_show_all_url();?>"><strong><?php _e("See all offers", 'modern'); ?> &raquo;</strong></a></p>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div id="sidebar">
                    <div class="navigation">
                        <?php View :: newInstance()->_exportVariableToView('list_regions', Search :: newInstance()->listRegions('%%%%', '>=', 'region_name ASC'));?>
                        <?php if( osc_count_list_regions() > 0 ) { ?>
                        <div class="box location">
                        <h3><strong><?php _e("Swale Ads Classifieds", 'modern') ; ?></strong></h3>
                        <a href="http://www.swaleads.co.uk/register"><img src="http://www.swaleads.co.uk/images/swaleadsmainreg.png" alt="Unlimited Free Classifieds includes unlimited images" width="220" height="180" /></a>
                        <BR>
						<br>
						<h3><strong><?php _e("Where To Search?") ; ?></strong></h3>
						<?php map_uk_display(); ?>
						<br>
						<br>
						<h3><strong><?php _e("Recent Searches", 'modern') ; ?></strong></h3>
			<?php search_tags(); ?>
			<br>
			<br>
						<h3><strong><?php _e("Facebook Comments", 'modern') ; ?></strong></h3>
					<div class="fb-comments" data-href="http://www.swaleads.co.uk" data-width="220" data-num-posts="10"></div>
						   <BR>
						<br>
						<?php echo_best_rated(); ?>
						<br>
						<br>
						
						
                        <br>
<h3><strong><?php _e("Like Us On Facebook", 'modern') ; ?></strong></h3>
                           <div class="fb-like-box" data-href="https://www.facebook.com/SwaleAds" data-width="220" data-show-faces="true" data-stream="true" data-show-border="true" data-header="true"></div><BR>
<BR>
                            <h3><strong><?php _e("Location", 'modern') ; ?></strong></h3>
                            <ul>
                            <?php while( osc_has_list_regions() ) { ?>
                                <li><a href="<?php echo osc_search_url( array( 'sRegion' => osc_list_region_name() ) ) ; ?>"><?php echo osc_list_region_name() ; ?></a> <em>(<?php echo osc_list_region_items() ; ?>)</em></li>
                            <?php } ?>
                            </ul>
                        </div>
						<br>
                        <h3><strong><?php _e("Swale Ad Tweets", 'modern') ; ?></strong></h3>
                        <br>
                        <a class="twitter-timeline" width="220" href="https://twitter.com/SwaleAds" data-widget-id="357768952585285632">Tweets by @SwaleAds</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<br>
<br>
<h3><strong><?php _e("Swale Ads Chat", 'modern') ; ?></strong></h3>

<BR><div id="shoutbox"><!-- BEGIN MyShoutbox.com CODE -->
<iframe src="http://699653.myshoutbox.com/" width="220" height="650" frameborder="0" allowTransparency="true"></iframe>
<!-- END MyShoutbox.com CODE--></div><BR><h3><strong><br>
<br>
 


                        <?php } ?>
                        
						
                    </div>
                </div>
            </div>
            <?php osc_current_web_theme_path('footer.php') ; ?>
        </div>
        <?php osc_show_flash_message() ; ?>
        <?php osc_run_hook('footer'); ?>
    </body>
</html>