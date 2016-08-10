$("#form-relay").submit(function() {


    // get - relay - name
    var relay_name = $("#input-relay").val();

    // api - relay - files
    api = api_relay.get_files(relay_name);
    api.success(function(data) {

        // api - iterate - data
        $.each( data[0], function( key, value ){

            // ui - files - append
            ui_files.append( value );

        });

    });
    api.error(function() {

        // ui - input - error
        console.log(' ui input error ');

    });


});
if( DEBUG ){ console.log(" L js/jquery/listener/submit/nav.js"); }
