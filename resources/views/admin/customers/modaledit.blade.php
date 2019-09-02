 <div class="modal fade show" id="edita-customer" tabindex="-1" role="dialog"
                            aria-labelledby="crea-customerLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="max-width: 800px !important;">
                                <div class="modal-content">
                                    <div class="modal-header" style="    flex: 0 0 60px !important;">
                                        <h5 class="modal-title" id="exampleModalLabel">Creazione cliente potenziale</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <h6 class="mb-4">Anagrafica</h6>
 <form class="" action="{{route('customers.update', $customer->id)}}" method="POST">
                                        {{ method_field('PUT') }}
                                        @csrf
                           
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="nome" name="nome"
                                                    placeholder="Nome"  value="{{$customer->nome}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="cognome" name="cognome"
                                                    placeholder="Cognome"  value="{{$customer->cognome}}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                    <select class="form-control" tabindex="-1" name="sesso" id="sesso" aria-hidden="true" required>
                                                          
@if ($customer->sesso=='maschio')
     <option value="maschio">M</option>
     <option value="femmina">F</option>
    
     @else
     <option value="femmina">F</option>
    <option value="maschio">M</option>
     
@endif
                                                       
                                                    </select>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input type="text" class="form-control" id="codfiscale"
                                                    name="codfiscale" placeholder="Codice Fiscale" value="{{$customer->codfiscale}}" >
                                            </div>
                                        </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                                        placeholder="Telefono" value="{{$customer->telefono}}" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="cellulare" name="cellulare"
                                                        placeholder="Cellulare" value="{{$customer->cellulare}}" >
                                                </div>
                                            </div>


                                            <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <input type="email" class="form-control" id="email" name="email"
                                                            placeholder="Email" value="{{$customer->email}}" >
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <input type="password" class="form-control" id="password" name="password"
                                                            placeholder="Password" value="{{$customer->password}}" >
                                                    </div>
                                                </div>

                                        <h6 class="mb-4">Luogo e data di nascita</h6>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="citta" name="citta"
                                                    placeholder="Città" value="{{$customer->citta}}" >
                                            </div>

                                            <div class="form-group col-md-6" id="datepicker">
                                                <input class="form-control datepicker" id="datepicker" name="data" type="date"
                                                    placeholder="Data di nascita" value="{{$customer->data}}" >
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <select class="form-control" tabindex="-1" aria-hidden="true" 
                                                    id="provincia" name="provincia">
                                                    <option value="{{$customer->provincia}}">{{ucwords($customer->provincia)}}</option>

                                                    <option value="Agrigento">Agrigento</option>
                                                    <option value="Alessandria">Alessandria</option>
                                                    <option value="Ancona">Ancona</option>
                                                    <option value="Aosta">Aosta</option>
                                                    <option value="Arezzo">Arezzo</option>
                                                    <option value="Ascoli Piceno">Ascoli Piceno</option>
                                                    <option value="Asti">Asti</option>
                                                    <option value="Avellino">Avellino</option>
                                                    <option value="Bari">Bari</option>
                                                    <option value="Barletta-Andria-Trani">Barletta-Andria-Trani</option>
                                                    <option value="Belluno">Belluno</option>
                                                    <option value="Benevento">Benevento</option>
                                                    <option value="Bergamo">Bergamo</option>
                                                    <option value="Biella">Biella</option>
                                                    <option value="Bologna">Bologna</option>
                                                    <option value="Bolzano">Bolzano</option>
                                                    <option value="Brescia">Brescia</option>
                                                    <option value="Brindisi">Brindisi</option>
                                                    <option value="Cagliari">Cagliari</option>
                                                    <option value="Caltanissetta">Caltanissetta</option>
                                                    <option value="Campobasso">Campobasso</option>
                                                    <option value="Carbonia-iglesias">Carbonia-iglesias</option>
                                                    <option value="Caserta">Caserta</option>
                                                    <option value="Catania">Catania</option>
                                                    <option value="Catanzaro">Catanzaro</option>
                                                    <option value="Chieti">Chieti</option>
                                                    <option value="Como">Como</option>
                                                    <option value="Cosenza">Cosenza</option>
                                                    <option value="Cremona">Cremona</option>
                                                    <option value="Crotone">Crotone</option>
                                                    <option value="Cuneo">Cuneo</option>
                                                    <option value="Enna">Enna</option>
                                                    <option value="Fermo">Fermo</option>
                                                    <option value="Ferrara">Ferrara</option>
                                                    <option value="Firenze">Firenze</option>
                                                    <option value="Foggia">Foggia</option>
                                                    <option value="Forl&igrave;-Cesena">Forl&igrave;-Cesena</option>
                                                    <option value="Frosinone">Frosinone</option>
                                                    <option value="Genova">Genova</option>
                                                    <option value="Gorizia">Gorizia</option>
                                                    <option value="Grosseto">Grosseto</option>
                                                    <option value="Imperia">Imperia</option>
                                                    <option value="Isernia">Isernia</option>
                                                    <option value="Isernia">Isernia</option>
                                                    <option value="L'aquila">L'aquila</option>
                                                    <option value="Latina">Latina</option>
                                                    <option value="Lecce">Lecce</option>
                                                    <option value="Lecco">Lecco</option>
                                                    <option value="Livorno">Livorno</option>
                                                    <option value="Lodi">Lodi</option>
                                                    <option value="Lucca">Lucca</option>
                                                    <option value="Macerata">Macerata</option>
                                                    <option value="Mantova">Mantova</option>
                                                    <option value="Massa-Carrara">Massa-Carrara</option>
                                                    <option value="Matera">Matera</option>
                                                    <option value="Medio Campidano">Medio Campidano</option>
                                                    <option value="Messina">Messina</option>
                                                    <option value="Milano">Milano</option>
                                                    <option value="Modena">Modena</option>
                                                    <option value="Monza e della Brianza">Monza e della Brianza</option>
                                                    <option value="Napoli">Napoli</option>
                                                    <option value="Novara">Novara</option>
                                                    <option value="Nuoro">Nuoro</option>
                                                    <option value="Ogliastra">Ogliastra</option>
                                                    <option value="Olbia-Tempio">Olbia-Tempio</option>
                                                    <option value="Oristano">Oristano</option>
                                                    <option value="Padova">Padova</option>
                                                    <option value="Palermo">Palermo</option>
                                                    <option value="Parma">Parma</option>
                                                    <option value="Pavia">Pavia</option>
                                                    <option value="Perugia">Perugia</option>
                                                    <option value="Pesaro e Urbino">Pesaro e Urbino</option>
                                                    <option value="Pescara">Pescara</option>
                                                    <option value="Piacenza">Piacenza</option>
                                                    <option value="Pisa">Pisa</option>
                                                    <option value="Pistoia">Pistoia</option>
                                                    <option value="Pordenone">Pordenone</option>
                                                    <option value="Potenza">Potenza</option>
                                                    <option value="Prato">Prato</option>
                                                    <option value="Ragusa">Ragusa</option>
                                                    <option value="Ravenna">Ravenna</option>
                                                    <option value="Reggio di Calabria">Reggio di Calabria</option>
                                                    <option value="Reggio nell'Emilia">Reggio nell'Emilia</option>
                                                    <option value="Rieti">Rieti</option>
                                                    <option value="Rimini">Rimini</option>
                                                    <option value="Roma">Roma</option>
                                                    <option value="Rovigo">Rovigo</option>
                                                    <option value="Salerno">Salerno</option>
                                                    <option value="Sassari">Sassari</option>
                                                    <option value="Savona">Savona</option>
                                                    <option value="Siena">Siena</option>
                                                    <option value="Siracusa">Siracusa</option>
                                                    <option value="Sondrio">Sondrio</option>
                                                    <option value="Taranto">Taranto</option>
                                                    <option value="Teramo">Teramo</option>
                                                    <option value="Terni">Terni</option>
                                                    <option value="Torino">Torino</option>
                                                    <option value="Trapani">Trapani</option>
                                                    <option value="Trento">Trento</option>
                                                    <option value="Treviso">Treviso</option>
                                                    <option value="Trieste">Trieste</option>
                                                    <option value="Udine">Udine</option>
                                                    <option value="Varese">Varese</option>
                                                    <option value="Venezia">Venezia</option>
                                                    <option value="Verbano-Cusio-Ossola">Verbano-Cusio-Ossola</option>
                                                    <option value="Vercelli">Vercelli</option>
                                                    <option value="Verona">Verona</option>
                                                    <option value="Vibo valentia">Vibo valentia</option>
                                                    <option value="Vicenza">Vicenza</option>
                                                    <option value="Viterbo">Viterbo</option>
                                                </select>
                                            </div>
                                        </div>


                                        <h6 class="mb-4">Informazioni di domicilio</h6>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="indirizzo" name="indirizzo"
                                                placeholder="Indirizzo"  value="{{$customer->indirizzo}}">
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="cittadom" name="cittadom"
                                                    placeholder="Città" value="{{$customer->cittadom}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <select class="form-control" tabindex="-1" aria-hidden="true"
                                                    id="provinciadom" name="provinciadom" required>
                                                    <option value="{{$customer->provinciadom}}">{{ucwords($customer->provinciadom)}}</option>
                                                    <option value="ag">Agrigento</option>
                                                    <option value="al">Alessandria</option>
                                                    <option value="an">Ancona</option>
                                                    <option value="ao">Aosta</option>
                                                    <option value="ar">Arezzo</option>
                                                    <option value="ap">Ascoli Piceno</option>
                                                    <option value="at">Asti</option>
                                                    <option value="av">Avellino</option>
                                                    <option value="ba">Bari</option>
                                                    <option value="bt">Barletta-Andria-Trani</option>
                                                    <option value="bl">Belluno</option>
                                                    <option value="bn">Benevento</option>
                                                    <option value="bg">Bergamo</option>
                                                    <option value="bi">Biella</option>
                                                    <option value="bo">Bologna</option>
                                                    <option value="bz">Bolzano</option>
                                                    <option value="bs">Brescia</option>
                                                    <option value="br">Brindisi</option>
                                                    <option value="ca">Cagliari</option>
                                                    <option value="cl">Caltanissetta</option>
                                                    <option value="cb">Campobasso</option>
                                                    <option value="ci">Carbonia-iglesias</option>
                                                    <option value="ce">Caserta</option>
                                                    <option value="ct">Catania</option>
                                                    <option value="cz">Catanzaro</option>
                                                    <option value="ch">Chieti</option>
                                                    <option value="co">Como</option>
                                                    <option value="cs">Cosenza</option>
                                                    <option value="cr">Cremona</option>
                                                    <option value="kr">Crotone</option>
                                                    <option value="cn">Cuneo</option>
                                                    <option value="en">Enna</option>
                                                    <option value="fm">Fermo</option>
                                                    <option value="fe">Ferrara</option>
                                                    <option value="fi">Firenze</option>
                                                    <option value="fg">Foggia</option>
                                                    <option value="fc">Forl&igrave;-Cesena</option>
                                                    <option value="fr">Frosinone</option>
                                                    <option value="ge">Genova</option>
                                                    <option value="go">Gorizia</option>
                                                    <option value="gr">Grosseto</option>
                                                    <option value="im">Imperia</option>
                                                    <option value="is">Isernia</option>
                                                    <option value="sp">La spezia</option>
                                                    <option value="aq">L'aquila</option>
                                                    <option value="lt">Latina</option>
                                                    <option value="le">Lecce</option>
                                                    <option value="lc">Lecco</option>
                                                    <option value="li">Livorno</option>
                                                    <option value="lo">Lodi</option>
                                                    <option value="lu">Lucca</option>
                                                    <option value="mc">Macerata</option>
                                                    <option value="mn">Mantova</option>
                                                    <option value="ms">Massa-Carrara</option>
                                                    <option value="mt">Matera</option>
                                                    <option value="vs">Medio Campidano</option>
                                                    <option value="me">Messina</option>
                                                    <option value="mi">Milano</option>
                                                    <option value="mo">Modena</option>
                                                    <option value="mb">Monza e della Brianza</option>
                                                    <option value="na">Napoli</option>
                                                    <option value="no">Novara</option>
                                                    <option value="nu">Nuoro</option>
                                                    <option value="og">Ogliastra</option>
                                                    <option value="ot">Olbia-Tempio</option>
                                                    <option value="or">Oristano</option>
                                                    <option value="pd">Padova</option>
                                                    <option value="pa">Palermo</option>
                                                    <option value="pr">Parma</option>
                                                    <option value="pv">Pavia</option>
                                                    <option value="pg">Perugia</option>
                                                    <option value="pu">Pesaro e Urbino</option>
                                                    <option value="pe">Pescara</option>
                                                    <option value="pc">Piacenza</option>
                                                    <option value="pi">Pisa</option>
                                                    <option value="pt">Pistoia</option>
                                                    <option value="pn">Pordenone</option>
                                                    <option value="pz">Potenza</option>
                                                    <option value="po">Prato</option>
                                                    <option value="rg">Ragusa</option>
                                                    <option value="ra">Ravenna</option>
                                                    <option value="rc">Reggio di Calabria</option>
                                                    <option value="re">Reggio nell'Emilia</option>
                                                    <option value="ri">Rieti</option>
                                                    <option value="rn">Rimini</option>
                                                    <option value="rm">Roma</option>
                                                    <option value="ro">Rovigo</option>
                                                    <option value="sa">Salerno</option>
                                                    <option value="ss">Sassari</option>
                                                    <option value="sv">Savona</option>
                                                    <option value="si">Siena</option>
                                                    <option value="sr">Siracusa</option>
                                                    <option value="so">Sondrio</option>
                                                    <option value="ta">Taranto</option>
                                                    <option value="te">Teramo</option>
                                                    <option value="tr">Terni</option>
                                                    <option value="to">Torino</option>
                                                    <option value="tp">Trapani</option>
                                                    <option value="tn">Trento</option>
                                                    <option value="tv">Treviso</option>
                                                    <option value="ts">Trieste</option>
                                                    <option value="ud">Udine</option>
                                                    <option value="va">Varese</option>
                                                    <option value="ve">Venezia</option>
                                                    <option value="vb">Verbano-Cusio-Ossola</option>
                                                    <option value="vc">Vercelli</option>
                                                    <option value="vr">Verona</option>
                                                    <option value="vv">Vibo valentia</option>
                                                    <option value="vi">Vicenza</option>
                                                    <option value="vt">Viterbo</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" class="form-control" id="cap" name="cap"
                                                    placeholder="CAP" value="{{$customer->cap}}" >
                                            </div>
                                        </div>

                                        <h6 class="mb-4">Altre Info</h6>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="titolostudio"
                                                    placeholder="Titolo di Studio"  value="{{$customer->titolostudio}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="occupazione"
                                                    placeholder="Occupazione"  value="{{$customer->occupazione}}">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>

                                </div>
                            </div>