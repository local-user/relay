var ui_nav = {




    // | input

        input : function() {
            $('#nav .input').addClass('hidden');
            $('#nav .input input').removeClass('error');
        },

        input_display : function() {
            this.input();
            $('#nav .input').removeClass('hidden');
            $('#nav .input input').focus();
        },

        input_display_error : function() {
            this.input_display();
            $('#nav .input input').addClass('error');
        },

        input_hide : function() {
            this.input();
        },

    // input |




    // | icon

        icon : function() {
            $('#nav .icon i').removeClass('landing');
            $('#nav .icon i').removeClass('error');
            $('#nav .icon i').removeClass('success');
        },

        icon_display : function() {
            this.icon()
        },

        icon_display_error : function() {
            this.icon_display();
            setTimeout(function() {
                $('#nav .icon i').addClass('error');
            }, 1);
        },

        icon_display_success : function() {
            this.icon_display();
            $('#nav .icon i').addClass('success');
        }

    // icon |



}
if( DEBUG ){ console.log(' L js/query/object/ui/nav.js'); }
