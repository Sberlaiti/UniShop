const container_SignIn = document.querySelector('.container_SignIn');
const container_SignUp = document.querySelector('.container_SignUp');

const signUP_Button = document.querySelector('.signUP_Button');
const signIN_Button = document.querySelector('.signIN_Button');

const gotoSignUp = signUP_Button.querySelector('a');
const gotoSignIn = signIN_Button.querySelector('a');

gotoSignUp.addEventListener('click', ()  => {
    container_SignIn.style.display = 'none';
    container_SignUp.style.display = 'flex';
});

gotoSignIn.addEventListener('click', () => {
    container_SignIn.style.display = 'flex';
    container_SignUp.style.display = 'none';
});