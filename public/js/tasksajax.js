$(document).ready(function () {

    $('body').on("submit", ".deletetask", function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers:
                {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        var URL =  "/tasks";

        var post_url = $(this).attr("action");
        var formData = $(this).serialize();

        $.post(post_url, formData, function () {
            $.get(URL, function(data) {
                $("#taskBars").empty();
                $("#taskBars").append(data['html']);
            });
        });

    });

    $('body').on("submit", "#todostatus", function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers:
                {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        var URL =  "/tasks";

        var post_url = $(this).attr("action");
        var formData = $(this).serialize();


        $.post(post_url, formData, function () {
            $.get(URL, function(data) {
                $("#taskBars").empty();
                $("#taskBars").append(data['html']);
            });
        });
    });


    $("body").on("submit", ".doingstatus", function (e) {

        e.preventDefault();
        $.ajaxSetup({
            headers:
                {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        var URL = "/tasks"

        var post_url = $(this).attr("action");
        var formData = $(this).serialize();


        $.post(post_url, formData, function () {
            $.get(URL, function(data) {
                $("#taskBars").empty();
                $("#taskBars").append(data['html']);
            });
        });
    });

    $("body").on("submit", ".donestatus", function (e) {

        e.preventDefault();
        $.ajaxSetup({
            headers:
                {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        var URL = "/tasks";

        var post_url = $(this).attr("action");
        var formData = $(this).serialize();


        $.post(post_url, formData, function () {
            $.get(URL, function(data) {
                $("#taskBars").empty();
                $("#taskBars").append(data['html']);
            });
        });
    });
});
