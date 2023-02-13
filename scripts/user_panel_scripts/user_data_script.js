document.getElementById('change_data').addEventListener('click', function(){
    const user_data={
        name:document.getElementById('name').value,
        surname:document.getElementById('surname').value,
        email:document.getElementById('email').value
    }
    update_user_data(user_data);
});
function update_user_data(user_data){
    $.ajax({
        url:'../php_scripts/user_panel/update_user_data.php',
        type:'POST',
        dataType:'json',
        data:user_data,
        success:function(response){
            console.log(response)
        }
    })
}