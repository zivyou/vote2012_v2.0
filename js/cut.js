	function setTab03Syn ( i )
	{
		selectTab03Syn(i);
	}
	
	function selectTab03Syn ( i )
	{
		switch(i){
			case 1:
			document.getElementById("TabCon1").style.display="block";
			document.getElementById("TabCon2").style.display="none";
			break;
			case 2:
			document.getElementById("TabCon1").style.display="none";
			document.getElementById("TabCon2").style.display="block";
			break;
		}
	}