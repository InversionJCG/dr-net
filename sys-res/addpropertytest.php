<!DOCTYPE html>
<html>

<form name="form1" method="POST" onsubmit="createpage()">
Property Name: <input type="text" name="pname" id="pname"><br><br>
Property Address: <input type="text" name="paddress" id="paddress"><br><br>
Category: 
    <select name="pcategory" id="pcategory">
        <optgroup label="Commercial">
            <option value=3>Store</option>
            <option value=4>Warehouse</option>
            <option value=5>Factory</option>
        </optgroup>
        <optgroup label="Residential">
            <optgroup label=" Multiple Family">
                <optgroup label="  Highrise">
                    <option value=9>Flat</option>
                    <option value=10>Loft</option>
                    <option value=11>Penthouse</option>
                </optgroup>
                <optgroup label="  Lowrise">
                    <option value=13>Townhouse</option>
                    <option value=14>Duplex</option>
                </optgroup>
            </optgroup>
            <optgroup label=" Single Family">
                <option value=16>Semi-detached</option>
                <option value=17>Detached</option>
            </optgroup>
        </optgroup>
    </select>
<br><br>Property description: <br><textarea name='pdescription' id="pdescription" style="width:250px;height:150px;"> </textarea><br><br>
<input type="submit" value="Submit">
</form>

<script type="text/javascript">
    function createpage(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
    if(xmlhttp.readyState==4 && xmlhttp.status==200)
        alert("Property was successfully added! " + xmlhttp.responseText + " is the property's webpage.");
    }
    
    var content="<html><head><meta charset=\"utf-8\" /><title>{pname}</title></head><body>new website<br>{pname}<br />{pcategory}<br><br />{pdescription}<br />{paddress}<br /> </body></html>";
    

    xmlhttp.open("GET","makePage.php?content=" + content,true);
    xmlhttp.send();
}

</script>

<!-- <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test_re";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    }   

    else{

        echo "<br>Connect success!<br>";

    }
    session_start();
    $pname=$_POST['pname'];
    $paddress=$_POST['paddress'];
    $pcategory=$_POST['pcategory'];
    $pdescription=$_POST['pdescription'];
    $webid = $_SESSION['webid'];

    $data['{pname}'] = "$pname"; 
    $data['{paddress}'] = "$paddress"; 
    $data['{pcategory}'] = "$pcategory"; 
    $data['{pdescription}'] = "$pdescription"; 
    $webpage = $webid;


    $sql = "INSERT INTO property(Name,Address,Category,Description,WebID) VALUES('$pname','$paddress','$pcategory','$pdescription','$webid')";
    mysqli_query($conn,$sql);

    $placeholders = array("{pname}", "{pcategory}", "{pdescription}", "{paddress}");
    $tpl = file_get_contents($webpage);
    $newprop = str_replace($placeholders, $data, $tpl);
    $fp = fopen($webpage, "w");
    fwrite($fp, $newprop); 
    fclose($fp);

    $conn->close();

?>
 -->
</html>