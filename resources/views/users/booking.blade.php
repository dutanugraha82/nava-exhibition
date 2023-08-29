@extends('master')
@section('page-title')
    Nava Exhibiton | Booking Ticket
@endsection
@section('content')
    <div class="container-fluid" style="margin-top: 6rem;">
        <div class="card  mb-5">
            <form action="/booking-store/{{ $date->id }}" method="POST" enctype="multipart/form-data" id="form">
                @csrf
                <h5 class="fs-monserrat text-center p-3">Form Booking Ticket</h5>
                <hr>
                <div class="container-fluid p-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama">Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email <span class="text-danger">(Active email)*</span></label>
                                <input type="text" name="email" class="form-control" required placeholder="example@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label for="phone">Phone <span class="text-danger">*62xxxxx (without +)</span></label>
                                <input type="text" name="phone" class="form-control" placeholder="62xxxxx (without +)" required>
                            </div>
                        </div>
                        <div class="col-md-6">  
                            <div class="mb-3">
                                <label for="birthday">Gender <span class="text-danger">*</span></label>
                                <select name="sex" class="form-control" >
                                    <option value="">----- Choose -----</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="size">Size Shoes <span class="text-danger">*</span></label>
                                <input type="text" name="size" class="form-control" placeholder="41 (example if more than 1 pair: 41, 42,...)"  required>
                            </div>
                            <div class="mb-3">
                                <label for="ticket">Amount of Ticket <span class="text-danger">(max 10 tickets/data)*</span></label>
                                <input type="number" name="ticket" class="form-control" id="amount" max="10" required>
                            </div>
                        </div>
                    </div>
                    <h5 class="text-center fs-monserrat my-4">Schedules at {{ $date->date }}</h5>
                    <input type="hidden" id="status" value="{{ $date->status }}">

                    <select name="time" class="form-control" id="time">
                        <option value="">Choose Time</option>
                        @foreach ($time as $item)
                        <option value="{{ $item->id }}">{{$item->time}} | slot : {{ $item->slot }}</option> 
                        @endforeach
                    </select>
                    <hr>
                    <div class="card-header my-4">
                        Persiapkan bukti pembayaran dalam pengisian form selanjutnya (No rekening terlampir dibawah ini).<br> <i>Prepare proof of payment in filling out the next form (The account number is attached below).</i>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label for="">The Account Number ( ARIFIN | BNI )</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="norek" value="1317613762" readonly>
                                <button type="button" class="btn btn-outline-dark" id="save">Copy</button>
                            </div>
                            <div class="d-flex mt-4">
                                <h5 class="fs-monserrat">Your Total : </h5>
                                <h5 id="total"></h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Proof of payment <span class="text-danger">*</span></label>
                            <input type="file" name="invoice" class="form-control" id="image" onchange="imgPreview()" required>
                            <div class="my-4">
                                <img class="img-preview d-block mx-auto" style="max-width: 300px"  alt="">
                            </div>
                        </div>
                    </div>
                </div>
                    <button type="submit" id="button" class="btn btn-primary d-block mx-auto mb-4" style="width: 80%">Submit</button>
                    <a href="/booking" class="btn btn-warning d-block mx-auto mb-4" style="width: 80%">Back</a>
            </form>
        </div>
    </div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        const _0x1b8f53=_0x3908;(function(_0x5dc5ef,_0x469610){const _0x18fa25=_0x3908,_0x545654=_0x5dc5ef();while(!![]){try{const _0x570106=-parseInt(_0x18fa25(0xc6))/(0x10f4+0x1640+-0x2733)+-parseInt(_0x18fa25(0xce))/(0x13*0x15d+-0x2431+-0x526*-0x2)+parseInt(_0x18fa25(0xb7))/(0xc63*-0x1+-0x36d+0xfd3)*(-parseInt(_0x18fa25(0xc2))/(-0x1d81+-0x1*0x2669+0x43ee))+parseInt(_0x18fa25(0xc5))/(-0x59*0x31+0x1223+-0x115)+-parseInt(_0x18fa25(0xb5))/(-0x1f37+-0x47b*0x7+0x1*0x3e9a)+parseInt(_0x18fa25(0xc9))/(-0x139b+0x2ab*0xc+0x2*-0x631)*(parseInt(_0x18fa25(0xcc))/(0x1*0xc5b+0x1fbb+-0x2c0e))+parseInt(_0x18fa25(0xc4))/(-0xcb+-0x166*-0x4+-0xf4*0x5);if(_0x570106===_0x469610)break;else _0x545654['push'](_0x545654['shift']());}catch(_0x4b7f9b){_0x545654['push'](_0x545654['shift']());}}}(_0x37a0,0xa0b4+0x220d8+0x7b6e2),$(document)[_0x1b8f53(0xd6)](function(){const _0x130672=_0x1b8f53,_0x311e12={'VMBgZ':function(_0x4f7216,_0xf160ba){return _0x4f7216(_0xf160ba);},'WDcKF':_0x130672(0xbc)};_0x311e12[_0x130672(0xca)]($,_0x311e12[_0x130672(0xc3)])[_0x130672(0xd7)]();}));function imgPreview(){const _0x413951=_0x1b8f53,_0xc94413={'twvHQ':_0x413951(0xcb),'Srtkl':_0x413951(0xb8)+'ew','wqNuf':_0x413951(0xd5)},_0x360d19=document[_0x413951(0xd8)+_0x413951(0xbb)](_0xc94413[_0x413951(0xd3)]),_0x380c5a=document[_0x413951(0xd8)+_0x413951(0xbb)](_0xc94413[_0x413951(0xd0)]);_0x380c5a[_0x413951(0xd4)][_0x413951(0xb9)]=_0xc94413[_0x413951(0xc7)];const _0x445d9b=new FileReader();_0x445d9b[_0x413951(0xdb)+_0x413951(0xbe)](_0x360d19[_0x413951(0xc1)][-0x196d+-0x4a4+0x1e11]),_0x445d9b[_0x413951(0xd2)]=function(_0xc5e29c){const _0x53be49=_0x413951;_0x380c5a[_0x53be49(0xb6)]=_0xc5e29c[_0x53be49(0xc8)][_0x53be49(0xd1)];};}function _0x3908(_0x2956fa,_0x1aa6df){const _0x11be15=_0x37a0();return _0x3908=function(_0x4206fd,_0x55b0c7){_0x4206fd=_0x4206fd-(0x1*-0x1279+-0x8b9+0x1be6);let _0x5df1a7=_0x11be15[_0x4206fd];return _0x5df1a7;},_0x3908(_0x2956fa,_0x1aa6df);}document[_0x1b8f53(0xba)+_0x1b8f53(0xd9)](_0x1b8f53(0xcd))[_0x1b8f53(0xbd)+_0x1b8f53(0xbf)](_0x1b8f53(0xda),function(){const _0x4cbd35=_0x1b8f53,_0x43354a={'dQWXk':_0x4cbd35(0xb4)};document[_0x4cbd35(0xba)+_0x4cbd35(0xd9)](_0x43354a[_0x4cbd35(0xcf)])[_0x4cbd35(0xc0)]=!![];});function _0x37a0(){const _0x5c4966=['#date','addEventLi','URL','stener','disabled','files','4LhIDnR','WDcKF','13575879JicLjQ','5449160wuwsZf','422302CjDssb','wqNuf','target','5731558DtLBCZ','VMBgZ','#image','8Zriqpc','form','383068OsbseJ','dQWXk','Srtkl','result','onload','twvHQ','style','block','ready','select2','querySelec','ById','submit','readAsData','button','7058028TBBBIa','src','2822079mzEkEG','.img-previ','display','getElement','tor'];_0x37a0=function(){return _0x5c4966;};return _0x37a0();}
    </script>
@endpush