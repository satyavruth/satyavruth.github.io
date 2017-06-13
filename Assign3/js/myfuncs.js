var cur = null;
var clear = 0;
var turns = 0;
var values = new Array('A','B','C','D','E','F','G','H');
var data = new Array(16);
var position = new Array(16);
var i = 0;

function setup_game()
{
	var ids = new Array();
	turns = 0;
	clear = 0;
	data = new Array(16);
	position = new Array(16);
	$('#reset').html("<div class = 'icon'><img id = 'icon' height= 40px width = 40px title = 'Give me another frame' /></div>")
	$('#icon').attr("src","images/hat.png");
	$('.TheBox').css("background","url('/Assign3/images/bg.png')");
	document.getElementById('clear').innerHTML = 'CLEAR: ' + clear;
	document.getElementById('turns').innerHTML = 'TURNS: ' + turns;
	var i = 0;
	for(i = 0; i < 16;i++)
	{
		ids.push(Math.floor(i/4) + '' + Math.floor(i%4));
		position[i] = Math.floor(i/4) + '' + Math.floor(i%4);
	}
	var placed = new Array();
	var id_1 = null;
	var id_2 = null;
	var index_1 = 0;
	var index_2 = 0;
	
	for(i = 0; i < 8;i++)
	{
		index_1 = Math.floor(Math.random()*ids.length);
		index_2 = Math.floor(Math.random()*ids.length);
		
		if(index_1 != index_2 )
		{
			id_1 = ids[index_1];
			id_2 = ids[index_2];
		}
		else
		{
			i--;
			placed.pop();
			continue;
		}
		
		data[position.indexOf(id_1 + '')] = values[i];
		data[position.indexOf(id_2 + '')] = values[i];
		
		$('#' + id_1 ).attr('class','card');
		$('#' + id_2 ).attr('class','card');
		
		
		$('#' + id_1 + ' #front').css('background-image',"url('/Assign3/images/" + id_1 + ".jpg')");
		$('#' + id_2 + ' #front').css('background-image',"url('/Assign3/images/" + id_2 + ".jpg')");
		
		$('#' + id_1 + '> #back').html("");
		$('#' + id_2 + '> #back').html("");

		$('#' + id_1).css('transform','');
		$('#' + id_2).css('transform','');
		
		ids.splice(ids.indexOf(id_1),1);
		ids.splice(ids.indexOf(id_2),1);
		
	}
	i = 16;
}


function show(ele)
{
	if(cur == null)
	{
		$('#' + ele.id).css('transform','rotateY(180deg)');
		$('#' + ele.id + '> #back').html(data[position.indexOf(ele.id)] + '');
		cur = new Array(data[position.indexOf(ele.id)] + '', ele.id + '');
		turns +=1;
	}
	else
	{
		if(cur[1] != ele.id)
		{
			document.getElementById(ele.id + '').style = '';
			$('#' + ele.id).css('transform','rotateY(180deg)');
			$('#' + ele.id + '> #back').html(data[position.indexOf(ele.id)] + '');
			for(i = 0;i < position.length;i++)
			{
				$('#' + position[i]).attr("onclick","");
			}
			if(cur[0] == data[position.indexOf(ele.id)])
			{
				clear +=1;
				setTimeout(function()  {
					if(clear == 8) clear = 'ALL';
					document.getElementById('clear').innerHTML = 'CLEAR: ' + clear;
					document.getElementById('turns').innerHTML = 'TURNS: ' + turns;
					document.getElementById(ele.id).className = 'done';
					document.getElementById(cur[1]).className = 'done';
					$('#' + cur[1] + '> #back').css("color",'rgba(0,0,0,0)');
					$('#' + ele.id + '> #back').css("color",'rgba(0,0,0,0)');
					var temp = new Array(ele.id + '',cur[1] + '');
				for(i = 0;i < position.length;i++)
				{
					if(jQuery.inArray(position[i] + '',temp) < 0)
						$('#' + position[i]).attr("onclick","show(this)");
				}
				cur = null;
	
				},1300);
				
				data.splice(position.indexOf(ele.id),1);
				position.splice(position.indexOf(ele.id),1);
				data.splice(position.indexOf(cur[1]),1);
				position.splice(position.indexOf(cur[1]),1);
			}
		
			else
			{
				
				for(i = 0;i < position.length;i++)
				{
					document.getElementById(position[i]).onclick = function(){	};
				}
				setTimeout(function() {
				hide(cur[1],ele.id)
				},1300);
			}	
		}		
	}
	
	if(clear == 8)
	{
		document.getElementById('clear').innerHTML = 'CLEAR: ALL';
		document.getElementById('turns').innerHTML = 'TURNS: ' + turns;
		var score = Math.floor((clear/turns)*100);
		document.getElementById('score').innerHTML = score;
		alert('CONGRATULATIONS... Your score is: ' + score);
	}
}

function hide(id_1,id_2)
{
	$('#' + id_1 + '> #front').css('background-image',"url('/Assign3/images/" + id_1 + ".jpg')");
	$('#' + id_2 + '> #front').css('background-image',"url('/Assign3/images/" + id_2 + ".jpg')");
	
	$('#' + id_1).css('transform','');
	$('#' + id_2).css('transform','');
	
	document.getElementById('clear').innerHTML = 'CLEAR: ' + clear;
	document.getElementById('turns').innerHTML = 'TURNS: ' + turns;
	cur = null;
	
	for(i = 0;i < position.length;i++)
	{
		$('#' + position[i]).attr("onclick","show(this)");
	}
	
	setTimeout(function() {
	$('#' + id_1 + '> #back').html("");
	$('#' + id_2 + '> #back').html("");
	},1500);
}