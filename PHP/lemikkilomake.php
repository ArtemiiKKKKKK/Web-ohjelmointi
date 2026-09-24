<!DOCTYPE html>
<html>

<body>

  <h2>HTML Lomakeharjoitus</h2>

  <form action="/action_page.php">
    <label for="petname">Lemmikin nimi:</label><br>
    <input type="text" id="name" name="name"><br>

    <label for="petdateofbirth">Lemmikin syntymäaika:</label><br>
    <input type="date" id="date" name="date"><br><br>

    <p style = "padding-bottom: 10px;">Lemmikin eläinlaji:</p>
    <input type="radio" id="kissa" name="elainlaji" value="kissa">
    <label for="kissa">Kissa</label><br>

    <input type="radio" id="koira" name="elainlaji" value="koira">
    <label for="koira">Koira</label><br>

    <input type="radio" id="hamsteri" name="elainlaji" value="hamsteri">
    <label for="hamsteri">Hamsteri</label><br>

    <input type="radio" id="hamsteri" name="elainlaji" value="hamsteri">
    <label for="hamsteri">Hamsteri</label><br>

    <input type="radio" id="kaarme" name="elainlaji" value="kaarme">
    <label for="kaarme">Käärme</label>

    <p>Lemmikin lempiasiat:</p>
    <input type="checkbox" id="nukkuminen" name="lempiasiat[]" value="nukkuminen">
    <label for="nukkuminen">Nukkuminen</label><br>

    <input type="checkbox" id="ruoka" name="lempiasiat[]" value="ruoka">
    <label for="ruoka">Ruoka</label><br>

    <input type="checkbox" id="leikkiminen" name="lempiasiat[]" value="leikkiminen">
    <label for="leikkiminen">Leikkiminen</label><br>

    <input type="checkbox" id="juokseminen" name="lempiasiat[]" value="juokseminen">
    <label for="juokseminen">Juokseminen</label><br>

    <p>Lemmikin väri:</p>
    <label for="vari">Valitse väri:</label>
    <input type="color" id="vari" name="vari" value="#ffa500">

    <p>Lemmikin varusteet:</p>
    <label for="varusteet">Varusteet:</label>
    <select id="varusteet" name="varusteet[]" multiple size="4">
      <option value="panta">Panta</option>
      <option value="hihna">Hihna</option>
      <option value="kuljetuslaatikko">Kuljetuslaatikko</option>
      <option value="lelut">Lelut</option>
    </select><br>

    <div style="padding-top: 15px;">
      <input type="submit" value="Lähetä">
      <input type="submit" value="Resetoi">
    </div>
  </form>

</body>

</html>