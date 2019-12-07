@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8 mb-3 shadow p-3 mb-5 bg-white rounded" >
            <center>

                <form action="{{ route('search') }}" method="post">
                    {{ csrf_field() }}
                    <input type="text" class="col-md-3 form-control" name="searchdevice" placeholder="search">
                    <br>
                    <button type="submit" class="btn btn-outline-secondary">Rechercher</button>
                </form>
            </center>

        </div>
        <div class="col-md-2">

        </div>
            {{-- <div class="input-group">
            <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Button</button>
            </div>
            </div> --}}

    </div>

    <div class="row">
        {{-- <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">DeviceName</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($productphone as $key => $phone)
                    <tr>
                        <td>

                        </td>
                        <td>
                            {{$phone->DeviceName}}
                        </td>
                        <td>
                    <form action="{{ route('show_device') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$key}}">
                        <input type="hidden" name="searchdevice" value="{{$searchdevice}}">

                        <button type="submit">détail</button>
                    </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}

        @foreach($productphone as $key=>$phone)
            <div class="col-md-5 mb-3 shadow p-3 mb-5 bg-white rounded">


            {{-- <div class="accordion" id="accordionExample"> --}}

                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{ $phone->DeviceName }}
                            </button>
                        </h2>
                    </div>

                    {{-- <div   id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample"> --}}
                        <div id="specs-list" class="card-body">
                    {{-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}

                            <table cellspacing="0" style="max-height: 28px;">
                                <tbody>
                                    @isset($phone->technology)
                                        <tr class="tr-hover">
                                        <th rowspan="15" scope="row">Network</th>
                                        <td class="ttl"><a href="network-bands.php3">Technology</a></td>
                                        <td class="nfo"><a href="#" class="link-network-detail collapse" data-spec="nettech"> {{ $phone->technology }} </a></td>
                                        </tr>
                                    @endisset
                                    @isset($phone->_2g_bands)
                                        <tr class="tr-toggle">
                                        <td class="ttl"><a href="network-bands.php3">2G bands</a></td>
                                        <td class="nfo" data-spec="net2g">{{ $phone->_2g_bands }}</td>
                                        </tr>
                                    @endisset
                                    @isset($phone->_3g_bands)
                                        <tr class="tr-toggle">
                                        <td class="ttl"><a href="network-bands.php3">3G bands</a></td>
                                        <td class="nfo" data-spec="net3g">{{ $phone->_3g_bands }}</td>
                                        </tr>
                                    @endisset
                                    @isset($phone->_4g_bands)
                                        <tr class="tr-toggle">
                                        <td class="ttl"><a href="network-bands.php3">4G bands</a></td>
                                        <td class="nfo" data-spec="net4g">{{  nl2br(e($phone->_4g_bands)) }}</td>
                                        </tr>
                                    @endisset
                                    @isset($phone->speed)
                                        <tr class="tr-toggle">
                                        <td class="ttl"><a href="glossary.php3?term=3g">Speed</a></td>
                                        <td class="nfo" data-spec="speed">{{ $phone->speed }}</td>
                                        </tr>
                                    @endisset





                                </tbody>
                                    @isset($phone->announced)
                                        <tr>
                                        <th rowspan="2" scope="row">Launch</th>
                                        <td class="ttl"><a href="glossary.php3?term=phone-life-cycle">Announced</a></td>
                                        <td class="nfo" data-spec="year">{{ $phone->announced }}</td>
                                        </tr>
                                    @endisset
                                    @isset($phone->status)
                                        <tr>
                                        <td class="ttl"><a href="glossary.php3?term=phone-life-cycle">Status</a></td>
                                        <td class="nfo" data-spec="status">{{ $phone->status }}</td>
                                        </tr>
                                    @endisset
                                    @isset($phone->dimensions)
                                        <tr>
                                        <th rowspan="6" scope="row">Body</th>
                                        <td class="ttl"><a href="#" onclick="helpW('h_dimens.htm');">Dimensions</a></td>
                                        <td class="nfo" data-spec="dimensions">{{ $phone->dimensions }}</td>
                                        </tr>
                                    @endisset
                                    @isset($phone->weight)
                                        <tr>
                                        <td class="ttl"><a href="#" onclick="helpW('h_weight.htm');">Weight</a></td>
                                        <td class="nfo" data-spec="weight">{{ $phone->weight }}</td>
                                        </tr>
                                    @endisset
                                    @isset($phone->sim)
                                        <tr>
                                        <td class="ttl"><a href="glossary.php3?term=sim">SIM</a></td>
                                        <td class="nfo" data-spec="sim">{{ $phone->sim }}</td>
                                        </tr>
                                    @endisset

                                <tbody>
                                    @isset($phone->type)
                                        <tr>
                                        <th rowspan="5" scope="row">Display</th>
                                        <td class="ttl"><a href="glossary.php3?term=display-type">Type</a></td>
                                        <td class="nfo" data-spec="displaytype">{{ $phone->type }}</td>
                                        </tr>
                                    @endisset
                                    @isset($phone->size)
                                        <tr>
                                        <td class="ttl"><a href="#" onclick="helpW('h_dsize.htm');">Size</a></td>
                                        <td class="nfo" data-spec="displaysize">{{ $phone->size }}</td>
                                        </tr>
                                    @endisset
                                    @isset($phone->resolution)
                                        <tr>
                                        <td class="ttl"><a href="glossary.php3?term=resolution">Resolution</a></td>
                                        <td class="nfo" data-spec="displayresolution">{{ $phone->resolution }}</td>
                                        </tr>
                                    @endisset
                                    @isset($phone->protection)
                                        <tr>
                                        <td class="ttl"><a href="glossary.php3?term=screen-protection">Protection</a></td>
                                        <td class="nfo" data-spec="displayprotection">{{ $phone->protection }}</td>
                                        </tr>
                                    @endisset

                                </tbody>
                                <tbody>
                                    @isset($phone->os)
                                        <tr>
                                        <th rowspan="4" scope="row">Platform</th>
                                        <td class="ttl"><a href="glossary.php3?term=os">OS</a></td>
                                        <td class="nfo" data-spec="os">{{ $phone->os }}</td>
                                        </tr>
                                    @endisset
                                    @isset($phone->chipset)
                                        <tr><td class="ttl"><a href="glossary.php3?term=chipset">Chipset</a></td>
                                        <td class="nfo" data-spec="chipset">{{ $phone->chipset }}</td>
                                        </tr>
                                    @endisset
                                    @isset($phone->cpu)
                                        <tr><td class="ttl"><a href="glossary.php3?term=cpu">CPU</a></td>
                                        <td class="nfo" data-spec="cpu">{{ $phone->cpu }}</td>
                                        </tr>
                                    @endisset
                                    @isset($phone->gpu)
                                        <tr><td class="ttl"><a href="glossary.php3?term=gpu">GPU</a></td>
                                        <td class="nfo" data-spec="gpu">{{ $phone->gpu }}</td>
                                        </tr>
                                    @endisset
                                </tbody>
                                <tbody>
                                    @isset($phone->card_slot)
                                        <tr>
                                        <th rowspan="5" scope="row">Memory</th>
                                        <td class="ttl"><a href="glossary.php3?term=memory-card-slot">Card slot</a></td>


                                        <td class="nfo" data-spec="memoryslot">{{ $phone->card_slot }}</td>
                                        </tr>
                                    @endisset


                                    @isset($phone->internal)
                                        <tr>
                                        <td class="ttl"><a href="glossary.php3?term=dynamic-memory">Internal</a></td>
                                        <td class="nfo" data-spec="internalmemory">{{ $phone->internal }}</td>
                                        </tr>
                                    @endisset




                                </tbody></table>


                                    <table cellspacing="0">
                                    <tbody><tr>
                                    <th rowspan="4" scope="row" class="small-line-height">Main Camera</th>
                                        <td class="ttl"><a href="glossary.php3?term=camera">Nb</a></td>
                                    <td class="nfo" data-spec="cam1modules"><br>
                                        En cours de codage...</td>
                                    </tr>
                                        @isset($phone->triple)
                                            <tr>
                                                <td class="ttl"><a href="glossary.php3?term=camera">Triple</a></td>
                                                <td class="nfo" data-spec="cam1features">{{ $phone->triple }}</td>
                                            </tr>
                                        @endisset
                                        @isset($phone->dual_)
                                            <tr>
                                                <td class="ttl"><a href="glossary.php3?term=camera">Dual</a></td>
                                                <td class="nfo" data-spec="cam1features">{{ $phone->dual_ }}</td>
                                            </tr>
                                        @endisset
                                        @isset($phone->features)
                                            <tr>
                                                <td class="ttl"><a href="glossary.php3?term=camera">Features</a></td>
                                                <td class="nfo" data-spec="cam1features">{{ $phone->features }}</td>
                                            </tr>
                                        @endisset
                                        @isset($phone->video)
                                            <tr>
                                                <td class="ttl"><a href="glossary.php3?term=camera">Video</a></td>
                                                <td class="nfo" data-spec="cam1video">{{ $phone->video }}</td>
                                            </tr>
                                        @endisset
                                        </tbody>
                                    </table>


                                    <table cellspacing="0">
                                        <tbody>
                                        @isset($phone->single)
                                            <tr>
                                                <th rowspan="4" scope="row" class="small-line-height">Selfie camera</th>
                                                <td class="ttl"><a href="glossary.php3?term=secondary-camera">Single</a></td>
                                                <td class="nfo" data-spec="cam2modules">{{ $phone->single }}</td>
                                            </tr>
                                        @endisset

                                        </tbody>
                                    </table>



                                    <table cellspacing="0">
                                        <tbody>
                                            @isset($phone->loudspeaker_)
                                                <tr>
                                                    <th rowspan="3" scope="row">Sound</th>
                                                    <td class="ttl"><a href="glossary.php3?term=loudspeaker">Loudspeaker</a> </td>
                                                    <td class="nfo">{{ $phone->loudspeaker_ }}</td>
                                                </tr>
                                            @endisset
                                            @isset($phone->_3_5mm_jack_)
                                                <tr>
                                                    <td class="ttl"><a href="glossary.php3?term=audio-jack">3.5mm jack</a> </td>
                                                    <td class="nfo">{{ $phone->_3_5mm_jack_ }}</td>
                                                </tr>
                                            @endisset
                                        </tbody>
                                        <tbody>
                                            @isset($phone->wlan)
                                                <tr>
                                                    <th rowspan="9" scope="row">Comms</th>
                                                    <td class="ttl"><a href="glossary.php3?term=wi-fi">WLAN</a></td>
                                                    <td class="nfo" data-spec="wlan">{{$phone->wlan}}</td>
                                                </tr>
                                            @endisset
                                            @isset($phone->bluetooth)
                                                <tr>
                                                <td class="ttl"><a href="glossary.php3?term=bluetooth">Bluetooth</a></td>
                                                <td class="nfo" data-spec="bluetooth">{{$phone->bluetooth}}</td>
                                                </tr>
                                            @endisset
                                            @isset($phone->gps)
                                                <tr>
                                                <td class="ttl"><a href="glossary.php3?term=gps">GPS</a></td>
                                                <td class="nfo" data-spec="gps">{{$phone->gps}}</td>
                                                </tr>
                                            @endisset
                                            @isset($phone->nfc)
                                                <tr>
                                                <td class="ttl"><a href="glossary.php3?term=nfc">NFC</a></td>
                                                <td class="nfo" data-spec="nfc">{{$phone->nfc}}</td>
                                                </tr>
                                            @endisset

                                            @isset($phone->radio)
                                                <tr>
                                                <td class="ttl"><a href="glossary.php3?term=fm-radio">Radio</a></td>
                                                <td class="nfo" data-spec="radio">{{$phone->radio}}</td>
                                                </tr>
                                            @endisset
                                            @isset($phone->usb)
                                                <tr>
                                                <td class="ttl"><a href="glossary.php3?term=usb">USB</a></td>
                                                <td class="nfo" data-spec="usb">{{$phone->usb}}</td>
                                                </tr>
                                            @endisset
                                            </tbody>
                                            <tbody>
                                            @isset($phone->sensors)
                                                <tr>
                                                <th rowspan="9" scope="row">Features</th>
                                                <td class="ttl"><a href="glossary.php3?term=sensors">Sensors</a></td>
                                                <td class="nfo" data-spec="sensors">{{$phone->sensors}}</td>
                                                </tr>
                                            @endisset
                                            </tbody>
                                            <tbody>
                                            @isset($phone->sensors)
                                                <tr>
                                                <th rowspan="7" scope="row">Battery</th>
                                                <td class="ttl">&nbsp;</td>
                                                <td class="nfo" data-spec="batdescription1">{{$phone->sensors}}</td>
                                                </tr>
                                            @endisset
                                            @isset($phone->charging)
                                                <tr>
                                                <td class="ttl"><a href="glossary.php3?term=battery-charging">Charging</a></td>
                                                <td class="nfo">{{$phone->charging}}</td>
                                                </tr>
                                            @endisset

                                            </tbody>
                                            <tbody>
                                            @isset($phone->colors)
                                                <tr>
                                                <th rowspan="6" scope="row">Misc</th>
                                                <td class="ttl"><a href="glossary.php3?term=build">Colors</a></td>
                                                <td class="nfo" data-spec="colors">{{$phone->colors}}</td>
                                                </tr>
                                            @endisset
                                            @isset($phone->models)
                                                <tr>
                                                <td class="ttl"><a href="glossary.php3?term=models">Models</a></td>
                                                <td class="nfo" data-spec="models">{{$phone->models}}</td>
                                                </tr>
                                            @endisset
                                            @isset($phone->sar)
                                                <tr>
                                                <td class="ttl"><a href="glossary.php3?term=sar">SAR</a></td>
                                                <td class="nfo" data-spec="sar-us">{{$phone->sar}}</td>
                                                </tr>
                                            @endisset
                                            @isset($phone->price)
                                                <tr>
                                                <td class="ttl"><a href="glossary.php3?term=price">Price</a></td>
                                                <td class="nfo" data-spec="price">{{$phone->price}}</td>
                                                </tr>
                                            @endisset
                                            </tbody>
                                            </table>




                                            {{-- --------------------------------------------------------------------------------------------------------------------------------- --}}
                            </div>
                        </div>
                    {{-- </div> --}}

                </div>
                <div class="col-md-1">

                </div>
                @endforeach
            </div>
        </div>
                    {{-- <a href="{{ route('table') }}" >test with create Excel</a>
                    </div> --}}
@endsection
