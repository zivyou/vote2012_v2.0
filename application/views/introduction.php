<script language="javascript" type="text/javascript">
var maxWidth=250;
var maxHeight=250;
function getPosXY(a,offset) {
       var p=offset?offset.slice(0):[0,0],tn;
       while(a) {
           tn=a.tagName.toUpperCase();
           if(tn=='IMG') {
              a=a.offsetParent;continue;
           }
          p[0]+=a.offsetLeft-(tn=="DIV"&&a.scrollLeft?a.scrollLeft:0);
          p[1]+=a.offsetTop-(tn=="DIV"&&a.scrollTop?a.scrollTop:0);
          if(tn=="BODY")
                break;
          a=a.offsetParent;
      }
      return p;
}
function checkComplete() {
     if(checkComplete.__img&&checkComplete.__img.complete)
              checkComplete.__onload();
}
checkComplete.__onload=function() {
         clearInterval(checkComplete.__timeId);
         var w=checkComplete.__img.width;
         var h=checkComplete.__img.height;
         if(w>=h&&w>maxWidth) {
              previewImage.style.width=maxWidth+'px';
         }
        else if(h>=w&&h>maxHeight) {
              previewImage.style.height=maxHeight+'px';
        }
        else {
              previewImage.style.width=previewImage.style.height='';
        }
       previewImage.src=checkComplete.__img.src;previewUrl.href=checkComplete.href;checkComplete.__img=null;
}
function showPreview(e) {
         hidePreview (e);
         previewFrom=e.target||e.srcElement;
         previewImage.src=loadingImg;
         previewImage.style.width=previewImage.style.height='';
         previewTimeoutId=setTimeout('_showPreview()',500);
         checkComplete.__img=null;
}
function hidePreview(e) {
        if(e) {
            var toElement=e.relatedTarget||e.toElement;
            while(toElement) {
                  if(toElement.id=='PreviewBox')
                          return;
                  toElement=toElement.parentNode;
            }
       }
       try {
            clearInterval(checkComplete.__timeId);
            checkComplete.__img=null;
            previewImage.src=null;
       }
       catch(e) {}
       clearTimeout(previewTimeoutId);
       previewBox.style.display='none';
}
function _showPreview() {
        checkComplete.__img=new Image();
        if(previewFrom.tagName.toUpperCase()=='A')
               previewFrom=previewFrom.getElementsByTagName('img')[0];
        var largeSrc=previewFrom.getAttribute("large-src");
        var picLink=previewFrom.getAttribute("pic-link");
        if(!largeSrc)
             return;
        else {
             checkComplete.__img.src=largeSrc;
             checkComplete.href=picLink;
             checkComplete.__timeId=setInterval("checkComplete()",20);
             var pos=getPosXY(previewFrom,[106,26]);
             previewBox.style.left=pos[0]+'px';
             previewBox.style.top=pos[1]+'px';
             previewBox.style.display='block';
        }
}
</script>
 <!--  大图隐藏框 --->
<div id="PreviewBox" onmouseout="hidePreview(event);">
  <div class="Picture" onmouseout="hidePreview(event);">
   <span></span>
   <div>
    <a id="previewUrl" href="javascript:void(0)" target="_blank"><img oncontextmenu="return(false)" id="PreviewImage" src="about:blank" border="0" onmouseout="hidePreview(event);" /></a>
   </div>
  </div>
</div>
<script language="javascript" type="text/javascript">
var previewBox = document.getElementById('PreviewBox');
var previewImage = document.getElementById('PreviewImage');
var previewUrl = document.getElementById('previewUrl');
var previewFrom = null;
var previewTimeoutId = null;
var loadingImg = '/jscss/demoimg/loading.gif';
</script>
<!--投票专区----------------------------------------------------------------------------------------------------------------------->

<div id="center">
  <div id="title"><p><a name="show">候选人介绍</a></p></div>
  <div id="content">  
  <?php 
  foreach($introduction as $row): 
  $str = "why_thumb.png";
  $len = strlen($str);
  $pos = strrpos($str,'.',0);
  $format = substr($str,$pos,$len);
  $big_img = substr($str,0,$pos-6).$format;
  ?>
		<a href="####" onmouseover='showPreview(event);' onmouseout='hidePreview(event);'>
		<img src="<?php echo base_url('/upload/'."$row->img"); ?>" alt="" 
		large-src="<?php echo base_url('/upload/'."$row->img"); ?>" pic-link="<?php echo base_url('/upload/'."$big_img"); ?>"  border="0" width="100"/>
		</a>
        <h1><?php echo $row->name; ?>     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row->department; ?></h1>
        <p>
			<?php echo $row->introduction; ?>
		</p>
  <?php endforeach; ?>
 </div>
 </div>


<!-----展示墙------------------------------------------------------------------------------------------------------------------>

<div id="show-top">
  <p><a name="show-wall">展示墙</a></p>
</div>
<DIV class=artist_l>
    <UL >
	
	<?php $i = 2; 	
	foreach($candidate as $row):
	if($i == 2 || $i ==12) $img_class_name='232';
	else if($i == 9) $img_class_name = '110232';
	else $img_class_name = '110';
	?>
      <LI class=<?php echo 'a'."$i"; ?>><IMG class="img<?php echo $img_class_name; ?>" src="<?php echo base_url('/upload/'."$row->img") ?>"><A href="<?php echo site_url('vote/introduction/'."$row->pid"); ?>" ><STRONG><?php echo $row->name; ?></STRONG><BR><SPAN><?php echo $row->department; ?></SPAN><BR>查看详情</A> </LI>
	<?php $i = $i + 1;
	if($i > 16) break;
	endforeach; 
	?>
	</UL>
</DIV>
