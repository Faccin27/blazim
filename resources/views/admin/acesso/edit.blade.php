@extends('admin.layout.base')

@section('titulo', 'Acesso')

@section('caminho')

    <li class="breadcrumb-item"><a href="{{ route('admin.inicio') }}"><i class="fa fa-home fa-lg"></i>Início</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Acesso</a></li>
    <li class="breadcrumb-item active">Editar</li>

@endsection

@section('conteudo')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Editar</h4>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="javascript:;">Dados</a>
                </li>
            </ul>

            <form class="row g-3" action="{{ route('admin.acesso.update', ['acesso' => $acesso->id]) }}" onsubmit="crudHelper.Alterar(event, this)">

                <div class="form-group col-md-6">
                    <label for="login" class="form-label">Login</label>
                    <input id="login" class="form-control" type="text" name="login" value="{{ $acesso->login }}" maxlength="255">
                </div>

                <div class="form-group col-md-6" style="position: relative;">
                    <label for="password" class="form-label">Senha</label>
                    <input id="password" class="form-control" type="password" name="password" maxlength="255">

                    <!-- Ícone olho aberto (mostrar) -->
                    <span id="togglePassword" style="position: absolute; top: 38px; right: 15px; cursor: pointer;">
                      <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 15 11" fill="none">
                        <path d="M7.5 3.625C7.00272 3.625 6.52581 3.82254 6.17417 4.17417C5.82254 4.52581 5.625 5.00272 5.625 5.5C5.625 5.99728 5.82254 6.47419 6.17417 6.82583C6.52581 7.17746 7.00272 7.375 7.5 7.375C7.99728 7.375 8.47419 7.17746 8.82583 6.82583C9.17746 6.47419 9.375 5.99728 9.375 5.5C9.375 5.00272 9.17746 4.52581 8.82583 4.17417C8.47419 3.82254 7.99728 3.625 7.5 3.625ZM7.5 8.625C6.6712 8.625 5.87634 8.29576 5.29029 7.70971C4.70424 7.12366 4.375 6.3288 4.375 5.5C4.375 4.6712 4.70424 3.87634 5.29029 3.29029C5.87634 2.70424 6.6712 2.375 7.5 2.375C8.3288 2.375 9.12366 2.70424 9.70971 3.29029C10.2958 3.87634 10.625 4.6712 10.625 5.5C10.625 6.3288 10.2958 7.12366 9.70971 7.70971C9.12366 8.29576 8.3288 8.625 7.5 8.625ZM7.5 0.8125C4.375 0.8125 1.70625 2.75625 0.625 5.5C1.70625 8.24375 4.375 10.1875 7.5 10.1875C10.625 10.1875 13.2937 8.24375 14.375 5.5C13.2937 2.75625 10.625 0.8125 7.5 0.8125Z" fill="black"></path>
                      </svg>

                      <!-- Ícone olho riscado (esconder) -->
                      <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 15 15" fill="none" style="display: none;">
                        <g clip-path="url(#clip0_524_712)">
                          <path d="M8.37159 3.4192C8.08545 3.38825 7.79471 3.37051 7.5 3.3661C6.21219 3.37181 4.87721 3.68506 3.61359 4.2853C2.67536 4.74932 1.76143 5.40441 0.967713 6.21247C0.5779 6.62497 0.0803875 7.22225 0 7.8595C0.0095 8.41153 0.601913 9.09288 0.967713 9.50655C1.712 10.2829 2.60214 10.9192 3.61359 11.4337C3.64797 11.4504 3.68245 11.4669 3.71704 11.4832L2.77864 13.1219L4.0537 13.8755L10.9464 1.8751L9.71908 1.125L8.37159 3.4192ZM11.282 4.23769L10.3454 5.8609C10.7763 6.42067 11.0321 7.11098 11.0321 7.8595C11.0321 9.72521 9.45058 11.2378 7.49908 11.2378C7.41471 11.2378 7.33295 11.2287 7.25005 11.2232L6.63024 12.2962C6.91609 12.3268 7.20511 12.3491 7.49999 12.3529C8.78903 12.3471 10.1233 12.0303 11.3855 11.4337C12.3237 10.9697 13.2386 10.3146 14.0323 9.50655C14.4221 9.09406 14.9196 8.49678 15 7.8595C14.9905 7.30749 14.3981 6.62614 14.0323 6.21246C13.288 5.43614 12.3969 4.7998 11.3855 4.28527C11.3514 4.26872 11.3164 4.25384 11.282 4.23769ZM7.49909 4.48122C7.58466 4.48122 7.66956 4.48465 7.7536 4.49037L7.02759 5.74739C6.00866 5.95396 5.24414 6.82089 5.24414 7.8586C5.24414 8.11928 5.29215 8.36884 5.38055 8.60016C5.38065 8.60043 5.38045 8.60083 5.38055 8.60109L4.6527 9.86176C4.22081 9.30148 3.96605 8.6089 3.96605 7.85949C3.96606 5.9938 5.5476 4.48121 7.49909 4.48122ZM9.6112 7.13166L7.97516 9.96614C8.98861 9.75568 9.74763 8.8927 9.74763 7.8586C9.74763 7.60268 9.69655 7.35936 9.6112 7.13166Z" fill="black"></path>
                        </g>
                        <defs>
                          <clipPath id="clip0_524_712">
                            <rect width="15" height="15" fill="white"></rect>
                          </clipPath>
                        </defs>
                      </svg>
                    </span>
                  </div>

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <button id="botao-enviando" class="btn btn-primary" type="button" disabled="" style="display:none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Enviando...
                    </button>
                    <button id="botao-alterar" type="submit" class="btn btn-primary btn-lg mx-1">Alterar</button>
                    <button type="button" class="btn btn-secondary btn-lg mx-1"
                        onclick="javascript:history.back()">Voltar</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('pageScripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
      const passwordInput = document.getElementById("password");
      const toggle = document.getElementById("togglePassword");
      const eyeOpen = document.getElementById("eyeOpen");
      const eyeClosed = document.getElementById("eyeClosed");

      toggle.addEventListener("click", function () {
        const isPassword = passwordInput.type === "password";
        passwordInput.type = isPassword ? "text" : "password";

        eyeOpen.style.display = isPassword ? "none" : "inline";
        eyeClosed.style.display = isPassword ? "inline" : "none";
      });
    });
  </script>
@endsection
