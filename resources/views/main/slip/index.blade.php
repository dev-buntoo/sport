<!DOCTYPE html>
<html>

<head>
    <title>Order Canceled exCoins.me</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        ul li{
            list-style: none;
            display:inline-block;
        }
        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
            .main-text{
                font-size: 10px !important;
            }
            .logo{
                height: 50px !important;
                width: 50px !important;
            }
            .table{
                width: 100% !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>

<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
   <div id="content">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:800px;">
                    <tr>
                        <td align="center" valign="top" style="font-size:0; padding: 35px;background-image: url({{ asset('slip') }}/templete.jpg);background-position: center;background-size: cover;background-repeat: no-repeat;height: 272px; " >
                            <div style="display:inline-block; min-width:100px; vertical-align:top; width:100%;">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" >
                                    <tr>
                                        <td align="center" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 20px;  line-height: 8px;" class="mobile-center">
                                            <h1 style="font-size: 18px;  margin: 0; color: #ffffff;" class="main-text">Parramatta District Rugby League Referees Association Inc</h1>
                                            <img src="{{asset('slip')}}/logo.png" style="width: 100px; height: 100px; float: left;padding-top: 30px;" class="logo">
                                            <span style=" float: right;padding-top: 40px;color: #fff; font-size: 16px !important;">ABN: 22 759 274 835</span>
                                        </td>

                                    </tr>

                                </table>
                            </div>
                            <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">

                            </div>

                        </td>

                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:800px;">
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="50%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                    <h1 style="margin-top: -101px;margin-bottom: 10px;">{{ $payslip->member->fname.' '.$payslip->member->lname }}</h1>
                                                    <span style="display: block;">{{ $payslip->member->address }}</span>
                                                    <span style="display: block;">Phone: {{ $payslip->member->phone_1}}</span>
                                                </td>
                                                <td width="50%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                    <h1 style="margin-top: -140px;margin-bottom: 10px;">PAY SLIP</h1>
                                                    <span style="display: block;">Date : {{ date('d/m/Y',strtotime($payslip->created_at))}}</span>
                                                    <span style="display: block;">Member # : {{ $payslip->member->member_number }}</span>
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="70%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 10px;color:#fff;background:#002060">ITEM DESCRIPTION </td>
                                                <td width="15%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 10px;color:#fff;background:#002060">PRICE </td>
                                                <td width="15%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 10px;color:#fff;background:#002060"> TOTAL</td>
                                            </tr>
                                            @foreach($slip as $slp)
                                            <tr>
                                                <td width="70%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 5px;color:black;background:#dcddde">{{ $slp->name }} </td>
                                                <td width="15%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 5px;color:black;background:#dcddde">{{ $slp->debit.' '.$slp->credit }} </td>
                                                <td width="15%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 5px;color:black;background:#dcddde"> ${{ $slp->debit.' '.$slp->credit }}</td>
                                            </tr>
                                            @endforeach


                                            <tr>
                                                <td width="50%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 5px;color:#000000;"> </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 5px;color:#000000;">Total Income </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 5px;color:#000000;"> ${{ $slip->sum('credit') }}</td>
                                            </tr>
                                            <tr>
                                                <td width="50%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 5px;color:#000000;"> </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 5px;color:#000000;">Total Deductions </td>
                                                <td width="55%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 5px;color:#000000;"> ${{ $slip->sum('debit') }}</td>
                                            </tr>
                                            <tr>
                                                <td width="50%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 10px;color:#fff;"> </td>
                                                <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 10px;color:#fff;background:#002060">Payment Total </td>
                                                <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 10px;color:#fff;background:#002060">  ${{ $slip->sum('debit')+ $slip->sum('credit') }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 166px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="40%" class="table">
                                            <tr>
                                                <td width="50%" align="left"  style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px;">PAYMENT DETAILS </td><br>
                                            </tr>
                                            <tr>
                                                <td width="25%" align="left"  style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px;  line-height: 20px;"><p>Payment Date: {{ $payslip->payment_date }} <br> Payment Type: {{ $payslip->bank_pay }} <br> Bank Reference:  {{ $payslip->bank_ref }}</p></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="padding-top: 30px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="40%" class="table">
                                            <tr>
                                                <td width="50%" align="left"  style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px;"> Ethan Murray</td><br>
                                            </tr>
                                            <tr>
                                                <td width="25%" align="left"  style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px;  line-height: 0px;"><p>Director Of Finance & Sponsorship </p></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="left" style="padding-top: 60px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <img src="{{asset('slip')}}/partners.jpg" alt="partner" style="width: 100%;" />
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
   </div>
   <div id="editor"></div>
   {{--  <button id="cmd">generate PDF</button>  --}}

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script>
      var doc = new jsPDF();
var specialElementHandlers = {
   '#editor': function (element, renderer) {
       return true;
   }
};

$('#cmd').click(function () {
   doc.fromHTML($('#content').html(), 15, 15, {
       'width': 170,
           'elementHandlers': specialElementHandlers
   });
   doc.save('sample-file.pdf');
});

  </script>
</body>

</html>
