<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="toggleModal()">&times;</span>
        <h2>login para pedidos</h2>
        <form method="POST" action="javascript:;">
            @csrf
            <input type="text" name="login" placeholder="Login:" required>
            <input type="password" name="password" placeholder="Senha:" required>
            <button type="submit">ENTRAR</button>
        </form>
        <p class="no-login">
            Ainda não possui login?<br>
            <a href="#">Entre em contato</a>
        </p>
    </div>
</div>
