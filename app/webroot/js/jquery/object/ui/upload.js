var ui_upload = {




    // | upload

        upload : function() {
            $('#upload').addClass('hidden');
        },

        upload_display : function() {
            this.upload();
            $('#upload').removeClass('hidden');
        },

        upload_hide : function() {
            this.upload();
        }

    // upload |




}
if( DEBUG ){ console.log(' L js/query/object/ui/upload.js'); }
