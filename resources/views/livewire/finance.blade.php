<div>
    <main>

        <div class="d-flex mx-3">
            @include('components.return-back')

            <div class="btn-group w-75 ms-3" role="group" aria-label="Basic radio toggle button group">
                <input wire:click="change('year')" type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="btnradio1">Yil</label>

                <input wire:click="change('month')" type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio2">Oy</label>

                <input wire:click="change('week')" type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio3">Hafta</label>
            </div>
        </div>

        <div class=" text-muted m-3 p-3 bg-body rounded shadow-sm">
            <div class="ms-3 mb-0 small">
                <div class="">
                    <strong class="text-menu  name-cilent font-18">
                        Sof Foyda
                    </strong><br>
                    <strong class="text-menu  font-20 minus">{{$payments->sum('amount')}} so'm</strong>
                </div>
            </div>
        </div>

        <div class=" text-muted m-3 p-3 bg-body rounded shadow-sm">
            <div class="ms-3 mb-0 small">
                <div class="">
                    <strong class="text-menu  name-cilent font-18">
                        Xarajatlar
                    </strong><br>
                    <strong class="text-menu  font-20 minus">{{$expenses->sum('amount')}}</strong>
                </div>
            </div>
        </div>

        <div class=" text-muted m-3 p-3 bg-body rounded shadow-sm">
            <div class="ms-3 mb-0 small">
                <div class="">
                    <strong class="text-menu  name-cilent font-18">
                        Qarzdorlar
                    </strong><br>
                    <strong class="text-menu  font-20 minus">{{$transactions->sum('dept')}}</strong>
                </div>
            </div>
        </div>

        <div class=" text-muted m-3 p-3 bg-body rounded shadow-sm">
            <div class="ms-3 mb-0 small">
                <div class="">
                    <strong class="text-menu  name-cilent font-18">
                        Haqdorlar
                    </strong><br>
                    <strong class="text-menu  font-20 minus">{{$depts->sum('balance')}}</strong>
                </div>
            </div>
        </div>


    </main>
</div>
