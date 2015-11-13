<!DOCTYPE html>
<html>
<head>
<title>HW6_PHP< / title>
<style type = "text/css">
.result td : last - child
{
	text - align: right;
}
.resultRow td
{
	background - color:#F1EAC2;
border: 1px solid black;
	border - radius: 3px;

}
< / style>
<script>
function validationForm(realestateForm) {
	var sa = document.forms["realestateForm"]["street_address"].value;
	var c = document.forms["realestateForm"]["city"].value;
	var s = document.forms["realestateForm"]["state"].value;
	if ((sa == "") && (c == "") && (s == "")) {
		alert("Please enter value for Street Address, City and State");
		return false;
	}
	if ((sa == "") && (c == "")) {
		alert("Please enter value for Street Address and City");
		return false;
	}
	if ((c == "") && (s == "")) {
		alert("Please enter value for City and State");
		return false;
	}
	if ((sa == "") && (s == "")) {
		alert("Please enter value for Street Address and State");
		return false;
	}
	if (sa == "") {
		alert("Please enter value for Street Address");
		return false;
	}
	if (c == "") {
		alert("Please enter value for City");
		return false;
	}
	if (s == "") {
		alert("Please enter value for State");
		return false;
	}
}


< / script>
< / head>
<body>
<form name = "realestateForm" action = " " onsubmit = "return validationForm(this.form);" method = "POST">
<div id = "pageLevel" align = "center">
<div id = "EstateBox" style = "width:400px;">
<div align = "center" style = "font-size:24px; padding-bottom: 0.5cm; font-weight: bold;">Real Estate Search< / div>
<table width = "100%" style = "border:2px solid black; padding-bottom: 0.2cm; padding-top: 0.2cm ">
<tr>
<td>Street Address<sup>*< / sup>:< / td>
<td><input type = "text" name = "street_address" / >< / td>
< / tr>
<tr>
<td>City<sup>*< / sup> : < / td>
<td><input type = "text" name = "city" / >< / td>
< / tr>
<tr>
<td> State<sup>*< / sup> : < / td >
<td><select name = "state" size = "1">
<option value = "">< / option>
<option value = "AK">AK< / option>
<option value = "AL">AL< / option>
<option value = "AR">AR< / option>
<option value = "AZ">AZ< / option>
<option value = "CA">CA< / option>
<option value = "CO">CO< / option>
<option value = "CT">CT< / option>
<option value = "DC">DC< / option>
<option value = "DE">DE< / option>
<option value = "FL">FL< / option>
<option value = "GA">GA< / option>
<option value = "HI">HI< / option>
<option value = "IA">IA< / option>
<option value = "ID">ID< / option>
<option value = "IL">IL< / option>
<option value = "IN">IN< / option>
<option value = "KS">KS< / option>
<option value = "KY">KY< / option>
<option value = "LA">LA< / option>
<option value = "MA">MA< / option>
<option value = "MD">MD< / option>
<option value = "ME">ME< / option>
<option value = "MI">MI< / option>
<option value = "MN">MN< / option>
<option value = "MO">MO< / option>
<option value = "MS">MS< / option>
<option value = "MT">MT< / option>
<option value = "NC">NC< / option>
<option value = "ND">ND< / option>
<option value = "NE">NE< / option>
<option value = "NH">NH< / option>
<option value = "NJ">NJ< / option>
<option value = "NM">NM< / option>
<option value = "NV">NV< / option>
<option value = "NY">NY< / option>
<option value = "OH">OH< / option>
<option value = "OK">OK< / option>
<option value = "OR">OR< / option>
<option value = "PA">PA< / option>
<option value = "RI">RI< / option>
<option value = "SC">SC< / option>
<option value = "SD">SD< / option>
<option value = "TN">TN< / option>
<option value = "TX">TX< / option>
<option value = "UT">UT< / option>
<option value = "VA">VA< / option>
<option value = "VT">VT< / option>
<option value = "WA">WA< / option>
<option value = "WI">WI< / option>
<option value = "WV">WV< / option>
<option value = "WY">WY< / option>
< / select>< / td>
< / tr>
<tr>
<td>&nbsp; < / td>
<td valign = "top" style = "vertical-align:top;">
<div style = "width:75px; diplay:inline-block;  float:left;">
<input type = "submit" value = "search" name = "submit"><br>
< / div>
<div style = "width:150px; diplay:inline-block; float:left;">
<img src = "http://www.zillow.com/widgets/GetVersionedResource.htm?path=/static/logos/Zillowlogo_150x40_rounded.gif" width = "150" height = "40" alt = "Zillow Real Estate Search" / >
< / div>
< / td>
< / tr>
<tr><td colspan = "2"><sup>*< / sup>-<i>Mandatory fields.< / i>< / td> < / tr >
< / table>
< / div>
< / div>
< / form>
< ? php date_default_timezone_set('America/Los_Angeles'); ? >

