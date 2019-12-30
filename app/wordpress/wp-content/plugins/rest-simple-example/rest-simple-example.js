(function ($) {
    $(document).ready(function () {
        $("#rest-button").on("click", function () {
            console.log(rest_script.url);

            $.ajax({

                url: rest_script.url

            }).done(function (data) {

                $("#rest-response").append(data);

            });

        });

    })
})(jQuery)