@extends('layouts.master')

@section('title', 'Ez Travel - Tours')

@section('content')
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav cl-effect-11">
            <li><a data-hover="Kembali" href="/ez">Kembali</a></li>
            @if (Auth::guest())
                <li>
                    <a data-hover="Login/Register" href="{{ route('login') }}">
                        Login/Register
                    </a>
                </li>
            @else
                <li class="dropdown">
                    <a data-hover="{{Auth::user()->email}}" href="#" class="dropdown-toggle" data-toggle="dropdown"
                       role="button" aria-expanded="false" style="text-transform: lowercase">
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

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
    </div><!-- /.container-fluid -->
    </nav>
    </div>
    </div>
    </div>
    </nav>
    <br><br><br><br><br><br><br><br><br><br><br>
    <div class="search-form">
        <div class="container">
            <div class="row">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tour" aria-controls="tour" role="tab"
                                                              data-toggle="tab">TOUR</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tour">
                        <form action="/ez/tour" class="" method="get" role="search">
                            <div class="col-xs-3 form-group">
                                <label>Destinasi Kota</label>
                                <select class="form-control" name="kota" id="kota" required>
                                    <option disabled selected>-- Pilih Kota --</option>
                                    @foreach($city as $row)
                                        <option value="{{$row->id}}" <?php if ($row->id == $tour->city_id) {
                                            echo 'selected';
                                        } ?>>{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-3 form-group">
                                <button type="submit" class="btn btn-primary btn-block">CARI TOUR <i
                                            class="fa fa-chevron-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="promotions">
            <div class="about-section" id="about">
                <div class="container">
                    <h3 class="tittle">{{$tour->paket}}</h3>
                    <span>Kota: {{$tour->city->name}}</span>
                    <div class="about-grids">
                        <div class="col-md-6 about-grid">
                            <div class="content-carousel" id="beranda">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                            <img src="/images/tour/tanah_lot.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="/images/tour/gwk.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="/images/tour/sukawati.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="/images/favorit/bali.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="/images/tour/batu-secret-zoo.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="/images/tour/bns.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="/images/tour/bromo.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="/images/tour/bromo2.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="/images/tour/jatimpark.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="/images/tour/paralayang.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="/images/tour/predator%20fun%20park.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="/images/tour/safari.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="/images/tour/borobudur.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="/images/tour/borobudur2.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="/images/tour/borobudur3.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="/images/tour/malioboro.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="/images/tour/parangtritis.jpg">
                                        </div>
                                        <div class="item">
                                            <img src="/images/tour/prambanan.jpg">
                                        </div>
                                    </div>
                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel" role="button"
                                       data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left"
                                                      aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" role="button"
                                       data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right"
                                                      aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 about-grid1">
                            <div class="about-top">
                                <div class="about-left">
                                    <i class="glyphicon glyphicon-road" aria-hidden="true"></i>
                                </div>
                                <div class="about-right">
                                    <h4>Rute Destinasi</h4>
                                    <p>{{$tour->keterangan}}</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="about-top1">
                                <div class="about-left">
                                    <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                                </div>
                                <div class="about-right">
                                    <h4>Fasilitas</h4>
                                    <p>{{$tour->fasilitas}}</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="about-top1">
                                <div class="about-left">
                                    <i class="glyphicon glyphicon-dashboard" aria-hidden="true"></i>
                                </div>
                                <div class="about-right">
                                    <h4>Transportasi</h4>
                                    <p>{{$tour->transportasi}}</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div align="center" class="more m2">
                <a href="form" class="btn effect6">PILIH PAKET TOUR</a>
            </div>
        </div>
    </div>
@endsection
