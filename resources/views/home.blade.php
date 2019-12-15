@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

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
                        <form method="get" action="{{ route('insertDevice') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$key}}">
                            <input type="hidden" name="searchdevice" value="{{$searchdevice}}">
                            <input type="hidden" name="DeviceName" value="{{$phone->DeviceName}}">

                            <button type="submit">Exporter</button>

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
                                        <input type="hidden" name="technology" value="{{$phone->technology}}">
                                    @endisset
                                    @isset($phone->_2g_bands)
                                        <tr class="tr-toggle">
                                        <td class="ttl"><a href="network-bands.php3">2G bands</a></td>
                                        <td class="nfo" data-spec="net2g">{{ $phone->_2g_bands }}</td>
                                        </tr>
                                        <input type="hidden" name="_2g_bands" value="{{$phone->_2g_bands}}">
                                    @endisset
                                    @isset($phone->_3g_bands)
                                        <tr class="tr-toggle">
                                        <td class="ttl"><a href="network-bands.php3">3G bands</a></td>
                                        <td class="nfo" data-spec="net3g">{{ $phone->_3g_bands }}</td>
                                        </tr>
                                        <input type="hidden" name="_3g_bands" value="{{$phone->_3g_bands}}">
                                    @endisset
                                    @isset($phone->_4g_bands)
                                        <tr class="tr-toggle">
                                        <td class="ttl"><a href="network-bands.php3">4G bands</a></td>
                                        <td class="nfo" data-spec="net4g">{{  nl2br(e($phone->_4g_bands)) }}</td>
                                        </tr>
                                        <input type="hidden" name="_4g_bands" value="{{$phone->_4g_bands}}">
                                    @endisset
                                    @isset($phone->speed)
                                        <tr class="tr-toggle">
                                        <td class="ttl"><a href="glossary.php3?term=3g">Speed</a></td>
                                        <td class="nfo" data-spec="speed">{{ $phone->speed }}</td>
                                        </tr>
                                        <input type="hidden" name="speed" value="{{$phone->speed}}">
                                    @endisset





                                </tbody>
                                    @isset($phone->announced)
                                        <tr>
                                        <th rowspan="2" scope="row">Launch</th>
                                        <td class="ttl"><a href="glossary.php3?term=phone-life-cycle">Announced</a></td>
                                        <td class="nfo" data-spec="year">{{ $phone->announced }}</td>
                                        </tr>
                                        <input type="hidden" name="announced" value="{{$phone->announced}}">
                                    @endisset
                                    @isset($phone->status)
                                        <tr>
                                        <td class="ttl"><a href="glossary.php3?term=phone-life-cycle">Status</a></td>
                                        <td class="nfo" data-spec="status">{{ $phone->status }}</td>
                                        </tr>
                                        <input type="hidden" name="status" value="{{$phone->status}}">
                                    @endisset
                                    @isset($phone->dimensions)
                                        <tr>
                                        <th rowspan="6" scope="row">Body</th>
                                        <td class="ttl"><a href="#" onclick="helpW('h_dimens.htm');">Dimensions</a></td>
                                        <td class="nfo" data-spec="dimensions">{{ $phone->dimensions }}</td>
                                        </tr>
                                        <input type="hidden" name="dimensions" value="{{$phone->dimensions}}">
                                    @endisset
                                    @isset($phone->weight)
                                        <tr>
                                        <td class="ttl"><a href="#" onclick="helpW('h_weight.htm');">Weight</a></td>
                                        <td class="nfo" data-spec="weight">{{ $phone->weight }}</td>
                                        </tr>

                            <input type="hidden" name="weight" value="{{$phone->weight}}">
                                    @endisset
                                    @isset($phone->sim)
                                        <tr>
                                        <td class="ttl"><a href="glossary.php3?term=sim">SIM</a></td>
                                        <td class="nfo" data-spec="sim">{{ $phone->sim }}</td>
                                        </tr>
                                        <input type="hidden" name="sim" value="{{$phone->sim}}">
                                    @endisset

                                <tbody>
                                    @isset($phone->type)
                                        <tr>
                                        <th rowspan="5" scope="row">Display</th>
                                        <td class="ttl"><a href="glossary.php3?term=display-type">Type</a></td>
                                        <td class="nfo" data-spec="displaytype">{{ $phone->type }}</td>
                                        </tr>
                                        <input type="hidden" name="type" value="{{$phone->type}}">
                                    @endisset
                                    @isset($phone->size)
                                        <tr>
                                        <td class="ttl"><a href="#" onclick="helpW('h_dsize.htm');">Size</a></td>
                                        <td class="nfo" data-spec="displaysize">{{ $phone->size }}</td>
                                        </tr>
                                        <input type="hidden" name="size" value="{{$phone->size}}">
                                    @endisset
                                    @isset($phone->resolution)
                                        <tr>
                                        <td class="ttl"><a href="glossary.php3?term=resolution">Resolution</a></td>
                                        <td class="nfo" data-spec="displayresolution">{{ $phone->resolution }}</td>
                                        </tr>
                                        <input type="hidden" name="resolution" value="{{$phone->resolution}}">
                                    @endisset
                                    @isset($phone->protection)
                                        <tr>
                                        <td class="ttl"><a href="glossary.php3?term=screen-protection">Protection</a></td>
                                        <td class="nfo" data-spec="displayprotection">{{ $phone->protection }}</td>
                                        </tr>
                                        <input type="hidden" name="protection" value="{{$phone->protection}}">
                                    @endisset

                                </tbody>
                                <tbody>
                                    @isset($phone->os)
                                        <tr>
                                        <th rowspan="4" scope="row">Platform</th>
                                        <td class="ttl"><a href="glossary.php3?term=os">OS</a></td>
                                        <td class="nfo" data-spec="os">{{ $phone->os }}</td>
                                        </tr>
                                        <input type="hidden" name="os" value="{{$phone->os}}">
                                    @endisset
                                    @isset($phone->chipset)
                                        <tr><td class="ttl"><a href="glossary.php3?term=chipset">Chipset</a></td>
                                        <td class="nfo" data-spec="chipset">{{ $phone->chipset }}</td>
                                        </tr>
                                        <input type="hidden" name="chipset" value="{{$phone->chipset}}">
                                    @endisset
                                    @isset($phone->cpu)
                                        <tr><td class="ttl"><a href="glossary.php3?term=cpu">CPU</a></td>
                                        <td class="nfo" data-spec="cpu">{{ $phone->cpu }}</td>
                                        </tr>
                                        <input type="hidden" name="cpu" value="{{$phone->cpu}}">
                                    @endisset
                                    @isset($phone->gpu)
                                        <tr><td class="ttl"><a href="glossary.php3?term=gpu">GPU</a></td>
                                        <td class="nfo" data-spec="gpu">{{ $phone->gpu }}</td>
                                        </tr>
                                        <input type="hidden" name="gpu" value="{{$phone->gpu}}">
                                    @endisset
                                </tbody>
                                <tbody>
                                    @isset($phone->card_slot)
                                        <tr>
                                        <th rowspan="5" scope="row">Memory</th>
                                        <td class="ttl"><a href="glossary.php3?term=memory-card-slot">Card slot</a></td>


                                        <td class="nfo" data-spec="memoryslot">{{ $phone->card_slot }}</td>
                                        </tr>
                                        <input type="hidden" name="card_slot" value="{{$phone->card_slot}}">
                                    @endisset


                                    @isset($phone->internal)
                                        <tr>
                                        <td class="ttl"><a href="glossary.php3?term=dynamic-memory">Internal</a></td>
                                        <td class="nfo" data-spec="internalmemory">{{ $phone->internal }}</td>
                                        </tr>
                                        <input type="hidden" name="internal" value="{{$phone->internal}}">
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
                                            <input type="hidden" name="triple" value="{{$phone->triple}}">
                                        @endisset
                                        @isset($phone->dual_)
                                            <tr>
                                                <td class="ttl"><a href="glossary.php3?term=camera">Dual</a></td>
                                                <td class="nfo" data-spec="cam1features">{{ $phone->dual_ }}</td>
                                            </tr>
                                            <input type="hidden" name="dual_" value="{{$phone->dual_}}">
                                        @endisset
                                        @isset($phone->features)
                                            <tr>
                                                <td class="ttl"><a href="glossary.php3?term=camera">Features</a></td>
                                                <td class="nfo" data-spec="cam1features">{{ $phone->features }}</td>
                                            </tr>
                                            <input type="hidden" name="features" value="{{$phone->features}}">
                                        @endisset
                                        @isset($phone->video)
                                            <tr>
                                                <td class="ttl"><a href="glossary.php3?term=camera">Video</a></td>
                                                <td class="nfo" data-spec="cam1video">{{ $phone->video }}</td>
                                            </tr>
                                            <input type="hidden" name="video" value="{{$phone->video}}">
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
                                            <input type="hidden" name="single" value="{{$phone->single}}">
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
                                                <input type="hidden" name="loudspeaker_" value="{{$phone->loudspeaker_}}">
                                            @endisset
                                            @isset($phone->_3_5mm_jack_)
                                                <tr>
                                                    <td class="ttl"><a href="glossary.php3?term=audio-jack">3.5mm jack</a> </td>
                                                    <td class="nfo">{{ $phone->_3_5mm_jack_ }}</td>
                                                </tr>
                                                <input type="hidden" name="_3_5mm_jack_" value="{{$phone->_3_5mm_jack_}}">
                                            @endisset
                                        </tbody>
                                        <tbody>
                                            @isset($phone->wlan)
                                                <tr>
                                                    <th rowspan="9" scope="row">Comms</th>
                                                    <td class="ttl"><a href="glossary.php3?term=wi-fi">WLAN</a></td>
                                                    <td class="nfo" data-spec="wlan">{{$phone->wlan}}</td>
                                                </tr>
                                                <input type="hidden" name="wlan" value="{{$phone->wlan}}">
                                            @endisset
                                            @isset($phone->bluetooth)
                                                <tr>
                                                <td class="ttl"><a href="glossary.php3?term=bluetooth">Bluetooth</a></td>
                                                <td class="nfo" data-spec="bluetooth">{{$phone->bluetooth}}</td>
                                                </tr>
                                                <input type="hidden" name="bluetooth" value="{{$phone->bluetooth}}">
                                            @endisset
                                            @isset($phone->gps)
                                                <tr>
                                                <td class="ttl"><a href="glossary.php3?term=gps">GPS</a></td>
                                                <td class="nfo" data-spec="gps">{{$phone->gps}}</td>
                                                </tr>
                                                <input type="hidden" name="gps" value="{{$phone->gps}}">
                                            @endisset
                                            @isset($phone->nfc)
                                                <tr>
                                                <td class="ttl"><a href="glossary.php3?term=nfc">NFC</a></td>
                                                <td class="nfo" data-spec="nfc">{{$phone->nfc}}</td>
                                                </tr>
                                                <input type="hidden" name="nfc" value="{{$phone->nfc}}">
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
                                                <input type="hidden" name="usb" value="{{$phone->usb}}">
                                            @endisset
                                            </tbody>
                                            <tbody>
                                            @isset($phone->sensors)
                                                <tr>
                                                <th rowspan="9" scope="row">Features</th>
                                                <td class="ttl"><a href="glossary.php3?term=sensors">Sensors</a></td>
                                                <td class="nfo" data-spec="sensors">{{$phone->sensors}}</td>
                                                </tr>
                                                <input type="hidden" name="sensors" value="{{$phone->sensors}}">
                                            @endisset
                                            </tbody>
                                            <tbody>
                                            @isset($phone->sensors)
                                                <tr>
                                                <th rowspan="7" scope="row">Battery</th>
                                                <td class="ttl">&nbsp;</td>
                                                <td class="nfo" data-spec="batdescription1">{{$phone->sensors}}</td>
                                                </tr>
                                                <input type="hidden" name="sensors" value="{{$phone->sensors}}">
                                            @endisset
                                            @isset($phone->charging)
                                                <tr>
                                                <td class="ttl"><a href="glossary.php3?term=battery-charging">Charging</a></td>
                                                <td class="nfo">{{$phone->charging}}</td>
                                                </tr>
                                                <input type="hidden" name="charging" value="{{$phone->charging}}">
                                            @endisset

                                            </tbody>
                                            <tbody>
                                            @isset($phone->colors)
                                                <tr>
                                                <th rowspan="6" scope="row">Misc</th>
                                                <td class="ttl"><a href="glossary.php3?term=build">Colors</a></td>
                                                <td class="nfo" data-spec="colors">{{$phone->colors}}</td>
                                                </tr>
                                                <input type="hidden" name="colors" value="{{$phone->colors}}">
                                            @endisset
                                            @isset($phone->models)
                                                <tr>
                                                <td class="ttl"><a href="glossary.php3?term=models">Models</a></td>
                                                <td class="nfo" data-spec="models">{{$phone->models}}</td>
                                                </tr>
                                                <input type="hidden" name="models" value="{{$phone->models}}">
                                            @endisset
                                            @isset($phone->sar)
                                                <tr>
                                                <td class="ttl"><a href="glossary.php3?term=sar">SAR</a></td>
                                                <td class="nfo" data-spec="sar-us">{{$phone->sar}}</td>
                                                </tr>
                                                <input type="hidden" name="sar" value="{{$phone->sar}}">
                                            @endisset
                                            @isset($phone->price)
                                                <tr>
                                                <td class="ttl"><a href="glossary.php3?term=price">Price</a></td>
                                                <td class="nfo" data-spec="price">{{$phone->price}}</td>
                                                </tr>
                                                <input type="hidden" name="price" value="{{$phone->price}}">
                                            @endisset
                                            </tbody>
                                            </table>
                                            {{-- --------------------------------------------------------------------------------------------------------------------------------- --}}
                            </div>
                        </div>
                </div>
                <div class="col-md-1">

                </div>
                </form>
            @endforeach
            </div>
        </div>
                    {{-- <a href="{{ route('table') }}" >test with create Excel</a>
                    </div> --}}
@endsection
