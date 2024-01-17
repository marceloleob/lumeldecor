
{{-- TOPO --}}
<div class="top-header middle-header dark_skin">
    <div class="container">
        <div class="nav_block">
            <a class="navbar-brand" href="{!! route('home') !!}">
                <img class="logo_light" src="{{ Vite::asset('resources/assets/images/logo_light.png') }}" alt="{!! Config::get('app.name') !!}" />
                <img class="logo_dark" src="{{ Vite::asset('resources/assets/images/logo_dark.png') }}" alt="{!! Config::get('app.name') !!}" />
            </a>
            <div class="contact_phone order-md-last">
                <a href="https://wa.me/553195140615" target="_blank" sdata-toggle="tooltip" sdata-placement="top" sdata-original-title="Nosso WhatsApp"><i class="fa-brands fa-whatsapp"></i> <span>31 99514-0615</span></a>
            </div>
            <div class="product_search_form">
                <div class="input-group">
                    <input type="text" id="input-search" name="search" value="" class="form-control" placeholder="Procure pelo nome do produto.." />
                    <button id="btn-search" class="search_btn"><i class="linearicons-magnifier"></i></button>
                </div>
                <input type="hidden" id="url" name="url" value="{!! route('home') !!}" />
            </div>
        </div>
    </div>
</div>
{{-- TOPO FIM --}}
