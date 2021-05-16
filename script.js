function getstepInsert(act, id, idd2) {
    var formData = new FormData($("#"+act)[0]);
    formData.append('act', act);
    formData.append('id', id);
    formData.append('idd2', idd2);
    // current_show();
    // $("#loading_container").show();
    $.ajax({
        type: "POST",
        url: base_url + 'getstep.php',
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: function (msg) {
            // $("#loading_container").hide();
            // $("#currentarea").html(msg);
        }
    });
}