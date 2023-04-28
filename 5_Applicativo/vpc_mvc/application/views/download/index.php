<h1>Download</h1>
<div class="divVideo">
    <video controls class="video">
        <!--<source src="video.mp4" type="video/mp4">-->
    </video>
</div>
<div class="divButton">
    <button id="bMotionVector">Scarica video con i motion vector</button><br><br><br>

    <button id="bVideoFrames">Scarica video con i frame selezionati</button><br><br>

    <form class="videoFrames">
        <input type="checkbox" id="framesVideoI" name="framesVideoI" value="I">
        <label for="framesVideoI"> I </label>
        <input type="checkbox" id="framesVideoB" name="framesVideoB" value="B">
        <label for="framesVideoB"> B </label>
        <input type="checkbox" id="framesVideoP" name="framesVideoP" value="P">
        <label for="framesVideoP"> P </label>
    </form><br><br>

    <button id="bFrames">Scarica i frame selezionati</button> <br><br>

    <form class="frames">
        <input type="checkbox" id="framesI" name="framesI" value="I">
        <label for="framesI"> I </label>
        <input type="checkbox" id="framesB" name="framesVideoB" value="B">
        <label for="framesB"> B </label>
        <input type="checkbox" id="framesP" name="framesP" value="P">
        <label for="framesP"> P </label>
    </form>
</div>
<h3>Statistica dei frame del video</h3>
<div class="framePercTable">
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