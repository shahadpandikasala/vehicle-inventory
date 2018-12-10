
<div class="col-md-12">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<div id="result"></div>

@push('scripts')
    <!-- Bootstrap Notify Plugin Js -->
    <script src="{{asset('plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <script>

        @if(\Illuminate\Support\Facades\Session::has('save'))

            $(function () {
                // $('.jsdemo-notification-button button').on('click', function () {
                    var placementFrom = 'bottom';//$(this).data('placement-from');
                    var placementAlign = 'right';//$(this).data('placement-align');
                    var animateEnter = 'animated bounceInRight';//$(this).data('animate-enter');
                    var animateExit = 'animated bounceOutRight';//$(this).data('animate-exit');
                    var colorName = 'bg-deep-orange';//$(this).data('color-name');
                    var text = "{{\Illuminate\Support\Facades\Session::get('save')}}";//$(this).data('text');
                    // var type = $(this).data('type');

                    showNotification(colorName, null, placementFrom, placementAlign, animateEnter, animateExit, text);
                // });
            });

        @endif

        @if(\Illuminate\Support\Facades\Session::has('delete'))

            $(function () {
                // $('.jsdemo-notification-button button').on('click', function () {
                    var placementFrom = 'bottom';//$(this).data('placement-from');
                    var placementAlign = 'right';//$(this).data('placement-align');
                    var animateEnter = 'animated bounceInRight';//$(this).data('animate-enter');
                    var animateExit = 'animated bounceOutRight';//$(this).data('animate-exit');
                    var colorName = 'bg-deep-orange';//$(this).data('color-name');
                    var text = "{{\Illuminate\Support\Facades\Session::get('delete')}}";//$(this).data('text');
                    // var type = $(this).data('type');

                    showNotification(colorName, null, placementFrom, placementAlign, animateEnter, animateExit, text);
                // });
            });

        @endif

        // $('.jsdemo-notification-button button').on('click', function () {
        //     var placementFrom = $(this).data('placement-from');
        //     var placementAlign = $(this).data('placement-align');
        //     var animateEnter = $(this).data('animate-enter');
        //     var animateExit = $(this).data('animate-exit');
        //     var colorName = $(this).data('color-name');
        //     var text = $(this).data('text');

        //     showNotification(colorName, null, placementFrom, placementAlign, animateEnter, animateExit, text);
        // });

        function showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit, text, type) {
            if (colorName === null || colorName === '') { colorName = 'bg-black'; }
            if (text === null || text === '') { text = 'Turning standard Bootstrap alerts'; }
            if (animateEnter === null || animateEnter === '') { animateEnter = 'animated fadeInDown'; }
            if (animateExit === null || animateExit === '') { animateExit = 'animated fadeOutUp'; }
            var allowDismiss = true;

            $.notify({
                // icon: 'glyphicon glyphicon-warning-sign',
                message: text
            },
                {
                    type: colorName,
                    allow_dismiss: allowDismiss,
                    newest_on_top: true,
                    timer: 1000,
                    placement: {
                        from: placementFrom,
                        align: placementAlign
                    },
                    animate: {
                        enter: animateEnter,
                        exit: animateExit
                    },
                    template: '<div data-notify="container" class="bootstrap-notify-container alert alert-success {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert" style="width:40%;z-index:9999999!important">' +
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
        }
    </script>

@endpush