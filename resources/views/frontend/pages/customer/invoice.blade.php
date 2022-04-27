
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/favicon.png" rel="icon" />

    <title>General Invoice - Koice</title>

    <!-- Web Fonts
    ======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

    <!-- Stylesheet
    ======================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/invoice')}}/vendor/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/invoice')}}/css/stylesheet.css"/>
  </head>


  <body>
    <!-- Container -->
    <div class="container-fluid invoice-container" id="tblstudents">
      <!-- Header -->
      <header>
        <div class="row align-items-center">
          <div class="col-sm-7 text-center text-sm-start mb-3 mb-sm-0">
            <img id="logo" src="{{asset('frontend/invoice')}}/images/logo.png" title="Koice" alt="Koice" />
          </div>
          <div class="col-sm-5 text-center text-sm-end">
            <h4 class="text-7 mb-0">Invoice</h4>
          </div>
        </div>
        <hr>
      </header>
      
      <!-- Main Content -->
      <main>
        <div class="row">
          <div class="col-sm-6"><strong>Date:</strong> 05/12/2020</div>
          <div class="col-sm-6 text-sm-end"> <strong>Invoice No:</strong> 16835</div>      	  
        </div>
        <hr>

        <div class="row">
          <div class="col-sm-6 text-sm-end order-sm-1"> <strong>Pay To:</strong>
            <address>
           MOHIN RANA<br />
            Dhaka, Bangladesh<br />
            Bashaboo , 1214<br />
      	    mbmohinrana@gmail.com
            </address>
          </div>

          <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
            <address>
            {{Auth::user()->name}}<br />
            {{Auth::user()->address}}<br />
            Zip - {{Auth::user()->zipcode}}<br />
            {{Auth::user()->cuntrys->name}}
            </address>
          </div>
        </div>
    	
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="card-header">
                            <tr>
                                <td class="col-1"><strong>#SI</strong></td>
                                <td class="col-4"><strong>Description</strong></td>
                                <td class="col-2 text-center"><strong>Rate</strong></td>
                                <td class="col-1 text-center"><strong>QTY</strong></td>
                                <td class="col-2 text-end"><strong>Amount</strong></td>
                            </tr>
                        </thead>

                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($invoiceItems as $order)
                            <tr>
                                <td class="col-1">{{$i}}</td>
                                <td class="col-4 text-1">{{$order->product->name}}</td>
                                <td class="col-2 text-center">৳
                                {{$order->unite_price}}
                                </td>
                                <td class="col-1 text-center">{{$order->product_qty}}</td>
                                <td class="col-2 text-end">৳ {{$order->unite_price * $order->product_qty}}</td>
                            </tr>
                            @php $i++ @endphp
                            @endforeach
                        </tbody>
                    
                        <tfoot class="card-footer">
                            <tr>
                            <td colspan="4" class="text-end"><strong>Sub Total:</strong></td>
                            <td class="text-end">৳ {{ $invoice->amount }}</td>
                        </tr>

                        <tr>
                            <td colspan="4" class="text-end"><strong>Tax:</strong></td>
                            <td class="text-end">Free</td>
                        </tr>
                            
                        <tr>
                            <td colspan="4" class="text-end border-bottom-0"><strong>Total:</strong></td>
                            <td class="text-end border-bottom-0">৳ {{ $invoice->amount }}</td>
                        </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
      </main>


      <!-- Footer -->
      <footer class="text-center mt-4">
        <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p>
        
        <div class="btn-group btn-group-sm d-print-none"> 
          <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a> 
          <button type="button" id="btnExport" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-download"></i> Download</button> 
        </div>
      </footer>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- PDF File Generate -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <script type="text/javascript">
      $("body").on("click", "#btnExport", function () {
          html2canvas($('#tblstudents')[0], {
              onrendered: function (canvas) {
                  var data = canvas.toDataURL();
                  var docDefinition = {
                      content: [{
                          image: data,
                          width: 500
                      }]
                  };
                  pdfMake.createPdf(docDefinition).download("e-book.pdf");
              }
          });
      });
    </script>

  </body>
</html>