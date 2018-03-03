// 게시물 본문만 프리트 출력
var tempHtmlContent; 

function printDiv () { 
   if (document.all && window.print) { 
       window.onbeforeprint = beforeDivs; 
       window.onafterprint = afterDivs; 
       window.print(); 
   } 
} 
function beforeDivs () { 
   if (document.all) { 
       var rng = document.body.createTextRange( ); 
       if (rng!=null) { 
           //alert(rng.htmlText); 
           tempHtmlContent = rng.htmlText; 
           rng.pasteHTML(" document.all("print").innerHTML "); 
       } 
   } 
} 
function afterDivs () { 
   if (document.all) { 
       var rng = document.body.createTextRange( ); 
           if (rng!=null) { 
                       rng.pasteHTML(tempHtmlContent); 
           } 
   } 
} 
