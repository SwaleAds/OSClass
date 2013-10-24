<?php
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
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
        
        <!-- only item-post.php -->
        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('jquery.validate.min.js') ; ?>"></script>
        <?php ItemForm::location_javascript_new(); ?>
        <?php if(osc_images_enabled_at_items()) ItemForm::photos_javascript(); ?>
        <script type="text/javascript">
            function uniform_input_file(){
                photos_div = $('div.photos');
                $('div',photos_div).each(
                    function(){
                        if( $(this).find('div.uploader').length == 0  ){
                            divid = $(this).attr('id');
                            if(divid != 'photos'){
                                divclass = $(this).hasClass('box');
                                if( !$(this).hasClass('box') & !$(this).hasClass('uploader') & !$(this).hasClass('row')){
                                    $("div#"+$(this).attr('id')+" input:file").uniform({fileDefaultText: fileDefaultText,fileBtnText: fileBtnText});
                                }
                            }
                        }
                    }
                );
            }
            
            setInterval("uniform_plugins()", 250);
            function uniform_plugins() {
                
                var content_plugin_hook = $('#plugin-hook').text();
                content_plugin_hook = content_plugin_hook.replace(/(\r\n|\n|\r)/gm,"");
                if( content_plugin_hook != '' ){
                    
                    var div_plugin_hook = $('#plugin-hook');
                    var num_uniform = $("div[id*='uniform-']", div_plugin_hook ).size();
                    if( num_uniform == 0 ){
                        if( $('#plugin-hook input:text').size() > 0 ){
                            $('#plugin-hook input:text').uniform();
                        }
                        if( $('#plugin-hook select').size() > 0 ){
                            $('#plugin-hook select').uniform();
                        }
                    }
                }
            }
        </script>
        <!-- end only item-post.php -->
<script type="text/javascript">
function loadSubmit() {
var selected = $("#catId").val();
if(selected>0){
var ProgressImage = document.getElementById('progress_image');
document.getElementById("progress_image").style.visibility = "visible";
setTimeout(function(){ProgressImage.src = ProgressImage.src},100);
return true;
}
}
</script>
    </head>
    <body>
        <div class="container">
            <?php osc_current_web_theme_path('header.php') ; ?>
            <div class="content add_item">
            <?php if (function_exists('breadcrumbs')) {?><div class="breadcrumbs"><?php breadcrumbs('&raquo;');?></div><?php }?>
              <?php twitter_show_flash_message();?>
                <h1><strong><?php _e('Publish an item', 'modern'); ?></strong></h1>
                <ul id="error_list"></ul>
                <form name="item" action="<?php echo osc_base_url(true);?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                    <input type="hidden" name="action" value="item_add_post" />
                    <input type="hidden" name="page" value="item" />
                        <div class="box general_info">
                            <h2><?php _e('General Information', 'modern'); ?></h2>
                            <div class="row">
                                <label for="catId"><?php _e('Category', 'modern'); ?> *</label>
                                <?php ItemForm::category_select(null, null, __('Select a category', 'modern')); ?>
                            </div>
                            <div class="row">
                                <?php ItemForm::multilanguage_title_description(); ?>
                            </div>
                        </div>
                        <?php if( osc_price_enabled_at_items() ) { ?>
                        <div class="box price">
                            <label for="price"><?php _e('Price', 'modern'); ?></label>
                            <?php ItemForm::price_input_text(); ?>
                            <?php ItemForm::currency_select(); ?>
                        </div>
                        <?php } ?>
                        <?php if( osc_images_enabled_at_items() ) { ?>
                        <div class="box photos">
                            <h2><?php _e('Photos', 'modern'); ?></h2>
                            <div id="photos">
                                <div class="row">
                                    <input type="file" name="photos[]" />
                                </div>
                            </div>
                            <a href="#" onclick="addNewPhoto(); uniform_input_file(); return false;"><?php _e('Add new photo', 'modern'); ?></a>
                        </div>
                        <?php } ?>
                    
                        <div class="box location">
                            <h2><?php _e('Item Location', 'modern'); ?></h2>
                            <div class="row">
                                <label for="countryId"><?php _e('Country', 'modern'); ?></label>
                                <?php ItemForm::country_select(osc_get_countries(), osc_user()) ; ?>
                            </div>
                            <div class="row">
                                <label for="regionId"><?php _e('State', 'modern'); ?></label>
                                <?php ItemForm::region_text(osc_user()) ; ?>
                            </div>
                            <div class="row">
                                <label for="city"><?php _e('City', 'modern'); ?></label>
                                <?php ItemForm::city_text(osc_user()) ; ?>
                            </div>
                            <div class="row">
                                <label for="city"><?php _e('City Area', 'modern'); ?></label>
                                <?php ItemForm::city_area_text(osc_user()) ; ?>
                            </div>
                            <div class="row">
                                <label for="address"><?php _e('Address', 'modern'); ?></label>
                                <?php ItemForm::address_text(osc_user()) ; ?>
                            </div>
                        </div>
                        <!-- seller info -->
                        <?php if(!osc_is_web_user_logged_in() ) { ?>
                        <div class="box seller_info">
                            <h2><?php _e('Seller\'s information', 'modern'); ?></h2>
                            <div class="row">
                                <label for="contactName"><?php _e('Name', 'modern'); ?></label>
                                <?php ItemForm::contact_name_text() ; ?>
                            </div>
                            <div class="row">
                                <label for="contactEmail"><?php _e('E-mail', 'modern'); ?> *</label>
                                <?php ItemForm::contact_email_text() ; ?>
                            </div>
                            <div class="row">
                                <div style="width: 120px;text-align: right;float:left;">
                                    <?php ItemForm::show_email_checkbox() ; ?>
                                </div>
                                <label for="showEmail" style="width: 250px;"><?php _e('Show e-mail on the item page', 'modern'); ?></label>
                            </div>
                        </div>
                        <?php }; ?>
                        <?php ItemForm::plugin_post_item(); ?>
                        <?php if( osc_recaptcha_items_enabled() ) {?>
                        <div class="box">
                            <div class="row">
                                <?php osc_show_recaptcha(); ?>
                            </div>
                        </div>
                        <?php }?>
                     <?php _e('Your IP address has been logged for security purposes: ', 'modern');?><b><?php echo $_SERVER['REMOTE_ADDR'];?></b>
                     <div class="clear"></div>
                     <img style="visibility:hidden; padding-top: 10px;" id="progress_image" src="<?php echo osc_current_web_theme_url('images/ajax-loader.gif') ; ?>">
                     <div class="clear"></div>
                     <button type="submit" onclick="return loadSubmit()" ><?php _e('Publish', 'modern');?></button>
                    </fieldset>
             </form>
            </div>
            <?php osc_current_web_theme_path('footer.php') ; ?>
        </div>
        <?php osc_show_flash_message() ; ?>
        <?php osc_run_hook('footer'); ?>
    </body>
</html>