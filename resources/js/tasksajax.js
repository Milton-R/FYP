$(document).ready(function () {


    $('body').on("submit", "#todostatus", function () {

        $.ajaxSetup({
            headers:
                {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        var URL = window.location.href;

        var post_url = $(this).attr("action");
        var formData = $(this).serialize();

        $.post(post_url, formData, function () {
            console.log("Success");
            alert("yoo")

            $("#taskBars").empty();
            $("#taskBars").load(URL + " #todorow");


        });
        return false;
    });


    $("body").on("submit", ".doingstatus", function (e) {

        e.preventDefault();
        $.ajaxSetup({
            headers:
                {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        var URL = window.location.href;

        var post_url = $(this).attr("action");
        var formData = $(this).serialize();

        $.post(post_url, formData, function () {
            console.log("Success");
            alert("yoooo")

            $("#taskBars").empty();
            $("#taskBars").load(URL + " #todorow");


        });
    });

    $("body").on("submit", ".donestatus", function (e) {

        e.preventDefault();
        $.ajaxSetup({
            headers:
                {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        var URL = window.location.href;

        var post_url = $(this).attr("action");
        var formData = $(this).serialize();

        $.post(post_url, formData, function () {
            console.log("Success");
            alert("yoooo")

            $("#taskBars").empty();
            $("#taskBars").load(URL + " #todorow");


        });
    });

    $("body").on("submit", ".donestatus", function (e) {

        e.preventDefault();
        $.ajaxSetup({
            headers:
                {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        var URL = window.location.href;

        var post_url = $(this).attr("action");
        var formData = $(this).serialize();

        $.post(post_url, formData, function () {
            console.log("Success");
            alert("yoooo")

            $("#taskBars").empty();
            $("#taskBars").load(URL + " #todorow");


        });
    });
});
