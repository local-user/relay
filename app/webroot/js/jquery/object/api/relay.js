var api_relay = {




    // | get

        get_files : function(relay) {
            return $.ajax({
                type:       'GET',
                data:       {
                                object : 'files',
                                method : 'list',
                                relay  : relay
                            },
                url:        'api.php',
            });
        },

    // get |




}
if( DEBUG ){ console.log(' L js/query/object/ui/nav.js'); }
