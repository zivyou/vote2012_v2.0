
<script src="<?php echo base_url('/ckeditor/ckeditor.js'); ?>"> </script>

<div class="admin_content fr">
    <h1>添加活动</h1>
    <div class="edit">
    	<form name="form1" action="<?php echo site_url('admin/act_add_ok'); ?>" method="post" enctype="multipart/form-data"  onsubmit="return check()">
           <p><label>活动简介:</label>
           <textarea class="ckeditor" name="intro_editor" rows="15" >
            </textarea>
            </p>
            <p> 每人限选
                <!--<input type="text" class="text" name="chance" />-->
				<input type="text" class="text" name="chance" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
				项
            </p>
            <p><label>投票须知:</label>
           <textarea class="ckeditor" name="req_editor" rows="15" >
            </textarea>
            </p>
            <p><input type="submit" class="button" value="提  交" />　 　 <input type="reset" class="button" value="取消" /></p>
		</form>
    </div>

</div>



<script type="text/javascript">

   // 启用 CKEitor 的上传功能，使用了 CKFinder 插件

   CKEDITOR.replace( 'intro_editor', {
    toolbar: 'Basic',
    uiColor: '#9AB8F3'
   });
   CKEDITOR.replace( 'req_editor', {
    toolbar: 'Basic',
    uiColor: '#9AB8F3'
   });

</script>

 <script type="text/javascript">

//去掉输入字符串两边的空格

function trim(s) {   
   var count = s.length;   
   var st    = 0;       // start   
   var end   = count-1; // end   
   
   if (s == "") return s;   
   while (st < count) {   
     if (s.charAt(st) == " ")   
       st ++;   
     else  
       break;   
   }   
   while (end > st) {   
     if (s.charAt(end) == " ")   
       end --;   
     else  
       break;   
   }   
   return s.substring(st,end + 1);   
 }
 
function check(){   
    //form1是form中的name属性   
    var _form = document.form1;

    if(trim(_form.intro_editor.value)==""){   
        alert("活动介绍不能为空!");           
        return false;   
    }   
    if(trim(_form.chance.value)==""){   
        alert("投票机会不能为空!");          
        return false;   
    } 
	if(trim(_form.req_editor.value)==""){   
        alert("投票须知不能为空!");          
        return false;   
    } 

    return true;

}
</script>
