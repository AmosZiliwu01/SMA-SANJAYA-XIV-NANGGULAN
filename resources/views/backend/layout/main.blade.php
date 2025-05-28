<!--
=========================================================
* Argon Dashboard 3 - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    <title>
        Argon Dashboard 3 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet"/>
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{(asset('assets/css/argon-dashboard.css?v=2.1.0'))}}" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


<<<<<<< HEAD
=======



>>>>>>> 24e76615bd8596fc255d121cfab7ee2bf7aa88e3
</head>
<style>
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6 !important;
    }

    .ck-editor__editable_inline {
        min-height: 250px !important;
        padding: 15px !important;
        border: 1px solid #ddd !important;
    }
</style>

<body class="g-sidenav-show   bg-gray-100">
<div class="min-height-300 bg-dark position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
       id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
           target="_blank">
            <img src="{{asset('assets/img/logo-ct-dark.png')}}" width="26px" height="26px"
                 class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Creative Tim</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                   href="{{ route('dashboard.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <!-- Berita (Collapsible) -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ request()->routeIs(['post.*', 'category.*']) ? 'active' : '' }}"
                   data-bs-toggle="collapse"
                   href="#submenuBerita"
                   role="button"
                   aria-expanded="{{ request()->routeIs(['post.*', 'category.*']) ? 'true' : 'false' }}"
                   aria-controls="submenuBerita">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text">Berita</span>
                </a>
                <div class="collapse ps-3 {{ request()->routeIs(['post.*', 'category.*']) ? 'show' : '' }}"
                     id="submenuBerita">
                    <ul class="nav flex-column mt-1">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center {{ request()->routeIs('post.index') ? 'active' : '' }}"
                               href="{{ route('post.index') }}">
                                <i class="ni ni-bullet-list-67 text-sm me-2"></i>
                                <span>List Berita</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center {{ request()->routeIs('post.create') ? 'active' : '' }}"
                               href="{{ route('post.create') }}">
                                <i class="ni ni-send text-sm me-2"></i>
                                <span>Post Berita</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center {{ request()->routeIs('category.index') ? 'active' : '' }}"
                               href="{{ route('category.index') }}">
                                <i class="ni ni-tag text-sm me-2"></i>
                                <span>Kategori</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Pengguna -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}"
                   href="{{ route('user.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pengguna</span>
                </a>
            </li>

            <!-- Agenda -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('agenda.index') ? 'active' : '' }}"
                   href="{{ route('agenda.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Agenda</span>
                </a>
            </li>

            <!-- Pengumuman -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('announcement.index') ? 'active' : '' }}"
                   href="{{ route('announcement.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-notification-70 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pengumuman</span>
                </a>
            </li>

            <!-- File -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('file.index') ? 'active' : '' }}"
                   href="{{ route('file.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-folder-17 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">File</span>
                </a>
            </li>

            <!-- Gallery -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('gallery.index') ? 'active' : '' }}"
                   href="{{ route('gallery.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-image text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Gallery</span>
                </a>
            </li>

            <!-- Data Guru -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('teacher.index') ? 'active' : '' }}"
                   href="{{ route('teacher.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-hat-3 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Guru</span>
                </a>
            </li>

            <!-- Data Siswa -->
            {{--              <li class="nav-item">--}}
            {{--                  <a class="nav-link {{ request()->routeIs('student.index') ? 'active' : '' }}" href="{{ route('student.index') }}">--}}
            {{--                      <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">--}}
            {{--                          <i class="ni ni-badge text-dark text-sm opacity-10"></i>--}}
            {{--                      </div>--}}
            {{--                      <span class="nav-link-text ms-1">Data Siswa</span>--}}
            {{--                  </a>--}}
            {{--              </li>--}}

            <!-- Message -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('message.index') ? 'active' : '' }}"
                   href="{{ route('message.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-email-83 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Message</span>
                </a>
            </li>

            <!-- Comment -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('comment.index') ? 'active' : '' }}"
                   href="{{ route('comment.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chat-round text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Comment</span>
                </a>
            </li>

            <!-- Class -->
            <li class="nav-item">
                <!-- Menu Utama: Kesiswaan -->
                <a class="nav-link {{ request()->routeIs('class.') || request()->routeIs('student.') ? '' : 'collapsed' }}"
                   data-bs-toggle="collapse"
                   href="#submenu-class"
                   role="button"
                   aria-expanded="{{ request()->routeIs('class.') || request()->routeIs('student.') ? 'true' : 'false' }}"
                   aria-controls="submenu-class">

                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-badge text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kesiswaan</span>
                </a>

                <!-- Submenu -->
                <div class="collapse {{ request()->routeIs('class.*', 'student.*') ? 'show' : '' }}"
                     id="submenu-class">
                    <ul class="nav ms-4">
                        <!-- Class -->
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{ request()->routeIs('class.index') ? 'active' : '' }}"--}}
{{--                               href="{{ route('class.index') }}">--}}
{{--                                <i class="bi bi-building text-xs me-2"></i>--}}
{{--                                Class--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <!-- Data Siswa -->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('student.index') ? 'active' : '' }}"
                               href="{{ route('student.index') }}">
                                <i class="bi bi-person-lines-fill text-xs me-2"></i>
                                Data Siswa
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    </li>

    </ul>
    </div>

</aside>
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
         data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here...">
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('auth.logout') }}" class="nav-link text-white font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Logout</span>
                        </a>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                            aria-labelledby="dropdownMenuButton">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="{{asset('assets/img/team-2.jpg')}}"
                                                 class="avatar avatar-sm  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New message</span> from Laur
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                13 minutes ago
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="{{asset('assets/img/small-logos/logo-spotify.svg')}}"
                                                 class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New album</span> by Travis Scott
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                1 day
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                       fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background"
                                                                      d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                      opacity="0.593633743"></path>
                                                                <path class="color-background"
                                                                      d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                Payment successfully completed
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                2 days
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->
    @yield('content')

</main>

<!--   Core JS Files   -->
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
<script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile apps",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#5e72e4",
                backgroundColor: gradientStroke1,
                borderWidth: 3,
                fill: true,
                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#fbfbfb',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#ccc',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example backend etc -->
<script src="{{asset('assets/js/argon-dashboard.min.js?v=2.1.0')}}"></script>
{{-- Delete  --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showDeleteAlert() {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Ini hanya contoh tampilan.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Ya, hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Dihapus!",
                    text: "Data berhasil dihapus (tampilan saja).",
                    icon: "success"
                });
            }
        });
    }
</script>

<script>
    @if(session('success'))
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2500,
        toast: true,
        width: '30rem'
    });
    @endif

    @if(session('error'))
    Swal.fire({
        position: "top-end",
        icon: "error",
        title: "{{ session('error') }}",
        showConfirmButton: false,
        timer: 3000,
        toast: true,
        width: '30rem'
    });
    @endif
</script>

{{-- CKEditor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/ckeditor.js "></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
</body>

</html>
