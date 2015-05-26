<script src="<?php echo base_url('/ckeditor/ckeditor.js'); ?>"> </script>


<div class="admin_content fr">
    <h1>投票项信息管理 >> 编辑</h1>
    <div class="edit">
    	<form name="form1" action="<?php echo site_url('/admin/can_edited'); ?>" method="post" enctype="multipart/form-data" onsubmit="return check()">
        <?php foreach($candidate as $row): ?>
            <p><label>姓名:</label>
            <input type="text" class="text" name="name" value="<?php echo $row->name; ?>" />
            </p>
			
			<p><label>学院：</label>
            <input type="text" class="text" name="department" value="<?php echo $row->department; ?>" />
            </p>


            <p><label>简介:</label>
            <textarea class="ckeditor" name="intro_editor" rows="15" >
				<?php echo $row->introduction; ?>
            </textarea>
            </p>
            <p>
               <input type="hidden" name="id" value="<?php echo $row->pid; ?>" />
               <input type="submit" class="button" value="提  交" />　 　           <input type="reset" class="button" value="取消" />
            </p>
		<?php endforeach; ?>
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
        alert("投票项介绍不能为空!");           
        return false;   
    }   
    if(trim(_form.name.value)==""){   
        alert("姓名不能为空!");          
        return false;   
    } 
	if(trim(_form.department.value)==""){   
        alert("部门不能为空!");          
        return false;   
    } 

    return true;

}
</script>
