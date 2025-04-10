<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
</head>

<body style="background: #efefef; padding: 50px 5px;">
    <table
        style="font-family:Google Sans,Roboto,Arial,Open Sans,Helvetica,sans-serif;font-size:14px;color:#555;width: 100%; max-width:800px; background: #fff; margin: auto; border-radius: 10px">
        <tr>
            <td colspan="2" style="text-align: center; padding: 20px 0px; font-size: 16px; font-weight: bold;">
                Nova senha para acesso restrito do site {{ config('app.name') }}
            </td>
        </tr>

        <tr>
            <td style="width: 100%; padding: 20px 30px; font-size: 14px">
                <strong>Senha</strong>: {{ $senha }}
            </td>
        </tr>

    </table>
</body>

</html>

