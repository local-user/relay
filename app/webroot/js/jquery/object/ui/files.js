var ui_files = {




    // | append

        append_table : function( relay, file ) {
            $("#files table tbody").append(
                '<tr>' +
                    '<td>' + file['filename']      + '</td>' +
                    '<td>' + file['date_modified'] + '</td>' +
                '</tr>'
            );
        },

    // append |




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
