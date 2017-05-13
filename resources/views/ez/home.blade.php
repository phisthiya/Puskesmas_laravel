@extends('layouts.master')

@section('title', 'Ez Travel - Easier to Get Travel!')

@section('content')
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav cl-effect-11">
            <li class="active"><a href="#beranda" data-hover="Beranda"
                                  class="scroll">Beranda </a>
            </li>
            <li><a href="#about" data-hover="Tentang" class="scroll">Tentang</a></li>
            <li><a href="#services" data-hover="Layanan" class="scroll">Layanan</a></li>
            <li><a href="#tours" data-hover="Galeri" class="scroll">Galeri</a></li>
            <li><a data-hover="Kontak" href="#contact" class="scroll">Kontak</a></li>
            @if (Auth::guest())
                <li>
                    <a data-hover="Login/Register" href="{{ route('login') }}">
                        Login/Register
                    </a>
                </li>
            @else
                <li class="dropdown">
                    <a data-hover="{{Auth::user()->email}}" href="#" class="dropdown-toggle"
                       data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->email }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{url('ez/member/'.Auth::user()->id.'/edit')}}">Edit Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>
    </div>
    </div>
    </div>
    </nav>
    <div class="content-carousel" id="beranda">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators" style="position: absolute; top: 75%">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="/images/promo1.jpg">
                </div>

                <div class="item">
                    <img src="/images/promo2.jpg">
                </div>

                <div class="item">
                    <img src="/images/promos3.jpg">
                </div>

                <div class="item">
                    <img src="/images/promo4.jpg">
                </div>
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="search-form">
        <div class="container">
            <div class="row">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active "><a href="#tour" aria-controls="tour" role="tab"
                                                               data-toggle="tab">TOUR</a></li>
                    <li role="presentation"><a href="#flight" aria-controls="profile" role="tab"
                                               data-toggle="tab">TRAVEL</a></li>
                    <li role="presentation"><a href="#hotel" aria-controls="messages" role="tab"
                                               data-toggle="tab">HOTEL</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tour">
                        <form action="ez/tour" class="" method="get" role="search">
                            <div class="col-xs-3 form-group">
                                <label>Destinasi Kota</label>
                                <select class="form-control selectpicker" name="kota" id="kota"
                                        data-live-search="true" required>
                                    <option disabled selected>-- Pilih Kota --</option>
                                    @foreach($city as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                                <span class="input-icon"><i class="fa fa-angle-down fa-lg"></i></span>
                            </div>
                            <div class="col-xs-3 form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    CARI TOUR <i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="flight">
                        <form id="form_flight_search" method="get" action="cari-travel.php">
                            <div class="col-xs-4">
                                <div class="col-xs-12 form-group">
                                    <label for="departCity">Kota Keberangkatan</label>
                                    <select class="form-control selectpicker" name="asal" id="destination"
                                            data-live-search="true">
                                        <option disabled selected>-- Pilih Kota --</option>
                                        <?php $kota = (isset($_GET['kota']) ? strtolower($_GET['kota']) : NULL); ?>
                                        <option value="blitar" <?php if ($kota == 'blitar') {
                                            echo 'selected';
                                        } ?>>Blitar
                                        </option>
                                        <option value="kediri" <?php if ($kota == 'kediri') {
                                            echo 'selected';
                                        } ?>>Kediri
                                        </option>
                                        <option value="malang" <?php if ($kota == 'malang') {
                                            echo 'selected';
                                        } ?>>Malang
                                        </option>
                                        <option value="sidoarjo" <?php if ($kota == 'sidoarjo') {
                                            echo 'selected';
                                        } ?>>Sidoarjo
                                        </option>
                                        <option value="surabaya" <?php if ($kota == 'surabaya') {
                                            echo 'selected';
                                        } ?>>Surabaya
                                        </option>
                                    </select>
                                </div>
                                <div id="calendar-container" class="col-xs-12 form-group">
                                    <label for="departDate">Tanggal Berangkat</label>
                                    <input type="date" class="form-control" name="tgl_berangkat"
                                           style="background-color:white">
                                </div>
                                <!-- /.form group -->
                            </div>
                            <div class="col-xs-4">
                                <div class="col-xs-12 form-group">
                                    <label for="returnCity">Kota Tujuan</label>
                                    <select class="form-control selectpicker" name="tujuan" id="destination"
                                            data-live-search="true">
                                        <option disabled selected>-- Pilih Kota --</option>
                                        <?php $tujuan = (isset($_GET['tujuan']) ? strtolower($_GET['tujuan']) : NULL); ?>
                                        <option value="blitar" <?php if ($tujuan == 'blitar') {
                                            echo 'selected';
                                        } ?>>Blitar
                                        </option>
                                        <option value="kediri" <?php if ($tujuan == 'kediri') {
                                            echo 'selected';
                                        } ?>>Kediri
                                        </option>
                                        <option value="malang" <?php if ($tujuan == 'malang') {
                                            echo 'selected';
                                        } ?>>Malang
                                        </option>
                                        <option value="sidoarjo" <?php if ($tujuan == 'sidoarjo') {
                                            echo 'selected';
                                        } ?>>Sidoarjo
                                        </option>
                                        <option value="surabaya" <?php if ($tujuan == 'surabaya') {
                                            echo 'selected';
                                        } ?>>Surabaya
                                        </option>
                                    </select>
                                </div>
                                <button type="submit" class="col-xs-12 btn btn-primary btn-block">CARI TRAVEL<i
                                            class="fa fa-chevron-right"></i></button>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="hotel">
                        <form action="cari-hotel.php" name="hoteldestination_searchForm"
                              id="hoteldestination_searchForm"
                              method="get" onchange="form.submit()">
                            <div class="col-xs-3 form-group">
                                <label>Destinasi Kota</label>
                                <select class="form-control selectpicker" name="kota" id="destination"
                                        data-live-search="true">
                                    <option disabled selected>-- Pilih Kota --</option>
                                    <?php $kota = (isset($_GET['kota']) ? strtolower($_GET['kota']) : NULL); ?>
                                    <option value="bali" <?php if ($kota == 'bali') {
                                        echo 'selected';
                                    } ?>>Bali
                                    </option>
                                    <option value="malang" <?php if ($kota == 'malang') {
                                        echo 'selected';
                                    } ?>>Malang
                                    </option>
                                    <option value="surabaya" <?php if ($kota == 'surabaya') {
                                        echo 'selected';
                                    } ?>>Surabaya
                                    </option>
                                    <option value="yogyakarta" <?php if ($kota == 'yogyakarta') {
                                        echo 'selected';
                                    } ?>>Yogyakarta
                                    </option>
                                </select>
                                <span class="input-icon"><i class="fa fa-angle-down fa-lg"></i></span>
                            </div>
                            <div class="col-xs-3 form-group ">
                                <button type="submit" class="btn btn-primary btn-block">CARI HOTEL<i
                                            class="fa fa-chevron-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="promotions">
            <div class="container">
                <h2 class="tittle">Tujuan Favorit</h2>
                <span>Paket Terbaik Untuk Liburan Anda</span>
                <div class="promotion-grids">
                    @foreach($sql as $row)
                        <div class="col-md-4 promation-grid">
                            <div class="portfolio-item">
                                <img src="/images/tour/{{$row->url}}" class="img-responsive" alt="Error"/>
                                <div class="overlay">
                                    <a id="order" href="ez/tour/{{$row->id}}/detail">
                                        <button class="button d-windows"><h5><strong>DETAIL</strong></h5>
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="prom-text">
                                <h4>{{$row->name}} - {{$row->paket}}</h4>
                                <div class="prom-bottom">
                                    <div class="prom-left">
                                        <h5> {{$row->durasi}} </h5>
                                    </div>
                                    <div class="prom-right">
                                        <h5> Rp{{$row->harga}} / orang </h5>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <p><?php $sentence = "{$row->keterangan}"; $sentence = explode(" ", $sentence);
                                    for ($i = 0; $i < 14; $i++) {
                                        echo $sentence[$i] . " ";
                                    }
                                    ?>
                                    ...</p>
                            </div>
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--about--->
        <div class="about-section" id="about">
            <div class="container">
                <h3 class="tittle"> Tentang Ez Travel</h3>
                <div class="about-grids">
                    <div class="col-md-4 about-grid">
                        <img src="/images/tt2.png" class="img-responsive" alt=""/>
                    </div>
                    <div class="col-md-8 about-grid1">
                        <div class="about-top">
                            <div class="about-left">
                                <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                            </div>
                            <div class="about-right">
                                <h4>Penyedia Paket Liburan Anda</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aut dignissimos ea est,
                                    impedit incidunt, laboriosam maxime molestias numquam odio officiis. Ab aut
                                    dignissimos
                                    ea est, impedit incidunt.</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--about--->
        <div class="featured-services" id="services">
            <div class="container">
                <h3 class="tittle">Layanan Kita</h3>
                <div class="featured-grids">
                    <div class="col-md-3 featured-grid">
                        <div class="featured-grd">
                            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                            <h5>Tour</h5>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor
                                sit amet, consectetur, adipisci velit, sed quia non numquam.</p>
                            <div class="more m2">
                                <a href="#" class="btn effect6" data-toggle="modal" data-target="#myModal1">Learn
                                    More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 featured-grid">
                        <div class="featured-grd">
                            <span class="glyphicon glyphicon-road" aria-hidden="true"></span>
                            <h5>Travel</h5>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor
                                sit amet, consectetur, adipisci velit, sed quia non numquam.</p>
                            <div class="more m2">
                                <a href="#" class="btn effect6" data-toggle="modal" data-target="#myModal1">Learn
                                    More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 featured-grid">
                        <div class="featured-grd">
                            <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                            <h5>Rent</h5>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor
                                sit amet, consectetur, adipisci velit, sed quia non numquam.</p>
                            <div class="more m2">
                                <a href="#" class="btn effect6" data-toggle="modal" data-target="#myModal1">Learn
                                    More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 featured-grid">
                        <div class="featured-grd">
                            <span class="glyphicon glyphicon-plane" aria-hidden="true">&nbsp;+&nbsp;</span><span
                                    class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            <h5>Coming Soon</h5>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor
                                sit amet, consectetur, adipisci velit, sed quia non numquam.</p>
                            <div class="more m2">
                                <a href="#" class="btn effect6" data-toggle="modal" data-target="#myModal1">Learn
                                    More</a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--gallery-->
        <div class="gallery" id="tours">
            <div class="container">
                <h3 class="tittle">Galeri & Testimoni</h3>
                <div class="gallery-grids">
                    <section>
                        <ul id="da-thumbs" class="da-thumbs">
                            <li>
                                <a href="/images/galeri/bromo.jpg" class="b-link-stripe b-animate-go thickbox">
                                    <img src="/images/galeri/bromo.jpg" alt=""/>
                                    <div>
                                        <h5>Bromo</h5>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/images/galeri/a2.JPG" class="b-link-stripe b-animate-go thickbox">
                                    <img src="/images/galeri/a2.JPG" alt=""/>
                                    <div>
                                        <h5>Borobudur</h5>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/images/galeri/a3.jpg" class="b-link-stripe b-animate-go thickbox">
                                    <img src="/images/galeri/a3.jpg" alt=""/>
                                    <div>
                                        <h5>Danau Toba</h5>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/images/galeri/a4.jpg" class="b-link-stripe b-animate-go thickbox">
                                    <img src="/images/galeri/a4.jpg" alt=""/>
                                    <div>
                                        <h5>Semarang</h5>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/images/galeri/a5.jpg" class="b-link-stripe b-animate-go thickbox">
                                    <img src="/images/galeri/a5.jpg" alt=""/>
                                    <div>
                                        <h5>Bali</h5>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/images/galeri/a6.jpg" class="b-link-stripe b-animate-go thickbox">
                                    <img src="/images/galeri/a6.jpg" alt=""/>
                                    <div>
                                        <h5>Kawah Ijen</h5>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/images/galeri/a7.jpg" class="b-link-stripe b-animate-go thickbox">
                                    <img src="/images/galeri/a7.jpg" alt=""/>
                                    <div>
                                        <h5>Ooroo-Ooroo Ombo</h5>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/images/galeri/a8.jpg" class="b-link-stripe b-animate-go thickbox">
                                    <img src="/images/galeri/a8.jpg" alt=""/>
                                    <div>
                                        <h5>Lombok</h5>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="/images/galeri/a9.jpg" class="b-link-stripe b-animate-go thickbox">
                                    <img src="/images/galeri/a9.jpg" alt=""/>
                                    <div>
                                        <h5>Raja Ampat</h5>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </section>
                </div>
                <script type="text/javascript" src="js/jquery.hoverdir.js"></script>
                <script type="text/javascript">
                    $(function () {
                        $('#da-thumbs > li').each(function () {
                            $(this).hoverdir();
                        });
                    });
                </script>
            </div>
        </div>

        <!--gallery-->
    </div>
    <div class="contact" id="contact">
        <div class="container">
            <h3 class="tittle">Kontak</h3>
            <div class="contact-grids">
                <form role="form" action="{{url('ez/contact')}}" method="post">
                    {{csrf_field()}}
                    <div class="col-md-6 grid-contact">
                        @if(Auth::guest())
                            <div class="your-top">
                                <i class="glyphicon glyphicon-user"> </i>
                                <input type="text" name="name" placeholder="nama lengkap" required>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-top">
                                <i class="glyphicon glyphicon-envelope"> </i>
                                <input type="text" name="email" placeholder="E-mail" required>
                                <div class="clearfix"></div>
                            </div>
                        @else
                            <div class="your-top">
                                <i class="glyphicon glyphicon-user"> </i>
                                <input type="text" name="name" placeholder="nama lengkap"
                                       value="{{Auth::user()->name}} {{Auth::user()->lastname}}" required>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-top">
                                <i class="glyphicon glyphicon-envelope"> </i>
                                <input type="text" name="email" placeholder="E-mail" value="{{Auth::user()->email}}"
                                       required>
                                <div class="clearfix"></div>
                            </div>
                        @endif
                        <div class="your-top">
                            <i class="glyphicon glyphicon-phone"> </i>
                            <input type="text" name="phone" maxlength="13" placeholder="No.Telp/Hp"
                                   onkeypress="return hanyaAngka(event,false)">
                            <script>
                                function hanyaAngka(e, decimal) {
                                    var key;
                                    var keychar;
                                    if (window.event) {
                                        key = window.event.keyCode;
                                    } else if (e) {
                                        key = e.which;
                                    } else return true;
                                    keychar = String.fromCharCode(key);
                                    if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27)) {
                                        return true;
                                    } else if ((("0123456789").indexOf(keychar) > -1)) {
                                        return true;
                                    } else if (decimal && (keychar == ".")) {
                                        return true;
                                    } else return false;
                                }
                            </script>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-contact-in">
                        <textarea name="message" placeholder="pesan anda..." required></textarea>
                        <input type="submit" onclick="alert('Terimakasih telah menggunakan jasa kami :)')">
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
            <div class="google-map">
                <div id="map" style="width:1140px;height:260px"></div>
                <script>
                    function myMap() {
                        var mapCanvas = document.getElementById("map");
                        var myCenter = new google.maps.LatLng(-7.2931279, 112.7594555);
                        var mapOptions = {center: myCenter, zoom: 15};
                        var map = new google.maps.Map(mapCanvas, mapOptions);
                        var marker = new google.maps.Marker({
                            position: myCenter,
                            animation: google.maps.Animation.BOUNCE
                        });
                        marker.setMap(map);
                    }
                </script>
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQr6JsB15qc3PaOpAhkBZvqcJqsurI7sQ&callback=myMap"
                        type="text/javascript"></script>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            /*
             var defaults = {
             containerID: 'home', // fading element id
             containerHoverID: 'toTopHover', // fading element hover id
             scrollSpeed: 1200,
             easingType: 'linear'
             };
             */

            $().UItoTop({easingType: 'easeOutQuart'});

        });
    </script>
    <a href="#" id="home" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-info">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="news-gr">
                        <img src="/images/p6.jpg" class="img-responsive"/>
                        <h3 class="tittle1">Trip Guide</h3>
                        <p>Nam aliquam pretium feugiat. Duis sem est, viverra eu interdum ac, suscipit nec mauris.
                            Suspendisse commodo tempor sagittis! In justo est, sollicitudin eu scelerisque pretium,
                            placerat
                            eget elit. Praesent faucibus rutrum odio at rhoncus. Pel ermentum pretium. Maecenas ac lacus
                            ut
                            neque rhoncus laoreet sed id tellus. Donec justo tellus.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/searchform_v.js"></script>
@endsection