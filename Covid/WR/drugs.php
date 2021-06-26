<!doctype html>
<html lang="en">
  <head>
    <title>Recovery Drugs</title>
    <?php include 'link.php'; ?>
  </head>

  <body onload="fetch()">
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
    <section class="container-fluid">
    <div class="table-responsive">
    <div class="mb-6">
    <br><br>
        <h1 align='center'>Available Recovery Drugs</h1>
        <br><br>
    </div>
        <table class=" table table-bordered table-striped text-center" id="tbval">
            <tr>
                <th>Date and Time</th>
                <th>Location</th>
                <th>Contact</th>
            </tr>

    <?php
    $curl = curl_init();
    
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://cov-resource-india.p.rapidapi.com/covidresourceindia.herokuapp.com/posts",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: cov-resource-india.p.rapidapi.com",
            "x-rapidapi-key: a8db5af509msh25400184db741f4p1cc3bajsndd1e8800d512"
        ],
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $data=json_decode($response,true);
        ?>
                <tr>
                <td><?php echo $data[0]['Remdesivir & Tocilizumab'][0]['Verified at'] ?></td>
                <td><?php echo $data[0]['Remdesivir & Tocilizumab'][0]['Location'] ?></td>
                <td><?php echo $data[0]['Remdesivir & Tocilizumab'][0]['Contact'] ?></td>
                </tr>
           <?php
        }

    ?>
        </table>
    </div>
    </section>
    <br>
    <br>
    <p>------------------------------------------------------------------------------------------------------------------Unavailable data-----------------------------------------------------------------------------------------------------------</p>
  </body>
</html>