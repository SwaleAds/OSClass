<style type="text/css">
ul.grid_view{margin: 8px 0px 22px 0px;}
.grid_view li {display: inline; list-style: none; width: 160px; height: 210px; float: left; margin: 0px 4px 8px 4px; text-align: center; border: 1px solid #CCC; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2); -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2); box-shadow: 0 1px 2px rgba(0,0,0,.2); }
.grid_view li h3{ margin: 5px; max-height: 20px; overflow: hidden; text-overflow: ellipsis; background: #EEE; }
.grid_view li h3 a{  text-decoration: none; text-transform: uppercase;}
.grid_view li p{ max-height: 60px; overflow: hidden; text-overflow: ellipsis;}
.grid_view img{ border: 1px solid #EEE;}
</style>
<ul class="grid_view">
<?php osc_get_premiums(12);
if(osc_count_premiums()>0) ?>
            <table border="0" cellspacing="0">
     <tbody>
        <tr class="premium_<?php echo $class; ?>">
        <?php while(osc_has_premiums()) { ?>
<?php while ( osc_has_latest_items() ) { ?>
<?php if( osc_images_enabled_at_items() ) { ?>
<img src="<?php echo osc_resource_thumbnail_url() ; ?>" width="140px" height="110px" title="" alt="" />
<?php } else { ?>
<img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" width="140px" height="110px" alt="" title=""/>
<?php } } ?>
<br/><p><?php if( osc_price_enabled_at_items() ) { echo osc_premium_formated_price() ; ?> - <?php } echo osc_premium_city(); ?> (<?php echo osc_premium_region(); ?>) - <?php echo osc_format_date(osc_premium_pub_date()); ?> </strong></p></li>
</p>
                     <p><?php echo osc_highlight( strip_tags( osc_premium_description() ) ) ; ?></p>
	  </td>
             </tr>
            <?php $class = ($class == 'even') ? 'odd' : 'even' ; ?>				 
<?php } ?>
</ul>