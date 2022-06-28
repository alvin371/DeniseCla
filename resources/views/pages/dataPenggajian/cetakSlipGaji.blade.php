@extends('pages/dashboard/index')
@section('content')
<div class="container mx-auto px-4">
    <div class="flex">
        <a href="/profiles" class="w-24 px-6 py-2 bg-gray-500 text-white border-4 border-gray-300 rounded-lg block my-6">Back</a>
        <a onclick="getPDF()" class="w-24 px-6 py-2 bg-green-500 text-white border-4 border-green-300 rounded-lg block my-6">PDF</a>
    </div>
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-22" id="payroll">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <h1 class="flex mx-3 text-center text-3xl text-gray-600">Eva Grosir Payroll</h1>
            <table class="w-full text-sm text-left text-gray-500 mx-6 my-12">
                <tbody>
                    <tr>
                        <th>NIK/Nama</th>
                        <td>{{$user->name}} {{$user->nip}}</td>
                        <th>Alamat</th>
                        <td>{{$user->alamat}}</td>
                        <th>Phone</th>
                        <td>{{$user->phone}}</td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td>{{$user->jabatan}}</td>
                        <th>Dibayarkan Bulan</th>
                        <td>Juni 2022</td>
                    </tr>
                </tbody>
            </table>
            <table class=" w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Total Penerimaan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-t-2 border-b-2 border-gray-500 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Gaji
                        </th>
                        <td class="px-6 py-4">
                            19000000
                        </td>
                    </tr>
                    <tr class="bg-white border-t-2 border-b-2 border-gray-500 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Tunjangan Transportasi
                        </th>
                        <td class="px-6 py-4">
                            500000
                        </td>
                    </tr>
                    <tr class="bg-white border-t-2 border-b-2 border-gray-500 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Tunjangan Transportasi
                        </th>
                        <td class="px-6 py-4">
                            200000
                        </td>
                    </tr>
                    <tr class="bg-white border-t-2 border-b-2 border-gray-500 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Total Take Home Pay
                        </th>
                        <td class="px-6 py-4">
                            Rp. 19.700.000,-
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="flex my-5 justify-end">
                <div class="col justify-end mx-12">
                    <h5 class="text-gray-500 text-md">Bojonegoro, 22 Juni 2022</h5>
                    <img src="{{asset('img/ttd.png')}}" alt="" class="-mx-10">
                    <h1>Owner Eva Grosir</h1>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function getPDF() {
        let payroll = document.getElementById('payroll').innerHTML;
        document.body.innerHTML = payroll
        window.print()
    }
</script>
<script>
    function domToPdf(el) {

        if (!(el instanceof HTMLElement)) {
            alert('The parameter is not an HTML Element.');
            return;
        }

        if (el == null) {
            alert('The element does not exist.');
            return;
        }

        var html = el.outerHTML;
        html = extractCss() + html;

        htmlToPdf(html);
    }

    function htmlToPdf(html) {

        var url = window.pdfyServer || "https://dev.tika.me/pdfy/";
        var params = JSON.stringify({
            html: html
        });

        var http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.setRequestHeader('Content-type', 'application/json');
        http.responseType = 'blob';

        http.onload = function() {
            if (this.status == 200) {
                var blob = new Blob([this.response], {
                    type: 'image/pdf'
                });
                var a = document.createElement("a");
                a.style = "display: none";
                document.body.appendChild(a);
                var url = window.URL.createObjectURL(blob);
                a.href = url;
                a.download = 'download.pdf';
                a.click();
                window.URL.revokeObjectURL(url);
            } else {
                alert('An error occurred. Could not get pdf. Please retry.')
                console.log(http);
            }
        }
        http.send(params);
    }

    function extractCss() {
        var sheets = document.styleSheets
        var css = ""
        for (var i in sheets) {
            var sheet = sheets[i];
            if (sheet.href) {
                css += '\n<link rel="stylesheet" href=' + sheet.href + ' />';
            } else {
                css += '\n<style>';
                for (var j in sheet.rules) {
                    var rule = sheet.rules[j];
                    if (rule.cssText)
                        css += '\n' + rule.cssText;
                }
                css += '\n</style>';
            }
        }
        return css;
    }


    // Extension method for HTML Element
    HTMLElement.prototype.getPdf = function() {
        domToPdf(this);
    };


    // Extension method for HTML String
    String.prototype.getPdf = function() {
        htmlToPdf(this);
    };
</script>
@endsection
