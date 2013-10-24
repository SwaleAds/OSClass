
$(document).ready(function(){
	// User_menu show/hide submenu
	$("#user_menu .with_sub").hover(function(){
		$(this).find("ul").show();
	},
	function(){
		$(this).find("ul").hide();
	});

	 // Close alerts
    // ===============================
    $(".alert-message .close").bind("click", function(e) {
       $(this).parent().fadeOut('slow');
    });

	// Apply the UniForm plugin to pulldows and button
	$("input:file, textarea, select, button, .search select, .search button, .filters select, .filters button, #comments form button, #contact form button, .user_forms form button, .add_item form select, .add_item form button, .modify_profile select, .modify_profile button").uniform({fileDefaultText: fileDefaultText,fileBtnText: fileBtnText});

	// Show advanced search in internal pages
	$("#expand_advanced").click(function(e){
		e.preventDefault();
		$(".search .extras").slideToggle();
	});
	
	// Show/hide Report as 
	$("#report").hover(function(){
		$(this).find("span").show();
	},
	function(){
		$(this).find("span").hide();
	});
});