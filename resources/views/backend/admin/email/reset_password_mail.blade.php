<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <table>
        <tr>
            <td>Hi!</td>
        </tr>
        <tr>
            <td>This email sent from SMS System, to reset your account password.</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td> <b>Click on this link to reset your account password: </b></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td> <a class="btn btn-success" href="{{route('admin.account.recover',$auth)}}">{{route('admin.account.recover',$auth)}}</a></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Thanks & Regards,</td>
        </tr>
        <tr>
            <td>School Management System Team</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><b>This is an automatically generated e-mail. Please do not reply to this e-mail address.</b></td>
        </tr>
        <tr>
            <td>Thank you for your co-operation.</td>
        </tr>
    </table>
</body>
</html>