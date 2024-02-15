<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.com/koho/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2024 05:02:05 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Koho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Koho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('assets/images/smk/rpl.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/smk/rpl.png') }}" type="image/x-icon">
    <title>Epresensi - RPL</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/sweetalert2.css') }}">
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css
" rel="stylesheet">
    @yield('styles')
</head>

<body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        @include('layouts.header')
        <!-- Page Header Ends                            -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            @include('layouts.sidebar')
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <!-- Container-fluid starts-->
                <div class="container-fluid default-page">
                    @yield('content')
                </div>
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            @include('layouts.footer')
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <script src="{{ asset('assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/js/chart/knob/knob.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart/knob/knob-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
    <script src="{{ asset('assets/js/notify/index.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweet-alert/app.js') }}"></script>
    <!-- Theme js-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>


    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/theme-customizer/customizer.js') }}"></script>
    <script>
        function getDataAttributes(elementId) {
            const dataAttributes = {};
            const element = $('#' + elementId);
            if (element.length === 0) {
                console.error('Element with ID "' + elementId + '" not found.');
                return null;
            }
            $.each(element[0].attributes, function() {
                if (this.name.startsWith('data-')) {
                    const key = this.name.substring(5);
                    const value = this.value;
                    dataAttributes[key] = value;
                }
            });
            return dataAttributes;
        }

        function setFormValues(formId, values) {
            const form = $('#' + formId);
            for (const key in values) {
                if (values.hasOwnProperty(key)) {
                    const value = values[key];
                    const input = form.find('[name="' + key + '"]');
                    if (input.length > 0) {
                        const type = input.attr('type');
                        if (type === 'radio') {
                            input.filter('[value="' + value + '"]').prop('checked', true);
                        } else if (input.is('select')) {
                            if (input.hasClass('select2')) {
                                input.val(value).trigger('change'); // Trigger change event for Select2
                            } else {
                                input.val(value).trigger('change');
                            }
                        } else {
                            input.val(value);
                        }
                    } else {
                        const textarea = form.find('textarea[name="' + key + '"]');
                        if (textarea.length > 0) {
                            textarea.html(value);
                        }
                    }
                }
            }
        }

        function handleDetail(data) {
            const keys = Object.keys(data);
            for (const key of keys) {
                const text = data[key];
                $('#detail-' + key).html(text)
            }
        }

        function handleFile(data) {
            const iframeSrc = data['file'];
            $('#detail-file').attr('src', iframeSrc);
        }

        function showLoading() {
            return `<div class="d-flex justify-content-center" style="margin-top:11rem">
                        <div class="spinner-border my-auto" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>`
        }

        function showNoData(message) {
            return `<div class="d-flex justify-content-center" style="min-height:16rem">
                        <div class="my-auto ">
                            <img src="{{ asset('assets/images/smk/Asset 1.png') }}"
                                                            width="100%" height="200" />
                            <h4 class="text-center">${message}</h4>
                            </div>
                    </div>`
        }
    </script>
    @yield('scripts')
</body>

<!-- Mirrored from admin.pixelstrap.com/koho/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2024 05:03:09 GMT -->

</html>
