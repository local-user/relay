$("#form-relay").submit(function() {


    // get - relay - name
    var relay_name = $("#input-relay").val();

    // api - relay - files
    api = api_relay.get_files(relay_name);
    api.success(function() {
        console.log('- success');
        console.log(data);
    });
    api.error(function() {
        console.log('- error');
        console.log(data);
    });


});
if( DEBUG ){ console.log(" L js/jquery/listener/submit/nav.js"); }
