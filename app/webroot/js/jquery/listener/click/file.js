$( "#files" ).on( "click", ".file", function() {


    // get - relay & filename
    var filename = $(this).attr('data-filename');
    var relay    = $(this).attr('data-relay');

    // file - download
    api_file.download( relay, filename );

    // file - deppend
    ui_file.deppend_table( relay, filename );


});
if( DEBUG ){ console.log(' L js/jquery/listener/click/file.js'); }
