<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- {{dd($data)}} --}}
    <table align="center" bgcolor="#dcf0f8" border="0" cellpadding="0" cellspacing="0"
        style="margin:0;padding:0;background-color:#f2f2f2;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px"
        width="100%">
        <tbody>
            <tr>
                <td align="center"
                    style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"
                    valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" style="margin-top:15px" width="600">
                        <tbody>
                            <tr>
                                <td align="center" id="m_-231563949932531468headerImage" valign="bottom">
                                    <table cellpadding="0" cellspacing="0"
                                        style="border-bottom:3px solid #00b7f1;padding-bottom:10px;background-color:#fff"
                                        width="100%">
                                        <tbody>
                                            <tr>
                                                <td bgcolor="#FFFFFF" style="padding:0" valign="top" width="100%">


                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr style="background:#fff">
                                <td align="left" height="auto" style="padding:15px" width="600">
                                    <table>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <h1
                                                        style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">
                                                        Đăng ký tư vấn</h1>



                                                    <h3
                                                        style="font-size:13px;font-weight:bold;color:#02acea;text-transform:uppercase;margin:20px 0 0 0;border-bottom:1px solid #ddd">
                                                        @php
                                                            echo $data['type'] == 2 ? 'Đăng kí xem hàng tại nhà' : 'Khảo sát tư vấn lắp đặt tại nhà';
                                                        @endphp
                                                        <span
                                                            style="font-size:12px;color:#777;text-transform:none;font-weight:normal">({{ date("Y-m-d h:i:s")}})</span>
                                                    </h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th align="left"
                                                                    style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold"
                                                                    width="50%">Thông tin đăng ký tư vấn</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                                <td style="padding:3px 9px 9px 9px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"
                                                                    valign="top"><span
                                                                        style="text-transform:capitalize">Số điện thoại
                                                                        : {{$data['phone']}}</span>
                                                                    <br>

                                                                    <span>Sản phẩm : {{$product_name}}</span>
                                                                    <br>Thời gian tư vấn : {{$data['time']}}

                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>


                                            <tr>

                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

        </tbody>
    </table>
</body>

</html>