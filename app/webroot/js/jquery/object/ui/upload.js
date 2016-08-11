var ui_upload = {




    // | dropzone

        dropzone : function() {
            $('#upload').empty();
        },

        dropzone_ready : function(relay) {

            // var - link
            var link = this;

            // dropzone - reset
            this.dropzone(relay);

            // dropzone - append - object
            $("#upload").append("<form class='dropzone'></form>");
            $("#upload form").dropzone({
                dictDefaultMessage:     "Drag or click to upload a file to the relay.",
                init:                   function () {

                                            // dropzone - on - file - upload- sent
                                            this.on("complete", function (file) {
                                                api = api_relay.get_files(relay);
                                                api.success(function(data) {

                                                    // refresh - files
                                                    ui_files.empty_table();
                                                    $.each( data[0], function( key, file ){
                                                        ui_file.append_table( relay, file['filename'], file['ttl'] );
                                                    });

                                                    // update - display
                                                    setTimeout(function() {
                                                        link.dropzone_ready(relay);
                                                    }, 1000);

                                                });
                                            });

                                            // dropzone - on - file - upload - sending
                                            this.on('sending', function(file, xhr, formData){
                                                link.dropzone_sending();
                                            });

                                        },
                maxFiles:               1,
                error:                  function(file, response){
                                            error.display_show("File upload failed.");
                                        },
                url:                    "api.php?object=file&method=upload&relay=" + relay
            });

        },

        dropzone_sending : function() {
            this.dropzone();
            $("#upload").append(
                '<div class="progress">' +
                    '<div class="indeterminate"></div>' +
                '</dv>'
            );
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
