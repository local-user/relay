var api_relay = {




    // | get

        get_files : function(relay) {
            return $.ajax({
                type:       'GET',
                data:       {
                                object : 'relay',
                                method : 'files',
                                relay  : relay
                            },
                url:        'api.php',
            });
        },

    // get |




}
if( DEBUG ){ console.log(' L js/query/object/ui/nav.js'); }
