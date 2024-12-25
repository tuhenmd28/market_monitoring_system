<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        @font-face {
            font-family: "myriad";
            src: url({{ asset('font/MYRIAD.TTF') }});
        }

        @font-face {
            font-family: "pump";
            src: url({{ asset('font/PumpOpti-Medium.otf') }});
        }

        @font-face {
            font-family: "pump1";
            src: url({{ asset('font/PumpOpti-DemiBold.otf') }});
        }

        @font-face {
            font-family: "futura";
            src: url({{ asset('font/Futura_Heavy_BT.ttf') }});
        }

        @font-face {
            font-family: "times";
            src: url({{ asset('font/TIMES.TTF') }});
        }

        .pagebreak {
            box-sizing: border-box;
            position: relative;
        }

        .table {
            margin: 3px 0;
        }

        table,
        tr,
        td {
            border-collapse: collapse;
        }

        body,
        table,
        tr,
        td,
        p,
        span,
        h1 {
            margin: 0;
            padding: 0;
            font-family: futura;
        }

        .tdDesign {
            font-family: futura;
            background-color: #00873a;
            color: white;
            padding: 5px 5px;
            clip-path: polygon(50% 0%, 100% 100%, 0 100%, 0 0);
            width: 60px;
            display: inline-block;
            font-weight: 900;
        }

        .taka {
            margin-top: 25px;
            padding-inline: 10px;
        }

        .taka span:last-child {
            width: calc(100% - 110px);
            font-family: futura;
            color: #00873a;
            display: inline-block;
            border-bottom: 1px dashed;
        }

        .taka span:first-child {
            width: 98px;
            font-family: futura;
            color: #00873a;
            display: inline-block;
            font-weight: 900;
        }

        .total {
            width: 100%;
            font-family: futura;
            background-color: #00873a;
            color: white;
            padding: 6px 0px;
            display: inline-block;
            font-weight: 900;
            position: absolute;
            left: 0;
            bottom: 0;
            text-align: center;
        }

        .amount {
            width: 100%;
            font-family: futura;
            color: black;
            padding: 5px 0px;
            display: inline-block;
            font-weight: 900;
            position: absolute;
            left: 0;
            bottom: 0;
            text-align: center;
            border-top: 2px solid #4ca673;
        }

        .border {
            border: 2px solid #00873a;
            border-radius: 1px;
        }

        .tribug {
            background-color: #018737;
            clip-path: polygon(0 0, 0% 100%, 100% 100%);
        }

        .gradient {
            background: linear-gradient(90deg,
                    rgba(248, 246, 248, 0.7931547619047619),
                    rgb(205 207 206 / 36%));
        }

        /* .pagebreak {
            clear: both;
            page-break-after: always;
        } */




        @media print {
            .detailContent {
                height: 80vh;
            }


        }

        @page {
            size: 210mm 297mm;
        }

        .detailsTable tr th {
            border: 2px solid #00873ab7;
        }

        .detailsTable tr th:last-child {
            z-index: 2;
        }

        .detailsTable tr th:first-child {
            z-index: 2;
        }

        .detailsTable tr th {
            font-family: futura;
            background-color: #00873a;
            color: white;
            padding: 8px 5px;
            text-align: center;
            color: white;
            border-radius: 1px;
            border-inline: none;
            position: relative;
            z-index: -2;
        }

        .detailsTable tbody tr td:nth-child(2) {
            text-align: left;
        }

        .detailsTable tbody tr td {
            padding: 7px;
            text-align: center;
            border-bottom: 1px solid #4caf5057;
        }

        .detailContent .designtable:nth-child(1) {
            left: 0;
            width: 10%;
            border-right: none;
            background: rgb(248, 246, 248);

            background: linear-gradient(0deg, #cccccc, #fdfdfd, #cccccc);
        }

        .detailContent .designtable:nth-child(2)::after {
            content: "";
            position: absolute;
            width: 114%;
            height: 83px;
            background: url('http://industrial10.test/assets/tag.jpeg') no-repeat;
            background-position: center;
            transform: rotate(-30deg) translate(3%, -70%) scale(.8);
            z-index: -4;
            opacity: 0.7;
            overflow: hidden;
            bottom: 0;
            left: 0;
            border-radius: 20px;
        }

        .detailContent .designtable:nth-child(2) {
            border-right: none;
            left: 10%;
            width: 40%;
            background: url('{{ asset('assets/bg.jpeg') }}') no-repeat;
            z-index: -1;
            opacity: 0.5;
            background-size: contain;
            background-position: center 40%;
        }

        .detailContent .designtable:nth-child(3) {
            border-right: none;
            left: 50%;
            width: 15%;
        }

        .detailContent .designtable:nth-child(4) {
            border-right: none;
            left: 65%;
            width: 10%;
            z-index: 1;
            border-right: none;
            border-right: 2px solid #4ca673;
        }

        .detailContent .designtable:nth-child(5) {
            left: 75%;
            width: 25%;
            background: linear-gradient(0deg, #cccccc, #fdfdfd, #cccccc);
            border-left: none;
        }

        .detailContent .designtable {
            position: absolute;
            top: 0;
            box-sizing: border-box;
            width: 20%;
            height: 100%;
            border: 2px solid #4ca673;
            border-top: none;
            z-index: -1;
        }

        .detailContent {
            position: relative;
            height: 64vh;
            width: 100%;
        }



        .footer {
            position: relative;
            bottom: 0;
            left: 0;
            width: 100%;
            margin-top: 80px;
        }

        .footer p:first-child {
            position: absolute;
            bottom: 0;
            left: 0;
            color: #018737;
            text-align: center;
            border-top: 1px solid #00873a;
            width: 75px;
        }

        .footer p:last-child {
            position: absolute;
            bottom: 0;
            right: 0;
            color: #018737;
            text-align: center;
            border-top: 1px solid #00873a;
            width: 120px;
        }

        body {
            width: 100%;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="pagebreak">
        <table width="100%" style="border: none">
            <tbody>
                <tr>
                    <td width="18%" align="right" style="border: none">
                        <div>
                            <img src="{{ asset('assets/logo.jpeg') }}" alt="logo" width="100" />
                        </div>
                    </td>
                    <td width="64%" align="center" style="border: none">
                        @isset($sales)
                            {{-- <p
                            style="
                            font-size: 11px;
                            margin: 0px 0;
                            color: #018737;
                            font-weight: 900;
                            border: 2px solid;
                            border-radius: 15px;
                            padding: 5px 7px;
                            margin-top: 5px;
                            display: inline-block;
                            ">
                            BILL/CHALLAN
                        </p> --}}
                        @endisset
                        <h1
                            style="
                        font-size: 28px;
                        margin: 0px 0;
                        color: #018737;
                        font-weight: 900;
                        font-family: pump;
                        line-height: 0.99;
                             ">
                            AYESHA PRODUCTS
                        </h1>
                        <span
                            style="
                        display: block;
                        width: 32%;
                        border-radius: 50%;
                        height: 1.5px;
                        background: linear-gradient(
                    45deg,
                    transparent,
                    #000000bd,
                    transparent
                  );
                  margin-top: 2px;
                "></span>

                        <p
                            style="
                  font-size: 18px;
                  margin: 0px 0;
                  color: #018737;
                  line-height: 1.4;
                  font-weight: 700;
                  font-family: pump;
                  margin-top: -4px;
                ">
                            Printing & Packaging
                        </p>
                        <p
                            style="
                      font-size: 13px;
                      margin: 0px 0;
                      color: #018737;
                      line-height: 1.4;
                      display: inline-block;
                      background: #00000024;
                      padding: 1px 5px;
                      border-radius: 10px;
                      font-family: myriad;
                      font-weight: 900;
                ">
                            Baunia, Uttara, Dhaka
                        </p>
                        {{-- @isset($sales) --}}
                            <p
                                style="
                  color: #018737;
                  margin-top: 5px;
                  font-size: 12px;
                  font-weight: 900;
                  font-family: times;
                  letter-spacing: 1.3px;
                  text-transform: capitalize;
                  width: 71%;
                ">
                                All Kinds of Paper & Tissue Bag, Visiting Card, Pad, Memo, Hang Tag, Saree Box, Stiker, Code
                                Cover is Made.
                            </p>
                        {{-- @endisset --}}
                        <p
                            style="
                  color: #018737;
                  font-weight: 900;
                  font-size: 14px;
                  font-family: 'times';
                ">
                            Cell: 01812-21 30 66, 01923-59 85 15
                        </p>
                        <p
                            style="
                  color: #018737;
                  font-weight: 900;
                  font-size: 14px;
                  font-family: 'times';
                  margin-bottom:10px;
                ">
                            <strong>E-maill: </strong>ayesha.pandp@gmail.com
                        </p>
                    </td>
                    <td width="18%" style="border: none" align="left">
                        <div>
                            <img src="{{ asset('assets/qr.png') }}" width="100" alt="qr" />
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        @if (isset($party))
            <table width="100%" style="border: none">
                <tr>
                    <td width="68%"><strong>SL. </strong> {{ $party->order_id }}</td>
                    <td class="border gradient">
                        <span class="tdDesign">Date:</span>
                        <span>{{ dateformate($party->created_at) }}</span>
                    </td>
                </tr>
            </table>
            <table width="100%" class="table" style="border: none">
                <tr>
                    <td width="68%" class="border gradient">
                        <span style="width: 80px" class="tdDesign">Name:</span>
                        <span>{{ $party->party?->name }}</span>
                    </td>
                    <td class="border gradient">
                        <span class="tdDesign">Mob:</span>
                        <span>{{ $party->party?->phone }}</span>
                    </td>
                </tr>
            </table>
            <table width="100%" class="table" style="border: none">
                <tr>
                    <td class="border gradient">
                        <span style="width: 100px" class="tdDesign">Address:</span>
                        <span>{{ $party->party?->address }}</span>
                    </td>
                </tr>
            </table>
        @endif
