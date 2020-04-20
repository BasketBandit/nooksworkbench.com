$("#search").on('keypress',function(e) {
    if(e.which === 13) {
        window.location = "/recipe/" + $("#search").val().toLowerCase();
    }
});

$("#search-addon").click(function() {
    window.location = "/recipe/" + $("#search").val().toLowerCase();
});

$("#recipe-search").click(function() {
    window.location = "/recipe/" + $("#search").val().toLowerCase();
});

$("#material-search").click(function() {
    window.location = "/material/" + $("#search").val().toLowerCase();
});

$("#tag-search").click(function() {
    window.location = "/tag/" + $("#search").val().toLowerCase();
});
