
	//지역
	var areas = new Array();
	
	areas['시/도'] = '포항시 남구,포항시 북구,경주시,영덕군,울릉군,울진군,영천시,직접입력';

	areas['영덕군'] = '강구면,남정면,달산면,병곡면,영덕읍,영해면,지품면,창수면,축산면';
	areas['울릉군'] = '북면,서면,울릉읍';
	areas['울진군'] = '근남면,기성면,북면,서면,온정면,울진읍,원남면,죽변면,평해읍,후포면';
	areas['경주시'] = '감포읍,강동면,건천읍,광명동,교동,구정동,구황동,남산동,내남면,노동동,노서동,덕동,도지동,동방동,동부동,동천동,마동,배동,배반동,보문동,북군동,북부동,사정동,산내면,서면,서부동,서악동,석장동,성건동,성동동,손곡동,시동,시래동,신평동,안강읍,암곡동,양남면,양북면,외동읍,용강동,율동,인왕동,조양동,진현동,천군동,천북면,충효동,탑동,평동,하동,현곡면,황남동,황성동,황오동,황용동,효현동';
	areas['포항시 남구'] = '오천읍,문덕리,해도동,일월동,장흥동,지곡동,청림동,괴동동,대도동,대잠동,동촌동,상도동,송내동,송도동,이동,인덕동,호동,효자동,구룡포읍,연일읍,유강리,대송면,동해면,장기면,호미곶면';
	areas['포항시 북구'] = '장성동,양덕동,환호동,창포동,죽도동,중앙동,학산동,학잠동,남빈동,대신동,대흥동,덕산동,덕수동,동빈1가,동빈2가,두호동,득량동,상원동,신흥동,여남동,여천동,용흥동,우현동,항구동,흥해읍,기계면,기북면,송라면,신광면,죽장면,청하면';
	areas['영천시'] = '고경면,과전동,괴연동,교촌동,금로동,금호읍,녹전동,대전동,대창면,도남동,도동,도림동,망정동,매산동,문내동,문외동,범어동,본촌동,봉동,북안면,서산동,성내동,신기동,신녕면,쌍계동,야사동,언하동,오미동,오수동,완산동,임고면,자양면,작산동,조교동,창구동,채신동,청통면,화남면,화룡동,화북면,화산면';
		
	function siguchange() 
    {
        var f = document.fwrite;
		
		if(f.sigu.value == '직접입력'){
			document.getElementById('sigu_self').style.display = '';
		} else {
			document.getElementById('sigu_self').style.display = 'none';
		}
        dongview(f.sigu.value);
		if(typeof(f.apt) != 'undefined') { aptview(); }
		if(typeof(f.billa) != 'undefined') { billaview(); }
		if(typeof(f.oneroom) != 'undefined') { oneroomview(); }
		if(typeof(f.ri) != 'undefined') { riview(); }
       
    }

    function dongchange() 
    {
        var f = document.fwrite;		
		
        aptview(f.dong.value);
        
    }

	function dongchange2() 
    {
        var f = document.fwrite;		
		
        billaview(f.dong.value);
        
    }

	function dongchange3() 
    {
        var f = document.fwrite;		
		
        oneroomview(f.dong.value);
        
    }

	function dongchange_ri() 
    {
        var f = document.fwrite;		
		
        riview(f.dong.value);
        
    }

    function dongview(sigu)
    {
        var f = document.fwrite;

        f.dong.options.length = 1;
        f.dong.options[0].text = "동선택";
        f.dong.options[0].selected = true;
        if (!sigu) {
            return;
        }

        area = areas[sigu].split(",");
        f.dong.options.length = area.length+1;
        for (i=0; i<area.length; i++) {
            f.dong.options[i+1].value = area[i];
            f.dong.options[i+1].text = area[i];
        }
    }

	function aptview(dong)
    {
        var f = document.fwrite;

        f.apt.options.length = 2;
        f.apt.options[0].text = "아파트선택";
        f.apt.options[0].selected = true;
		f.apt.options[1].text = "직접입력";
		f.apt.options[1].value = "직접입력";

        if (!dong) {
            return;
        }
		
        apt = apt2[dong].split(",");
        f.apt.options.length = apt.length+1;	
        for (i=0; i<apt.length; i++) {
            f.apt.options[i+1].value = apt[i];
            f.apt.options[i+1].text = apt[i];
        }
    }

	function billaview(dong)
    {
        var f = document.fwrite;

        f.billa.options.length = 2;
        f.billa.options[0].text = "빌라선택";
        f.billa.options[0].selected = true;
		f.billa.options[1].text = "직접입력";
		f.billa.options[1].value = "직접입력";

        if (!dong) {
            return;
        }
		
        billa = billa2[dong].split(",");
        f.billa.options.length = billa.length+1;	
        for (i=0; i<billa.length; i++) {
            f.billa.options[i+1].value = billa[i];
            f.billa.options[i+1].text = billa[i];
        }
    }


function oneroomview(dong)
    {
        var f = document.fwrite;

        f.oneroom.options.length = 2;
        f.oneroom.options[0].text = "원룸선택";
        f.oneroom.options[0].selected = true;
		f.oneroom.options[1].text = "직접입력";
		f.oneroom.options[1].value = "직접입력";

        if (!dong) {
            return;
        }
		
        oneroom = oneroom2[dong].split(",");
        f.oneroom.options.length = oneroom.length+1;	
        for (i=0; i<oneroom.length; i++) {
            f.oneroom.options[i+1].value = oneroom[i];
            f.oneroom.options[i+1].text = oneroom[i];
        }
    }

	function riview(dong)
    {
        var f = document.fwrite;

        f.ri.options.length = 1;
        f.ri.options[0].text = "리선택";
        f.ri.options[0].selected = true;
		
        if (!dong) {
            return;
        }
		
		ri = ri2[dong].split(",");
		f.ri.options.length = ri.length+1;	
		for (i=0; i<ri.length; i++) {
			f.ri.options[i+1].value = ri[i];
			f.ri.options[i+1].text = ri[i];
		}
		
    }

    function siguview()
    {
        var f = document.fwrite;

        f.sigu.options.length = 1;
        f.sigu.options[0].text = "시/구선택";
        area = areas["시/도"].split(",");
        f.sigu.options.length = area.length+1;
        for (i=0; i<area.length; i++) {
            f.sigu.options[i+1].value = area[i];
            f.sigu.options[i+1].text = area[i];
        }
    }

	function aptchange() 
    {
        var f = document.fwrite;		
		
        if(f.apt.value == '직접입력'){
			
			f.wr_subject.value = '';
			f.wr_subject.focus();
		} else {
			f.wr_subject.value = f.apt.value;
		}
        
    }

	function billachange() 
    {
        var f = document.fwrite;		
		
        if(f.billa.value == '직접입력'){
		
			f.wr_subject.value = '';
			f.wr_subject.focus();
		} else {
			f.wr_subject.value = f.billa.value;
		}
       
    }


function oneroomchange() 
    {
        var f = document.fwrite;		
		
        if(f.oneroom.value == '직접입력'){
		
			f.wr_subject.value = '';
			f.wr_subject.focus();
		} else {
			f.wr_subject.value = f.oneroom.value;
		}
       
    }
