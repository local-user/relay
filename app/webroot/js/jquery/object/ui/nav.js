var ui_nav = {




    // | input

        input : function() {
            $("#nav .input").addClass("hidden");
        },

        input_display : function() {
            this.input();
            $("#nav .input").removeClass("hidden");
            $("#nav .input input").focus();
        },

        input_hide : function() {
            this.input();
        }

    // input |




}
if( DEBUG ){ console.log(" L js/query/object/ui/nav.js"); }
