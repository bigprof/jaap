<p>Beste <?php echo $firstname; ?>,</p>

<p>Dank voor je deelname aan de badeendrace op de Vecht in Maarssen op Koningsdag 27 april. 
Het is de bedoeling, dat je afrekent met de persoon, bij wie je de eendjes besteld hebt.</p>

<p><img src="http://www.badeendrace.nl/images/stories/20150427139a527.jpg"></p>

<p>Dit zijn de geregistreerde gegevens:</p>

<p>
	<?php $td_style = 'padding: 4px;'; ?>
	<table style="background-color:#B0DE01; padding: 10px;">
		<tr><td style="<?php echo $td_style; ?>"><b> Badeendnummers </b></td>   <td style="<?php echo $td_style; ?>"><?php echo $transaction_id; ?> </td></tr>
		<tr><td style="<?php echo $td_style; ?>"><b> Aantal badeenden </b></td> <td style="<?php echo $td_style; ?>"><?php echo $quantity; ?></td></tr>
		<tr><td style="<?php echo $td_style; ?>"><b> Bedrag </b></td>           <td style="<?php echo $td_style; ?>"><?php echo $amount; ?> euro</td></tr>
		<tr><td style="<?php echo $td_style; ?>"><b> Naam </b></td>             <td style="<?php echo $td_style; ?>"><?php echo $firstname . ' ' . $lastname; ?></td></tr>
		<tr><td style="<?php echo $td_style; ?>"><b> Email </b></td>            <td style="<?php echo $td_style; ?>"><?php echo $email; ?></td></tr>
		<tr><td style="<?php echo $td_style; ?>"><b> Telefoon </b></td>         <td style="<?php echo $td_style; ?>"><?php echo $phone; ?></td></tr>
		<tr><td style="<?php echo $td_style; ?>"><b> Gekocht via </b></td>      <td style="<?php echo $td_style; ?>"><?php echo $seller; ?></td></tr>		
		<tr><td style="<?php echo $td_style; ?>"><b> Datum </b></td>            <td style="<?php echo $td_style; ?>"><?php echo date('d-m-Y', strtotime($transactiondate)); ?></td></tr>
	</table>
</p>

<p>De badeendrace is in de Vecht langs de Herengracht bij de Evert Stokbrug in het hart van Maarssen-dorp. De eenden zullen om 14.30 uur te water worden gelaten. Voor de zes eenden, die als eerste de finish zijn gepasseerd zijn leuke prijzen beschikbaar: O.a. een Apple iPad Air, iPad Mini, Kobo Aura E-Reader en een dinerbon bij Restaurant Enya. Winnaars ontvangen hun prijs direct (indien aanwezig) of worden gebeld / gemaild.</p>

<p>De opbrengst van deze ludieke race komt geheel ten goede aan de Mentelity Foundation van Paralympisch kampioen Bibian Mentel, die zich inzet voor de sportbeoefening voor kinderen en jong volwassenen met een lichamelijke beperking. De opbrengst zal nog verdubbeld worden door de Nederlandse Stichting voor het Gehandicapte Kind (NSGK – <a href="http://www.nsgk.nl">www.nsgk.nl</a> ). Kortom: doe mee, zorg ervoor dat op Koningsdag de Vecht eventjes geel ziet van de eenden, en maak daarmee ook mooie evenementen van de Mentelity Foundation mogelijk!</p>

<p>Nadere informatie bij Joep Blom: tel. 06 – 51 99 00 10 of e-mail <a href="mailto:j.a.blom@hccnet.nl">j.a.blom@hccnet.nl</a>.</p>

<p>Zie voor meer informatie ook: <a href="http://www.badeendrace.nl">www.badeendrace.nl</a>.</p>