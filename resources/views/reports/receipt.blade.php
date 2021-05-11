{{-- prnt section --}}
<style>
    /*print*/
    #invoice {
        box-shadow: 0 0 1in -0.25in rgb(0, 0, 0.5);
        padding: 2mm;
        margin: 0 auto;
        width: 58mm;
        background: #fff;
    }

    #invoice::selection {
        background: #f315f3;
        color: #fff;
    }

    #invoice::-moz-selection {
        background: #5476b4;
        color: #fff;
    }

    #invoice h1 {
        font-size: 1.5em;
        color: #222;
    }

    #invoice h2 {
        font-size: 0.5em;
    }

    #invoice h3 {
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
    }

    #invoice p {
        font-size: 0.7em;
        line-height: 1.2em;
        color: #666;
    }

    #invoice #top,
    #invoice #mid,
    #invoice #bot {
        border-bottom: 1px solid #eee;
    }

    #invoice #top {
        min-height: 100px;
    }

    #invoice #mid {
        min-height: 80px;
    }

    #invoice #bot {
        min-height: 50px;
    }

    #invoice #top .logo {
        height: 60px;
        width: 60px;
        background-image: url() no-repeat;
        background-size: 60px 60px;
        border-radius: 50px;
    }

    #invoice .info {
        display: block;
        margin: 0;
        text-align: center;
    }

    #invoice .title {
        float: right;
    }

    #invoice .title p {
        text-align: right;
    }

    #invoice table {
        width: 100%;
        border-collapse: collapse;
    }

    #invoice .tabletitle {
        font-size: 0.5em;
        background: #eee;
    }

    #invoice .service {
        border-bottom: 1px solid #eee;
    }

    #invoice .item {
        width: 24mm;
    }

    #invoice .item {
        font-size: 0.5em;
    }

    .logo {
        font-size: 0.5mm;
    }

    #invoice #legalcopy {
        margin-top: 5mm;
        text-align: center;
    }

    .serial-number {
        margin-top: 5mm;
        margin-bottom: 2mm;
        text-align: center;
        font-size: 12px;
    }

    .serial {
        font-size: 10px !important;
    }

</style>
<div id="invoice">
    <div id="printed_content">
        <center id="top">
            <div>
                <a href="#" class="brand-link logo">
                    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="N.Jeanne"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                </a>
            </div>
            <div class="info"></div>
            <h2>Quincaillerie</h2>
        </center>
    </div>

    <div class="mid">
        <div class="info">
            <h2>Contact</h2>
            <p>
                Nom: NINDORERE Jeanne<br>
                Addresse: Buyenzi<br>
                Email: nidorere,jeanne@gmail.com<br>
                Telephone: 79000000,69000000<br>
            </p>
        </div>
    </div>

    {{-- End of receipt mid --}}

    <div class="bot">
        <div class="table">
            <table>
                <tr class="tabletitle">
                    <td class="item">
                        <h2>Iteam</h2>
                    </td>
                    <td class="Hours">
                        <h2>QTY</h2>
                    </td>
                    <td class="Rate">
                        <h2>Unit</h2>
                    </td>
                    <td class="Rate">
                        <h2>Discount</h2>
                    </td>
                    <td class="Rate">
                        <h2>Sub Total</h2>
                    </td>
                </tr>
                @foreach ($order_receipt as $receipt)
                    <tr class=service>
                        <td class="tableitem">
                            <p class="itemtex">{{ $receipt->product_name }}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtex">{{ number_format($receipt->Product->price,2 )}}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtex">{{ $receipt->quantity }}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtex">{{ $receipt->discount }}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtex">{{ $receipt->total_amount }}</p>
                        </td>
                    </tr>

                @endforeach

                <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="Rate">
                        <p class="itemtex">Tax</p>
                    </td>
                    <td class="Payement">
                        <p class="itemtex">$100</p>
                    </td>
                </tr>
                <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="Rate">Total</td>
                    <td class="Payement">
                        <h2>$100</h2>
                    </td>
                </tr>
            </table>
            <div class="legalcopy">
                <p class="legal"><strong>** Merci **</strong><br> hello</p>
            </div>
            <div class="serial-number">
                Serial: <span class="serial">78678896</span>
                <span>24/12/2020 &nbsp; &nbsp; 00:04</span>
            </div>
        </div>
    </div>

</div>
