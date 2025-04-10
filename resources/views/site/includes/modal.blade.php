@if ($popup->ativo)
    <div id="mainpop" class="modal_wrap">
        <div class="modal_box">
            <div class="modal_data">
                <a href="{{ $popup->link }}" target="_blank">
                    <img src="{{ $popup->foto }}" alt="{{ $popup->titulo }}" title="{{ $popup->titulo }}" />
                </a>
            </div>
            <button class="modal_close"></button>
        </div>
    </div>
@endif
