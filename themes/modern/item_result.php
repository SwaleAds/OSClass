<?php $path = osc_base_url().'/oc-content/plugins/'.  osc_plugin_folder(__FILE__); ?>
    <div id="voting_plugin">
            <div class="votes_results">
                <span style="float:left; padding-right: 4px;"><?php _e('Result', 'voting');?>  </span>
                <?php 
                    $avg_vote = $vote['vote'];
                ?>
                <img title="<?php _e('Without interest', 'voting');?>" src="<?php voting_star(1, $avg_vote); ?>">
                <img title="<?php _e('Uninteresting', 'voting');?>" src="<?php voting_star(2, $avg_vote); ?>">
                <img title="<?php _e('Interesting', 'voting');?>" src="<?php voting_star(3, $avg_vote); ?>">
                <img title="<?php _e('Very interesting', 'voting');?>" src="<?php voting_star(4, $avg_vote); ?>">
                <img title="<?php _e('Essential', 'voting');?>"  src="<?php voting_star(5, $avg_vote); ?>"> 
                <span style="float:left; padding-right: 4px; padding-left: 4px;"><?php echo $vote['total'];?> <?php _e('votes', 'voting');?></span>
            </div>
    </div>
    <div style="clear:both;"></div>
