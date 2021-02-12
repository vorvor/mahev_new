<!--<style>
 




#data-personal .data-row,
#data-funding .data-row {
  margin: 10px 0;
  overflow: hidden;
}

.data-row-left, .data-row-right {
  float: left;
}

#data-personal .data-row-left {
  width: 40%;
}

#data-personal .data-row-right {
  width: 60%;
  font-weight: bold;
}

#data-funding .data-row-left {
  width: 60%;
}

#data-funding .data-row-right {
  width: 40%;
  font-weight: bold;
  text-align: right;
}

#data-personal .data-row-right.note,
#data-funding .data-row-right.note {
  font-weight: normal;
}

#model-name {
  font-size: 30px;
  text-transform: uppercase;
  font-weight: bold;
  color:#0acf83;
  margin: 28px 0;
}

#data-vehicle .data-row {
  border-bottom: 2px solid #0acf83;
  overflow: hidden;
  font-weight: bold;
}

#data-vehicle .data-row.sum {
  border: none;
  text-transform: uppercase;
  background: #0acf83;
  color: #fff;
}

#data-vehicle .data-row-left {
  width: 50%;
  padding: 10px;
  box-sizing: border-box;
}

#data-vehicle .data-row-right {
  width: 50%;
  text-align: right;
  padding: 10px;
  box-sizing: border-box;
}

#funding-title {
  font-size: 20px;
  text-transform: uppercase;
  font-weight: bold;
  margin: 40px 0 25px;
}


@media screen and (max-width: 800px) {
    /*375-800*/

  #logo {
    margin: 30px auto;
  }

    #mail-inside-wrapper {
      width: 100%;
      padding: 0;
      margin: 0;
    }
}




</style> -->

