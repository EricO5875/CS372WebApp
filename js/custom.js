/*
 *
 *Custom JavaScript for entertainmentcenter.com
 *
 */

 $(document).ready(function()
 {
    $('ul.tabs li').click(function()
    {
        var tab_id = $(this).attr('data-tab');
        
    	$('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');
            
        $(this).addClass('current');
        $("#"+tab_id).addClass('current');
        
    });
            	
    $(".rateYo").rateYo(
    {
        starWidth:"16px",
        onSet: function (rating, rateYoInstance) 
        {
            $.get("../php/update_rating.php?rate=" + rating + "&id=" + $(this).attr('data-id'), function(response){});
        }
    });
    
});