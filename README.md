# 🚚 Blazim Distribuidora

Landing page institucional desenvolvida para a **Blazim Distribuidora**, com layout moderno e responsivo. O projeto foi construído com **Laravel**, visando organização, segurança e facilidade de gerenciamento de conteúdo com **CKEditor**.

🔗 **Site em produção**: [https://blazim.com.br/](https://blazim.com.br/)
💼 **Desenvolvido por**: Lovatel

## 📸 Screenshots

| Home                                    | Destaques                                    | Sobre                                    |
| --------------------------------------- | -------------------------------------------- | ---------------------------------------- |
| ![Home](/public/images/screenshot1.png) | ![Destaques](/public/images/screenshot2.png) | ![Sobre](/public/images/screenshot3.png) |

| Produtos                                    | Login                                    | Painel Admin                             |
| ------------------------------------------- | ---------------------------------------- | ---------------------------------------- |
| ![Produtos](/public/images/screenshot4.png) | ![Login](/public/images/screenshot5.png) | ![Admin](/public/images/screenshot6.png) |

## 🚀 Tecnologias Utilizadas

* **[PHP](https://www.php.net/)** – Linguagem de programação backend.
* **[Laravel](https://laravel.com/)** – Framework PHP moderno e robusto.
* **[MariaDB](https://mariadb.org/)** – Banco de dados relacional.
* **[Swiper.js](https://swiperjs.com/)** – Biblioteca de sliders responsivos.
* **[CKEditor](https://ckeditor.com/)** – Editor de conteúdo WYSIWYG para gerenciamento fácil.

## 📂 Estrutura do Projeto

```bash
.
├── app/                   # Lógica da aplicação (Controllers, Models)
├── public/                # Assets públicos e ponto de entrada
├── resources/
│   ├── views/             # Templates Blade
│   └── js/                # Scripts JS incluindo Swiper
├── routes/                # Definições de rotas
├── database/              # Migrations e seeders
└── README.md
```

## 🧪 Como Rodar o Projeto

```bash
# Clone o repositório
git clone https://github.com/Faccin27/blazim
cd blazim

# Instale as dependências do PHP via Composer
composer install

# Copie o arquivo de ambiente e configure
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate

# Configure seu banco de dados no arquivo .env e execute as migrations
php artisan migrate

# Instale as dependências do frontend (opcional)
npm install && npm run dev

# Inicie o servidor local
php artisan serve
```

## 📦 Build para Produção

Utilize um ambiente web como **Laravel Forge**, **Plesk**, **cPanel** ou **Docker**, configurando variáveis de ambiente e permissões corretamente.

## 📱 Responsividade

O site é 100% responsivo, com sliders otimizados e interface adaptável para dispositivos móveis e desktop.

## 💡 Diferenciais

* Painel administrativo completo que gerencia **100% do conteúdo do site**
* Edição dinâmica de **textos, links, imagens e SEO**
* Sistema de gerenciamento com **CKEditor**
* Slides interativos com **Swiper.js**
* Backend robusto com **Laravel**
* Código limpo e organizado

## 📬 Contato

Para sugestões ou uso como base para projetos:

**Email**: [gfaccin27@gmail.com](mailto:gfaccin27@gmail.com)
**LinkedIn**: [Guilherme Faccin](https://linkedin.com/in/guilherme-faccin)

## 🧾 Licença

Este projeto é de uso livre para fins educacionais e não comerciais.
