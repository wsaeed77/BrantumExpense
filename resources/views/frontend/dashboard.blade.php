@extends('frontend.layouts.main')

@section('main-container')
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Brantum Technologies</h1>
                            <p>Agency to Inspire
                                Confidence and Build Trust</p>
                            <p>At Brantum Technologies, we aim to help you achieve your goals of having and<br>
                                maintaining your digital presence with a custom website.
                                </p>
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->
        <!-- Menu Toggle Script -->
        <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        </script>


    </header>
    <main></main>
@endsection
