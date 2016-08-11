var ui_files = {




    // | empty

        empty_table : function() {
            $("#files table tbody").empty();
        },

    // empty |




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
