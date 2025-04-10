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
                Ocorreu um erro no site {{ config('app.name')}}
            </td>
        </tr>

        <!-- Linha -->
        <tr>
            <td style="width: 100%; padding: 0px 30px; font-size: 14px">
                <strong>Url</strong>:
            </td>
        </tr>

        <tr>
            <td style="width: 100%; padding: 5px 30px 0px 30px; font-size: 13px">
                {{ $erro['url'] }}
            </td>
        </tr>

        <tr>
            <td style="width: 100%; padding: 0px 30px;"><hr></td>
        </tr>

        <!-- Linha -->
        <tr>
            <td style="width: 100%; padding: 0px 30px; font-size: 14px">
                <strong>Mensagem</strong>:
            </td>
        </tr>

        <tr>
            <td style="width: 100%; padding: 5px 30px 0px 30px; font-size: 13px">
                {{ $erro['message'] }}
            </td>
        </tr>

        <tr>
            <td style="width: 100%; padding: 0px 30px;"><hr></td>
        </tr>

        <!-- Linha -->
        <tr>
            <td style="width: 100%; padding: 0px 30px; font-size: 14px">
                <strong>Linha</strong>:
            </td>
        </tr>

        <tr>
            <td style="width: 100%; padding: 5px 30px 0px 30px; font-size: 13px">
                {{ $erro['line'] }}
            </td>
        </tr>

        <tr>
            <td style="width: 100%; padding: 0px 30px;"><hr></td>
        </tr>

        <!-- Linha -->
        <tr>
            <td style="width: 100%; padding: 0px 30px; font-size: 14px">
                <strong>Arquivo</strong>:
            </td>
        </tr>

        <tr>
            <td style="width: 100%; padding: 5px 30px 0px 30px; font-size: 13px">
                {{ $erro['file'] }}
            </td>
        </tr>

        <tr>
            <td style="width: 100%; padding: 0px 30px;"><hr></td>
        </tr>

        <tr>
            <td style="width: 100%; padding: 20px 30px; font-size: 13px">
                Para mais informações acesse o log de erros.
            </td>
        </tr>
    </table>
</body>

</html>

