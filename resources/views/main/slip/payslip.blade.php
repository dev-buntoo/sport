<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Pay Slip Email Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <style type="text/css" media="screen">
        .table-content tr.table > th{
            border-bottom: 7px solid #f1efef;
        }
        .table-content tr.table2 > th:nth-child(2){
            padding: 30px 0;
        }
        .table-content tr.table2 > th:nth-child(3){
            padding: 30px 0;
        }
        .table-content tr.table5 > th:nth-child(2){
            padding-top: 10px;
        }
        .table-content tr.table5 > th:nth-child(3){
            padding-top: 10px;
        }
        @media only screen and (max-width: 480px){
            body{
                padding: 0 15px !important;
            }
            #templateColumns{
                width:100% !important;
            }

            .templateColumnContainer{
                display:block !important;
                width:100% !important;
            }
            .rightColumnContent{
                width: 100% !important;
                float: none !important;
            }
            .rightColumnContent.head{
                text-align: center !important;
            }
    </style>
</head>
<body>
<div id="templateColumns" style="padding: 30px; max-width: 800px; width: 100%; margin: 0 auto; border-right: 1px solid #f5f5f5;">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" id="templateColumns" style="margin: 0 auto; max-width: 800px;">
        <tr>
            <td align="center" valign="top" width="240" class="templateColumnContainer">
                <table border="0" cellpadding="10" cellspacing="0" width="100%">
                    <tr>
                        <td align="center" class="leftColumnContent">
                            <img src="https://admin.parramattarefs.com.au/main/img/logo.png" alt="img" style="width:150px">
                        </td>
                    </tr>
                </table>
            </td>

            <td align="center" valign="top" width="400" class="templateColumnContainer">
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tr>
                        <td align="right" class="rightColumnContent head">
                            <h3>Parramatta District Rugby League Referees Association</h3>
                        </td>
                    </tr>
                    <td align="center" valign="top" width="200" class="templateColumnContainer">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                            <tr>
                                <td width="150" valign="top" align="left" class="rightColumnContent" style="float: right;">
                                    <p>ABN:</p>
                                    <p>Period Starting:</p>
                                    <p>Period Ending:</p>
                                    <p>Date Paid:</p>
                                    <p>Member #:</p>
                                </td>
                                <td width="150" valign="top" align="right" class="rightColumnContent">
                                    <p>{{ $payslip->member->member_number }}</p>
                                    <p>{{$payslip->payrun->startDate}}</p>
                                    <p>{{$payslip->payrun->endDate}}</p>
                                    <p>{{$payslip->payrun->paidDate}}</p>
                                    <p>{{ $payslip->member->member_number }}</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </table>
            </td>
        </tr>
    </table>

    <table cellpadding="0" cellspacing="0" border="0" width="100%" id="templateColumns" style="margin: 0 auto; max-width: 800px;">
        <tr>
            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                    <td lign="center"  bgcolor="#ffffff" valign="top" class="column" width="100%" colspan="12" style="padding:40px;"></td>
                </tr>
            </table>
        </tr>
    </table>

    <table cellpadding="0" cellspacing="0" border="0" width="100%" id="templateColumns" style="margin: 0 auto; max-width: 800px;">
        <tr>
            <td align="center" valign="top" width="120" class="templateColumnContainer">
                <table border="0" cellpadding="10" cellspacing="0" width="100%">
                    <tr>
                        <td align="center" width="120" class="leftColumnContent">
                            <p>{{$payslip->member->address}}</p>
                        </td>
                    </tr>
                </table>
            </td>

            <td align="center" valign="top" width="200" class="templateColumnContainer">
                <table  cellpadding="0" cellspacing="0" border="0" width="100%">
                    <tr>
                        <td width="150" valign="top" align="left" class="rightColumnContent" style="float: right;">
                            <p>Gross Earnings:</p>
                            <p>Deduction:</p>
                            <p>Net Payment:</p>
                        </td>
                        <td width="150" valign="top" align="right" class="rightColumnContent">
                            <p style="font-weight: bold;">${{ $slip->sum('credit') }}</p>
                            <p style="font-weight: bold;">${{ $slip->sum('debit') }}</p>

                            <p style="font-weight: bold;">${{ $slip->sum('credit')-$slip->sum('debit') }}</p>
                        </td>
                    </tr>
                </table>
            </td>
    </table>
    </td>
    </tr>
    </table>

    <table cellpadding="0" cellspacing="0" border="0" width="100%" id="templateColumns" style="margin: 0 auto; max-width: 800px">
        <tr>
            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                    <td lign="center"  bgcolor="#ffffff" valign="top" class="column" width="100%" colspan="12" style="padding:20px;"></td>
                </tr>
            </table>
        </tr>
    </table>

    <table cellpadding="0" cellspacing="0" border="0" width="100%" id="templateColumns" class="table-content" style="margin: 0 auto; max-width: 800px">
        <tr class="table">
            <th style="text-align: left; max-width: 600px;">Pay Slip Components</th>
            <th style="max-width: 100px;">This Pay</th>
            <th style="text-align: right; width: 100px;">Year To Date</th>
        </tr>

        <tr>
            <th style="text-align: left; padding: 10px 0 5px;">Earning</th>
        </tr>
        @foreach($slip as $slp)
            @if($slp->credit != null)
        <tr class="table1">
            <th style="font-weight: normal; text-align: left;">{{ $slp->name}}</th>
            <th style="font-weight: normal;">${{$slp->credit}}</th>
            <th style="text-align: right; font-weight: normal;">${{$slp->credit}}</th>
        </tr>
            @endif
        @endforeach
        <tr class="table2">
            <th></th>
            <th>${{$slip->sum('credit')}}</th>
            <th style="text-align: right;">${{$slip->sum('credit')}}</th>
        </tr>
        <tr class="table3">
            <th style="text-align: left; padding: 10px 0 5px;">Deductions</th>
        </tr>
        @foreach($slip as $slp)
            @if($slp->debit != null)
                <tr class="table4">
                    <th style="font-weight: normal; text-align: left;">{{ $slp->name}}</th>
                    <th style="font-weight: normal;">${{$slp->debit}}</th>
                    <th style="text-align: right; font-weight: normal;">${{$slp->debit}}</th>
                </tr>
            @endif
        @endforeach
        <tr class="table5">
            <th></th>
            <th>${{$slip->sum('debit')}}</th>
            <th style="text-align: right;">${{$slip->sum('debit')}}</th>
        </tr>
    </table>
</div>
</body>
