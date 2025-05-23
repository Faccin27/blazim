@extends('site.layouts.base')

@section('title', 'Contato - ' . config('app.name'))

@section('conteudo')
    <section class="preHeader flex">
        <div class="main flex_c t-center middle">
            <h1 class="main-t fontRaleway bold whiteFont center uppercase t-center center">MEU PEDIDO</h1>
        </div>
    </section>

    <div class="iframe-wrapper">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1528333.9598714001!2d-51.54449701282871!3d-27.152313765079683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e3e5525055b095%3A0x86670b5ffbdb1e3f!2sLovatel%20Digital%20Agency!5e0!3m2!1sen!2sbr!4v1744634243294!5m2!1sen!2sbr"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <main class="container main">
        <div class="main flex_c">
            <div class="leftsection_c">
                <h1>Informações e Contato</h1>
                <p>Rua Senador Euzébio, 251, Centro <br>
                    Herval D´Oeste / SC CEP: 89610-000</p>
                <p>blazim@blazim.com.br</p>
                <div class="comercial_btn">
                    <button type="submit" class="comercial_button zoom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23"
                            fill="none">
                            <path
                                d="M0.504415 22.5L1.99161 17.0352C1.01167 15.3553 0.49682 13.4448 0.500015 11.5C0.500015 5.4247 5.42471 0.5 11.5 0.5C17.5753 0.5 22.5 5.4247 22.5 11.5C22.5 17.5753 17.5753 22.5 11.5 22.5C9.55606 22.5031 7.64633 21.9887 5.96701 21.0095L0.504415 22.5ZM7.53011 6.3388C7.38806 6.34762 7.24925 6.38503 7.12201 6.4488C7.00268 6.51637 6.89376 6.60084 6.79861 6.6996C6.66661 6.8239 6.59181 6.9317 6.51151 7.0362C6.10496 7.56529 5.88628 8.21476 5.89001 8.88199C5.89221 9.42099 6.03301 9.94569 6.25301 10.4363C6.70291 11.4285 7.44321 12.479 8.42111 13.4525C8.65651 13.6868 8.88641 13.9222 9.13391 14.1411C10.3476 15.2097 11.794 15.9803 13.3579 16.3917L13.9838 16.4874C14.1873 16.4984 14.3908 16.483 14.5954 16.4731C14.9158 16.4566 15.2286 16.3698 15.5117 16.219C15.6558 16.1448 15.7963 16.064 15.933 15.977C15.933 15.977 15.9803 15.9462 16.0705 15.878C16.219 15.768 16.3103 15.6899 16.4335 15.5612C16.5248 15.4666 16.604 15.3555 16.6645 15.229C16.7503 15.0497 16.8361 14.7076 16.8713 14.4227C16.8977 14.2049 16.89 14.0861 16.8867 14.0124C16.8823 13.8947 16.7844 13.7726 16.6777 13.7209L16.0375 13.4338C16.0375 13.4338 15.0805 13.0169 14.4964 12.7507C14.4348 12.7238 14.3688 12.7086 14.3017 12.7056C14.2264 12.6979 14.1504 12.7063 14.0787 12.7304C14.007 12.7545 13.9412 12.7937 13.8859 12.8453V12.8431C13.8804 12.8431 13.8067 12.9058 13.0114 13.8694C12.9658 13.9307 12.9029 13.9771 12.8308 14.0026C12.7587 14.028 12.6807 14.0314 12.6066 14.0124C12.5349 13.9932 12.4647 13.969 12.3965 13.9398C12.2601 13.8826 12.2128 13.8606 12.1193 13.8199L12.1138 13.8177C11.4845 13.5429 10.9019 13.1718 10.3868 12.7177C10.2482 12.5967 10.1195 12.4647 9.98751 12.3371C9.55474 11.9227 9.1776 11.4538 8.86551 10.9423L8.80061 10.8378C8.75399 10.7676 8.7163 10.6918 8.68841 10.6123C8.64661 10.4506 8.75551 10.3208 8.75551 10.3208C8.75551 10.3208 9.02281 10.0282 9.14711 9.86979C9.25061 9.73815 9.34717 9.6012 9.43641 9.45949C9.56621 9.25049 9.60691 9.03599 9.53871 8.86989C9.23071 8.1175 8.91171 7.3684 8.58391 6.6248C8.51901 6.4774 8.32651 6.3718 8.15161 6.3509C8.09221 6.3443 8.03281 6.3377 7.97341 6.3333C7.82569 6.32596 7.67766 6.32743 7.53011 6.3377V6.3388Z"
                                fill="white" />
                        </svg>
                        Comercial
                    </button>
                </div>
                <div class="comercial_btn">
                    <button type="submit" class="trabalhe_button zoom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M14 6V4H10V6H14ZM4 9V18C4 18.55 4.45 19 5 19H19C19.55 19 20 18.55 20 18V9C20 8.45 19.55 8 19 8H5C4.45 8 4 8.45 4 9ZM20 6C21.11 6 22 6.89 22 8V19C22 20.11 21.11 21 20 21H4C2.89 21 2 20.11 2 19L2.01 8C2.01 6.89 2.89 6 4 6H8V4C8 2.89 8.89 2 10 2H14C15.11 2 16 2.89 16 4V6H20Z"
                                fill="white" />
                        </svg>
                        Trabalhe Conosco
                    </button>

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
                    <textarea name="mensagem" class="input msg margin20" placeholder="Mensagem:" required></textarea>

                    <button type="submit" class="submit-btn zoom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23"
                            fill="none">
                            <path
                                d="M0.504415 22.5L1.99161 17.0352C1.01167 15.3553 0.49682 13.4448 0.500015 11.5C0.500015 5.4247 5.42471 0.5 11.5 0.5C17.5753 0.5 22.5 5.4247 22.5 11.5C22.5 17.5753 17.5753 22.5 11.5 22.5C9.55606 22.5031 7.64633 21.9887 5.96701 21.0095L0.504415 22.5ZM7.53011 6.3388C7.38806 6.34762 7.24925 6.38503 7.12201 6.4488C7.00268 6.51637 6.89376 6.60084 6.79861 6.6996C6.66661 6.8239 6.59181 6.9317 6.51151 7.0362C6.10496 7.56529 5.88628 8.21476 5.89001 8.88199C5.89221 9.42099 6.03301 9.94569 6.25301 10.4363C6.70291 11.4285 7.44321 12.479 8.42111 13.4525C8.65651 13.6868 8.88641 13.9222 9.13391 14.1411C10.3476 15.2097 11.794 15.9803 13.3579 16.3917L13.9838 16.4874C14.1873 16.4984 14.3908 16.483 14.5954 16.4731C14.9158 16.4566 15.2286 16.3698 15.5117 16.219C15.6558 16.1448 15.7963 16.064 15.933 15.977C15.933 15.977 15.9803 15.9462 16.0705 15.878C16.219 15.768 16.3103 15.6899 16.4335 15.5612C16.5248 15.4666 16.604 15.3555 16.6645 15.229C16.7503 15.0497 16.8361 14.7076 16.8713 14.4227C16.8977 14.2049 16.89 14.0861 16.8867 14.0124C16.8823 13.8947 16.7844 13.7726 16.6777 13.7209L16.0375 13.4338C16.0375 13.4338 15.0805 13.0169 14.4964 12.7507C14.4348 12.7238 14.3688 12.7086 14.3017 12.7056C14.2264 12.6979 14.1504 12.7063 14.0787 12.7304C14.007 12.7545 13.9412 12.7937 13.8859 12.8453V12.8431C13.8804 12.8431 13.8067 12.9058 13.0114 13.8694C12.9658 13.9307 12.9029 13.9771 12.8308 14.0026C12.7587 14.028 12.6807 14.0314 12.6066 14.0124C12.5349 13.9932 12.4647 13.969 12.3965 13.9398C12.2601 13.8826 12.2128 13.8606 12.1193 13.8199L12.1138 13.8177C11.4845 13.5429 10.9019 13.1718 10.3868 12.7177C10.2482 12.5967 10.1195 12.4647 9.98751 12.3371C9.55474 11.9227 9.1776 11.4538 8.86551 10.9423L8.80061 10.8378C8.75399 10.7676 8.7163 10.6918 8.68841 10.6123C8.64661 10.4506 8.75551 10.3208 8.75551 10.3208C8.75551 10.3208 9.02281 10.0282 9.14711 9.86979C9.25061 9.73815 9.34717 9.6012 9.43641 9.45949C9.56621 9.25049 9.60691 9.03599 9.53871 8.86989C9.23071 8.1175 8.91171 7.3684 8.58391 6.6248C8.51901 6.4774 8.32651 6.3718 8.15161 6.3509C8.09221 6.3443 8.03281 6.3377 7.97341 6.3333C7.82569 6.32596 7.67766 6.32743 7.53011 6.3377V6.3388Z"
                                fill="white" />
                        </svg>
                        Enviar mensagem
                    </button>
                </form>
            </div>
        </div>

    </main>


@endsection

@section('pageScripts')
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script>
        $('#telefone').mask('(00) 00000-0000');
    </script>
@endsection
