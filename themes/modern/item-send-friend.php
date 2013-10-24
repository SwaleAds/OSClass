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
        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('jquery.validate.min.js') ; ?>"></script>
    </head>
    <body>
        <div class="container">
            <?php osc_current_web_theme_path('header.php') ; ?>
            <div class="content user_forms">
            <?php if (function_exists('breadcrumbs')) {?><div class="breadcrumbs"><?php breadcrumbs('&raquo;');?></div><?php }?>
              <?php twitter_show_flash_message();?>
                <div id="contact" class="inner">
                    <h1><?php _e('Send to a friend', 'modern'); ?></h1>
                    <ul id="error_list"></ul>
                    <form id="sendfriend" name="sendfriend" action="<?php echo osc_base_url(true); ?>" method="post">
                        <fieldset>
                            <input type="hidden" name="action" value="send_friend_post" />
                            <input type="hidden" name="page" value="item" />
                            <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                            <label><?php _e('Item', 'modern'); ?>: <a href="<?php echo osc_item_url( ); ?>"><?php echo osc_item_title(); ?></a></label><br/>
                            <?php if(osc_is_web_user_logged_in()) { ?>
                                <input type="hidden" name="yourName" value="<?php echo osc_logged_user_name(); ?>" />
                                <input type="hidden" name="yourEmail" value="<?php echo osc_logged_user_email();?>" />
                            <?php } else { ?>
                                <label for="yourName"><?php _e('Your name', 'modern'); ?></label> <?php SendFriendForm::your_name(); ?> <br/>
                                <label for="yourEmail"><?php _e('Your e-mail address', 'modern'); ?></label> <?php SendFriendForm::your_email(); ?> <br/>
                            <?php }; ?>
                            <label for="friendName"><?php _e("Your friend's name", 'modern'); ?></label> <?php SendFriendForm::friend_name(); ?> <br/>
                            <label for="friendEmail"><?php _e("Your friend's e-mail address", 'modern'); ?></label> <?php SendFriendForm::friend_email(); ?> <br/>
                            <label for="message"><?php _e('Message', 'modern'); ?></label> <?php SendFriendForm::your_message(); ?> <br/>
                            <?php osc_show_recaptcha(); ?>
                            <br/>
                            <button type="submit"><?php _e('Send', 'modern'); ?></button>
                        </fieldset>
                    </form>
                </div>
            </div>
            <?php SendFriendForm::js_validation(); ?>
            <?php osc_current_web_theme_path('footer.php') ; ?>
        </div>
        <?php osc_show_flash_message() ; ?>
        <?php osc_run_hook('footer'); ?>
    </body>
</html>