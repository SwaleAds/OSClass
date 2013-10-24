<div class="span9"><p style="font-size:13px"><strong>Mostra come: </strong><a  style="color:#666666" href="index.php?s_adview=default">Descrizione</a> | <a href="index.php?s_adview=grid">Icone grandi</a> | <a href="index.php?s_adview=elenco">Elenco</a></div>

 <?php if( osc_count_latest_items() == 0) { ?>

                <p>

                    <?php _e('No Latest Items', 'trovo') ; ?>

                </p>

                <?php } else { ?>

                    <?php while ( osc_has_latest_items() ) { ?>
					
                    <div class="line">

                        <div class="photo">

                            <?php if( osc_count_item_resources() ) { ?>

                            <a href="<?php echo osc_item_url() ; ?>">

                                <img src="<?php echo osc_resource_thumbnail_url() ; ?>" width="95" height="95" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>" />

                            </a>

                            <?php } else { ?>

                            <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" width="95" height="95" alt="" title=""/>

                            <?php } ?>

                        </div>

                        <div class="description"> 
                            <h4><?php if( osc_price_enabled_at_items() ) { ?> <?php echo osc_item_formated_price() ; ?> &middot; <?php } ?><a href="<?php echo osc_item_url() ; ?>"><?php echo osc_item_title(); ?></a> 
                            <span ><a style="float:right;background: #c8cdec;padding: 5px;-webkit-border-top-right-radius: 10px;-moz-border-radius-topright: 10px;border-top-right-radius: 10px; " 
                            
                            href="<?php echo osc_item_category_url(osc_item_category_id()) ; ?>"><?php echo osc_item_category() ; ?></a></span> <?php if( osc_item_is_premium() ) { ?> <span class="label success"><?php _e('Premium', 'cris');  ?></span><?php } ?></h4>

                            <p><?php printf(__('<strong>Publish date</strong>: %s', 'trovo'), osc_format_date( osc_item_pub_date() ) ) ; ?>
                            <?php

                                $location = array() ;

                                if( osc_item_country() != '' ) {

                                    $location[] = sprintf( __('<strong>Country</strong>: %s', 'trovo'), osc_item_country() ) ;

                                }

                                if( osc_item_region() != '' ) {

                                    $location[] = sprintf( __('<strong>Region</strong>: %s', 'trovo'), osc_item_region() ) ;

                                }

                                if( osc_item_city() != '' ) {

                                    $location[] = sprintf( __('<strong>City</strong>: %s', 'trovo'), osc_item_city() ) ;

                                }

                                if( count($location) > 0) {

                            ?></p>


                            <p><?php echo implode(' &middot; ', $location) ; ?></p>

                            <?php } ?>

                            <p><?php echo osc_highlight( substr( osc_item_description(),0,150) ) ; if(strlen(osc_item_description())>150) echo '...';  ?></p>

                        </div>

                    </div>

                    <?php } ?>

                    <?php if( osc_count_latest_items() == osc_max_latest_items() ) { ?>

                   

                        <div class="col-1">
<br />
                            <a class="btn primary" href="<?php echo osc_search_show_all_url();?>"><strong><?php _e("See all offers", 'trovo') ; ?> &raquo;</strong></a>

                        </div>

                   

                    <?php } ?>

                <?php } ?>				

                </div> <!--fine elenco annunci-->