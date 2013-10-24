<!DOCTYPE html>
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

<script type="text/javascript">
    var sQuery = '<?php echo $sQuery; ?>' ;

    $(document).ready(function(){
        if($('input[name=sPattern]').val() == sQuery) {
            $('input[name=sPattern]').css('color', '#E3EBB5');
        }
        $('input[name=sPattern]').click(function(){
            if($('input[name=sPattern]').val() == sQuery) {
                $('input[name=sPattern]').val('');
                $('input[name=sPattern]').css('color', '');
            }
        });
        $('input[name=sPattern]').blur(function(){
            if($('input[name=sPattern]').val() == '') {
                $('input[name=sPattern]').val(sQuery);
                $('input[name=sPattern]').css('color', '#E3EBB5');
            }
        });
        $('input[name=sPattern]').keypress(function(){
            $('input[name=sPattern]').css('background','');
        })
    });
    function doSearch() {
        if($('input[name=sPattern]').val() == sQuery){
            return false;
        }
        if($('input[name=sPattern]').val().length < 3) {
            $('input[name=sPattern]').css('background', '#E3EBB5');
            return false;
        }
        return true;
    }
</script>
<br>
<br>
<br>
<br>
<form action="<?php echo osc_base_url(true); ?>" method="get" class="form-wrapper" onsubmit="javascript:return doSearch();">
    <input type="hidden" name="page" value="search" />
    <fieldset class="main">
        <div id="text"><font color="#000000"><b>What would you like to find?</b></font></div><input type="text" name="sPattern"  id="query" value="<?php echo osc_esc_html( ( osc_search_pattern() != '' ) ? osc_search_pattern() : $sQuery ); ?>" placeholder="Search here..." required />
        <?php  if ( osc_count_categories() ) { ?>
            <?php osc_categories_select('sCategory', null, __('Search all categories', 'modern')); ?>
        <?php  } ?>
		<?php $aRegions = Region :: newInstance()->listAll();?>
        <?php if (count($aRegions) > 0) {?>
		
		<select name="sRegion" id="sRegion">
        <option value="">Select a Region</option>
        <?php foreach ($aRegions as $region) {?>
        <option  value="<?php echo $region['s_name'];?>"><?php echo $region['s_name'];?></option>
        <?php }?>
        </select>
		
        <?php }?>
    	<button type="submit"><?php _e('Search', 'modern'); ?></button>
    </fieldset>
    <div id="search-example"></div>
</form>