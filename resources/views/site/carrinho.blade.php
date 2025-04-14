@extends('site.layouts.base')

@section('title', 'Produtos - ' . config('app.name'))

@section('conteudo')

    <section class="preHeader flex">
        <div class="main flex_c t-center middle">
            <h1 class="main-t fontRaleway bold whiteFont center uppercase t-center center">MEU PEDIDO</h1>
        </div>
    </section>

    <main class="container">
        <div class="main">
            <div class="flex_c">
                <div class="cart_container">
                    <div class="carrinho-container">
                        @for ($s = 0; $s < 3; $s++)
                            <div class="item">
                                <div class="item-info">
                                    <img src="{{ Vite::asset('resources/assets/site/img/ricosol.png') }}" alt="Produto 1">
                                    <div class="item-text">
                                        <h3>Protetor Solar Facial BB Cream Antiacne FPS 30</h3>
                                        <p>R$ 5,30</p>
                                    </div>
                                </div>
                                <div class="quantidade">
                                    <button>-</button>
                                    <span>1</span>
                                    <button>+</button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M7 21C6.45 21 5.97933 20.8043 5.588 20.413C5.19667 20.0217 5.00067 19.5507 5 19V6H4V4H9V3H15V4H20V6H19V19C19 19.55 18.8043 20.021 18.413 20.413C18.0217 20.805 17.5507 21.0007 17 21H7ZM17 6H7V19H17V6ZM9 17H11V8H9V17ZM13 17H15V8H13V17Z"
                                            fill="#696867" />
                                    </svg>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="rightsection flex_c">
                <div class="inputs_right">
                    <form id="form_contact" class="flex_c middle rep_form" action="{{ route('contato.enviar') }}" ajax-form>
                        <input type="text" name="nome" class="input e_input" placeholder="Nome:" required>
                        <input type="email" name="email" class="input e_input" placeholder="E-mail:" required>
                        <input type="tel" name="telefone" id="telefone" class="input e_input" placeholder="Telefone:"
                            maxlength="15">
                        <input type="text" name="cidade" class="input e_input" placeholder="Cidade:" required>

                        <button type="submit" class="submit-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2.94 6.91198C2.65235 7.09176 2.41515 7.34175 2.25071 7.63844C2.08627 7.93513 2 8.26876 2 8.60798V16.5C2 17.0304 2.21071 17.5391 2.58579 17.9142C2.96086 18.2893 3.46957 18.5 4 18.5H16C16.5304 18.5 17.0391 18.2893 17.4142 17.9142C17.7893 17.5391 18 17.0304 18 16.5V8.60798C18 8.26876 17.9137 7.93513 17.7493 7.63844C17.5848 7.34175 17.3476 7.09176 17.06 6.91198L11.06 3.16198C10.7421 2.96331 10.3748 2.85797 10 2.85797C9.62516 2.85797 9.25786 2.96331 8.94 3.16198L2.94 6.91198ZM5.555 9.33498C5.44574 9.26209 5.32319 9.21144 5.19436 9.18592C5.06553 9.1604 4.93293 9.1605 4.80413 9.18622C4.67534 9.21194 4.55287 9.26278 4.44372 9.33583C4.33457 9.40888 4.24088 9.50272 4.168 9.61198C4.09512 9.72124 4.04447 9.84378 4.01894 9.97262C3.99342 10.1014 3.99352 10.234 4.01924 10.3628C4.07119 10.623 4.22434 10.8518 4.445 10.999L9.445 14.332C9.60933 14.4416 9.80245 14.5001 10 14.5001C10.1975 14.5001 10.3907 14.4416 10.555 14.332L15.555 10.999C15.7757 10.8518 15.9288 10.623 15.9808 10.3628C16.0327 10.1027 15.9792 9.83264 15.832 9.61198C15.6848 9.39132 15.456 9.23817 15.1959 9.18622C14.9358 9.13427 14.6657 9.18778 14.445 9.33498L10 12.298L5.555 9.33498Z"
                                    fill="white" />
                            </svg>
                            ENVIAR PEDIDO
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection


@section('pageScripts')
    <script></script>

@endsection
