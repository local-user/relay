$("#form-relay").submit(function() {


    // get - relay
    var relay = $("#input-relay").val();

    // api - relay - files
    api = api_relay.get_files(relay);
    api.success(function(data) {

        // ui - display(s)
        ui_files.files_display();
        ui_nav.icon_display_success();
        ui_upload.upload_display();

        // ui - hide(s)
        ui_spacer.top_hide();

        // api - iterate - data
        $.each( data[0], function( key, filename ){
            ui_files.append_table( relay, filename );
        });

    });
    api.error(function() {

        // ui - display(s)
        ui_nav.input_display_error();
        ui_nav.icon_display_error();
        ui_spacer.top_display();

        // ui - hide(s)
        ui_files.files_hide();
        ui_upload.upload_hide();

    });


});
if( DEBUG ){ console.log(" L js/jquery/listener/submit/nav.js"); }
