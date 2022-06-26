@include('layouts.backend.includes.head')

@include('layouts.backend.includes.main-header')

    <!--=================================
     Main content -->

    <div class="container-fluid">
        <div class="row">
            @include('layouts.backend.includes.sidebar')

            <!--=================================
           wrapper -->

                <div class="content-wrapper">



                    @yield('content')

                    <!--=================================
                    wrapper -->

                    <!--=================================
                     footer -->

                    <footer class="bg-white p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-center text-md-left">
                                    <p class="mb-0"> &copy; Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>. <a href="#"> Webmin </a> All Rights Reserved. </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <ul class="text-center text-md-right">
                                    <li class="list-inline-item"><a href="#">Terms & Conditions </a> </li>
                                    <li class="list-inline-item"><a href="#">API Use Policy </a> </li>
                                    <li class="list-inline-item"><a href="#">Privacy Policy </a> </li>
                                </ul>
                            </div>
                        </div>
                    </footer>
                </div> <!-- main content wrapper end-->
        </div>
    </div>
</div>

@include('layouts.backend.includes.footer')
