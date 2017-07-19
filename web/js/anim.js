$(document).ready(function( ) {
    
    $( ".js-datepicker" ).datepicker({
        dateFormat: "yy/mm/dd"
    });
    
    $("#eventid").on("change", function() {
        $selected = $(this).val();
        $('#selectedcourse').val($selected);
        //console.log($selected);
    })
});