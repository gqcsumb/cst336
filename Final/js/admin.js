$(document).ready(function() {
    // Check to confirm if the user wants to delete an item
    $("body").on("click", "#deleteBtn", function() {
        if (confirm("Are you sure you want to delete?")) {
            $("#deleteBtn").submit();
        } else {
            event.preventDefault();
        }
    })
    
    $("#saveAnalyticsBtn").click(function() {
        var contents = "";
        for(var i = 0; i < 6; i++) {
            if (i == 0) {
                contents = $("h5").eq(i).html() + ": " + $("p").eq(i).html() + "\n";
            } else if (i == 5) {
                contents = contents + "\n" + $("h5").eq(i).html() + ": " + $("p").eq(i).html();
            } else {
                contents = contents + "\n" + $("h5").eq(i).html() + ": " + $("p").eq(i).html() + "\n";
            }
        }
        $("#saveAnalyticsBtn").attr("value", contents);
    });
});