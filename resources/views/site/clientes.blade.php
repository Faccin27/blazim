@extends('site.layouts.base')

@section('title', 'Clientes - ' . config('app.name'))
@section('pageLinks')
    <!--  Leaf map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
        integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
        crossorigin=""></script>
@endsection
@section('conteudo')

    <main class="mainClientes">
        <section class="container">
            <div class="main flex_c">
                <h2 class="main-t bold t-center center blackFont margin20">
                    Nossos Clientes
                </h2>
                <div class="center flex margin50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="130" height="10" viewBox="0 0 130 10" fill="none">
                        <rect x="50.5" y="0.5" width="29" height="9" rx="4.5" fill="#C4161C" stroke="#C4161C"/>
                        <line y1="4.5" x2="130" y2="4.5" stroke="#C4161C"/>
                    </svg>
                </div>
                <div class="grid4">
                    @for ($s = 0; $s < 10; $s++)
                    <a href="javascript:;" class="itemClientes">
                        <img src="https://dummyimage.com/420x420/" alt="Nome Clientes">
                    </a>
                    @endfor
                </div>
            </div>
        </section>

        <section class="sectionMapa">
            <div id="map"></div>

            <div class="blocoRep flex_c">
                <div class="select flex_r flex_w margin50">
                    <select id="regioes" name="id_regioes">
                        <option value="">Estado:</option>
                        <option value="1"> Santa Catarina</option>
                    </select>
                </div>
                <div class="listarRep flex_c">
                    <h4 class="med-t blackFont lightFont bold margin20">ESPECIALISTAS</h4>
                    <div id="representantes" class="boxRep flex_c">
                        @for ($b = 0; $b < 6; $b++)
                            <div class="itemRep flex_c margin30">
                                <h6 class="med-t boldFont margin10">Rio Grande do Sul</h6>
                                <p>RIO GRANDE DO SUL<br>
                                    J.O MORAES & CIA<br>
                                    (54) 3383 1617 I 99981 7297<br>
                                    joaotriton@gmail.com<br>
                                    Rua Padre Réus, 393, Espumoso – RS<br>
                                    99400-000</p>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
@section('pageScripts')
    <script type="module">
        const mapa = new Mapa(-15.374795030900813, -25.88091911577745, 4);
        mapa.InserirMarcador(-27.98615916, -52.25835800, '<p>Joaçaba</p>',
                "{{ Vite::asset('resources/assets/site/img/pinMap.svg') }}");
    </script>
@endsection
