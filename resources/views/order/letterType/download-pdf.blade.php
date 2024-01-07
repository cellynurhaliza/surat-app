<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Surat</title>
    <style>
        #back-wrap {
            margin: 30px auto 0 auto;
            width: 500px;
            display: flex;
            justify-content: flex-end;
        }

        .btn-back{
            width: fit-content;
            padding: 8px 15px;
            color: #fff;
            background: #666;
            border-radius: 5px;
            text-decoration: none;
        }

        #receipt {
            box-shadow: 5px 10px 15px rgba(0, 0, 0, 0.5);
            padding: 20px;
            margin: 30px auto 0 auto;
            width: 500px;
            background: #fff;
        }
        h2 {
            font-size: .9rem;
        }
        p {
            font-size: .8rem;
            color: #666;
            line-height: 1.2rem;
        }
        #top {
            margin-top: 25px;
        }

        #top .info {
            text-align: left;
            margin: 20px 0;
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 5px 0 5px 15px;
            border: 1px solid #eee;
        }
        .tabletitle {
            font-size: .5rem;
            background: #eee;
        }
        .service {
            border-bottom: 1px solid #eee;
        }
        .itemtext {
            font-size: .7rem;
        }
        #legalcopy {
            margin-top: 15px;
        }
        .btn-print {
            float: right;
            color: #333;
        }
    </style>
</head>
<body>
    <h4>Detail Klasifikasi Surat</h4>
    <div id="back-wrap">
        <a href="{{ route('order.letterType.index') }}" class="btn-back">Kembali</a>
    </div>
    <div id="receipt">
        <i class="fa-solid fa-download" href=""></i>
        <center id="top">
            <div class="info">
                <h2>{{ $letterTypes['letter_code']}}</h2>
                <h2>{{ $letterTypes['name_type']}}</h2>
            </div>
        </center>
        <div id="mid">
            <div class="info">
                <p>17 Dec 2023</p>
            </div>
            <div class="info">
                <p>1. Dinda S.S.</p>
                <p>2. Aira S.Si.</p>
            </div>
        </div>
        <div id="bot">
            <div id="table">
                {{-- <table>
                    <tr class="tabletitle">
                        {{ <td class="item">
                            <h2>Pembeli</h2>
                        </td> }}
                        <td class="item">
                            <h2>Obat</h2>
                        </td>
                        <td class="item">
                            <h2>Kasir</h2>
                        </td>
                        <td class="Rate">
                            <h2>Tanggal Pembelian</h2>
                        </td>
                    </tr>
                    @foreach ($orders['medicines'] as $medicine)
                    <tr class="service">
                        {{ <td class="tableitem">
                            <p class="itemtext">{{ $medicine['name_customer'] }}</p>
                        </td> }}
                        <td class="tableitem">
                            <p class="itemtext">{{ $medicine['nama_medicine'] }}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext">{{ $medicine['qty'] }}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext">Rp. {{ number_format($medicine['price'],0,',','.') }}</p>
                        </td>
                    </tr>
                    @endforeach
                    <tr class="tabletitle">
                        <td></td>
                        <td class="Rate">
                            <h2>PPN (10%)</h2>
                        </td>
                        @php
                            $ppn = $orders['total_price'] * 0.01;
                        @endphp
                        <td class="payment">
                            <h2>Rp. {{ number_format($ppn,0,',','.') }}</h2>
                        </td>
                    </tr>
                    <tr class="tabletitle">
                        <td></td>
                        <td class="Rate">
                            <h2>Total Harga</h2>
                        </td>
                        <td class="payment">
                            <h2>Rp. {{ number_format($orders['total_price'],0,',','.') }}</h2>
                        </td>
                    </tr>
                </table> --}}
            </div>
        </div>
    </div>
</body>
</html>