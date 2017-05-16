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
    <div class="content">
        <div class="promotions">
            <div class="container">
                <h3 class="tittle">Cek Pesanan Anda</h3>
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
                                    <progress class="progress" value="0" max="100"
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
                <div class="w3-container -align-center center-block">
                    <div class="col-md-12">
                        <div class="w3-panel w3-card">
                            <br><br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Operator</th>
                                        <th>Tipe</th>
                                        <th>Tanggal Berangkat</th>
                                        <th>Jam Berangkat</th>
                                        <th>Tanggal Tiba</th>
                                        <th>Jam Tiba</th>
                                        <th>Harga</th>
                                        <th>&nbsp;</th>

                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <td>PO Eka</td>
                                        <td><span class="fa fa-bus"></span></td>
                                        <td>25 April 2017t</td>
                                        <td>18.00</td>
                                        <td>26 April 2017</td>
                                        <td>14.00</td>
                                        <td>Rp. 25.0000</td>
                                        <td>
                                            <button type="button" class="btn btn-primary">Pilih</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>PO Eka</td>
                                        <td><span class="fa fa-car"></span></td>
                                        <td>25 April 2017t</td>
                                        <td>18.00</td>
                                        <td>26 April 2017</td>
                                        <td>14.00</td>
                                        <td>Rp. 25.0000</td>
                                        <td>
                                            <button type="button" class="btn btn-primary">Pilih</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>PO Eka</td>
                                        <td><span class="fa fa-bus"></span></td>
                                        <td>25 April 2017t</td>
                                        <td>18.00</td>
                                        <td>26 April 2017</td>
                                        <td>14.00</td>
                                        <td>Rp. 25.0000</td>
                                        <td>
                                            <button type="button" class="btn btn-primary">Pilih</button>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection