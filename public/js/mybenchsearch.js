$("#search").on('keypress',function(e) {
    if(e.which === 13) {
        window.location = "/mybench/browse/" + $("#search").val().toLowerCase();
    }
});

$("#search-addon").click(function() {
    window.location = "/mybench/browse/" + $("#search").val().toLowerCase();
});

$("#item-search").click(function() {
    window.location = "/mybench/browse/" + $("#search").val().toLowerCase();
});

$("#material-search").click(function() {
    window.location = "/mybench/material/" + $("#search").val().toLowerCase();
});

$("#tag-search").click(function() {
    window.location = "/mybench/tag/" + $("#search").val().toLowerCase();
});

$('#nav-category').click(function(){
    $('#nav-extended-category').toggleClass('visible');
    $('#nav-extended-tag').removeClass('visible');
    $('#nav-extended-source').removeClass('visible');
});

$('#nav-tag').click(function(){
    $('#nav-extended-tag').toggleClass('visible');
    $('#nav-extended-category').removeClass('visible');
    $('#nav-extended-source').removeClass('visible');
});

$('#nav-source').click(function(){
    $('#nav-extended-source').toggleClass('visible');
    $('#nav-extended-tag').removeClass('visible');
    $('#nav-extended-category').removeClass('visible');
});
