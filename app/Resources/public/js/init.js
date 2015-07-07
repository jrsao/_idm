//$(document).ready(function(){
//    trRef();
//    $( ".datepicker" ).datepicker();
//    $( "#accordion" ).accordion({
//        heightStyle: "content"
//    });
//});

var trRef = function() { 
        $('table tr').click(function(){
        window.location = $(this).data('href');
        return false;
    });
};