var cur = null;
var clear = 0;
var turns = 0;
var values = new Array('A','B','C','D','E','F','G','H');
var data = new Array(16);
var position = new Array(16);

function setup_game()
{
	var i = 0;
	var ids = new Array();
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
		data[position.indexOf(id_1)] = values[i];
		data[position.indexOf(id_2)] = values[i];
		document.getElementById(id_1 + '').className = document.getElementById(id_2 + '').className = 'default_view';
		
		ids.splice(ids.indexOf(id_1),1);
		ids.splice(ids.indexOf(id_2),1);
		
	}
}


function show(ele)
{
	if(cur == null)
	{
		ele.className = 'changed_view';
		ele.innerHTML = data[position.indexOf(ele.id)];
		cur = new Array(data[position.indexOf(ele.id)] + '', ele.id + '');
		turns +=1;
	}
	else
	{

		if(cur[1] != ele.id)
		{
			ele.className = 'changed_view';
			ele.innerHTML = data[position.indexOf(ele.id)];
			if(cur[0] == data[position.indexOf(ele.id)])
			{
				clear +=1;
				
				document.getElementById('clear').innerHTML = 'CLEAR: ' + clear;
				document.getElementById('turns').innerHTML = 'TURNS: ' + turns;
				cur = null;
			}
		
			else
			{
				alert(data[position.indexOf(ele.id)]);
				setTimeout(hide(cur[1],ele.id),5000);
			}	
		}		
	}
	
	if(clear == 8)
	{
		
		document.getElementById('clear').innerHTML = 'CLEAR: ALL';
		document.getElementById('turns').innerHTML = 'TURNS: ' + turns;
		var score = Math.roof((clear/turns)*100);
		alert('CONGRATULATIONS... Your score is: ' + score);
	}
}

function hide(id_1,id_2)
{

	document.getElementById(id_1 + '').className = 'default_view';
	document.getElementById(id_2 + '').className = 'default_view';
	document.getElementById(id_1 + '').innerHTML = document.getElementById(id_2 + '').innerHTML = '';
	
	document.getElementById('clear').innerHTML = 'CLEAR: ' + clear;
	document.getElementById('turns').innerHTML = 'TURNS: ' + turns;
	cur = null;
}