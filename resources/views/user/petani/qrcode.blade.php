<!DOCTYPE html>
<html>
    <body>
    <center><h1>{{$qrcode}}</h1>
    <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->errorCorrection('H')->size(400)->generate($qrcode)) }}" />
    </center>
    </body>
</html>