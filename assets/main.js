const addbtn = document.getElementById('addbtn');   
const formContainer=document.getElementById('form-container');
const cancelBtn =document.getElementById('cancel-btn');

formContainer.style.display='none';

addbtn.addEventListener('click', function(){
    formContainer.style.display='block';

});


cancelBtn.addEventListener('click',function(){
formContainer.style.display='none'

});