$("#form-relay").submit(function() {


    // get - relay
    var relay = $("#input-relay").val();

    // api - relay - files
    api = api_relay.get_files(relay);
    api.success(function(data) {

        // api - iterate - data
        $.each( data[0], function( key, filename ){

            // ui - files - table - display
            ui_files.table_display();

            // ui - files - table - append
            ui_files.append_table( relay, filename );

        });

    });
    api.error(function() {

        // ui - input - error
        ui_error.display('Unable to retrieve relay files');

    });


});
if( DEBUG ){ console.log(" L js/jquery/listener/submit/nav.js"); }
