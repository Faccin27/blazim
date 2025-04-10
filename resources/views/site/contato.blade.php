@extends('site.layouts.base')

@section('title', 'Contato - ' . config('app.name'))

@section('conteudo')
<main class="mainContato">
    <section class="faixaContato">
        <div class="main middle">
            <h1 class="center t-center main-t bold whiteFont">Entre em Contato</h1>
        </div>
    </section>

    <section class="contato container">
        <div class="main flex_r">

            <div class="formulario flex">
                <form id="form_contact" class="flex_r flex_w" action="{{ route('contato.enviar') }}" ajax-form>
                    <input type="text" name="nome" class="input e_input" placeholder="Nome Completo:" required>
                    <input type="email" name="email" class="input e_input" placeholder="E-mail:" required>
                    <input type="tel" name="telefone" id="telefone" class="input e_input" placeholder="Telefone:"
                        maxlength="15">
                    <input type="text" name="whatsapp" id="telefone" class="input e_input" placeholder="WhatsApp:"
                        required>
                    <input type="text" name="cidade" id="cidade" class="input e_input" placeholder="Cidade:"
                        required>
                    <select id="estado" name="estado" class="input e_input" required>
                        <option value="">Estado:</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                    <div class="input-group fullW">
                        <input type="text" name="text" class="input" required>
                        <label class="label">Seu Nome</label>
                    </div>
                    <textarea name="mensagem" class="input msg" placeholder="Mensagem:" required></textarea>

                    @include('site.includes.privacyTerms')

                    <button type="submit" class="button rounded right">ENVIAR MENSAGEM</button>

                </form>
            </div>

            <div class="map e_input flex">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28393.249023127337!2d-51.51504227304624!3d-27.182829318941117!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e3e5525055b095%3A0x86670b5ffbdb1e3f!2sLovatel%20Ag%C3%AAncia%20Digital!5e0!3m2!1spt-BR!2sbr!4v1732048146138!5m2!1spt-BR!2sbr" width="100%" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <section class="sectionMissao container margin50">
        <div class="main flex">
            <div class="gridValores grid3">
                <div class="grid">
                    <div class="missao flex_c">
                        <h4 class="sub-t goldFont margin30 boldFont">Missão</h4>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis animi eligendi sed exercitationem quibusdam delectus!
                        </p>
                    </div>
                    <div class="visao flex_c">
                        <h4 class="sub-t goldFont boldFont">Visão</h4>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis animi eligendi sed exercitationem quibusdam delectus!
                        </p>
                    </div>
                </div>

                <div class="valores01 flex_c">
                    <h4 class="sub-t goldFont boldFont margin30">Valores</h4>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis animi eligendi sed exercitationem quibusdam delectus!
                    </p>
                </div>

                <div class="valores02 flex_c">
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis animi eligendi sed exercitationem quibusdam delectus!
                    </p>
                </div>

            </div>
        </div>
    </section>
</main>

@endsection

@section('pageScripts')
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script>
        $('#telefone').mask('(00) 00000-0000');
    </script>
@endsection
