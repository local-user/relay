var ui_upload = {




    // | dropzone

        dropzone : function() {
            $('#upload').empty();
        },

        dropzone_ready : function(relay) {

            // dropzone - reset
            this.dropzone(relay);

            // dropzone - append - object
            $("#upload").append("<form class='dropzone'></form>");
            $("#upload form").dropzone({
                dictDefaultMessage:     "Drag or click to upload a file to the relay.",
                init:                   function () {
                                            this.on("complete", function (file) {
                                                console.log(file);
                                            });
                                            this.on('sending', function(file, xhr, formData){
                                                console.log(file);
                                            });
                                        },
                maxFiles:               1,
                error:                  function(file, response){
                                            error.display_show("File upload failed.");
                                        },
                url:                    "api.php?object=file&method=upload&relay=" + relay
            });

        },

    // dropzone |




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
$(document).ready(function() {





});
if( DEBUG ){ console.log(" L js/query/listener/ready/dropzone.js"); }
