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
                {{ $assunto }}
            </td>
        </tr>

        @foreach ($formulario as $chave => $valor)
            @if (!empty($chave) && !empty($valor) && $chave != 'mensagem')
                <tr>
                    <td style="width: 100%; padding: 0px 30px; font-size: 14px">
                        <strong>{{ ucfirst($chave) }}</strong>:
                    </td>
                </tr>

                <tr>
                    <td style="width: 100%; padding: 5px 30px 0px 30px; font-size: 13px">
                        {{ $valor }}
                    </td>
                </tr>

                <tr>
                    <td style="width: 100%; padding: 0px 30px;"><hr></td>
                </tr>
            @endif
        @endforeach

        @if (isset($formulario['mensagem']) && !empty($formulario['mensagem']))
            <tr>
                <td colspan="2" style="text-align: center; padding: 30px 0px 10px 0; font-size: 14px">
                    <strong>Mensagem</strong>:
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding: 5px 30px 20px 30px; font-size: 13px">{{ $formulario['mensagem'] }}</td>
            </tr>
        @endif

    </table>
</body>

</html>
