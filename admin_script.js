document.querySelector('#close-update').onclick = () =>
{
    document.querySelector('.edit').style.display = 'none';
    window.location.href = 'products_admin.php';
}


document.querySelector('#close').onclick = () =>
{
    document.querySelector('.update_book').style.display = 'none';
    window.location.href = 'checkout.php';
}

let user = document.querySelector('.header .flex .user');

document.querySelector('#user-btn').onclick = () =>{
    user.classList.toggle('active');
}