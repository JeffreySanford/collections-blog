<!DOCTYPE html>
<html>
	<head>
		<script language="JavaScript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script language="JavaScript" src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
		<script language="JavaScript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
		<script language="JavaScript" src="scriptcam.js"></script>
		<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
		<style>
			#webcam {
				float:left;
			}
			#chatWindow {
				width:635px;
				height:75px;
				overflow-y:scroll;
				overflow-x:auto;
				border:1px solid grey;
				font-size:11px;
				padding:5px;
				background-color:white;
			}
			#volumeMeter {
				background-image:url('ledsbg.png');
				width:19px;
				height:133px;
				padding-top:5px;
			}
			#volumeMeter img {
				padding-left:4px;
				padding-top:1px;
				display:block;
			}
			.ui-slider {
				background:none;
				background-image:url('trackslider.png');
				border:0;height:107px;
				margin-top:16px;
			}
			.ui-slider .ui-slider-handle {
				width:14px;
				height:32px;
				margin-left:7px;
				margin-bottom:-16px;
				background:url(volumeslider.png) no-repeat; 
			}
			#volumePanel {
				-moz-border-radius: 0px 5px 5px 0px;
				border-radius: 0px 5px 5px 0px;
				background-color:#4B4B4B;
				width:55px;
				height:160px;
				-moz-box-shadow: 0px 3px 3px #333333;
				-webkit-box-shadow: 0px 3px 3px  #333333;
				shadow: 0px 3px 3px #333333;
			}
			#setupPanel {
				width:650px;
				height:30px;
				margin:5px;
			}
		</style>
		<script>
			$(document).ready(function() {
				$("#webcam").scriptcam({ 
					license: 'fb2c4e162f10fbe0fc5a09eef08e2715b',
					chatWindow:'chatWindow',
					onError:onError,
					promptWillShow:promptWillShow,
					showMicrophoneErrors:false,
					onWebcamReady:onWebcamReady,
					connected:chatStarted,
					setVolume:setVolume,
					timeLeft:timeLeft,
					loginName:'<?php echo $_GET['username'] ; ?>',
					chatRoom:'<?php echo $_GET['room'] ; ?>'
				});
				setVolume(0);
				$("#slider").slider({ animate: true, min: 0, max: 100 , value:50, orientation: 'vertical', disabled:true});
				$("#slider").bind("slidechange", function(event, ui) {
					$.scriptcam.changeVolume($("#slider" ).slider("option", "value"));
				});
				$("#message").keypress(function(event) {
					if (event.which == 13) {
						event.preventDefault();
						$.scriptcam.sendMessage($('#message').val());
						$('#message').val('');
					}
				});
			});
			function closeCamera() {
				$("#slider").slider("option","disabled", true);
				$.scriptcam.closeCamera();
			}
			function onError(errorId,errorMsg) {
				alert(errorMsg);
			}
			function chatStarted() {
				$("#slider" ).slider("option", "disabled", false);
			}
			function onWebcamReady(cameraNames,camera,microphoneNames,microphone,volume) {
				$("#slider" ).slider("option", "value", volume);
				$.each(cameraNames, function(index, text) {
					$('#cameraNames').append( $('<option></option>').val(index).html(text))
				}); 
				$('#cameraNames').val(camera);
				$.each(microphoneNames, function(index, text) {
					$('#microphoneNames').append( $('<option></option>').val(index).html(text))
				}); 
				$('#microphoneNames').val(microphone);
			}
			function promptWillShow() {
				alert('A security dialog will be shown. Please click on ALLOW and wait for a second chat partner to arrive.');
			}
			function setVolume(value) {
				value=parseInt(32 * value / 100) + 1;
				for (var i=1; i < value; i++) {
					$('#LedBar' + i).css('visibility','visible');
				}
				for (i=value; i < 33; i++) {
					$('#LedBar' + i).css('visibility','hidden');
				}
			}
			function timeLeft(value) {
				$('#timeLeft').html(value);
			}
			function changeCamera() {
				$.scriptcam.changeCamera($('#cameraNames').val());
			}
			function changeMicrophone() {
				$.scriptcam.changeMicrophone($('#microphoneNames').val());
			}
		</script>
	</head>
	<body>
		<div id="webcam">
		</div>
		<div id="volumePanel" style="float:left;position:relative;top:10px;">
			<div id="volumeMeter" style="position:absolute;top:10px;left:7px;float:left;">
				<img id="LedBar32" src="ledred.png">
				<img id="LedBar31" src="ledred.png">
				<img id="LedBar30" src="ledred.png">
				<img id="LedBar29" src="ledred.png">
				<img id="LedBar28" src="ledred.png">
				<img id="LedBar27" src="ledred.png">
				<img id="LedBar26" src="ledred.png">
				<img id="LedBar25" src="ledred.png">
				<img id="LedBar24" src="ledred.png">
				<img id="LedBar23" src="ledred.png">
				<img id="LedBar22" src="ledred.png">
				<img id="LedBar21" src="ledred.png">
				<img id="LedBar20" src="ledgreen.png">
				<img id="LedBar19" src="ledgreen.png">
				<img id="LedBar18" src="ledgreen.png">
				<img id="LedBar17" src="ledgreen.png">
				<img id="LedBar16" src="ledgreen.png">
				<img id="LedBar15" src="ledgreen.png">
				<img id="LedBar14" src="ledgreen.png">
				<img id="LedBar13" src="ledgreen.png">
				<img id="LedBar12" src="ledgreen.png">
				<img id="LedBar11" src="ledgreen.png">
				<img id="LedBar10" src="ledgreen.png">
				<img id="LedBar9" src="ledgreen.png">
				<img id="LedBar8" src="ledgreen.png">
				<img id="LedBar7" src="ledgreen.png">
				<img id="LedBar6" src="ledgreen.png">
				<img id="LedBar5" src="ledgreen.png">
				<img id="LedBar4" src="ledgreen.png">
				<img id="LedBar3" src="ledgreen.png">
				<img id="LedBar2" src="ledgreen.png">
				<img id="LedBar1" src="ledgreen.png">
			</div>
			<div id="slider" style="position:absolute;top:10px;left:30px;">
			</div>
		</div>
		<br clear="both"/>
		<div id="setupPanel">
			<img src="webcamlogo.png" style="vertical-align:text-top"/>
			<select id="cameraNames" size="1" onChange="changeCamera()" style="width:145px;font-size:10px;height:25px;">
			</select>
			<img src="miclogo.png" style="vertical-align:text-top"/>
			<select id="microphoneNames" size="1" onChange="changeMicrophone()" style="width:128px;font-size:10px;height:25px;">
			</select>
		</div>
		<div id="chatWindow"></div>
		<input type="text" id="message" style="width:635px;">
	</body>
</html>
