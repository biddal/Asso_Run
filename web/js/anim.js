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
    
    $(document).on("change", ".time" ,function() {
        var id = $(this).attr('id');        
        var idcoef = $('#coef'+id).html(); 
        var calcul = Math.floor((1000/$(this).val())*idcoef);
        $("#point"+id).html(calcul);
    });
});