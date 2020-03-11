<!--Footer Start-->
<footer class="container-fluid">
    <div class="row footer">
        <div class="col-12">
            <p class="pt-2 mb-2 text-center">Copyright &copy; <a class="footer-link" href="">
                @if(isset($footer))
                {{$footer->copyright}}
            @endif</a> || Developed  by:
                <a class="footer-link" href="http://www.fzitsolution.net">FZIT Solution</a></p>
        </div>
    </div>
</footer>
<!--Footer End-->

    
    <!--    magnific popup-->
    <script src="{{asset('Admin/assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js')}}"></script>
    <!--    Carousel-->
    <script src="{{asset('Admin/assets/plugins/owl-carosel/js/owl.carousel.min.js')}}"></script>
    <!--    Bootstrap-4.3-->
    <script src="{{asset('Admin/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('Admin/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('Admin/assets/js/sub-dropdown.js')}}"></script>
    <!--Data table-->
    <script src="{{asset('Admin/assets/plugins/data-table/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/data-table/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('Admin/assets/plugins/data-table/js/dataTables.fixedHeader.min.js')}}"></script>
    <!--    Theme Script-->
    <script src="{{asset('Admin/assets/js/script.js')}}"></script>
</body>
</html>