var ui_spacer = {




    // | top

        top : function() {
            $(".spacer").addClass("hidden");
        },

        top_display : function() {
            this.top();
            $(".spacer").removeClass("hidden");
        },

        top_hide : function() {
            this.top();
        }

    // display |




}
if( DEBUG ){ console.log(' L js/query/object/ui/spacer.js'); }
