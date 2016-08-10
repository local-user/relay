$("#form-relay").submit(function() {


    // get - relay
    var relay = $("#input-relay").val();

    // api - relay - files
    api = api_relay.get_files(relay);
    api.success(function(data) {

        // ui - spacer - top - hide
        ui_spacer.top_hide();

        // ui - upload - display
        ui_upload.upload_display();

        // ui - files - display
        ui_files.files_display();

        // api - iterate - data
        $.each( data[0], function( key, filename ){

            // ui - files - table - append
            ui_files.append_table( relay, filename );

        });

    });
    api.error(function() {

        console.log('error');

        // ui - nav - input - error
        ui_nav.input_display_error();

        // ui - nav - icon - error
        ui_nav.icon_display_error();

    });


});
if( DEBUG ){ console.log(" L js/jquery/listener/submit/nav.js"); }
