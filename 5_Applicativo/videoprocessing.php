<!doctype html>
<html>
    <head>
    <link rel="stylesheet" href="css/processingvideo.css">
    </head>
    <body>
        <h1 >Video Processing Cluster</h1>
        <div class="divVideo">
            <video controls class="video">
                <!--<source src="video.mp4" type="video/mp4">-->
            </video>
        </div>

        <div class="divButton">
            <button id="button1">Scarica video con i motion vector</button>
            <br>
            <br>
            <br>
            <button id="button2">Scarica video con i frame selezionati</button>
            <br>
            <br>
            <!--<select id="framesVideo" name="framesVideo">
                <option value="I">I</option>
                <option value="B">B</option>
                <option value="P">P</option>
            </select>-->
            <form class="check1">
                <input type="checkbox" id="framesVideoI" name="framesVideoI" value="I">
                <label for="vehicle1"> I </label>
                <input type="checkbox" id="framesVideoB" name="framesVideoB" value="B">
                <label for="vehicle2"> B </label>
                <input type="checkbox" id="framesVideoP" name="framesVideoP" value="P">
                <label for="vehicle3"> P </label>
            </form>
            <br>
            <br>
            <button id="button2">Scarica i frame selezionati</button>
            <br>
            <br>
            <form class="check2">
                <input type="checkbox" id="framesI" name="framesI" value="I">
                <label for="vehicle1"> I </label>
                <input type="checkbox" id="framesB" name="framesVideoB" value="B">
                <label for="vehicle2"> B </label>
                <input type="checkbox" id="framesP" name="framesP" value="P">
                <label for="vehicle3"> P </label>
            </form>
            
        </div>
        
        <h3>Statistica dei frame del video</h3>

        <div class="divTable">
            <table>
                <tr>
                    <th>I frame</th>
                    <th>B Frame</th>
                    <th>P Frame</th>
                </tr>
                <tr>
                    <td>0 - 0%</td>
                    <td>0 - 0%</td>
                    <td>0 - 0%</td>
                </tr>
            </table>
        </div>  

        <h3>Grafico dei frame del video</h3>

        
    </body>
</html>