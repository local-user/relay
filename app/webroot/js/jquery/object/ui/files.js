var ui_files = {




    // | append

        append_table : function( relay, filename ) {
            console.log(relay + ": " + filename);
        },

    // append |




    // | files

        files : function() {
            $("#files").addClass("hidden");
        },

        files_display : function() {
            this.files();
            $("#files").removeClass("hidden");
        },

        files_hide : function() {
            this.files();
        }

    // files |




}
if( DEBUG ){ console.log(' L js/query/object/ui/files.js'); }
