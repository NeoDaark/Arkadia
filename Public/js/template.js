(function($){
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        //Init Custom scroll Bar
        //-----------------------------------------------
        function scrollBar(selector, theme, mousewheelaxis) {
            $(selector).mCustomScrollbar({
                theme: theme,
                scrollInertia: 100,
                axis:'yx',
                mouseWheel: {
                    enable: true,
                    axis: mousewheelaxis,
                    preventDefault: true
                }
            });
        }

        if (!$('html').hasClass('ismobile')) {
            //On Custom Class
            if ($('.c-overflow')[0]) {
                //scrollBar('.c-overflow', 'minimal-dark', 'y');
            }
        }
        
        
        //Fullscreen Button
        //-----------------------------------------------
        if ($('[data-action="fullscreen"]')[0]) {
            var fs = $("[data-action='fullscreen']");
            fs.on('click', function(e) {
                e.preventDefault();

                //Launch
                function launchIntoFullscreen(element) {

                    if(element.requestFullscreen) {
                        element.requestFullscreen();
                    } else if(element.mozRequestFullScreen) {
                        element.mozRequestFullScreen();
                    } else if(element.webkitRequestFullscreen) {
                        element.webkitRequestFullscreen();
                    } else if(element.msRequestFullscreen) {
                        element.msRequestFullscreen();
                    }
                }

                //Exit
                function exitFullscreen() {

                    if(document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if(document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if(document.webkitExitFullscreen) {
                        document.webkitExitFullscreen();
                    }
                }
                BootstrapNotify('FullScreen Toggled!','inverse', 20,'top','left', 1000, false);
                launchIntoFullscreen(document.documentElement);
                fs.closest('.dropdown').removeClass('open');
            });
        }

        //Clear Button
        //-----------------------------------------------
        if ($('[data-action="clear-localstorage"]')[0]) {
            var cls = $('[data-action="clear-localstorage"]');

            cls.on('click', function(e) {
                e.preventDefault();

                swal({
                    title: "Estás seguro?",
                    text: "Todos los valores guardados de almacenamiento local serán eliminados",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sí, estoy seguro !",
                    closeOnConfirm: false
                }, function(){
                    window.localStorage.clear();
                    swal("Hecho!", "Almacenamiento local eliminado!", "success");
                });
            });
        }

        //Desktop Notification
        //-----------------------------------------------
        try {
            Notification.requestPermission().then(function(result) {
                console.log('Notifications: '+result);
            });
        }
        catch(e) {
            error = e;
            console.log(error.message);
        }
        
        function spawnNotification(theBody,theIcon,theTitle) {
            var options = {
                body: theBody,
                icon: theIcon
            }
            var n = new Notification(theTitle,options);
        }

        //Waves Plugin
        //-----------------------------------------------
        var config = {
            // How long Waves effect duration 
            // when it's clicked (in milliseconds)
            duration: 1000,

            // Delay showing Waves effect on touch
            // and hide the effect if user scrolls
            // (0 to disable delay) (in milliseconds)
            delay: 200,
            wait: 1000, //ms
        };
        Waves.attach('.btn:not(.btn-icon):not(.btn-float)');
        Waves.attach('.btn-icon, .btn-float', ['waves-circle', 'waves-float']);
        Waves.init(config);

        // Notify Plugin
        //-----------------------------------------------
            //BootstrapNotify('Configure this in template.js','default', 20,'bottom','left', 1000, true);
            function BootstrapNotify(inMsg, inType, offset ,pl_from ,pl_align, time_Delay, allow_Close) {
                $.notify({
                    // options
                    icon: null,
                    title: null,
                    message: inMsg,
                    url: null,
                    target: '_blank'
                },{
                    // settings
                    element: 'body',
                    position: null,
                    type: inType,
                    allow_dismiss: allow_Close,
                    newest_on_top: false,
                    showProgressbar: false,
                    placement: {
                            from: pl_from,
                            align: pl_align
                    },
                    offset: offset,
                    spacing: 10,
                    z_index: 1031,
                    delay: time_Delay,
                    timer: 1000,
                    url_target: '_blank',
                    mouse_over: null,
                    animate: {
                            enter: 'animated fadeInDown',
                            exit: 'animated fadeOutUp'
                    },
                    onShow: null,
                    onShown: null,
                    onClose: null,
                    onClosed: null,
                    icon_type: 'class',
                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            '</div>' +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>' 
                });
                return false;
            }
            /*
            * Top Search
            */
           (function(){
               $('body').on('click', '#top-search > a', function(e){
                   e.preventDefault();

                   $('#header').addClass('search-toggled');
                   $('#top-search-wrap input').focus();
               });

               $('body').on('click', '#top-search-close', function(e){
                    e.preventDefault();
                    $('#header').removeClass('search-toggled');
                    var busqueda = $('#top-search-input').val();
                    var pos = $('#urlpos').val();
                    switch (pos) {
                        case "pos1":
                            location.href="../../partida.php?busqueda="+busqueda;
                          break;
                        case "pos2":
                            location.href="../partida.php?busqueda="+busqueda;
                          break;
                        case "pos3":
                            location.href="partida.php?busqueda="+busqueda;
                          break;
                     }
                    
               });
           })();
            console.log('Ready!');
    }); // End document ready
    
    
    
    //Load Content
    //-----------------------------------------------
    $(window).load(function() {
        $(".page-loader").fadeOut(1000);
    });
    
})(this.jQuery);


