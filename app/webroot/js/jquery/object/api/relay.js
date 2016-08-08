var api_relay = {




    // | get

        get_files : function(relay) {
            return $.ajax({
                type:       "GET",
                data:       { relay : relay },
                url:        "php/api/session/exists.php",
            });
        },

    // get |




}
if( DEBUG ){ console.log(" L js/query/object/ui/nav.js"); }