<div id="mail-wrapper" style="background: #616366;font-family: 'Barlow', sans-serif;overflow: hidden;">
      <div id="logo" style="padding: 8px 32px;border: 1px solid #fff;width: 56px;margin: 40px auto;color: #fff;">MAHZRT</div>
      <div id="mail-inside-wrapper" style="background: #fff;width: 80%;margin: 0 auto 50px;border-top: 4px solid #0acf83;padding: 37px 58px;box-sizing: border-box;">
        <div id="config-photo" style="margin: 0 auto;"><img style="width: 100%;" src="http://mahev.wabisabee.com/sequences/M3_PE_ExBk_IntBk_20cUturb/M3_PE_ExBk_IntBk_20cUturb_00000.jpg"></div>

        <div id="title" style="font-size: 24px;text-align: center;font-weight: 900;margin: 0px auto 40px;text-transform: uppercase;">Új megrendelés érkezett!</div>
        <p>Köszönjük, hogy érdeklődésével megtisztelte cégünket a Magyar Autókereskedőház Zrt.-t. A konfiguráció sikeres volt, melyet hamarosan megadott e-mail címére is továbbítunk. Kollégánk hamarosan felveszi Önnel a kapcsolatot, hogy minden felmerülő kérdésére választ tudjunk adni.</p>

        <div id="data-personal" style="margin: 0 auto;">
          <div class="data-row" style="margin: 10px 0;overflow: hidden;">
            <div class="data-row-left" style="float: left;width: 40%;padding: 10px;box-sizing: border-box;">Megrendelő neve:</div>
            <div class="data-row-right" style="float: left;width: 60%;font-weight: bold;padding: 10px;box-sizing: border-box;">###name###</div>
          </div>
          <div class="data-row" style="margin: 10px 0;overflow: hidden;">
            <div class="data-row-left" style="float: left;width: 40%;padding: 10px;box-sizing: border-box;">Címe:</div>
            <div class="data-row-right" style="float: left;width: 60%;font-weight: bold;padding: 10px;box-sizing: border-box;">###address###</div>
          </div>
          <div class="data-row" style="margin: 10px 0;overflow: hidden;">
            <div class="data-row-left" style="float: left;width: 40%;padding: 10px;box-sizing: border-box;">E-mail címe:</div>
            <div class="data-row-right" style="float: left;width: 60%;font-weight: bold;padding: 10px;box-sizing: border-box;">###email###</div>
          </div>
          <div class="data-row" style="margin: 10px 0;overflow: hidden;">
            <div class="data-row-left" style="float: left;width: 40%;padding: 10px;box-sizing: border-box;">Telefonszáma:</div>
            <div class="data-row-right" style="float: left;width: 60%;font-weight: bold;padding: 10px;box-sizing: border-box;">###phone###</div>
          </div>
          <div class="data-row" style="margin: 10px 0;overflow: hidden;">
            <div class="data-row-left" style="float: left;width: 40%;padding: 10px;box-sizing: border-box;">Megjegyzés:</div>
            <div class="data-row-right note" style="float: left;width: 60%;font-weight: bold;padding: 10px;box-sizing: border-box;">###message###</div>
          </div>
        </div>  

        <div id="model-name" style="font-size: 30px;text-transform: uppercase;font-weight: bold;color:#0acf83;margin: 28px 0;">###model###</div>  


        <div id="data-vehicle">
          <div class="data-row facility" style="border-bottom: 2px solid #0acf83;font-weight: bold;overflow: hidden;">
            <div class="data-row-left" style="float: left;width: 50%;padding: 10px;box-sizing: border-box;">Kivitel</div>
            <div class="data-row-right" style="float: left;width: 50%;text-align: right;padding: 10px;box-sizing: border-box;">###facility###</div>
          </div>
          <span id="exterior">
          <div class="data-row exterior" style="border-bottom: 2px solid #0acf83;font-weight: bold;margin: 10px 0;overflow: hidden;">
            <div class="data-row-left exterior" style="float: left;width: 50%;padding: 10px;box-sizing: border-box;">Külső szín</div>
            <div class="data-row-right" style="float: left;width: 50%;text-align: right;padding: 10px;box-sizing: border-box;">###exterior###</div>
          </div>
          </span>
          <span id="rim">
          <div class="data-row rim" style="border-bottom: 2px solid #0acf83;font-weight: bold;margin: 10px 0;overflow: hidden;">
            <div class="data-row-left rim" style="float: left;width: 50%;padding: 10px;box-sizing: border-box;">Felni</div>
            <div class="data-row-right" style="float: left;width: 50%;text-align: right;padding: 10px;box-sizing: border-box;">###rim###</div>
          </div>
          </span>
          <span id="interior">
          <div class="data-row interior" style="border-bottom: 2px solid #0acf83;font-weight: bold;margin: 10px 0;overflow: hidden;">
            <div class="data-row-left" style="float: left;width: 50%;padding: 10px;box-sizing: border-box;">Belső</div>
            <div class="data-row-right" style="float: left;width: 50%;text-align: right;padding: 10px;box-sizing: border-box;">###interior###</div>
          </div>
          </span>
          <!-- selfdrive block start -->
          <span id="autopilot">
          <div class="data-row autopilot" style="border-bottom: 2px solid #0acf83;font-weight: bold;margin: 10px 0;overflow: hidden;">
            <div class="data-row-left" style="float: left;width: 50%;padding: 10px;box-sizing: border-box;">Önvezetés</div>
            <div class="data-row-right" style="float: left;width: 50%;text-align: right;padding: 10px;box-sizing: border-box;">###selfdrive###</div>
          </div>
          </span>
          <!-- selfdrive block start -->
          <!-- wtire block start -->
          <span id="tire">
          <div class="data-row winter-wheel" style="border-bottom: 2px solid #0acf83;font-weight: bold;margin: 10px 0;overflow: hidden;">
            <div class="data-row-left" style="float: left;width: 50%;padding: 10px;box-sizing: border-box;">Téli gumi</div>
            <div class="data-row-right" style="float: left;width: 50%;text-align: right;padding: 10px;box-sizing: border-box;">###wtire###</div>
          </div>
          </span>
          <!-- wtire block end -->
          <!-- extra block start -->
          <span id="extra">
          <div class="data-row extra" style="border-bottom: 2px solid #0acf83;font-weight: bold;margin: 10px 0;overflow: hidden;">
            <div class="data-row-left" style="float: left;width: 50%;padding: 10px;box-sizing: border-box;">Extra</div>
            <div class="data-row-right" style="float: left;width: 50%;text-align: right;padding: 10px;box-sizing: border-box;">###extra###</div>
          </div>
          </span>
          <!-- extra block end -->
          <!-- seats block start -->
          <span id="seats">
          <div class="data-row seats" style="border-bottom: 2px solid #0acf83;font-weight: bold;margin: 10px 0;overflow: hidden;">
            <div class="data-row-left" style="float: left;width: 50%;padding: 10px;box-sizing: border-box;">Ülések száma</div>
            <div class="data-row-right" style="float: left;width: 50%;text-align: right;padding: 10px;box-sizing: border-box;">###seats###</div>
          </div>
          </span>
          <!-- seats block end -->
          <!--
          <div class="data-row" style="border-bottom: 2px solid #0acf83;font-weight: bold;margin: 10px 0;overflow: hidden;">
            <div class="data-row-left" style="float: left;width: 50%;padding: 10px;box-sizing: border-box;">Szállítás</div>
            <div class="data-row-right" style="float: left;width: 50%;text-align: right;padding: 10px;box-sizing: border-box;">990 EUR</div>
          </div>
          <div class="data-row" style="border-bottom: 2px solid #0acf83;font-weight: bold;margin: 10px 0 0 0;overflow: hidden;">
            <div class="data-row-left" style="float: left;width: 50%;padding: 10px;box-sizing: border-box;">Forgalomba helyezés</div>
            <div class="data-row-right" style="float: left;width: 50%;text-align: right;padding: 10px;box-sizing: border-box;">0 EUR</div>
          </div>
          <div class="data-row sum" style="border: none;text-transform: uppercase;background: #0acf83;color: #fff;overflow:hidden;">
            <div class="data-row-left" style="float: left;width: 50%;padding: 10px;box-sizing: border-box;">Végösszeg</div>
            <div class="data-row-right" style="float: left;width: 50%;text-align: right;padding: 10px;box-sizing: border-box;">[data:sum_price-value] EUR</div>
          </div>
        -->
        </div>
        <!--

        <div id="funding-title">Finanszírozás</div>
        <div id="data-funding" style="margin: 0 auto;">
          <div class="data-row">
            <div class="data-row-left">Finanszírozás igénybevételével történő vásárlás?</div>
            <div class="data-row-right">[data:funding-value]</div>
          </div>
          <div class="data-row">
            <div class="data-row-left">Konstrukció:</div>
            <div class="data-row-right">[data:financial_construction-value]</div>
          </div>
          <div class="data-row">
            <div class="data-row-left">Kezdő befizetés százalékban:</div>
            <div class="data-row-right">[data:inital_deposit-value] [data:inital_deposit_open_end-value] [data:inital_deposit_rental-value]</div>
          </div>
          <div class="data-row">
            <div class="data-row-left">Futamidő:</div>
            <div class="data-row-right">[data:duration-value] hónap</div>
          </div>
          <div class="data-row">
            <div class="data-row-left">Devizanem:</div>
            <div class="data-row-right">[data:currency-value]</div>
          </div>
          <div class="data-row">
            <div class="data-row-left">Maradványérték:</div>
            <div class="data-row-right">[data:remain_24-value][data:remain_24_36-value][data:remain_36_48-value][data:remain_48-value]</div>
          </div>
        </div><div id="funding-end"></div>  
      -->

      </div> <!-- inside wrapper -->
       
    </div>