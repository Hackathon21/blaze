<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <title>Beds Record</title>
    <?php include 'link.php'; ?>
    
  </head>

  <body onload="fetch()">
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
    <section class="container-fluid">
    <div class="table-responsive">
    <div class="mb-6">
    <br><br>
        <h1 align='center'>Beds Available</h1>
        <br><br>
    </div>
        <table class=" table table-bordered table-striped text-center" id="tbval">
            <tr>
                <th>Hospital Name</th>
                <th>Isolation beds</th>
                <th>I.C.U</th>
                <th>Ventilator</th>
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
        $i=1;
        $Count=count($data[0]['bedstatus']);
        while($i < $Count){
           ?>
    
                <tr>
                <td><?php echo $data[0]['bedstatus'][$i-1]['Hospital'] ?></td>
                <td><?php echo $data[0]['bedstatus'][$i-1]['Isolation'] ?></td>
                <td><?php echo $data[0]['bedstatus'][$i-1]['I.C.U'] ?></td>
                <td><?php echo $data[0]['bedstatus'][$i-1]['Ventilator'] ?></td>
                </tr>
            <!--
            echo $coronaStateData['statewise'][$i]['lastupdatedtime'];
            echo $coronaStateData['statewise'][$i]['state'];
            echo $coronaStateData['statewise'][$i]['confimed'];
            echo $coronaStateData['statewise'][$i]['active'];
            echo $coronaStateData['statewise'][$i]['recovered'];
            echo $coronaStateData['statewise'][$i]['deaths'];
            -->
           <?php
            $i++;
        }
    }

    ?>

        </table>
    </div>
    </section>
  </body>
</html>