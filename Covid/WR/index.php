
<!doctype html>
<html lang="en">
  <head>
    
    <title>Worlds Record</title>
    <?php include 'link.php'; ?>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body onload="fetch()">
    <section class="container-fluid bg" >
    <div class="table-responsive">
        <section>
            <video src="smoke.mp4" autoplay muted>
                
            </video>
        <h1>
            <span class="first">W</span><span>O</span><span>R</span><span>L</span><span>D</span><span>'S</span>
            <span>L</span><span>I</span><span>V</span><span>E</span>
            <span>C</span><span>O</span><span>V</span><span>I</span><span>D</span><span>-19</span>
            <span>D</span><span>A</span><span>T</span><span>A</span>
        </h1>
        </section>
        <table class=" table table-bordered table-striped text-center" id="tbval">
            <tr >
                <th class="trow">Country</th>
                <th class="trow">Total Confirmed</th>
                <th class="trow">Total Recovered</th>
                <th class="trow">Total Deaths</th>
                <th class="trow">New Confirmed</th>
                <th class="trow">New Recovered</th>
                <th class="trow">New Deaths</th>
            </tr>
        </table>
    </div>
  

<script>
    function fetch(){
        $.get("https://api.covid19api.com/summary",
            function(data){
                //console.log(data['Countries'].length);
                var tbval = document.getElementById('tbval');
                for (var i=1;i<(data['Countries'].length);i++){
                  var x=tbval.insertRow();
                  x.insertCell(0);
                  tbval.rows[i].cells[0].innerHTML=data['Countries'][i-1]['Country'];
                  tbval.rows[i].cells[0].style.background='#7a4a91';
                  tbval.rows[i].cells[0].style.color='#fff';
                  x.insertCell(1);
                  tbval.rows[i].cells[1].innerHTML=data['Countries'][i-1]['TotalConfirmed'];
                  tbval.rows[i].cells[1].style.background='#f36e23';
                  tbval.rows[i].cells[1].style.color='#fff';
                  x.insertCell(2);
                  tbval.rows[i].cells[2].innerHTML=data['Countries'][i-1]['TotalRecovered'];
                  tbval.rows[i].cells[2].style.background='#4bb7d8';
                  tbval.rows[i].cells[2].style.color='#fff';
                  x.insertCell(3);
                  tbval.rows[i].cells[3].innerHTML=data['Countries'][i-1]['TotalDeaths'];
                  tbval.rows[i].cells[3].style.background='#f36e23';
                  tbval.rows[i].cells[3].style.color='#fff';
                  x.insertCell(4);
                  tbval.rows[i].cells[4].innerHTML=data['Countries'][i-1]['NewConfirmed'];
                  tbval.rows[i].cells[4].style.background='#4bb7d8';
                  tbval.rows[i].cells[4].style.color='#fff';
                  x.insertCell(5);
                  tbval.rows[i].cells[5].innerHTML=data['Countries'][i-1]['NewRecovered'];
                  tbval.rows[i].cells[5].style.background='#9cc850';
                  tbval.rows[i].cells[5].style.color='#fff';
                  x.insertCell(6);
                  tbval.rows[i].cells[6].innerHTML=data['Countries'][i-1]['NewDeaths'];
                  tbval.rows[i].cells[6].style.background='#f36e23';
                  tbval.rows[i].cells[6].style.color='#fff';
                }
            }
        );
    }
</script>
</section>

<footer>
<div>
            <p class="ali">
                Copyright &copy; 2021 by BLAZE. All rights reserved.
            </p>
            
        </div>
</footer>
</body>
</html>
