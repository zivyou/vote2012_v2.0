<form name="form1" action="<?php echo site_url('admin/change_img_ok/'."$id"); ?>" method="post" enctype="multipart/form-data" onsubmit="return check()"> 
(图片大小限制为2048×2048)
<input type="file" name="image" size="20" />

<br /><br />

<input type="submit" value="上传" />

</form>


<script type="text/javascript">

//去掉输入字符串两边的空格


function check(){   
    //form1是form中的name属性   
    var _form = document.form1;

	if( _form.image.value==""){   
        alert("图片不能为空!");          
        return false;   
    } 

    return true;

}
</script>
