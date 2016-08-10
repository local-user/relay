var api_file = {




    // | download

        download : function(relay, filename) {
            window.location = "api.php?object=file&method=download&filename=" + filename + "&relay=" + relay;
        },

    // download |




}
if( DEBUG ){ console.log(' L js/query/object/api/file.js'); }
