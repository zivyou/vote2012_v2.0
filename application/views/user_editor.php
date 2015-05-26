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
 
function isEquel(){   
    //form1是form中的name属性   
    var _form = document.form1;

    if(trim(_form.username.value)==""){   
        alert("姓名不能为空!");           
        return false;   
    }   
    if(trim(_form.password.value)==""){   
        alert("密码不能为空!");          
        return false;   
    } 
	if(trim(_form.password2.value)==""){   
        alert("密码不能为空!");          
        return false;   
    } 
	
	if(trim(_form.password.value) != trim(_form.password2.value)){   
        alert("两次输入的密码不一致!");          
        return false;   
    } 

    return true;

}
</script>

<div class="admin_content fr">
    <h1>管理员信息 >> 编辑</h1>
    <div class="edit">
    	<form name="form1" action="<?php echo site_url('/admin/user_edited'); ?>" method="post" onsubmit="return isEquel()" enctype="multipart/form-data">
        <?php foreach($admin as $row): ?>
            <p><label>用户名:</label>
            <input type="text" class="text" name="username" value="<?php echo $row->username; ?>" />
            </p>
			
			<p><label>密码：</label>
            <input type="password" class="text" name="password" value="<?php echo $row->password; ?>" />
            </p>
			<p><label>再次输入密码：</label>
            <input type="password" class="text" name="password2" value="<?php echo $row->password; ?>" />
            </p>
            <p>
               <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
               <input type="submit" class="button" value="提  交" />　 　           <input type="reset" class="button" value="取消" />
            </p>
		<?php endforeach; ?>
        </form>
    </div>

</div>