< ? php if (isset($_POST["submit"])){
	$x = $_POST["street_address"];
	$y = $_POST["city"];
	$z = $_POST["state"];
	$url = "http://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=X1-ZWz1b2r264t72j_2jayc&address=".urlencode($x)."&citystatezip=".urlencode($y)."%2C+".urlencode($z)."&rentzestimate=true";
	? >

		< ? php
		$xml = simplexml_load_file($url);
	$error_verify = $xml->message->code;
	if ($error_verify != 0)
	{
		echo "<div align=center style=font-size:15px;><b>No exact match found--Verify that the given address is correct.</b></div>"; ? >
			<br><div align = "center">&copy Zillow, Inc., 2006 - 2014. Use is subject to<a href = "http://www.zillow.com/corp/Terms.htm"> Terms of Use < / a >
			<div align = "center"><a href = "http://www.zillow.com/zestimate/">What's a Zestimate?</a></div>
			< ? php
			return;
	}

	? >
		<div align = "center" style = "font-size:24px; padding-bottom: 0.3cm; padding-top: 0.3cm; font-weight: bold;">Search Results< / div>
		<table class = "result" width = "100%" cellspacing = "0px">
		<tr class = "resultRow"><td colspan = "3" style = "border-right:0px;border-top-right-radius:0px;border-bottom-right-radius:0px;" >See more details for < a href = "<?php echo $xml->response->results->result->links->homedetails; ?>" style = "text-decoration: none" >
		< ? php echo $xml->response->results->result->address->street; echo ", ";
	echo $xml->response->results->result->address->city; echo ", ";
	echo $xml->response->results->result->address->state; echo "-";
	echo $xml->response->results->result->address->zipcode; ? > < / a> on Zillow< / td><td style = "border-left:0px;border-top-left-radius:0px;border-bottom-left-radius:0px;">&nbsp; < / td> < / tr >
		<tr><td>Property Type : < / td>
		<td>
		< ? php echo $xml->response->results->result->useCode; ? >
		< / td>
		<td>Last Sold Price : < / td>
		<td>
		< ? php
		$lastSoldPrice = $xml->response->results->result->lastSoldPrice;
	if ($lastSoldPrice != "")
	{
		echo "$"; echo number_format(floatval($xml->response->results->result->lastSoldPrice), 2, '.', ',');
	} ? >
		< / td>< / tr>

		<tr><td>Year Built : < / td>
		<td>
		< ? php echo $xml->response->results->result->yearBuilt; ? >
		< / td>
		<td>Last Sold Date : < / td>
		<td>
		< ? php echo date('d-M-Y', strtotime($xml->response->results->result->lastSoldDate)); ? > < / td >
		< / tr>
		<tr><td>Lot Size : < / td>
		<td>
		< ? php
		$lotSize = $xml->response->results->result->lotSizeSqFt;
	if ($lotSize != "")
	{
		echo number_format(floatval($xml->response->results->result->lotSizeSqFt), 2, '.', ','); echo " sq. ft.";
	} ? >
		< / td>
		<td>Zestimate <sup>&reg; < / sup> Property Estimate as of < ? php echo date('d-M-Y', strtotime($xml->response->results->result->zestimate->{'last-updated'})); ? >: < / td >
		<td>< ? php $propertyEstimate = $xml->response->results->result->zestimate->{'last-updated'};
	if ($propertyEstimate != "")
	{
		echo "$"; echo number_format(floatval($xml->response->results->result->zestimate->amount), 2, '.', ',');
	} ? >< / td>
		< / tr>
		<tr>
		<td>Finished Area : < / td>
		<td>
		< ? php
		$finishedArea = $xml->response->results->result->finishedSqFt;
	if ($finishedArea != "")
	{
		echo number_format(floatval($xml->response->results->result->finishedSqFt), 2, '.', ','); echo " sq. ft.";
	} ? >
		< / td>
		< ? php $overall_change = $xml->response->results->result->zestimate->valueChange;
	$image1 = "";
	if ($overall_change != "")
	{
		if ($overall_change<0)
		{
			$overall_change = "$".(number_format(-floatval($xml->response->results->result->zestimate->valueChange), 2, '.', ','));
			$image1 = "<img src=down_r.gif></img>";

		}
		else
		{
			$image1 = "<img src=up_g.gif></img>";
			$overall_change = "$".number_format(floatval($xml->response->results->result->zestimate->valueChange), 2, '.', ',');
		}
	}
	? >

		< td>30 Days Overall Change : < ? php echo $image1; ? > < / td >
		<td>< ? php
		echo $overall_change; ? >
		< / td>
		< / tr>
		<tr>
		<td>Bathrooms:< / td>
		<td> < ? php
		echo $xml->response->results->result->bathrooms;
	? > < / td>
		<td>All Time Property Range : < / td>
		<td>< ? php
		$propertyRangeLow = $xml->response->results->result->zestimate->valuationRange->low;
	if ($propertyRangeLow != "")
	{
		echo "$"; echo number_format(floatval($xml->response->results->result->zestimate->valuationRange->low), 2, '.', ','); echo " - ";
	}
	$propertyRangeHigh = $xml->response->results->result->zestimate->valuationRange->high;
	if ($propertyRangeHigh != "")
	{
		echo "$"; echo number_format(floatval($xml->response->results->result->zestimate->valuationRange->high), 2, '.', ',');
	} ? >< / td>
		< / tr>
		<tr><td>Bedrooms:< / td>
		<td>< ? php
		echo $xml->response->results->result->bedrooms; ? > < / td >
		<td>Rent Zestimate <sup>&reg; < / sup> Valuation as of < ? php echo date('d-M-Y', strtotime($xml->response->results->result->rentzestimate->{'last-updated'})); ? >: < / td >
		<td>< ? php $rentEstimate = $xml->response->results->result->rentzestimate->amount;
	if ($rentEstimate != "")
	{
		echo "$"; echo number_format(floatval($xml->response->results->result->rentzestimate->amount), 2, '.', ',');
	} ? >< / td>
		< / tr>
		<tr>
		<td>Tax Assessment Year : < / td>
		<td>< ? php
		echo $xml->response->results->result->taxAssessmentYear; ? >
		< / td>
		< ? php $rent_change = $xml->response->results->result->rentzestimate->valueChange;
	$image2 = "";
	if ($rent_change != "")
	{
		if ($rent_change<0)
		{
			$image2 = "<img src=down_r.gif></img>";
			$rent_change = "$".(number_format(-floatval($xml->response->results->result->rentzestimate->valueChange), 2, '.', ','));

		}
		else
		{
			$image2 = "<img src=up_g.gif></img>";
			$rent_change = "$".number_format(floatval($xml->response->results->result->rentzestimate->valueChange), 2, '.', ',');
		}
	}
	? >
		< td>30 Days Rent Change : < ? php echo $image2; ? > < / td >
		<td>< ? php echo $rent_change; ? > < / td >
		< / tr>
		<tr>
		<td>Tax Assessment : < / td>
		<td>< ? php
		$taxAssessment = $xml->response->results->result->taxAssessment;
	if ($taxAssessment != "")
	{

		echo"$"; echo number_format(floatval($xml->response->results->result->taxAssessment), 2, '.', ',');
	} ? >

		< / td>
		<td>All Time Rent Change : < / td>
		<td>< ? php
		$allRentChangeLow = $xml->response->results->result->rentzestimate->valuationRange->low;
	if ($allRentChangeLow != "")
	{
		echo"$"; echo number_format(floatval($xml->response->results->result->rentzestimate->valuationRange->low), 2, '.', ','); echo " - ";
	}
	$allRentChangeHigh = $xml->response->results->result->rentzestimate->valuationRange->high;
	if ($allRentChangeHigh != "")
	{
		echo "$"; echo number_format(floatval($xml->response->results->result->rentzestimate->valuationRange->high), 2, '.', ',');
	} ? >< / td>
		< / tr>


		< / table>
		<br>
		<div align = "center">&copy Zillow, Inc., 2006 - 2014. Use is subject to<a href = "http://www.zillow.com/corp/Terms.htm"> Terms of Use < / a >
		<div align = "center"><a href = "http://www.zillow.com/zestimate/">What's a Zestimate?</a></div>
		< ? php
} ? >


< / div>
<noscript>
< / body>
< / html>


