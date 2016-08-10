var ui_files = {




    // | append

        append_table : function( relay, filename ) {
            console.log(relay + ": " + filename);
        },

    // append |




    // | table

        table : function() {
            $("#files table").addClass("hidden");
        },

        table_display : function() {
            this.table();
            $("#files table").removeClass("hidden");
        },

        table_hide : function() {
            this.table();
        }

    // display |




}
if( DEBUG ){ console.log(' L js/query/object/ui/files.js'); }
