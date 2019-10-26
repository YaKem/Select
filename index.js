$(document).ready(function(){
    $('#region').on('change',function(){
        var regionCode = $(this).val();
        if(regionCode){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'region_id='+regionCode,
                success:function(html){
                    $('#department').html(html);
                    $('#city').html('<option value="">Choisir un département en premier</option>'); 
                }
            }); 
        }else{
            $('#department').html('<option value="">Choisir une région en premier</option>');
            $('#city').html('<option value="">Choisir une région en premier</option>'); 
        }
    });
    
    $('#department').on('change',function(){
        var departmentCode = $(this).val();
        if(departmentCode){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'department_id='+departmentCode,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Choisir un département en premier</option>'); 
        }
    });
});