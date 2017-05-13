@extends('layouts.master')

@section('title', 'Ez Travel - Tour`s Form')

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
                        {{ Auth::user()->email}} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
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
    <div class="content">
        <div class="promotions">
            <div class="container">
                <h3 class="tittle">E-Ticket Anda</h3>
                <span>Ez Travel - Tour</span>
                <center>
                    <div class="container" style="width: 51%">
                        <div class="progress-group">
                            <div class="wrapper">
                                <div class="step step01 complete">
                                    <progress class="progress" value="100" max="100"
                                              aria-describedby="Step 01"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                                <div class="step step02">
                                    <progress class="progress" value="100" max="100"
                                              aria-describedby="Step 02"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                                <div class="step step03">
                                    <progress class="progress" value="100" max="100"
                                              aria-describedby="Step 03"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                                <div class="step step04 complete">
                                    <progress class="progress" value="100" max="100"
                                              aria-describedby="Step 04"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                                <div class="step step05">
                                    <progress class="progress" value="100" max="100"
                                              aria-describedby="Step 05"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                            </div>
                            <div class="progress-labels">
                                <div class="label" style="color: black">Isi Data</div>
                                <div class="label" style="color: black">Review</div>
                                <div class="label" style="color: black">Pembayaran</div>
                                <div class="label" style="color: black">Proses</div>
                                <div class="label" style="color: black">E-Ticket</div>
                            </div>
                        </div>
                    </div>
                </center>
                <br>
                <div class="w3-container">
                    <div class="col-md-8">
                        <h2>Detail Pesanan</h2>
                        <div class="w3-panel w3-card"><br>
                            <div class="col-md-12">
                                <table>
                                    <tr>
                                        <td>Nomor Pesanan</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td><strong>0000001</strong></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td>Tanggal Keberangkatan</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td><strong>YYYY-MM-DD</strong></td>
                                    </tr>
                                    @if(Auth::guest())
                                        <tr>
                                            <td>Nama Lengkap</td>
                                            <td>&nbsp;:&nbsp;&nbsp;</td>
                                            <td><strong></strong></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>Nama Lengkap</td>
                                            <td>&nbsp;:&nbsp;&nbsp;</td>
                                            <td><strong>{{Auth::user()->name}} {{Auth::user()->lastname}}</strong></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>Destinasi</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td><strong>Surabaya</strong></td>
                                        <td>&nbsp;</td>
                                        <td>Paket</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td><strong>A</strong></td>
                                    </tr>
                                </table>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2>&nbsp;</h2>
                        <div class="w3-panel w3-card">
                            <h5 class="text-center">Cetak E-Ticket</h5><br>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary">Cetak</button>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <h1>&nbsp;</h1>
                <h1>&nbsp;</h1>
                <h1>&nbsp;</h1>
                <h5>&nbsp;</h5>
            </div>
        </div>
    </div>
@endsection