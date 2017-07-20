$(document).ready(function( ) {
    
    $( ".js-datepicker" ).datepicker({
        dateFormat: "yy/mm/dd"
    });
    
    $(document).on("change", "#eventid" ,function() {
        $selected = "#" + $(this).val();
        $(".formTime").not($selected).each(function() {
            $(".active").slideUp("1500");
            $(".active").removeClass("active");
        })
            
        $($selected).toggleClass("active");
        $($selected).slideToggle("1500");
        //console.log($selected);
    })
});