<script src="<?php echo base_url('/ckeditor/ckeditor.js'); ?>"> </script>

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
 
function isEmpty(){   
    //form1是form中的name属性   
    var _form = document.form1;

    if(trim(_form.name.value)==""){   
        alert("姓名不能为空!");           
        return false;   
    }   
    if(trim(_form.department.value)==""){   
        alert("学院不能为空!");          
        return false;   
    } 
	if(trim(_form.image.value)==""){   
        alert("图片不能为空!");          
        return false;   
    } 
	
	if(trim(_form.intro_editor.value)==""){   
        alert("简介不能为空!");          
        return false;   
    } 
	

    return true;

}
</script>

<div class="admin_content fr">
    <h1>添加投票项</h1>
    <div class="edit">
    	<form name="form1" action="<?php echo site_url('admin/can_add_ok'); ?>" method="post" onsubmit="return isEmpty()"  enctype="multipart/form-data" >
        	
            <p><label>姓&nbsp;&nbsp;&nbsp;&nbsp;名:</label>
            <input type="text" class="text" name="name" />
            </p>
            <p> 所在学院: 
                <input type="text" class="text" name="department" />
            </p>
            <p><label>上传图片:(图片大小限制为2024×2024)</label>
            <input type="file" class="text" name="image" />
            </p>
            <p><label>简介:</label>
           <textarea class="ckeditor" name="intro_editor" rows="15" >
            </textarea>
            </p>
            <p><input type="submit" class="button" value="提  交"/>　 　 <input type="reset" class="button" value="取消" /></p>
        </form>
    </div>

</div>

<script type="text/javascript">

   // 启用 CKEitor 的上传功能，使用了 CKFinder 插件

   CKEDITOR.replace( 'intro_editor', {
    toolbar: 'Basic',
    uiColor: '#9AB8F3'
   });

</script>