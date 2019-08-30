{{-- <div class="modal fade show" id="crea-customer" tabindex="-1" role="dialog" aria-labelledby="crea-utenteLabel"
    style="display:none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="crea-utenteLabel">Crea Customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('customers.store') }}">
                    @csrf
                    <div class="form-group">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="Nome">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="active" id="active" class="form-control">
                            <option value="" disabled>seleziona stato</option>
                            <option value="1">Attivo</option>
                            <option value="0">Inttivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="type" id="type" class="form-control">
                            <option value="" disabled>seleziona tipo cliente</option>
                            <option value="1">Cliente</option>
                            <option value="0">Potenziale</option>
                        </select>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-9">
                            <select name="company_id" id="company_id" class="form-control">
                                @foreach ($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <a href="#" data-toggle="modal" data-target="#crea-company"
                                class="btn waves-effect waves-light btn-rounded btn-primary justify-content-end"> <i
                                    class="ti-plus text" aria-hidden="true"></i></a>

                        </div>


                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
            </form>

        </div>
    </div>
</div>


<div class="modal fade bs-example-modal-sm" id="crea-company" tabindex="-1" role="dialog" aria-labelledby="companyLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="companyLabel">Small modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('company.store') }}">
                    @csrf
                    <div class="form-group">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="Nome">

                    </div>
                    <div class="form-group">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                            name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="phone">

                    </div>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Crea</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div> --}}


<div class="modal fade show" id="crea-customer" tabindex="-1" role="dialog"
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
                                        <form action="{{ route('customers.store') }}" method="POST">
                                                @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="nome" name="nome"
                                                    placeholder="Nome" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="cognome" name="cognome"
                                                    placeholder="Cognome" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                    <select class="form-control" tabindex="-1" name="sesso" id="sesso" aria-hidden="true" required>
                                                            <option value="" selected data-default>Seleziona Sesso</option>
                                                        <option value="maschio">M</option>
                                                        <option value="femmina">F</option>
                                                    </select>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <input type="text" class="form-control" id="codfiscale"
                                                    name="codfiscale" placeholder="Codice Fiscale" required>
                                            </div>
                                        </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                                        placeholder="Telefono" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="cellulare" name="cellulare"
                                                        placeholder="Cellulare" required>
                                                </div>
                                            </div>


                                            <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <input type="email" class="form-control" id="email" name="email"
                                                            placeholder="Email" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <input type="password" class="form-control" id="password" name="password"
                                                            placeholder="Password" required>
                                                    </div>
                                                </div>

                                        <h6 class="mb-4">Luogo e data di nascita</h6>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="citta" name="citta"
                                                    placeholder="Città" required>
                                            </div>

                                            <div class="form-group col-md-6" id="datepicker">
                                                <input class="form-control datepicker" id="datepicker" name="data" type="date"
                                                    placeholder="Data di nascita" required>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <select class="form-control" tabindex="-1" aria-hidden="true" required
                                                    id="provincia" name="provincia">
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
                                        </div>


                                        <h6 class="mb-4">Informazioni di domicilio</h6>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="indirizzo" name="indirizzo"
                                                placeholder="Indirizzo" required>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="cittadom" name="cittadom"
                                                    placeholder="Città" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <select class="form-control" tabindex="-1" aria-hidden="true"
                                                    id="provinciadom" name="provinciadom" required>
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
                                                    placeholder="CAP" required>
                                            </div>
                                        </div>

                                        <h6 class="mb-4">Altre Info</h6>
                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="titolostudio"
                                                    placeholder="Titolo di Studio" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="occupazione"
                                                    placeholder="Occupazione" required>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-primary"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>

                                </div>
                            </div>
                        </div>
