$(document).ready(function () {

	var now = new Date(servDate);
	//var now = new Date("September 21, 2015 18:16:59");
	//alert( now );

	var form = '<div class="row" style="margin-left: -15px; margin-bottom:15px;"><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><select class="form-control" name="hour"><option value="09">09</option>    <option value="10">10</option>    <option value="11">11</option><option value="12">12</option><option value="13">13</option>    <option value="14">14</option>    <option value="15">15</option><option value="16">16</option><option value="17">17</option></select></div> <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">часов</div><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"> <select class="form-control" name="minute"><option value="00">00</option><option value="15">15</option><option value="30">30</option>    <option value="45">45</option></select></div><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"> минут</div>	</div>';
	if(now.getDay() == 0 || now.getDay() > 5){
		$('#time').html('<p>К сожалению мы сегодня не работаем. Но мы можем перезвонить Вам в ближайший рабочий день в указанное Вами время:</p>' + form);
	}else if(now.getHours() > 17 || now.getHours() < 9  ){

		$('#time').html('<p>К сожалению наш рабочий день уже закончен. Но мы можем перезвонить Вам в ближайший рабочий день в указанное Вами время:</p>' + form);
	}
});