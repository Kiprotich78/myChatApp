const toggleTab = document.querySelectorAll('.tab'),
        signUp = document.querySelector('.signup'),
        login = document.querySelector('.login'),
        input = document.querySelectorAll('input'),
        label  = document.querySelectorAll('label');

toggleTab.forEach(tab => { 
    tab.addEventListener('click', () => {
        if (!tab.classList.contains('active')) {
            toggleTab.forEach(tab => {
                tab.classList.remove('active');
            });
            tab.classList.add('active');
            if (login.classList.contains('appActive')) {
                login.classList.remove('appActive');
                signUp.classList.add('appActive');
            }
            else {
                signUp.classList.remove('appActive');
                login.classList.add('appActive');
            }      
        }

    })
})

input.forEach((input, index) => {
    input.addEventListener('keyup', () => {
        if (input.value.length > 0) {
            console.log(index);
            label[index].classList.add('labelActive');
        }
        else {
            label[index].classList.remove('labelActive');
        }
   })
});