var ui_file = {




    // | append

        append_table : function( relay, filename, ttl ) {
            $("#files table tbody").append(
                '<tr class="file" data-filename="' + filename + '" data-relay="' + relay + '" >' +
                    '<td class="filename">' + filename      + '</td>' +
                    '<td class="ttl">'      + ttl           + '</td>' +
                '</tr>'
            );
        },

    // append |


    // | deppend

        deppend_table : function( relay, filename ){
            $('#files table tbody tr').filter('[data-filename="' + filename +'"]').remove();
        }

    // deppend |




}
if( DEBUG ){ console.log(' L js/query/object/ui/file.js'); }
